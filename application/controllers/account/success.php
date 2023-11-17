<?php

class successController extends Controller {
	public function index() {
		$this->document->setActiveSection('account');
		$this->document->setActiveItem('pay');
		
		if(!$this->user->isLogged()) {
			$this->session->data['error'] = "Вы не авторизированы!";
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 0) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		
		if($this->config->interkassa == 1) { 
			$this->load->model('users');
			$this->load->model('invoices');
			$this->load->model('waste');
			
			$secret_key = $this->config->ik_secretkey; 
			$ik_shop_id = $this->config->ik_shopid; 

			$err[1] = 'Ошибка - Неверная сумма платежа!';
			$err[2] = 'Ошибка - Shop ID!';
			$err[3] = 'Ошибка - Не верный ID платежа!';
			$err[3] = 'Ошибка - Данный счет уже оплачен!';
			
			//Получение информации о платеже от системы Interkassa
			$post_shop_id			= trim(stripslashes($_POST['ik_co_id']));          //Номер сайта продавца (eshopId);
			$ik_payment_amount		= trim(stripslashes($_POST['ik_payment_amount']));   //Сумма платежа (recipientAmount);
			$ik_payment_id			= trim(stripslashes($_POST['ik_payment_id']));       //Идентификатор платежа
			$ik_pm_no			    = trim(stripslashes($_POST['ik_pm_no']));       //id
			$ik_am			        = trim(stripslashes($_POST['ik_am']));       //im
			$ik_paysystem_alias		= trim(stripslashes($_POST['ik_paysystem_alias']));  //Способ оплаты
			$ik_baggage_fields		= trim(stripslashes($_POST['ik_baggage_fields']));   //пользовательское поле
			$ik_payment_state		= trim(stripslashes($_POST['ik_payment_state']));    //Статус платежа (paymentStatus);
			$ik_trans_id			= trim(stripslashes($_POST['ik_trans_id']));         //внутренний номер платежа
			$ik_currency_exch		= trim(stripslashes($_POST['ik_currency_exch']));    //Валюта платежа (recipientCurrency);
			$ik_fees_payer			= trim(stripslashes($_POST['ik_fees_payer']));       //плательщик комиссии

			$sing_hash_str =	$ik_shop_id.':'.
			$ik_payment_amount.':'.
			$ik_payment_id.':'.
			$ik_paysystem_alias.':'.
			$ik_baggage_fields.':'.
			$ik_payment_state.':'.
			$ik_trans_id.':'.
			$ik_currency_exch.':'.
			$ik_fees_payer.':'.$secret_key;				


			$userid = $this->user->getId();
			$invoice = $this->invoicesModel->getInvoiceById($ik_pm_no);
			
			if($invoice['invoice_ammount'] == $ik_am) {
				if($post_shop_id  == $ik_shop_id) {
					if($invoice['invoice_id'] == $ik_pm_no){
						if($invoice['invoice_status'] == 0) {	
							$this->usersModel->upUserBalance($userid, $ik_am);
							$this->invoicesModel->updateInvoice($ik_pm_no, array('invoice_status' => 1));
							
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
						} else {
							$this->response->redirect($this->config->url . 'account/error');
							$this->data['status'] = "error";
							$this->data['error'] = $err[4];	
						}	
					} else {
						$this->response->redirect($this->config->url . 'account/error');
						$this->data['status'] = "error";
						$this->data['error'] = $err[3];	
					}	
				} else {
					$this->response->redirect($this->config->url . 'account/error');
					$this->data['status'] = "error";
					$this->data['error'] = $err[2];	
				}
			} else {
				$this->response->redirect($this->config->url . 'account/error');
				$this->data['status'] = "error";
				$this->data['error'] = $err[1];	
			}
		}
 		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('account/success', $this->data);
	}
}
?>