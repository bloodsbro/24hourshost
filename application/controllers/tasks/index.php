<?php
class indexController extends Controller {
    private $limit = 25;

    public function index($page = 1) {
        $this->document->setActiveSection('tasks');
        $this->document->setActiveItem('index');

        if(!$this->user->isLogged()) {
            $this->session->data['error'] = "Вы не авторизированы!";
            $this->response->redirect($this->config->url . 'account/login');
        }
        if($this->user->getAccessLevel() < 0) {
            $this->session->data['error'] = "У вас нет доступа к данному разделу!";
            $this->response->redirect($this->config->url);
        }

        $this->load->library('pagination');
        $this->load->model('tasks');

        $userid = $this->user->getId();

        $options = array(
            'start' => ($page - 1) * $this->limit,
            'limit' => $this->limit
        );

        $this->data['tasks'] = $this->tasksModel->getTasks(array(), array(), array(), $options);

        $paginationLib = new paginationLibrary();
        $paginationLib->total = count($this->data['tasks']);
        $paginationLib->page = $page;
        $paginationLib->limit = $this->limit;
        $paginationLib->url = $this->config->url . 'servers/index/index/{page}';

        $this->data['vk_id'] = $this->config->vk_id;
        $this->data['pagination'] = $paginationLib->render();
        $this->data['userId'] = $this->user->getId();

        $this->getChild(array('common/header', 'common/footer'));
        return $this->load->view('tasks/index', $this->data);
    }
}