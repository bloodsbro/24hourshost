<?php

class createController extends Controller {
	public function index() {
		$this->document->setActiveSection('admin/mods');
		$this->document->setActiveItem('create');
		
		if(!$this->user->isLogged()) {
			$this->session->data['error'] = "Вы не авторизированы!";
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 3) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		$this->load->model('games');
		$options = array(
			'start' => 0,
			'limit' => $this->limit
		);
		$games = $this->gamesModel->getGames(array(), array(), $options);
		$this->data['games'] = $games;
		$this->getChild(array('common/admheader', 'common/footer'));
		return $this->load->view('admin/mods/create', $this->data);
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
		
		$this->load->model('servers');
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOST();
			if(!$errorPOST) {
				$name = @$this->request->post['name'];
				$gameid = @$this->request->post['gameid'];
				$arch = @$this->request->post['arch'];
				$textx = @$this->request->post['textx'];
				$img = @$this->request->post['img'];
				$status = @$this->request->post['status'];
				$price = @$this->request->post['price'];
				
				$uploaddir = (TMP_DIR . 'mods/'); 
				$apend = $_FILES['userfile']['name']; 
				$uploadfile = "$uploaddir$apend";

				if($_FILES['userfile']['size'] > 1024*90*1024) {
					$this->data['error'] = 'Размер файла не должен превышать 90МБ';
					$this->data['status'] = "error";
				}
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
				$dir = "".$this->config->url."tmp/mods/".$apend."";

				$modsData = array(
					'game_id'			=> $gameid,
					'mod_name'			=> $name,
					'mod_url'			=> $dir,
					'mod_status'		=> (int)$status,
					'mod_textx'			=> $textx,
					'mod_img'	     	=> $img,
					'mod_arch'		    => $apend,
					'mod_price'	    	=> $price
				);
				$this->serversModel->createMod($modsData);				
				$this->data['status'] = "success";
				$this->data['success'] = "Вы успешно создали мод!";
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
		$gameid = @$this->request->post['gameid'];
		$arch = @$this->request->post['arch'];
		$status = @$this->request->post['status'];
		$textx = @$this->request->post['textx'];
		$price = @$this->request->post['price'];
		
		if(mb_strlen($name) < 2 || mb_strlen($name) > 32) {
			$result = "Название мода должно содержать от 2 до 32 символов!";
		}
		elseif(mb_strlen($textx) < 2 || mb_strlen($textx) > 500) {
			$result = "Описание должно содержать от 2 до 500 символов!";
		}
		elseif($status < 0 || $status > 1) {
			$result = "Укажите допустимый статус!";
		}
		elseif(0 > $price || $price > 5000) {
			$result = "Укажите сумму от 0 до 5000 рублей!";
		}
		return $result;
	}
}
?>
