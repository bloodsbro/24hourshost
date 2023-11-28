<?php
class createController extends Controller {
    public function index() {
        $this->document->setActiveSection('admin/tasks');
        $this->document->setActiveItem('create');

        $this->getChild(array('common/admheader', 'common/footer'));
        return $this->load->view('admin/tasks/create', $this->data);
    }

    public function ajax() {
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

                $this->tasksModel->createTask($taskData);

                $this->data['status'] = "success";
                $this->data['success'] = "Вы успешно создали задание!";
            } else {
                $this->data['status'] = "error";
                $this->data['error'] = $errorPOST;
            }
        }

        return json_encode($this->data);
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