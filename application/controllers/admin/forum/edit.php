<?php

class editController extends Controller {
	public function index($newid = null) {
		$this->document->setActiveSection('admin/forum');
		$this->document->setActiveItem('edit');
		
		if(!$this->user->isLogged()) {
			$this->session->data['error'] = "Вы не авторизированы!";
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 3) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		$this->load->model('forum');
		
		$error = $this->validate($newid);
		if($error) {
			$this->session->data['error'] = $error;
			$this->response->redirect($this->config->url . 'admin/forum/index');
		}
		
		$new = $this->forumModel->getforumById($newid);
		
		$this->data['new'] = $new;
		$this->getChild(array('common/admheader', 'common/footer'));
		return $this->load->view('admin/forum/edit', $this->data);
	}
	
	public function ajax($newid = null) {
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
		
		$this->load->model('forum');
		
		$error = $this->validate($newid);
		if($error) {
			$this->data['status'] = "error";
			$this->data['error'] = $error;
			return json_encode($this->data);
		}
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOST();
			if(!$errorPOST) {
				$name = @$this->request->post['name'];
				$text = @$this->request->post['text'];
				$locationData = array(
					'forum_title'			=> $name,
					'forum_text'			=> $text
				);
 
				
				$this->forumModel->updateforum($newid, $locationData);
				
				$this->data['status'] = "success";
				$this->data['success'] = "Вы успешно отредактировали новость!";
			} else {
				$this->data['status'] = "error";
				$this->data['error'] = $errorPOST;
			}
		}

		return json_encode($this->data);
	}
	
	public function delete($newid = null) {
		$this->document->setActiveSection('admin');
		$this->document->setActiveItem('locations');
		
		if(!$this->user->isLogged()) {
			$this->session->data['error'] = "Вы не авторизированы!";
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 3) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		$this->load->model('forum');
		
		$error = $this->validate($newid);
		if($error) {
			$this->session->data['error'] = $error;
			$this->response->redirect($this->config->url . 'admin/forum/index');
		}
		
		$this->forumModel->deleteforum($newid);
		
		$this->session->data['success'] = "Вы успешно удалили новость!";
		$this->response->redirect($this->config->url . 'admin/forum/index');
		return null;
	}
	
	private function validate($newid) {
		$result = null;
		
		if(!$this->forumModel->getTotalforum(array('forum_id' => (int)$newid))) {
			$result = "Запрашиваемая новость не существует!";
		}
		return $result;
	}
	
	private function validatePOST() {
		$this->load->library('validate');
		
		$validateLib = new validateLibrary();
		
		$result = null;
		
		$name = @$this->request->post['name'];
		$text = @$this->request->post['text'];
		if(mb_strlen($name) < 2 || mb_strlen($name) > 100) {
         $result = "Текст должен содержать от 2 до 100 символов!";
      }
		if(mb_strlen($text) < 2 || mb_strlen($text) > 1000) {
			$result = "Текст должен содержать от 2 до 1000 символов!";
		}
		return $result;
	}
}
?>
