<?php

class createController extends Controller {
	public function index() {
		$this->document->setActiveSection('admin/weblocations');
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
		return $this->load->view('admin/weblocations/create', $this->data);
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
		
		$this->load->model('webLocations');
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOST();
			if(!$errorPOST) {
				$name = @$this->request->post['name'];
				$ip = @$this->request->post['ip'];
				$url = @$this->request->post['url'];
				$ns_servers = @$this->request->post['ns_servers'];
				$user = @$this->request->post['user'];
				$status = @$this->request->post['status'];
				if(str_contains($ip, ":")) {
					[$ip2, $port] = explode(":", $ip, 2);
				} else {
					$port = 22;
				}

				$locationData = array(
					'location_name'			=> $name,
					'location_ip'			=> $ip,
					'location_url'			=> $url,
					'location_user'			=> $user,
					'location_port'			=> $port,
					'ns_servers'			=> $ns_servers,
					'location_status'		=> (int)$status
				);
				
				$this->webLocationsModel->createLocation($locationData);
				
				$this->data['status'] = "success";
				$this->data['success'] = "Вы успешно создали локацию!";
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
		$url = @$this->request->post['url'];
		$user = @$this->request->post['user'];
		$ns_servers = @$this->request->post['ns_servers'];
		$status = @$this->request->post['status'];
		
		if(mb_strlen($name) < 2 || mb_strlen($name) > 32) {
			$result = "Название локации должно содержать от 2 до 32 символов!";
		}
		elseif(mb_strlen($ns_servers) < 2 || mb_strlen($ns_servers) > 78) {
			$result = "NS Сервера локации должны содержать от 2 до 78 символов!";
		}
		elseif(!$validateLib->ip($ip)) {
			$result = "Укажите допустимый IP!";
		}
		elseif(mb_strlen($url) < 2 || mb_strlen($url) > 32) {
			$result = "Домен должен содержать от 2 до 32 символов!";
		}
		elseif(mb_strlen($user) < 2 || mb_strlen($user) > 32) {
			$result = "Имя пользователя должно содержать от 2 до 32 символов!";
		}
		elseif($status < 0 || $status > 1) {
			$result = "Укажите допустимый статус!";
		}
		return $result;
	}
}
?>
