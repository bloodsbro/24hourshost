<?php

class indexController extends Controller {
	private $limit = 20;
	public function index() {
		$this->document->setActiveSection('team');
		$this->document->setActiveItem('index');
		$this->data['url'] = $this->config->url;
		
        if(!$this->user->isLogged()) {
			$this->session->data['error'] = "Вы не авторизированы!";
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 0) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		
		$this->load->model('users');
		$users = $this->usersModel->getUsers(array(), array(), array());
		$this->data['users'] = $users;
		
		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('team/index', $this->data);
	}
}
?>
