<?php

class restoreController extends Controller {
	public function index() {
		$this->document->setActiveSection('account');
		$this->document->setActiveItem('restore');

		if($this->user->isLogged()) {
			$this->session->data['error'] = "Вы уже авторизированы!";
			$this->response->redirect($this->config->url);
		}

		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('account/restore/index', $this->data);
	}

	public function complete($userid = null, $restoreKey = null) {
		$this->document->setActiveSection('account');
		$this->document->setActiveItem('restore');
		
		if($this->user->isLogged()) {
			$this->session->data['error'] = "Вы уже авторизированы!";
			$this->response->redirect($this->config->url);
		}
		
		$this->load->model('users');
		$this->load->library('mail');
		
		$error = $this->validate($userid, $restoreKey);
		if($error) {
			$this->session->data['error'] = $error;
			$this->response->redirect($this->config->url);
		}
		
		$user = $this->usersModel->getUserById($userid);
	
		$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
		$max=12; 
		$size=StrLen($chars)-1; 
		$password=null; 
		while($max--) 
		$password.=$chars[rand(0,$size)]; 
	
		$mailLib = new mailLibrary();
				
		$mailLib->setFrom($this->config->mail_from1);
		$mailLib->setSender($this->config->mail_sender);
		$mailLib->setTo($user['user_email']);
		$mailLib->setSubject('Новый пароль');
				
		$mailData = array();
				
		$mailData['firstname'] = $user['user_firstname'];
		$mailData['lastname'] = $user['user_lastname']; 
		$mailData['email'] = $user['user_email'];
		$mailData['password'] = $password;
				
		$text = $this->load->view('mail/account/newpassword', $mailData);
				
		$mailLib->setText($text);
		
		$mailLib->send();
		
		$this->usersModel->updateUser($userid, array('user_password' => md5($password), 'user_restore_key' => null));
		$this->data['password'] = $password;
		
		$this->getChild(array('common/loginheader', 'common/loginfooter'));
		return $this->load->view('account/restore/complete', $this->data);
	}
	
	public function ajax() {
		if($this->user->isLogged()) {  
	  		$this->data['status'] = "error";
			$this->data['error'] = "Вы уже авторизированы!";
			return json_encode($this->data);
		}
		
		$this->load->library('mail');
		
		$this->load->model('users');
		
		$ip=$this->user->getRealIpAdress();
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOST();
			if(!$errorPOST) {
				$email = @$this->request->post['email'];
			
				$user = $this->usersModel->getUserByEmail($email);
				
				$restoreKey = md5(microtime());
				$this->usersModel->updateUser($user['user_id'], array('user_restore_key' => $restoreKey));

				$mailLib = new mailLibrary();
						
				$mailLib->setFrom($this->config->mail_from1);
				$mailLib->setSender($this->config->mail_sender);
				$mailLib->setTo($user['user_email']);
				$mailLib->setSubject('Восстановление пароля');
						
				$mailData = array();
						
				$mailData['firstname'] = $user['user_firstname'];
				$mailData['lastname'] = $user['user_lastname']; 
				$mailData['email'] = $user['user_email'];
				$mailData['ip'] = $ip;
				$mailData['restorelink'] = "".$this->config->url."account/restore/complete/".$user['user_id']."/".$restoreKey."";
						
				$text = $this->load->view('mail/account/restore', $mailData);
						
				$mailLib->setText($text);
				
				$mailLib->send();
		
				$this->data['status'] = "success";
				$this->data['success'] = "На ваш E-Mail отправлена информация для восстановления пароля!";
			} else {
				$this->data['status'] = "error";
				$this->data['error'] = $errorPOST;
			}
		}

		return json_encode($this->data);
	}
	
	private function validate($userid, $restoreKey) {
		$this->load->library('validate');
		
		$validateLib = new validateLibrary();
		
		$result = null;
		
		if(!$validateLib->md5($restoreKey) || !$this->usersModel->getTotalUsers(array('user_id' => (int)$userid, 'user_restore_key' => $restoreKey))) {
			$result = "Указанный ключ восстановления неверный!";
		}
		return $result;
	}
	
	private function validatePOST() {
		$this->load->library('validate');
		
		$validateLib = new validateLibrary();
		
		$result = null;
		
		$captcha = @$this->request->post['captcha'];
		$email = @$this->request->post['email'];
		
		if(!$validateLib->email($email)) {
			$result = "Укажите свой реальный E-Mail!";
		}
		elseif($this->usersModel->getTotalUsers(array('user_email' => $email)) < 1) {
			$result = "Пользователь с указанным E-Mail не зарегистрирован!";
		}
		return $result;
	}
}
?>

