<?php
class tasksModel extends Model
{
    public function createTask($data)
    {
        $sql = "INSERT INTO `tasks` SET ";
        $sql .= "task_type = '" . $this->db->escape($data['task_type']) . "', ";
        $sql .= "task_extra = '" . $this->db->escape($data['task_extra']) . "', ";
        $sql .= "task_date_add = '" . $this->db->escape($data['task_date_add']) . "', ";
        $sql .= "task_date_end = '" . $this->db->escape($data['task_date_end']) . "', ";
        $sql .= "task_reward_type = '" . $this->db->escape($data['task_reward_type']) . "', ";
        $sql .= "task_reward_count = '" . (int)$data['task_reward_count'] . "'";
        $this->db->query($sql);
        $return = $this->db->getLastId();
        return $return;
    }

    public function getTasks($data = array(), $joins = array(), $sort = array(), $options = array()) {
        $sql = "SELECT * FROM `tasks`";
        foreach($joins as $join) {
            $sql .= " LEFT JOIN $join";
            switch($join) {
                case "tasks_complete":
                    $sql .= " ON tasks.task_id=tasks_complete.tasks_complete_task_id";
                    break;
                case 'users': {
                    $sql .= " ON users.user_id=tasks_complete.tasks_complete_user_id";
                    break;
                }
            }
        }

        if(!empty($data)) {
            $count = count($data);
            $sql .= " WHERE";
            foreach($data as $key => $value) {
                $sql .= " $key = '" . $this->db->escape($value) . "'";

                $count--;
                if($count > 0) $sql .= " AND";
            }
        }

        if(count($data) > 0) {
            $sql .= " AND";
        } else {
            $sql .= " WHERE";
        }
        $sql .= " (task_date_end > NOW() OR task_date_end IS NULL)";

        if(!empty($sort)) {
            $count = count($sort);
            $sql .= " ORDER BY";
            foreach($sort as $key => $value) {
                $sql .= " $key " . $value;

                $count--;
                if($count > 0) $sql .= ",";
            }
        }

        if(!empty($options)) {
            if ($options['start'] < 0) {
                $options['start'] = 0;
            }
            if ($options['limit'] < 1) {
                $options['limit'] = 20;
            }
            $sql .= " LIMIT " . (int)$options['start'] . "," . (int)$options['limit'];
        }

        $query = $this->db->query($sql);
        return $query->rows;
    }

    public function getAllTasks($data = array(), $joins = array(), $sort = array(), $options = array()) {
        $sql = "SELECT * FROM `tasks`";
        foreach($joins as $join) {
            $sql .= " LEFT JOIN $join";
            switch($join) {
                case "tasks_complete":
                    $sql .= " ON tasks.task_id=tasks_complete.tasks_complete_task_id";
                    break;
                case 'users': {
                    $sql .= " ON users.user_id=tasks_complete.tasks_complete_user_id";
                    break;
                }
            }
        }

        if(!empty($data)) {
            $count = count($data);
            $sql .= " WHERE";
            foreach($data as $key => $value) {
                $sql .= " $key = '" . $this->db->escape($value) . "'";

                $count--;
                if($count > 0) $sql .= " AND";
            }
        }

        if(!empty($sort)) {
            $count = count($sort);
            $sql .= " ORDER BY";
            foreach($sort as $key => $value) {
                $sql .= " $key " . $value;

                $count--;
                if($count > 0) $sql .= ",";
            }
        }

        if(!empty($options)) {
            if ($options['start'] < 0) {
                $options['start'] = 0;
            }
            if ($options['limit'] < 1) {
                $options['limit'] = 20;
            }
            $sql .= " LIMIT " . (int)$options['start'] . "," . (int)$options['limit'];
        }

        $query = $this->db->query($sql);
        return $query->rows;
    }

