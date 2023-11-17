<?php

class indexController extends Controller {
	private $limit = 20;
	public function index($page = 1) {
		$this->document->setActiveSection('admin/ticketcategory');
		$this->document->setActiveItem('index');
		$this->data['url'] = $this->config->url;
		
		if(!$this->user->isLogged()) {
			$this->session->data['error'] = "Вы не авторизированы!";
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 3) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		$this->load->library('pagination');
		$this->load->model('ticketsCategory');
		
		$options = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);
		
		$total = $this->ticketsCategoryModel->getTotalTicketsCategory();
		$category = $this->ticketsCategoryModel->getTicketsCategory(array(),array(),array(), $options);
		
		$paginationUrl = '/admin/ticketcategory/index/index/{page}';
		$paginationLib = new paginationLibrary();
		$paginationLib->total = $total;
		$paginationLib->page = $page;
		$paginationLib->limit = $this->limit;
		$paginationLib->url = $paginationUrl;
		$pagination = $paginationLib->render();
		
		$this->data['category'] = $category;
		$this->data['pagination'] = $pagination;
		
		$this->getChild(array('common/admheader', 'common/footer'));
		return $this->load->view('admin/ticketcategory/index', $this->data);
	}
}
?>