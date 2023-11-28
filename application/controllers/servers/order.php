<?php
class orderController extends Controller {
	public function index() {
		$this->data['serv_test'] = $this->config->serv_test;
		$this->document->setActiveSection('servers');
		$this->document->setActiveItem('order');
		
		if(!$this->user->isLogged()) {
			$this->session->data['error'] = "Вы не авторизированы!";
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 0) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		$this->load->model('games');
		$this->load->model('locations');
		
		$games = $this->gamesModel->getGames(array('game_status' => 1));
		$locations = $this->locationsModel->getLocations(array('location_status' => 1));
		
		$this->data['games'] = $games;
		$this->data['locations'] = $locations;
		
		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('servers/order', $this->data);
	}
	
	public function promo() {
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
		
		$this->load->model('users');
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$code = $this->request->post['code'];
			$discount = $this->usersModel->getSkidkaByCode($code, false);
			$kofficent=(100-$discount['skidka'])/100;
			if($discount['skidka'] == NULL){
				$this->data['status'] = "error";
				$this->data['error'] = "Данного кода не существует";
			}else{
				$this->data['status'] = "success";
				$this->data['success'] = "Вы активировали скидку ".$discount['skidka']."%";
				$this->data['skidka'] = $kofficent;
			}
		}

		return json_encode($this->data);
	}
	
	public function ajax() {
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
		
        $this->load->model('waste');
		$this->load->model('users');
		$this->load->model('games');
		$this->load->model('locations');
		$this->load->model('servers');

		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOST();
			if(!$errorPOST) {
				$gameid = $this->request->post['gameid'];
				$locationid = $this->request->post['locationid'];
				$slots = $this->request->post['slots'];
				$days = $this->request->post['days'];
				$password = $this->request->post['password'];
				$rcon_password = $this->request->post['rcon_password'];
				
				$location = $this->locationsModel->getLocationById($locationid);
				$location_games = explode(" ", $location['location_games']);

				if(!in_array($gameid, $location_games)) {
					$this->data['status'] = "error";
					$this->data['error'] = "Данная игра не доступна для указанной локации!";
					return json_encode($this->data);
				}


				$userid = $this->user->getId();
				$balance = $this->user->getBalance();
				$test_server = $this->user->getTest_server();

				$game = $this->gamesModel->getGameById($gameid);
				$port = $this->serversModel->getServerNewPort($locationid, $game['game_min_port'], $game['game_max_port']);
				$user = $this->usersModel->getUserById($userid, array(), array(), array());
				$code = $this->request->post['promo'];
				$discount = $this->usersModel->getSkidkaByCode($code,true);$kofficent=(100-$discount['skidka'])/100;
				if($port) {
					$price = $slots * $game['game_price'];
					$test_periud = (strcmp($days, "0") == 0);

					switch($days) {
						case "0":
							$price = 0;
						break;
						case "15":
							$price = $price / 2;
							break;
						case "30":
							break;
						case "60":
							$price = $price * 2;
							break;
						case "90":
							$price = 3 * $price * 0.95;
							break;
						case "180":
							$price = 6 * $price * 0.90;
							break;
						case "360":
							$price = 12 * $price * 0.85;
							break;
					}
				
					if($discount['skidka'] != NULL){
						$price = $price * $kofficent;
					}
					
					if($test_periud == false || ($this->config->serv_test == 1 && $test_server == 1)) {
						if($balance >= $price) {
							$serverData = array(
								'user_id'			=> $userid,
								'game_id'			=> $gameid,
								'location_id'		=> $locationid,
								'server_mysql'		=> 0,
								'server_slots'		=> $slots,
								'server_port'		=> $port,
								'server_password'	=> $password,
								'rcon_password'		=> $rcon_password,
								'server_status'		=> 3,
								'test_periud'		=> $test_periud,
								'server_days'		=> $days
							);
						
							$serverid = $this->serversModel->createServer($serverData);
							$this->usersModel->downUserBalance($userid, $price);
							$wasteData = array(
							  'user_id'			=> $userid,
							  'waste_ammount'	=> $price,
							  'waste_status'	=> 1,
							  'waste_usluga'	=> "Заказ " . ($test_periud ? 'тестового ' : '') . "сервера #$serverid"
							); 
							$this->wasteModel->createWaste($wasteData);
							
							if($user['ref'] != 0 && $price > 0) {
								$ref_percent = $this->config->ref_percent;
								$getpref = ($price * (1 + $ref_percent / 100)) - $price;
								$this->usersModel->upUserBalance($user['ref'], $getpref);
								$this->usersModel->upUserRMoney($user['ref'], $getpref);
								
								$wasteData = array(
									'user_id'		=> $user['ref'],
									'waste_ammount'	=> $getpref,
									'waste_status'	=> 0,
									'waste_usluga'	=> "Бонус с реферала ID-$userid"
								); 
								$this->wasteModel->createWaste($wasteData);
							}
							
							$this->data['status'] = "success";
							$this->data['success'] = "Сервер успешно поставлен в очередь на установку.";
							$this->data['id'] = $serverid;
						} else {
							$this->data['status'] = "error";
							$this->data['error'] = "На Вашем счету недостаточно средств";
						}
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "Вы уже брали тестовый период, либо у вас нет одобрения администратора!";
					}
				} else {
					$this->data['status'] = "error";
					$this->data['error'] = "На выбранной Вами локации нет свободных портов для данной игры";
				}
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
		
		$gameid = @$this->request->post['gameid'];
		$locationid = @$this->request->post['locationid'];
		$slots = @$this->request->post['slots'];
		$days = @$this->request->post['days'];
		$password = @$this->request->post['password'];
		$password2 = @$this->request->post['password2'];
		$rcon_password = @$this->request->post['rcon_password'];
		
		if(!$this->gamesModel->getTotalGames(array('game_id' => (int)$gameid, 'game_status' => 1))) {
			$result = "Вы указали несуществующую игру!";
		}
		elseif(!$this->locationsModel->getTotalLocations(array('location_id' => (int)$locationid, 'location_status' => 1))) {
			$result = "Вы указали несуществующую локацию!";
		}
		elseif($days != "30" && $days != "60" && $days != "90" && $days != "180" && $days != "360" && $days != "15" && $days != "0") {
			$result = "Вы указали недопустимый период оплаты!";
		}
		elseif(!$this->gamesModel->validateSlots($gameid, $slots)) {
			$result = "Вы указали недопустимое количество слотов!";
		}
		elseif(!$validateLib->password($password)) {
			$result = "Пароль должен содержать от 6 до 32 латинских букв, цифр и знаков <i>,.!?_-</i>!";
		}
		elseif($password != $password2) {
			$result = "Введенные вами пароли не совпадают!";
		}
		return $result;
	}
}
?>
