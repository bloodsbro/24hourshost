<?php
class footerController extends Controller {	
	public function index() {
		$this->data['title'] = $this->config->title;
		$this->data['description'] = $this->config->description;
		$this->data['public'] = $this->config->public;
		$this->data['requestTime'] = REQUEST_START_TIME;
		$this->data['vk_id'] = $this->config->vk_id;

		return $this->load->view('common/footer', $this->data);
	}
	
	public function getstatus($action) {
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

		switch($action) {
			case 'online': {				
				$this->usersModel->updateUser($userid, array('user_online_date'=> time()));
				$this->data['status'] = "online";
				$this->data['online'] = "USERID ".$userid." ".$this->user->getFirstname()." UPD-DATE ".date("Y-m-d H:i:s")." | LVL ".$this->user->getAccessLevel()." ST.OK";
				$this->data['online_usr'] = $this->usersModel->getOnlineUsers();
				break;
			}
			case 'online_sup': {
				$this->data['sup_status'] = $this->usersModel->getOnlineAdmins() > 0 ? "Online" : "Offline";
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
}
?>
