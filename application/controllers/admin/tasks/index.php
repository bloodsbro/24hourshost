<?php
class indexController extends Controller {
    private $limit = 25;

    public function index($page = 1) {
        $this->document->setActiveSection('admin/tasks');
        $this->document->setActiveItem('index');

        if(!$this->user->isLogged()) {
            $this->session->data['error'] = "Вы не авторизированы!";
            $this->response->redirect($this->config->url . 'account/login');
        }
        if($this->user->getAccessLevel() < 3) {
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

        $this->data['tasks'] = $this->tasksModel->getAllTasks(array(), array(), array(), $options);
        $this->data['tasksForCheck'] = $this->tasksModel->getTasks(array('tasks_complete_gived_reward' => 0), array('tasks_complete', 'users'));

        $paginationLib = new paginationLibrary();
        $paginationLib->total = count($this->data['tasks']);
        $paginationLib->page = $page;
        $paginationLib->limit = $this->limit;
        $paginationLib->url = $this->config->url . 'servers/index/index/{page}';

        $this->data['vk_id'] = $this->config->vk_id;
        $this->data['pagination'] = $paginationLib->render();
        $this->data['userId'] = $this->user->getId();

        $this->getChild(array('common/admheader', 'common/footer'));
        return $this->load->view('admin/tasks/index', $this->data);
    }

    public function confirm($tasksCompleteId) {
        if(!$this->user->isLogged()) {
            $this->session->data['error'] = "Вы не авторизированы!";
            $this->response->redirect($this->config->url . 'account/login');
        }
        if($this->user->getAccessLevel() < 3) {
            $this->session->data['error'] = "У вас нет доступа к данному разделу!";
            $this->response->redirect($this->config->url);
        }

        $this->load->model('tasks');

        $error = $this->validate($tasksCompleteId);
        if($error) {
            $this->data['status'] = "error";
            $this->data['error'] = "Задание не найдено!";
        } else {
            $this->tasksModel->confirmCompletedTask($tasksCompleteId);

            $this->session->data['success'] = "Вы успешно подтвердили задание!";
            $this->response->redirect($this->config->url . 'admin/tasks/index');
        }

        return json_encode($this->data);
    }

    public function revoke($tasksCompleteId) {
        if(!$this->user->isLogged()) {
            $this->session->data['error'] = "Вы не авторизированы!";
            $this->response->redirect($this->config->url . 'account/login');
        }
        if($this->user->getAccessLevel() < 3) {
            $this->session->data['error'] = "У вас нет доступа к данному разделу!";
            $this->response->redirect($this->config->url);
        }

        $this->load->model('tasks');

        $error = $this->validate($tasksCompleteId);
        if($error) {
            $this->data['status'] = "error";
            $this->data['error'] = "Задание не найдено!";
        } else {
            $this->tasksModel->revokeCompletedTask($tasksCompleteId);

            $this->data['status'] = "success";
            $this->data['success'] = "Вы успешно отменили задание!";
        }

        return json_encode($this->data);
    }

    private function validate($taskId) {
        $result = null;

        if(!$this->tasksModel->getTasks(array('tasks_complete_id' => (int)$taskId, 'tasks_complete_gived_reward' => 0), array('tasks_complete'))) {
            $result = "Запрашиваемое задание не существует или уже подтверждено!";
        }
        return $result;
    }
}