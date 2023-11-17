<?php

class signupheaderController extends Controller {
	public function index() {
		$this->data['title'] = $this->config->title;
		$this->data['description'] = $this->config->description;
		$this->data['keywords'] = $this->config->keywords;
		$this->data['logo'] = $this->config->logo;
		$this->data['public'] = $this->config->public;
		$this->data['count'] = $this->config->count;
		$this->data['vk_id'] = $this->config->vk_id;
		$this->data['vk_stat'] = $this->config->vk_stat;
		$this->data['recaptcha'] = $this->config->recaptcha;
		
		if(isset($this->session->data['error'])) {
			$this->data['error'] = $this->session->data['error'];
			unset($this->session->data['error']);
		}
		
		if(isset($this->session->data['warning'])) {
			$this->data['warning'] = $this->session->data['warning'];
			unset($this->session->data['warning']);
		}
		
		if(isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		}
		$this->load->model('users');
		$userid = $this->user->getId();
		
		$user = $this->usersModel->getUserById($_GET['ref'], array(), array(), array());
		$this->data['user'] = $user;

		return $this->load->view('common/signupheader', $this->data);
	}
	
	public function ajax() {
		if($this->user->isLogged()) {  
	  		$this->data['status'] = "error";
			$this->data['error'] = "Вы уже авторизированы!";
			return json_encode($this->data);
		}
		$this->load->library('mail');
		$this->load->model('users');
		$this->load->model('waste');

		$errorPOST = $this->validatePOST();
		if(!$errorPOST) {
			$lastname = @$this->request->get['lastname'];
			$firstname = @$this->request->get['firstname'];
			$email = @$this->request->get['email'];
			$password = @$this->request->get['password'];
            $ref = @intval(@$this->request->get['ref']);

			if (@$firstname) {
				$firstname = @strtoupper($firstname[0]) . substr($firstname, 1);
			}

			if (@$lastname) {
				$lastname = @strtoupper($lastname[0]) . substr($lastname, 1);
			}
		
            if ($this->config->register) {
				$random = md5(uniqid(rand(), true));
				$user_activate = 0;
			}
			else {
				$random = 0;
				$user_activate = 1;
			}
				
			$random = md5(uniqid(rand(),true)); 
				
			$userData = array(
				'user_email'		=> $email,
				'user_password'		=> md5($password),
				'user_firstname'	=> $firstname,
				'user_lastname'		=> $lastname,
				'user_status'		=> 1,
				'user_balance'		=> 0,
				'user_access_level'	=> 1,
				'rmoney'			=> 0,
				'user_activate'		=> $this->config->register,
				'key_activate'		=> $random
			);
			$userid = $this->usersModel->createUser($userData);
			if($userid != $ref) {
				if($ref != 0) {
					$this->usersModel->upUserBalance($ref, 0.25);
					$this->usersModel->upUserRMoney($ref, 0.25);
					$userData = array(
						'ref'               => $ref
					);
					$this->usersModel->updateUser($userid, $userData);
					
					$wasteData = array(
						'user_id'		=> $ref,
						'waste_ammount'	=> 0.25,
						'waste_status'	=> 0,
						'waste_usluga'	=> "Бонус за приглашенного реферала ID-$userid"
					); 
					$this->wasteModel->createWaste($wasteData);
				}
			}
			$mailLib = new mailLibrary();
				
			$mailLib->setFrom($this->config->mail_from);
			$mailLib->setSender($this->config->mail_sender);
			$mailLib->setTo($email);
			$mailLib->setSubject('Регистрация аккаунта');
				
			$mailData = array();
				
			$mailData['firstname'] = $firstname;
			$mailData['lastname'] = $lastname;
			$mailData['email'] = $email;
			$mailData['password'] = $password;
			$mailData['key'] = $random;
			$mailData['url'] = $this->config->url;
			$mailData['title'] = $this->config->title;
				
			if ($this->config->register) {
				$text = $this->load->view('mail/account/register', $mailData);
			}
			else {
				$text = $this->load->view('mail/account/register_activate', $mailData);
			}
				
			$mailLib->setText($text);
			$mailLib->send();
				
			$this->data['status'] = "success";
			$this->data['success'] = "Вы успешно зарегистрировались!";
			$this->data['user_activate'] = $user_activate;
		} else {
			$this->data['status'] = "error";
			$this->data['error'] = $errorPOST;
		}

		return json_encode($this->data);
	}
	
	private function validatePOST() {
		$this->load->library('validate');
		
		$validateLib = new validateLibrary();
		
		$result = null;
		
		$lastname = @$this->request->get['lastname'];
		$firstname = @$this->request->get['firstname'];
		$email = @$this->request->get['email'];
		$password = @$this->request->get['password'];
		$password2 = @$this->request->get['password2'];
		
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
		elseif(!$validateLib->email($email)) {
			$result = "Укажите свой реальный E-Mail!";
		}
		elseif(!$validateLib->password($password)) {
			$result = "Пароль должен содержать от 6 до 32 латинских букв, цифр и знаков <i>,.!?_-</i>!";
		}
		elseif($password != $password2) {
			$result = "Введенные вами пароли не совпадают!";
		}
		elseif($captcha != $captchahash) {
			$result = "Укажите правильный код с картинки! Попробуйте нажать на картинку, чтобы обновить ее.";
		}
		elseif($this->usersModel->getTotalUsers(array('user_email' => $email))) {
			$result = "Указанный E-Mail уже зарегистрирован!";
		}

		$context  = stream_context_create($options);
		$recaptcha_get = json_decode(file_get_contents($url, false, $context))->{'success'}; 	
		if($recaptcha_get != '1') return 'Проверьте правильность капчи!';	
		return $result;
	}
	
	public function finxgames_infobox() {
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOSTInfo();
			if(!$errorPOST) {				
				if(@$this->request->post['msg'] == ""){
					$this->data['status'] = "error";
					$this->data['error'] = "Введите команду!";
				}elseif(@$this->request->post['msg'] != ""){
					$this->load->model('mail');
					$firstname = @$this->request->post['firstname'];
					$lastname = @$this->request->post['lastname'];
					$email = @$this->request->post['email'];
					$subject = @$this->request->post['subject'];
					$msg = @$this->request->post['msg'];
					$msgData = array(
						'user_email'		=> $email,
						'user_firstname'	=> $firstname,
						'user_lastname'		=> $lastname,
						'category'			=> $subject,
						'text'				=> $msg,
						'status'	        => 1
					);
					
					$msg_id = $this->mailModel->createInbox($msgData);	

					$this->data['status'] = "success";
					$this->data['success'] = "Ваше письмо отправлено! Номер IN".$msg_id."";
				}

			} else {
				$this->data['status'] = "error";
				$this->data['error'] = $errorPOST;
			}
		}

		return json_encode($this->data);
	}

	private function validatePOSTInfo() {	
		$this->load->library('validate');
		
		$validateLib = new validateLibrary();
		
		$result = null;
		
		$firstname = @$this->request->post['firstname'];
		$lastname = @$this->request->post['lastname'];
		$email = @strtolower($this->request->post['email']);
		$subject = @$this->request->post['subject'];
		$msg = @$this->request->post['msg'];
		
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
		elseif(!$validateLib->email($email)) {
			$result = "Укажите свой реальный E-Mail!";
		}

		return $result;
	}
}
?>
