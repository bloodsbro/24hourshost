<?php
class applicationsController extends Controller {
	private $limit = 5;
	public function index($page = 1) {
		$this->document->setActiveSection('sellection');
		$this->document->setActiveItem('applications');
		$this->data['public'] = $this->config->public;
		
		if(!$this->user->isLogged()) {
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 0) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		$this->load->library('pagination');
		$this->load->model('forum');
		
		$sort = array(
			'forum_date_add'	=> 'DESC'
		);
		
		$options = array(
			'start'		=>	($page - 1) * $this->limit,
			'limit'		=>	$this->limit
		);
		
		$total = $this->forumModel->getTotalforum();
		$forum = $this->forumModel->getforum(array(), array(), $sort, $options);			
		
		$paginationLib = new paginationLibrary();
		
		$paginationLib->total = $total;
		$paginationLib->page = $page;
		$paginationLib->limit = $this->limit;
		$paginationLib->url = $this->config->url . 'forum/index/index/{page}';
		
		$pagination = $paginationLib->render();
		$this->data['forum'] = $forum;

		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('sellection/applications', $this->data);
	}
	
	public function ajax_shop_finxgames($action = null) {
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
			//---------------------------------------------------------------//
			case 'FX1': {	
				$balance = $users['user_balance'];
				$upsum = "75"; // Стоимость услуги вместо "75" введите свою стоимость
					if ($balance >= $upsum){
						$this->usersModel->downUserBalance($userid, $upsum);
							$wasteData = array(
							'user_id'			=> $userid,
							'waste_ammount'	=> 75,
							'waste_status'	=> 1,
							'waste_usluga'	=> "Покупка услуги FX-1" // Название услуги
						);
						$this->wasteModel->createWaste($wasteData);
						$name = @$this->request->post['name'];
						$category = @$this->request->post['category'];
						$userid = $this->user->getId();
						$ticketData = array(
							'user_id'			=> $userid,
							'ticket_name'		=> "Заказ услуги FX-1", // Название заказа
							'ticket_status'		=> 1,
							'category_id'		=> 3
						);
						$ticketid = $this->ticketsModel->createTicket($ticketData);						
						$this->data['status'] = "success";
						$this->data['success'] = "Услуга FX-1 заказана! С вашего счета списано ".$upsum." руб!";
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "На Вашем счету недостаточно средств!";
					}
				break;
			}
			//---------------------------------------------------------------//
			case 'FX2': {	
				$balance = $users['user_balance'];
				$upsum = "200"; // Стоимость услуги вместо "200" введите свою стоимость
					if ($balance >= $upsum){
						$this->usersModel->downUserBalance($userid, $upsum);
							$wasteData = array(
							'user_id'			=> $userid,
							'waste_ammount'	=> 200,
							'waste_status'	=> 1,
							'waste_usluga'	=> "Покупка услуги FX-2" // Название услуги
						);
						$this->wasteModel->createWaste($wasteData);
						$name = @$this->request->post['name'];
						$category = @$this->request->post['category'];
						$userid = $this->user->getId();
						$ticketData = array(
							'user_id'			=> $userid,
							'ticket_name'		=> "Заказ услуги FX-2", // Название заказа
							'ticket_status'		=> 1,
							'category_id'		=> 3
						);
						$ticketid = $this->ticketsModel->createTicket($ticketData);						
						$this->data['status'] = "success";
						$this->data['success'] = "Услуга FX-2 заказана! С вашего счета списано ".$upsum." руб!";
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "На Вашем счету недостаточно средств!";
					}
				break;
			}
			//---------------------------------------------------------------//
			case 'FX3': {	
				$balance = $users['user_balance'];
				$upsum = "30"; // Стоимость услуги вместо "30" введите свою стоимость
					if ($balance >= $upsum){
						$this->usersModel->downUserBalance($userid, $upsum);
							$wasteData = array(
							'user_id'			=> $userid,
							'waste_ammount'	=> 30,
							'waste_status'	=> 1,
							'waste_usluga'	=> "Покупка услуги FX-3" // Название услуги
						);
						$this->wasteModel->createWaste($wasteData);
						$name = @$this->request->post['name'];
						$category = @$this->request->post['category'];
						$userid = $this->user->getId();
						$ticketData = array(
							'user_id'			=> $userid,
							'ticket_name'		=> "Заказ услуги FX-3", // Название заказа
							'ticket_status'		=> 1,
							'category_id'		=> 3
						);
						$ticketid = $this->ticketsModel->createTicket($ticketData);						
						$this->data['status'] = "success";
						$this->data['success'] = "Услуга FX-3 заказана! С вашего счета списано ".$upsum." руб!";
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "На Вашем счету недостаточно средств!";
					}
				break;
			}
			//---------------------------------------------------------------//
			case 'FX4': {	
				$balance = $users['user_balance'];
				$upsum = "100"; // Стоимость услуги вместо "100" введите свою стоимость
					if ($balance >= $upsum){
						$this->usersModel->downUserBalance($userid, $upsum);
							$wasteData = array(
							'user_id'			=> $userid,
							'waste_ammount'	=> 100,
							'waste_status'	=> 1,
							'waste_usluga'	=> "Покупка услуги FX-4" // Название услуги
						);
						$this->wasteModel->createWaste($wasteData);
						$name = @$this->request->post['name'];
						$category = @$this->request->post['category'];
						$userid = $this->user->getId();
						$ticketData = array(
							'user_id'			=> $userid,
							'ticket_name'		=> "Заказ услуги FX-4", // Название заказа
							'ticket_status'		=> 1,
							'category_id'		=> 3
						);
						$ticketid = $this->ticketsModel->createTicket($ticketData);						
						$this->data['status'] = "success";
						$this->data['success'] = "Услуга FX-4 заказана! С вашего счета списано ".$upsum." руб!";
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "На Вашем счету недостаточно средств!";
					}
				break;
			}
			//---------------------------------------------------------------//
			case 'FX5': {	
				$balance = $users['user_balance'];
				$upsum = "100"; // Стоимость услуги вместо "100" введите свою стоимость
					if ($balance >= $upsum){
						$this->usersModel->downUserBalance($userid, $upsum);
							$wasteData = array(
							'user_id'			=> $userid,
							'waste_ammount'	=> 100,
							'waste_status'	=> 1,
							'waste_usluga'	=> "Покупка услуги FX-5" // Название услуги
						);
						$this->wasteModel->createWaste($wasteData);
						$name = @$this->request->post['name'];
						$category = @$this->request->post['category'];
						$userid = $this->user->getId();
						$ticketData = array(
							'user_id'			=> $userid,
							'ticket_name'		=> "Заказ услуги FX-5", // Название заказа
							'ticket_status'		=> 1,
							'category_id'		=> 3
						);
						$ticketid = $this->ticketsModel->createTicket($ticketData);						
						$this->data['status'] = "success";
						$this->data['success'] = "Услуга FX-5 заказана! С вашего счета списано ".$upsum." руб!";
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "На Вашем счету недостаточно средств!";
					}
				break;
			}
			//---------------------------------------------------------------//
			case 'FX6': {	
				$balance = $users['user_balance'];
				$upsum = "150"; // Стоимость услуги вместо "150" введите свою стоимость
					if ($balance >= $upsum){
						$this->usersModel->downUserBalance($userid, $upsum);
							$wasteData = array(
							'user_id'			=> $userid,
							'waste_ammount'	=> 150,
							'waste_status'	=> 1,
							'waste_usluga'	=> "Покупка услуги FX-6" // Название услуги
						);
						$this->wasteModel->createWaste($wasteData);
						$name = @$this->request->post['name'];
						$category = @$this->request->post['category'];
						$userid = $this->user->getId();
						$ticketData = array(
							'user_id'			=> $userid,
							'ticket_name'		=> "Заказ услуги FX-6", // Название заказа
							'ticket_status'		=> 1,
							'category_id'		=> 3
						);
						$ticketid = $this->ticketsModel->createTicket($ticketData);						
						$this->data['status'] = "success";
						$this->data['success'] = "Услуга FX-6 заказана! С вашего счета списано ".$upsum." руб!";
					} else {
						$this->data['status'] = "error";
						$this->data['error'] = "На Вашем счету недостаточно средств!";
					}
				break;
			}
			//---------------------------------------------------------------//
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