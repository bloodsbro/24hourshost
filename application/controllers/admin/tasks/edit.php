<?php
class editController extends Controller {
    public function index($taskId) {
        $this->document->setActiveSection('admin/tasks');
        $this->document->setActiveItem('edit');

        $this->load->model('tasks');

        $task = $this->tasksModel->getAllTasks(array('task_id' => $taskId));
        $this->data['task'] = @$task[0];

        $this->getChild(array('common/admheader', 'common/footer'));
        return $this->load->view('admin/tasks/edit', $this->data);
    }

    public function ajax($taskId) {
        if(!$this->user->isLogged()) {
            $this->data['status'] = "error";
            $this->data['error'] = "Вы не авторизированы!";
            return json_encode($this->data);
        }
        if($this->user->getAccessLevel() < 3) {
            $this->data['status'] = "error";
            $this->data['error'] = "У вас нет доступа к данному разделу!";
            return json_encode($this->data);
        }

        $this->load->model('tasks');

        $error = $this->validate($taskId);
        if($error) {
            $this->data['status'] = "error";
            $this->data['error'] = $error;
            return json_encode($this->data);
        }

        if($this->request->server['REQUEST_METHOD'] == 'POST') {
            $errorPOST = $this->validatePOST();
            if(!$errorPOST) {
                $taskType = @$this->request->post['taskType'];
                $taskExtra = @$this->request->post['taskExtra'];
                $taskDateAdd = @$this->request->post['taskDateAdd'];
                $taskDateEnd = @$this->request->post['taskDateEnd'];
                $taskRewardType = @$this->request->post['taskRewardType'];
                $taskRewardCount = @$this->request->post['taskRewardCount'];

                $taskData = array(
                    'task_type'			    => $taskType,
                    'task_extra'			=> $taskExtra,
                    'task_date_add'			=> $taskDateAdd,
                    'task_date_end'			=> $taskDateEnd,
                    'task_reward_type'		=> $taskRewardType,
                    'task_reward_count'		=> (int)$taskRewardCount,
                );

                $this->tasksModel->updateTask($taskId, $taskData);

                $this->data['status'] = "success";
                $this->data['success'] = "Вы успешно отредактировали задание!";
            } else {
                $this->data['status'] = "error";
                $this->data['error'] = $errorPOST;
            }
        }

        return json_encode($this->data);
    }

    public function delete($taskId) {
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

        $this->load->model('tasks');

        $error = $this->validate($taskId);
        if($error) {
            $this->session->data['error'] = $error;
            $this->response->redirect($this->config->url . 'admin/tasks/index');
        } else {
            $this->tasksModel->deleteTask($taskId);

            $this->session->data['success'] = "Вы успешно удалили задание!";
            $this->response->redirect($this->config->url . 'admin/tasks/index');
        }

        return null;
    }

    private function validate($taskId) {
        $result = null;

        if(!$this->tasksModel->getAllTasks(array('task_id' => (int)$taskId))) {
            $result = "Запрашиваемое задание не существует!";
        }
        return $result;
    }

    private function validatePOST() {
        $this->load->library('validate');

        $validateLib = new validateLibrary();

        $result = null;

        $taskType = @$this->request->post['taskType'];
        $taskExtra = @$this->request->post['taskExtra'];
        $taskDateAdd = @$this->request->post['taskDateAdd'];
        $taskDateEnd = @$this->request->post['taskDateEnd'];
        $taskRewardType = @$this->request->post['taskRewardType'];
        $taskRewardCount = @$this->request->post['taskRewardCount'];

        // TODO
        return $result;
    }
}