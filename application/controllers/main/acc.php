<?php

class accController extends Controller {
	public function index() {
		$this->data['url'] = $this->config->url;
		
		if(!$this->user->isLogged()) {
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 0) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		$this->data['logged'] = true;
		$this->data['user_email'] = $this->user->getEmail();
		$this->data['user_id'] = $this->user->getId();
		$this->data['user_firstname'] = $this->user->getFirstname();
		$this->data['user_lastname'] = $this->user->getLastname();
		$this->data['user_balance'] = $this->user->getBalance();
		$this->data['user_img'] = $this->user->getUser_img();
		$this->data['user_balance'] = $this->user->getBalance();
        $this->data['user_tg'] = $this->user->getTg();

        $this->load->model('waste');
		$this->load->model('tickets');
		$this->load->model('users');
		$this->load->model('servers');

		$userid = $this->user->getId();
		
		$waste = $this->wasteModel->getWaste(array('user_id' => (int)$userid), array(), array('waste_date_add'	=> 'DESC'), array('start' => 0,'limit' => 10));
		$this->data['waste'] = $waste;
		
		$this->data['user'] = array('firstname' => $this->user->getFirstname(), 'lastname' => $this->user->getLastname(), 'user_email' => $this->user->getEmail());
		$users = $this->usersModel->getUserById($userid, array(), array(), array());
		$this->data['users'] = $users;

		$userg = $this->usersModel->getUsers(array('servers'), array(), array());
		$this->data['userg'] = $userg;
		
		$visitors = $this->usersModel->getAuthLog($userid);
		$this->data['visitors'] = $visitors;
		
		$auths = $this->usersModel->getAuths(array('user_id' => $userid), array(), array('auth_id' => 'DESC'));
		$this->data['auths'] = $auths;
		
		$servers = $this->serversModel->getServers(array('user_id' => (int)$userid), array('games', 'locations'), array(), array());
		$this->data['servers'] = $servers;
		
		$tickets = $this->ticketsModel->getTickets(array('user_id' => (int)$userid), array(), array(), array());
		$this->data['tickets'] = $tickets;
		
		$row['date'] = strtotime($users['user_date_reg']); 
        $now = time(); 
        $seconds = $now - $row['date']; 
        $days = floor($seconds / (24*60*60)); 
        $this->data['user_date_reg'] = $days; 
        $res = $this->pluralForm($days, 'день', 'дней', 'дня'); 
        $this->data['user_date'] = $res;		
		
		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('main/acc', $this->data);
	}

    public function checkTask() {
        if(!$this->user->isLogged()) {
            $this->data['status'] = "error";
            $this->data['error'] = "Вы не авторизированы!";
            return json_encode($this->data);
        }
        if($this->user->getAccessLevel() < 1) {
            $this->data['status'] = "error";
            $this->data['error'] = "У вас нет доступа к данному разделу!";
            return json_encode($this->data);
        }

        $this->load->model('tasks');
        $this->load->model('waste');
        $this->load->model('users');

        $userid = $this->user->getId();
        $taskId = @$this->request->post['taskId'];
        $task = $this->tasksModel->getTasks(array("task_id" => $taskId), array('tasks_complete'), array(), array())[0];

        if($this->tasksModel->isTaskNotCompleted($taskId, $userid)) {
            $success = false;
            $giveReward = false;

            switch($task['task_type']) {
                case 1:
                case 2: {
                    $access_token = @$this->request->post['access_token'];
                    $url = $this->generateCheckLink($task, $access_token);

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_URL, $url);
                    $result = json_decode(curl_exec($ch));
                    $err = curl_errno($ch);
                    curl_close($ch);

                    if($err) {
                        error_log('Curl error: ' . $err);
                    } else {
                        $response = $this->checkVKTaskComplete($task, $result->response);
                        $success = $response;
                        $giveReward = $response;
                    }
                    break;
                }
                case 3: {
                    $success = true;
                    $giveReward = false;
                    break;
                }
            }

            if($success) {
                $this->tasksModel->completeTask($taskId, $userid, $giveReward);

                if($giveReward) {
                    $rewardType = $task['task_reward_type'];
                    $rewardCount = $task['task_reward_count'];

                    switch($rewardType) {
                        case 1: {
                            $wasteData = array(
                                'user_id'		=> $userid,
                                'waste_ammount'	=> $rewardCount,
                                'waste_status'	=> 0,
                                'waste_usluga'	=> "Выполнение задания #$taskId",
                            );
                            $this->wasteModel->createWaste($wasteData);
                            $this->usersModel->upUserBalance($userid, $rewardCount);
                            break;
                        }
                        case 2: {
                            break;
                        }
                    }
                }

                if(!$giveReward) {
                    $this->notify->adminsTelegram("Пользователь #" . $userid . " выполнил задание #" . $taskId . ", которое требует ручной проверки");
                }

                $this->data['status'] = "success";

                if($giveReward) {
                    $this->data['success'] = "Вы успешно выполнили задание #$taskId";
                } else {
                    $this->data['success'] = "Ожидайте ручной проверки от Администрации по заданию #$taskId";
                }
            } else {
                $this->data['status'] = "error";
                $this->data['error'] = "Вы не выполнили условия задания!";
            }
        } else {
            $this->data['status'] = "error";
            $this->data['error'] = "Вы уже выполняли это задание!";
        }

