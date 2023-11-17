<?php

class qiwiController extends Controller {
	public function index() {
		$this->load->model('users');
		$this->load->model('invoices');
		$this->load->model('waste');
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOST();
			if(!$errorPOST) {
				$jsonPaymentData = json_decode(file_get_contents('php://input'), true);
				$ammount = $jsonPaymentData['bill']['amount']['value'];
				$invid = $jsonPaymentData['bill']['billId'];
				$signature = $jsonPaymentData['bill']['siteId'];

				$invoice = $this->invoicesModel->getInvoiceById($invid);
				$userid = $invoice['user_id'];
				$user = $this->usersModel->getUserById($userid);
				
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
				return "OK$invid\n";
			} else {
				return "Error: $errorPOST";
			}
		} else {
			return "Error: Invalid request!";
		}
	}
	
	private function checkNotificationSignature($signature, array $notificationBody, $merchantSecret) {
        $notificationBody = array_replace_recursive(
            [
                'bill' => [
                    'billId' => null,
                    'amount' => [
                        'value'    => null,
                        'currency' => null,
                    ],
                    'siteId' => null,
                    'status' => ['value' => null],
                ],
            ],
            $notificationBody
        );

        $processedNotificationData = [
            'billId'          => (string) $notificationBody['bill']['billId'],
            'amount.value'    => number_format(round(floatval($notificationBody['bill']['amount']['value']), 2, PHP_ROUND_HALF_DOWN), 2, '.', ''),
            'amount.currency' => (string) $notificationBody['bill']['amount']['currency'],
            'siteId'          => (string) $notificationBody['bill']['siteId'],
            'status'          => (string) $notificationBody['bill']['status']['value'],
        ];
        ksort($processedNotificationData);
        $processedNotificationDataKeys = join('|', $processedNotificationData);
        $hash = hash_hmac('SHA256', $processedNotificationDataKeys, $merchantSecret);

        return $hash === $signature;
    }
	
	private function validatePOST() {
		$result = null;
		
		$jsonPaymentData = json_decode(file_get_contents('php://input'), true);
		$invid = $jsonPaymentData['bill']['billId'];
		$signature = array_key_exists('HTTP_X_API_SIGNATURE_SHA256', $_SERVER) ? stripslashes($this->request->server['HTTP_X_API_SIGNATURE_SHA256']) : '';

		if(!$this->invoicesModel->getTotalInvoices(array('invoice_id' => (int)$invid))) {
			$result = "Invalid invoice!";
		}elseif(!$this->checkNotificationSignature($signature, $jsonPaymentData, $this->config->qiwisecretkey)) {
			$result = "Invalid signature!";
		}
		
		return $result;
	}
}
?>
