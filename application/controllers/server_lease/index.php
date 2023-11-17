<?php

class indexController extends Controller {
	public function index() {
		$this->document->setActiveSection('server_lease');
		$this->document->setActiveItem('index');
		if(!$this->user->isLogged()) {
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 1) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		$this->load->model('users');
		$this->data['description'] = $this->config->description;
		$this->data['osmp_url'] = $this->config->osmp_url;
		$this->data['title'] = $this->config->title;

		$userid = $this->user->getId();
		$users = $this->usersModel->getUserById($userid, array(), array());
		$this->data['users'] = $users;
		
		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('server_lease/index', $this->data);
	}
	public function ajax_action_exchange($action = null) {
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
		$this->load->model('waste');
		$this->load->model('tickets');

		$userid = $this->user->getId();
		$users = $this->usersModel->getUserById($userid, array(), array());

		switch($action) {
			case '100DEB': {	
				$balance = $users['user_balance'];
				$upsum = "500"; // Стоимость услуги вместо "500" введите свою стоимость
					if ($balance >= $upsum){
						$this->usersModel->downUserBalance($userid, $upsum);
							$wasteData = array(
							'user_id'			=> $userid,
							'waste_ammount'	=> 100,
							'waste_status'	=> 1,
							'waste_usluga'	=> "Покупка Разработка сайта под сервер" // Название услуги
						);
						$this->wasteModel->createWaste($wasteData);
						$name = @$this->request->post['name'];
						$category = @$this->request->post['category'];
						$userid = $this->user->getId();
						$ticketData = array(
							'user_id'			=> $userid,
							'ticket_name'		=> "Заказ Разработка сайта под сервер", // Название заказа
							'ticket_status'		=> 1,
							'category_id'		=> 3
						);
						$ticketid = $this->ticketsModel->createTicket($ticketData);						
						$this->data['status'] = "success";
						$this->data['success'] = "Вы успешно заказали услугу! С вашего счета списано ".$upsum." руб!";
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "На Вашем счету недостаточно средств!";
					}
				break;
			}
			case '300DEB': {	
				$balance = $users['user_balance'];
				$upsum = "300"; // Стоимость услуги вместо "300" введите свою стоимость
					if ($balance >= $upsum){
						$this->usersModel->downUserBalance($userid, $upsum);
							$wasteData = array(
							'user_id'			=> $userid,
							'waste_ammount'	=> 100,
							'waste_status'	=> 1,
							'waste_usluga'	=> "Покупка Разработка форума" // Название услуги
						);
						$this->wasteModel->createWaste($wasteData);
						$name = @$this->request->post['name'];
						$category = @$this->request->post['category'];
						$userid = $this->user->getId();
						$ticketData = array(
							'user_id'			=> $userid,
							'ticket_name'		=> "Заказ Разработка форума", // Название заказа
							'ticket_status'		=> 1,
							'category_id'		=> 3
						);
						$ticketid = $this->ticketsModel->createTicket($ticketData);						
						$this->data['status'] = "success";
						$this->data['success'] = "Вы успешно заказали услугу! С вашего счета списано ".$upsum." руб!";
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "На Вашем счету недостаточно средств!";
					}
				break;
			}
			case '600DEB': {	
				$balance = $users['user_balance'];
				$upsum = "200"; // Стоимость услуги вместо "200" введите свою стоимость
					if ($balance >= $upsum){
						$this->usersModel->downUserBalance($userid, $upsum);
							$wasteData = array(
							'user_id'			=> $userid,
							'waste_ammount'	=> 100,
							'waste_status'	=> 1,
							'waste_usluga'	=> "Покупка Установка мода" // Название услуги
						);
						$this->wasteModel->createWaste($wasteData);
						$name = @$this->request->post['name'];
						$category = @$this->request->post['category'];
						$userid = $this->user->getId();
						$ticketData = array(
							'user_id'			=> $userid,
							'ticket_name'		=> "Заказ Установка мода", // Название заказа
							'ticket_status'		=> 1,
							'category_id'		=> 3
						);
						$ticketid = $this->ticketsModel->createTicket($ticketData);						
						$this->data['status'] = "success";
						$this->data['success'] = "Вы успешно заказали услугу! С вашего счета списано ".$upsum." руб!";
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "На Вашем счету недостаточно средств!";
					}
				break;
			}
			case '1000DEB': {	
				$balance = $users['user_balance'];
				$upsum = "100"; // Стоимость услуги вместо "100" введите свою стоимость
					if ($balance >= $upsum){
						$this->usersModel->downUserBalance($userid, $upsum);
							$wasteData = array(
							'user_id'			=> $userid,
							'waste_ammount'	=> 100,
							'waste_status'	=> 1,
							'waste_usluga'	=> "Покупка Выделенный IP" // Название услуги
						);
						$this->wasteModel->createWaste($wasteData);
						$name = @$this->request->post['name'];
						$category = @$this->request->post['category'];
						$userid = $this->user->getId();
						$ticketData = array(
							'user_id'			=> $userid,
							'ticket_name'		=> "Заказ Выделенный IP", // Название заказа
							'ticket_status'		=> 1,
							'category_id'		=> 3
						);
						$ticketid = $this->ticketsModel->createTicket($ticketData);						
						$this->data['status'] = "success";
						$this->data['success'] = "Вы успешно заказали услугу! С вашего счета списано ".$upsum." руб!";
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "На Вашем счету недостаточно средств!";
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