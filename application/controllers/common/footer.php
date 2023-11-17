<?php
class footerController extends Controller {	
	public function index() {
		$this->data['title'] = $this->config->title;
		$this->data['description'] = $this->config->description;
		$this->data['public'] = $this->config->public;
		$this->data['requestTime'] = REQUEST_START_TIME;
		
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
				$LastTime = time() - 7200;

				$online = 0;
				foreach($this->usersModel->getUsers() as $line) {
					if ($line['user_online_date'] > $LastTime) {
					  $online++;
					}
				}

				$this->usersModel->updateUser($userid, array('user_online_date'=> time()));
				$this->data['status'] = "online";
				$this->data['online'] = "USERID ".$userid." ".$this->user->getFirstname()." UPD-DATE ".date("Y-m-d H:i:s")." | ".$LastTime." LVL ".$this->user->getAccessLevel()." ST.OK";
				$this->data['online_usr'] = $online;
				break;
			}	
			case 'online_sup': {				
				$LastTime = time() - 7200;

				$online_sup = 0;
				foreach($this->usersModel->getUsers() as $line) {
					if($line['user_access_level'] > 1) {
						if ($line['user_online_date'] > $LastTime) {
						  $online_sup++;
						}
					}
				}

				if($online_sup > 0) {
					$this->data['sup_status'] = "Online";
				} else {
					$this->data['sup_status'] = "Offline";
				}
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
