<?php

class indexController extends Controller {
	private $limit = 5;
	public function index($page = 1) {
		$this->document->setActiveSection('forum');
		$this->document->setActiveItem('index');
		$this->data['vk_id'] = $this->config->vk_id;
		$this->data['url'] = $this->config->url;
		if(!$this->user->isLogged()) {
			$this->response->redirect($this->config->url . 'account/login');
		}
		if($this->user->getAccessLevel() < 0) {
			$this->session->data['error'] = "У вас нет доступа к данному разделу!";
			$this->response->redirect($this->config->url);
		}
		
		$this->load->library('pagination');
		$this->load->model('forum');
		$userid = $this->user->getId();
		
		$sort = array(
			//'ticket_status'		=> 'DESC',
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
		$this->data['pagination'] = $pagination;

		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('forum/index', $this->data);
	}
}
?>
