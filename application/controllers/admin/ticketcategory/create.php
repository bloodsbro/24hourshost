<?php

class createController extends Controller {
	public function index() {
		$this->document->setActiveSection('admin/ticketcategory');
		$this->document->setActiveItem('create');
		$this->data['url'] = $this->config->url;
		
		if(!$this->user->isLogged()) {
			$this->session->data['error'] = "Вы не авторизированы!";
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 3) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		$this->getChild(array('common/admheader', 'common/footer'));
		return $this->load->view('admin/ticketcategory/create', $this->data);
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
		
		$this->load->model('ticketsCategory');
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOST();
			if(!$errorPOST) {
				$name = @$this->request->post['name'];
                $status = @$this->request->post['status'];
				
				$adapData = array(
					'category_name'			=> $name,
					'category_status'		=> $status
				);
				
				$this->ticketsCategoryModel->createTicketCategory($adapData);
				
				$this->data['status'] = "success";
				$this->data['success'] = "Вы успешно создали категорию!";
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
        $status = @$this->request->post['status'];

		if(mb_strlen($name) < 2 || mb_strlen($name) > 32) {
			$result = "Название категории должно содержать от 2 до 32 символов!";
		}
		elseif($status < 0 || $status > 1) {
			$result = "Укажите допустимый статус!";
		}
		return $result;
	}
}
?>