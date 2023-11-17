<?php

class createController extends Controller {

	public function index($ticketid = null) {
		$this->document->setActiveSection('admin/forum');
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
		return $this->load->view('admin/forum/create', $this->data);
	}
	
	public function ajax($ticketid = null) {
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
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOST();
			if(!$errorPOST) {
				$name = @$this->request->post['name'];
				$text = @$this->request->post['text'];
				$userid = $this->user->getId();
				
				$forumData = array(
					'user_id'			=> $userid,
					'forum_title'		=> $name,
					'forum_text'			=> $text
				);
				$forumid = $this->forumModel->createforum($forumData);

				
				$this->data['status'] = "success";
				$this->data['success'] = "Вы успешно создали новость!";
				$this->data['id'] = $forumid;
			} else {
				$this->data['status'] = "error";
				$this->data['error'] = $errorPOST;
			}
		}

		return json_encode($this->data);
	}
	
	private function validatePOST() {
		$result = null;
		
		$name = @$this->request->post['name'];
		$text = @$this->request->post['text'];
		
		if(mb_strlen($name) < 6 || mb_strlen($name) > 100) {
			$result = "Название новости должно содержать от 2 до 100 символов!";
		}
		elseif(mb_strlen($text) < 10 || mb_strlen($text) > 1000) {
			$result = "Текст новости должен содержать от 2 до 1000 символов!";
		}
		return $result;
	}
}
