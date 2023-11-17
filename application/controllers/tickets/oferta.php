<?php

class ofertaController extends Controller {
	private $limit = 5;
	public function index($page = 1) {
		$this->document->setActiveSection('tickets');
		$this->document->setActiveItem('oferta');
		$this->data['public'] = $this->config->public;
		$this->data['user_firstname'] = $this->user->getFirstname();
		$this->data['user_lastname'] = $this->user->getLastname();
		$this->data['user_id'] = $this->user->getId();
		
		if(!$this->user->isLogged()) {
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 0) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}

		$this->load->library('pagination');
		$this->load->model('news');
		
		$sort = array(
			'news_date_add'	=> 'DESC'
		);
		
		$options = array(
			'start'		=>	($page - 1) * $this->limit,
			'limit'		=>	$this->limit
		);
		
		$total = $this->newsModel->getTotalNews();
		$news = $this->newsModel->getNews(array(), array(), $sort, $options);			
		
		$paginationLib = new paginationLibrary();
		
		$paginationLib->total = $total;
		$paginationLib->page = $page;
		$paginationLib->limit = $this->limit;
		$paginationLib->url = $this->config->url . 'news/oferta/oferta/{page}';
		
		$pagination = $paginationLib->render();
		$this->data['news'] = $news;
		$this->data['pagination'] = $pagination;
		
		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('tickets/oferta', $this->data);
	}
}
?>