        return json_encode($this->data);
    }

    private function generateCheckLink($task, $access_token) {
        switch($task['task_type']) {
            case '1': {
                return "https://api.vk.com/method/groups.isMember?access_token=$access_token&group_id=223414192&v=5.130";
            }
            case '2': {
                return "https://api.vk.com/method/likes.isLiked?access_token=$access_token&owner_id=-223414192&item_id=" . substr($task['task_extra'], strlen('https://vk.com/24hours.host?w=wall-223414192_')) . "&v=5.130&type=post";
            }
        }

        return '';
    }

    private function checkVKTaskComplete($task, $response) {
        $completed = false;
        error_log(json_encode($response));
        switch($task['task_type']) {
            case '1': {
                $completed = $response == 1;
                break;
            }
            case '2': {
                $completed = $response->liked && $response->copied;
                break;
            }
        }

        return $completed;
    }
	
	public function action($action = null) {
		if(!$this->user->isLogged()) {
			$this->data['status'] = "error";
			$this->data['error'] = "Вы не авторизированы!";
			return json_encode($this->data);
		}
		if($this->user->getAccessLevel() < 1) {
			$this->data['status'] = "error";
			$this->data['error'] = "У вас нет доступа к данному разделу!";
			return json_encode($this->data);
		}
		
		$userid = $this->user->getId();

		$this->load->model('users');
		$this->load->model('waste');
		
		switch($action) {
            case 'setTg': {
                $result = false;
                if($this->user->getTg()) $result = "У Вас уже привязан TG";
                $auth_data = $this->request->post['auth_id'];

                $check_hash = $auth_data['hash'];
                unset($auth_data['hash']);
                $data_check_arr = [];
                foreach ($auth_data as $key => $value) {
                    $data_check_arr[] = $key . '=' . $value;
                }
                sort($data_check_arr);
                $data_check_string = implode("\n", $data_check_arr);
                $secret_key = hash('sha256', $this->config->telegram_token, true);
                $hash = hash_hmac('sha256', $data_check_string, $secret_key);
                if (strcmp($hash, $check_hash) !== 0) {
                    $result = "Data is NOT from Telegram";
                }
                if ((time() - $auth_data['auth_date']) > 86400) {
                    $result = "Data is outdated";
                }

                if($this->usersModel->getTotalUsers(array('user_tg' => $auth_data['id']))) {
                    $result = "Данный профиль уже привязан к другому аккаунту!";
                }

                if(!$result) {
                    $this->usersModel->updateUser($userid, array('user_tg' => $auth_data['id']));

                    $this->data['status'] = "success";
                    $this->data['success'] = "Вы успешно привязали TG!";
                } else {
                    $this->data['status'] = "error";
                    $this->data['error'] = $result;
                }
                break;
            }
            case 'unsetTg': {
                if ($this->user->getTg()) {
                    $this->usersModel->updateUser($userid, array('user_tg' => 0));
                    $this->data['status'] = "success";
                    $this->data['success'] = "Вы успешно отвязали TG!";
                } else {
                    $this->data['status'] = "error";
                    $this->data['error'] = "На данный момент у Вас не привязан TG!";
                }
                break;
            }
			case 'setVk': {
                var_dump($_REQUEST);
				if($this->request->post['auth']){
					$Uid = $this->request->post['response']['session']['user']['id'];
					
					if($this->usersModel->getTotalUsers(array('user_vk_id' => $Uid))) {
						$this->data['status'] = "error";
						$this->data['error'] = "Данный профиль уже привязан к другому аккаунту!";
					} else {			
						if (!$this->user->getUser_vk_id()) {
							$this->usersModel->updateUser($userid, array('user_vk_id' => $Uid));
							
							$this->data['status'] = "success";
							$this->data['success'] = "Профиль привязан!";				
						} else {
							$this->data['status'] = "error";
							$this->data['error'] = "Данный аккаунт уже привязан!";
						}
					}
                    break;
				} else {
                    $this->data['status'] = "error";
                    $this->data['error'] = "Не пришли данные от VK!";
                }
			
				/* if($this->request->post['auth_vk']) {
					if($user = @file_get_contents("https://api.vk.com/method/users.get?uids={$this->session->data['auth_vk']}&fields=uid,first_name,last_name,screen_name,sex,bdate,photo_big"))
					$this->data['user'] = json_decode($user, true);
				} */
				break;
			}
			case 'unsetVk': {
				if ($this->user->getUser_vk_id()) {
					$this->usersModel->updateUser($userid, array('user_vk_id' => 0));						
					$this->data['status'] = "success";
					$this->data['success'] = "Вы успешно отвязали VK!";
				} else {
					$this->data['status'] = "error";
					$this->data['error'] = "На данный момент у Вас не привязан VK!";
				}
				break;
			}
			case 'closeSession': {
				if($this->request->server['REQUEST_METHOD'] == 'POST') {
					$auth_id = $this->request->post['auth_id'];
					$auths = $this->usersModel->getAuths(array('auth_id' => $auth_id, 'user_id' => $userid));
					if(empty($auths)) {
						$this->data['status'] = "error";
						$this->data['error'] = "Сеанс не найден!";
					} else {
						$auth = $auths[0];
							
						if($auth['auth_key'] != @$_COOKIE['uid']) {
							$this->usersModel->deleteAuth($auth['auth_id']);
								
							$this->data['status'] = "success";
							$this->data['success'] = "Сеанс успешно завершён!";
						} else {
							$this->data['status'] = "error";
							$this->data['error'] = "Вы не можете завершить текущий сеанс!";
						}
					}
				}
				break;
			}
			default: {
				$this->data['status'] = "error";
				$this->data['error'] = "Вы выбрали несуществующее действие!";
				break;
			}
		}

		return json_encode($this->data);
	}
	
	public function ajax() {
		if(!$this->user->isLogged()) {  
	  		$this->data['status'] = "error";
			$this->data['error'] = "Вы не авторизированы!";
			return json_encode($this->data);
		}
		if($this->user->getAccessLevel() < 1) {
	  		$this->data['status'] = "error";
			$this->data['error'] = "У вас нет доступа к данному разделу!";
			return json_encode($this->data);
		}
		
		$this->load->model('users');
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOST();
			if(!$errorPOST) {
				$lastname = @$this->request->post['lastname'];
				$firstname = @$this->request->post['firstname'];
				$editpassword = @$this->request->post['editpassword'];
				$password = @$this->request->post['password'];
				
				$userid = $this->user->getId();
				
				if (@$firstname) {
					$firstname = @strtoupper($firstname[0]) . substr($firstname, 1);
				}

				if (@$lastname) {
					$lastname = @strtoupper($lastname[0]) . substr($lastname, 1);
				}
				
				$userData = array(
					'user_firstname'	=> $firstname,
					'user_lastname'		=> $lastname
				);
				
				if($editpassword) {
					$userData['user_password'] = md5($password);
				}
				
				$this->usersModel->updateUser($userid, $userData);
				
				$this->data['status'] = "success";
				$this->data['success'] = "Изменения сохранены!";
			} else {
				$this->data['status'] = "error";
				$this->data['error'] = $errorPOST;
			}
		}

		return json_encode($this->data);
	}
	
	public function change_email() {
		if (!$this->user->isLogged()) {
			$this->data['status'] = 'error';
			$this->data['error'] = 'Вы не авторизированы!';
			return json_encode($this->data);
		}

		if ($this->user->getAccessLevel() < 1) {
			$this->data['status'] = 'error';
			$this->data['error'] = 'У вас нет доступа к данному разделу!';
			return json_encode($this->data);
		}

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST_email = $this->validatePOST_email();

			if (!$errorPOST_email) {
				$email = @$this->request->post['email'];
				$userid = $this->user->getId();
				$this->load->model('users');

				if ($this->usersModel->getTotalUsers(array('user_email' => $email))) {
					$this->data['status'] = 'error';
					$this->data['error'] = 'Указанный E-Mail уже используется!';
					return json_encode($this->data);
				}

                if(strlen($this->user->getEmail()) === 0) {
                    $this->usersModel->updateUser($userid, array('user_email' => $email));

                    $this->data['status'] = 'success';
                    $this->data['success'] = 'Вы успешно установили почту!';
                } else {
                    $random = md5(uniqid(rand(), true));
                    $this->usersModel->updateUser($userid, array('user_new_email' => $email . '|' . $random));
                    $user = $this->usersModel->getUserById($userid);

                    $this->load->library('mail');

                    $mailLib = new mailLibrary();
                    $mailLib->setFrom($this->config->mail_from);
                    $mailLib->setSender($this->config->mail_sender);
                    $mailLib->setTo($user['user_email']);
                    $mailLib->setSubject("Смена E-Mail");
                    $mailData = array();
                    $mailData['firstname'] = $user['user_firstname'];
                    $mailData['lastname'] = $user['user_lastname'];
                    $mailData['email'] = $user['user_email'];
                    $mailData['new_email'] = $email;
                    $mailData['userid'] = $userid;
                    $mailData['key'] = $random;
                    $mailData['url'] = $this->config->url;
                    $mailData['title'] = $this->config->title;
                    $text = $this->load->view('mail/account/change_email', $mailData);

                    $mailLib->setText($text);
                    $mailLib->send();

                    $this->data['status'] = 'success';
                    $this->data['success'] = 'На текущий E-Mail отправлена инструкция с дальнейшими действиями!';
                }
			}
			else {
				$this->data['status'] = 'error';
				$this->data['error'] = $errorPOST_email;
			}
		}

		return json_encode($this->data);
	}

	public function change_email_verifity($userid = null, $key = null)
	{
		if (!$userid || !$key) {
			$this->session->data['error'] = 'Ошибка! Повторите действие.';
			$this->response->redirect('/main/index');
			return null;
		}

		$this->load->model('users');
		$user = @$this->usersModel->getUserById($userid);
		if ($user && (@explode('|', $user['user_new_email'])[1] == $key)) {
			if ($this->usersModel->getTotalUsers(array('user_email' => @explode('|', $user['user_new_email'])[0]))) {
				exit('Указанный E-Mail уже используется!');
			}

			$this->usersModel->updateUser($userid, array('user_new_email' => null, 'user_email' => @explode('|', $user['user_new_email'])[0]));
			$this->session->data['success'] = 'E-Mail Сменен!';
		} else {
			$this->session->data['error'] = 'Ошибка! Повторите действие.';
		}

		$this->response->redirect('/account/login');
	}

    public function set_totp() {
        if (!$this->user->isLogged()) {
            $this->data['status'] = 'error';
            $this->data['error'] = 'Вы не авторизированы!';
            return json_encode($this->data);
        }

        if ($this->user->getAccessLevel() < 1) {
            $this->data['status'] = 'error';
            $this->data['error'] = 'У вас нет доступа к данному разделу!';
            return json_encode($this->data);
        }

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            $totp_key = $this->request->post['totp_key'];
            $totp_code = $this->request->post['totp_code'];

            $errorPOST_totp = $this->validatePOST_totp($totp_key, $totp_code);

            if (!$errorPOST_totp) {
                $this->load->model('users');
                $userid = $this->user->getId();

                $this->notify->user($userid, "На Ваш аккаунт была привязана двухфакторная аутентификация!");
                $this->usersModel->updateUser($userid, array('user_totp' => $totp_key));

                $this->data['status'] = 'success';
                $this->data['success'] = 'Вы успешно привязали двухфакторную аутентификацию!';
            }
            else {
                $this->data['status'] = 'error';
                $this->data['error'] = $errorPOST_totp;
            }
        }

        return json_encode($this->data);
    }

    private function validatePOST_totp($key, $code) {
        require_once(ENGINE_DIR . "/libs/totp.php");

        $valid = TOTP::getOTP($key);
        if(@$valid['err'] || (@$valid['otp'] !== $code)) {
            $result = "Вы ввели неверный код из приложения!";
        }

        return $result;
    }

    public function unset_totp() {
        if (!$this->user->isLogged()) {
            $this->data['status'] = 'error';
            $this->data['error'] = 'Вы не авторизированы!';
            return json_encode($this->data);
        }

        if ($this->user->getAccessLevel() < 1) {
            $this->data['status'] = 'error';
            $this->data['error'] = 'У вас нет доступа к данному разделу!';
            return json_encode($this->data);
        }

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            $this->load->model('users');
            $userid = $this->user->getId();

            $this->notify->user($userid, "С Вашего аккаунта была отвязана двухфакторная аутентификацию");
            $this->usersModel->updateUser($userid, array('user_totp' => null));

            $this->data['status'] = 'success';
            $this->data['success'] = 'Вы успешно отвязали двухфакторную аутентификацию!';
        }

        return json_encode($this->data);
    }
	
	public function img() {
		if(!$this->user->isLogged()) {  
	  		$this->data['status'] = "error";
			$this->data['error'] = "Вы не авторизированы!";
			return json_encode($this->data);
		}
		if($this->user->getAccessLevel() < 1) {
	  		$this->data['status'] = "error";
			$this->data['error'] = "У вас нет доступа к данному разделу!";
			return json_encode($this->data);
		}
		
		$this->load->model('users');
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
            $userid = $this->user->getId();
			$uploadfile = 'tmp/avatar/'.$userid.'.jpg';

			if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
				if(exif_imagetype($uploadfile) !== FALSE) {
					if($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size'] <= 8192000) {
						$size = getimagesize($uploadfile);
						if ($size[0] <= 4496 && $size[1] <= 4496)  {
                            chmod($uploadfile, 0666);

                            $this->usersModel->updateUser($userid, array('user_img' => $uploadfile));
							$this->data['status'] = "success";
							$this->data['success'] = "Аватар успешно был загружен!";			 
						} else {
							$this->data['error'] = 'Загружаемое изображение превышает допустимые нормы (4496x4496)!';
							$this->data['status'] = "error";
							unlink($uploadfile); 
						} 
					} else { 
						$this->data['error'] = 'Размер изображения не должено превышать 8Мб';
						$this->data['status'] = "error";
					} 
				} else {     
					$this->data['status'] = "error";
					$this->data['error'] = "Можно загружать только изображения в форматах jpg, jpeg и png";
				}
			} else {
				$this->data['error'] = 'Изображение не загружено!';
				$this->data['status'] = "error";
			} 	
		}
		return json_encode($this->data);
    }
	
	private function validatePOST() {
	
		$this->load->library('validate');
		
		$validateLib = new validateLibrary();
		
		$result = null;
		
		$lastname = @$this->request->post['lastname'];
		$firstname = @$this->request->post['firstname'];
		$editpassword = @$this->request->post['editpassword'];
		$password = @$this->request->post['password'];
		$password2 = @$this->request->post['password2'];
		
		if (@$firstname) {
			$firstname = @strtoupper($firstname[0]) . substr($firstname, 1);
		}

		if (@$lastname) {
			$lastname = @strtoupper($lastname[0]) . substr($lastname, 1);
		}

		if(!$validateLib->check_for_number($lastname)) {
			$result = "Укажите свою реальную фамилию!";
		}
		elseif(!$validateLib->check_for_number($firstname)) {
			$result = "Укажите свое реальное имя!";
		}
		elseif($editpassword) {
			if(!$validateLib->password($password)) {
				$result = "Пароль должен содержать от 6 до 32 латинских букв, цифр и знаков <i>,.!?_-</i>!";
			}
			elseif($password != $password2) {
				$result = "Введенные вами пароли не совпадают!";
			}
		}
		return $result;
	}
	
	private function validatePOST_email()
	{
		$this->load->library('validate');
		$validateLib = new validateLibrary();
		$result = NULL;
		$email = @$this->request->post['email'];

		if (!$validateLib->email($email)) {
			$result = 'Укажите свой реальный E-Mail!';
		}

		return $result;
	}
	
	private function validatePOST_VK() {
		$this->load->library('validate');
		
		$validateLib = new validateLibrary();
		
		$result = null;
		
		$id = @strtolower($this->request->post['id']);

		if($this->usersModel->getTotalUsers(array('user_vk_id' => $id))) {
			$result = "Указанный ID-".$id." уже привязан!";
		}

		return $result;
	}

	public function pluralForm($n, $form1, $form2,$form5) { 
        $n = abs($n) % 100; 
        $n1 = $n % 10; 
        if ($n1 >= 5 && $n1 <= 4) return $form2; 
        if ($n >= 10 && $n <= 20) return $form2; 
        if ($n1 >= 2 && $n1 <= 4) return $form5; 
        if ($n1 == 1) return $form1; 
        if ($n == 0) return $form2; 
    }
}
?>