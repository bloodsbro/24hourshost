<?php

class unitpayController extends Controller {
	public function index() {
		$this->load->model('users');
		$this->load->model('invoices');
		$this->load->model('waste');

		error_reporting(0);
		function md5sign($params, $secretKey) {
			ksort($params);
			unset($params['sign']);
		 
			return md5(join(null, $params).$secretKey);
		}

		function responseError($message) {
			$error = array(
				"jsonrpc" => "2.0",
				"error" => array(
					"code" => -32000,
					"message" => $message
				),
				'id' => 1
			);
			echo json_encode($error); exit();
		}

		function responseSuccess($message) {
			$success = array(
				"jsonrpc" => "2.0",
				"result" => array(
					"message" => $message
				),
				'id' => 1
			);
			echo json_encode($success); exit();
		}
		 
		$secretKey = $this->config->unitpay_secret;
		$method = $_GET['method'];
		$params = $_GET['params'];
			
		if ($params['sign'] != md5($params, $secretKey)) {
			responseError("Не соответсвие MD5 хешей");
		}	
		
		switch($method) {
			case 'check':
					if (!$this->link = @mysqli_connect($this->config->db_hostname, $this->config->db_username, $this->config->db_password, $this->config->database)) {
						die('Ошибка: Не удалось соединиться с сервером базы данных!');
					}
				break;
			case 'pay':
					if (!$this->link = @mysqli_connect($this->config->db_hostname, $this->config->db_username, $this->config->db_password, $this->config->database)) {
						die('Ошибка: Не удалось соединиться с сервером базы данных!');
					}
					
					$invid = $_GET['params']['account'];
						
					if(!$this->invoicesModel->getTotalInvoices(array('invoice_id' => (int)$invid))) {
						responseError("Invalid invoice!");
					}
					
					$ammount = $_GET['params']['sum'];
							
					$invoice = $this->invoicesModel->getInvoiceById($invid);
					$userid = $invoice['user_id'];
					$user = $this->usersModel->getUserById($userid);
				
					if($invoice['invoice_ammount'] == $ammount){
						if($ammount > 50){
							$this->usersModel->updateUser($userid, $userData = array('user_promised_pay' => 0));
						}

						$wasteData = array(
							'user_id'		=> $userid,
							'waste_ammount'	=> $ammount,
							'waste_status'	=> 0,
							'waste_usluga'	=> "Пополнение баланса пользователя",
						); 						
						$this->wasteModel->createWaste($wasteData);
			
						$this->usersModel->upUserBalance($userid, $ammount);	
						
						$bonus_percent = $this->config->bonus_percent;
						$getbonus = ($ammount * (1 + $bonus_percent / 100)) - $ammount;
						$this->usersModel->upUserBonuses($userid, $getbonus);
						
						$this->invoicesModel->updateInvoice($invid, array('invoice_status' => 1));
					}
				break;
			case 'error':
					responseError("Ошибка,{$params['errorMessage']}"); exit;
				break;
			default:
				responseError("Только: check, pay"); exit;
		}
		responseSuccess("Успех");
	}
}
?>
