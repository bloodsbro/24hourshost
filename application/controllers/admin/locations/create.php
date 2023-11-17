<?php
class createController extends Controller {
	public function index() {
		$this->document->setActiveSection('admin/locations');
		$this->document->setActiveItem('create');
		
		if(!$this->user->isLogged()) {
			$this->session->data['error'] = "Вы не авторизированы!";
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 3) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		$this->getChild(array('common/admheader', 'common/footer'));
		return $this->load->view('admin/locations/create', $this->data);
	}
	
	public function ajax() {
		if(!$this->user->isLogged()) {  
	  		$this->data['status'] = "error";
			$this->data['error'] = "Вы не авторизированы!";
			return json_encode($this->data);
		}
		if($this->user->getAccessLevel() < 3) {
			$this->data['status'] = "error";
			$this->data['error'] = "У вас нет доступа к данному разделу!";
			return json_encode($this->data);
		}
		
		$this->load->model('locations');
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOST();
			if(!$errorPOST) {
				$name = @$this->request->post['name'];
				$ip = @$this->request->post['ip'];
				$ip2 = @$this->request->post['ip2'];
				$user = @$this->request->post['user'];
				$privateKey = @$this->request->post['privateKey'];
				$status = @$this->request->post['status'];
				$publicKey = @$this->request->post['publicKey'];
				if(str_contains($ip2, ":")) {
					[$ip2, $port] = explode(":", $ip2, 2);
				} else {
					$port = 22;
				}

				$locationData = array(
					'location_name'			=> $name,
					'location_ip'			=> $ip,
					'location_ip2'			=> $ip2,
					'location_port'			=> $port,
					'location_user'			=> $user,
					'location_status'		=> (int)$status
				);

				$file = fopen('/etc/ssh/' . $ip2 . '.pub', 'w');
				if($file !== false) {
					fwrite($file, trim($publicKey));
					fclose($file);

					$file = fopen('/etc/ssh/' . $ip2 . '.key', 'w');
					if($file !== false) {
						fwrite($file, trim($privateKey));
						fclose($file);

						$this->locationsModel->createLocation($locationData);

						$this->data['status'] = "success";
						$this->data['success'] = "Вы успешно создали локацию!";
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "Ошибка создания приватного ключа";
					}
				} else {
					$this->data['status'] = "error";
					$this->data['error'] = "Ошибка создания публичного ключа";
				}
			} else {
				$this->data['status'] = "error";
				$this->data['error'] = $errorPOST;
			}
		}

		return json_encode($this->data);
	}
	
	private function validatePOST() {
		$this->load->library('validate');
		
		$validateLib = new validateLibrary();
		
		$result = null;
		
		$name = @$this->request->post['name'];
		$ip = @$this->request->post['ip'];
		$ip2 = @$this->request->post['ip2'];
		$user = @$this->request->post['user'];
		$status = @$this->request->post['status'];
		
		if(mb_strlen($name) < 2 || mb_strlen($name) > 32) {
			$result = "Название локации должно содержать от 2 до 32 символов!";
		}
		elseif(!$validateLib->ip($ip)) {
			$result = "Укажите допустимый IP!";
		}
		elseif(!$validateLib->ip($ip2)) {
			$result = "Укажите допустимый IP!";
		}
		elseif(mb_strlen($user) < 2 || mb_strlen($user) > 32) {
			$result = "Имя пользователя должно содержать от 2 до 32 символов!";
		}
		// TODO: public & private key check
		elseif($status < 0 || $status > 1) {
			$result = "Укажите допустимый статус!";
		}
		return $result;
	}
}
?>