    public function updateTask($taskId, $data = array()) {
        $sql = "UPDATE `tasks`";
        if(!empty($data)) {
            $count = count($data);
            $sql .= " SET";
            foreach($data as $key => $value) {
                $sql .= " $key = '" . $this->db->escape($value) . "'";

                $count--;
                if($count > 0) $sql .= ",";
            }
        }
        $sql .= " WHERE `task_id` = '" . (int)$taskId . "'";
        return $this->db->query($sql);
    }

    public function isTaskNotCompleted(int $taskId, int $userId) {
        $sql = "SELECT tasks_complete_id FROM tasks_complete WHERE tasks_complete_task_id = '$taskId' AND tasks_complete_user_id = '$userId'";
        $query = $this->db->query($sql);
        return count($query->rows) <= 0;
    }

    public function completeTask(int $taskId, int $userId, bool $giveReward) {
        $sql = "INSERT INTO tasks_complete (tasks_complete_task_id, tasks_complete_user_id, tasks_complete_gived_reward) VALUES ('$taskId', '$userId', '" . ($giveReward ? 1 : 0) . "')";
        return $this->db->query($sql);
    }

    public function deleteTask($taskId) {
        $sql = "DELETE FROM `tasks` WHERE task_id = '" . (int)$taskId . "'";
        $this->db->query($sql);
    }

    public function getCompletedTaskInfo($tasksCompleteId) {
        $sql = "SELECT * FROM tasks_complete WHERE tasks_complete_id = '" . $tasksCompleteId . "' LIMIT 1";
        $query = $this->db->query($sql);
        return $query->rows[0];
    }

    public function getTaskByCompleteIt($tasksCompleteId) {
        $tasksCompleteInfo = $this->getCompletedTaskInfo($tasksCompleteId);

        if($tasksCompleteInfo) {
            $sql = "SELECT * FROM tasks WHERE task_id = '" . $tasksCompleteInfo['tasks_complete_task_id'] . "' LIMIT 1";
            $query = $this->db->query($sql);
            return $query->rows[0];
        }

        return null;
    }

    public function confirmCompletedTask($tasksCompleteId) {
        $this->load->model('users');
        $this->load->model('waste');

        $tasksCompleteInfo = $this->getCompletedTaskInfo($tasksCompleteId);
        $task = $this->getTaskByCompleteIt($tasksCompleteId);

        if($tasksCompleteInfo && $task) {
            switch($task['task_reward_type']) {
                case 1: {
                    $wasteData = array(
                        'user_id'		=> $tasksCompleteInfo['tasks_complete_user_id'],
                        'waste_ammount'	=> $task['task_reward_count'],
                        'waste_status'	=> 0,
                        'waste_usluga'	=> "Выполнение задания #" . $task['task_id'],
                    );
                    $this->wasteModel->createWaste($wasteData);
                    $this->usersModel->upUserBalance($tasksCompleteInfo['tasks_complete_user_id'], $task['task_reward_count']);

                    $this->notify->user($tasksCompleteInfo['tasks_complete_user_id'], "Администрация подтвердила выполнение Вами задания #" . $task['task_id'] . ", Вы получили " . $task['task_reward_count'] . " RUB");
                    break;
                }
            }

            $sql = "UPDATE `tasks_complete` SET tasks_complete_gived_reward = '1' WHERE tasks_complete_id = '" . (int)$tasksCompleteId . "'";
            $this->db->query($sql);

            return true;
        }

        return null;
    }

    public function revokeCompletedTask($tasksCompleteId) {
        $tasksCompleteInfo = $this->getCompletedTaskInfo($tasksCompleteId);
        $task = $this->getTaskByCompleteIt($tasksCompleteId);

        if($tasksCompleteInfo && $task) {
            $this->notify->user($tasksCompleteInfo['tasks_complete_user_id'], "Администрация отменила выполнение Вами задания #" . $task['task_id'] . ", Вы можете выполнить его заного");

            $sql = "DELETE FROM `tasks_complete` WHERE tasks_complete_id = '" . (int)$tasksCompleteId . "'";
            $this->db->query($sql);

            return true;
        }

        return null;
    }
}