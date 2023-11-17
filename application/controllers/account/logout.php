<?php
class logoutController extends Controller {
	public function index() {
		$this->load->model('users');
		$this->document->setActiveSection('account');
		$this->document->setActiveItem('logout');
		
		if(!$this->user->isLogged()) {
			$this->session->data['error'] = 'Вы не авторизированы';
			$this->response->redirect($this->config->url . 'account/login');
		}
		
		$userid=$this->user->getId();
		$ip=$this->user->getRealIpAdress();
		$this->usersModel->createAuthLog($userid,$ip,'2','NONE');
		
		$this->user->logout();
		$this->session->data['success'] = 'Вы успешно вышли из своего аккаунта';
		$this->response->redirect($this->config->url);
		
		return null;
	}
}
?>
