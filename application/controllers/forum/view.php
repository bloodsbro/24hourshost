<?php
class viewController extends Controller {
	public function index($newid = null) {
		$this->data['vk_id'] = $this->config->vk_id;
		$this->data['url'] = $this->config->url;
		$this->data['recaptcha'] = $this->config->recaptcha;

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
		
		$this->load->model('forum');
		$this->load->model('forumMessages');
 
  		$error = $this->validate($newid);
		if($error) {
			$this->session->data['error'] = $error;
			$this->response->redirect($this->config->url . 'forum/index');
		}
		
		$userid = $this->user->getId();
		
		$new = $this->forumModel->getforumById($newid, array('users'));
		$messages = $this->forumMessagesModel->getforumMessages(array('forum_id' => $newid), array('users'));
		$this->data['new'] = $new;
        $this->data['messages'] = $messages;
        $this->data['user_img'] = $this->user->getUser_img();
 
		$nq = $new['look']+1;
		$this->forumModel->updateforum($newid, array('look' => $nq));

		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('forum/view', $this->data);
	}
 
	public function ajax($newid = null) {
		$this->load->model('forum');
		$this->load->model('forumMessages');
		
		$error = $this->validate($newid);
		if($error) {
	  		$this->data['status'] = "error";
			$this->data['error'] = $error;
			return json_encode($this->data);
		}
		
		if($this->request->server['REQUEST_METHOD'] == 'POST') {
			$errorPOST = $this->validatePOST($newid);
			if(!$errorPOST) {
				$text = @$this->request->post['text'];
				
				$userid = $this->user->getId();
			
					$messageData = array(
						'forum_id'			=> $newid,
						'user_id'			=> $userid,
						'forum_message'	=> $text
					);
					$this->forumMessagesModel->createforumMessage($messageData);
					
					$this->data['status'] = "success";
					$this->data['success'] = "Вы успешно создали коментарий!";
			} else {
				$this->data['status'] = "error";
				$this->data['error'] = $errorPOST;
			}
		}

		return json_encode($this->data);
	}
	private function validate($newid) {
		$result = null;
 		if(!$this->forumModel->getTotalforum(array('forum_id' => (int)$newid))) {
			$result = "Запрашиваемая новость не существует!";
		}
		return $result;
	}
	
	private function validatePOST($newid) {
		$result = null;
		
		$recaptcha = @$this->request->post['g-recaptcha-response'];
		
		$text = @$this->request->post['text'];
			if(mb_strlen($text) < 6 || mb_strlen($text) > 128) {
				$result = "Текст коментариф должен содержать от 6 до 128 символов.";
		}
		if(!$recaptcha) return 'Подтвердите, что вы не робот!';
		$url = 'https://www.google.com/recaptcha/api/siteverify';			
		$data = array('secret' => $this->config->secret_recaptcha, 'response' => $recaptcha);
		$options = array(
			'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'remoteip'  => 'remoteip',
			'content' => http_build_query($data),
			)
		);

		$context  = stream_context_create($options);
		$recaptcha_get = json_decode(file_get_contents($url, false, $context))->{'success'}; 	
		if($recaptcha_get != '1') return 'Проверьте правильность капчи!';	
		return $result;
	}
 
}
?>
