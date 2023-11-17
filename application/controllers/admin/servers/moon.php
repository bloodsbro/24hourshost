<?php
class moonController extends Controller {
	public function index() {
		$this->document->setActiveSection('admin/servers');
		$this->document->setActiveItem('moon');
		
		if(!$this->user->isLogged()) {
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 2) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		$getlvl = $this->user->getAccessLevel();
		$this->data['getlvl'] = $getlvl;
		
		$this->load->model('servers');
		
		$userid = $this->user->getId();


		$options = array(
			'start' => 0,
			'limit' => 50000
		);
		

		$tservers = $this->serversModel->getServers(array(), array('games', 'locations'), array(), array());
		$this->data['tservers'] = $tservers;

		$this->getChild(array('common/admheader', 'common/footer'));
		return $this->load->view('admin/servers/moon', $this->data);
	}
}
?>