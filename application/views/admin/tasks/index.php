<?php echo $admheader ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Задания
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="/admin/tasks/create" class="btn btn-sm btn-icon btn-light-primary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Добавить задание">
                            <i class="flaticon2-add-square"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body" style="padding: 0rem 1rem;">
                    <div class="table-responsive">
                        <table class="table table-head-custom table-vertical-center">
                            <thead>
                            <tr>
                                <th><i class="fa fa-list-ol"></i></th>
                                <th>Задание</th>
                                <th>Вознаграждение</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($tasks as $task): ?>
                                <tr onclick="editTask(<?php echo $task['task_id']; ?>)" style="cursor:pointer;">
                                    <th scope="row"><?php echo $task['task_id']; ?></th>
                                    <td>
                                        <?php echo getTaskTitle($task['task_type']); ?>
                                    </td>
                                    <td><?php echo $task['task_reward_count'] ?> <?php echo getRewardTypeText($task['task_reward_type']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Ручная проверка заданий
                        </h3>
                    </div>
                </div>
                <div class="card-body" style="padding: 0rem 1rem;">
                    <div class="table-responsive">
                        <table class="table table-head-custom table-vertical-center">
                            <thead>
                            <tr>
                                <th><i class="fa fa-list-ol"></i></th>
                                <th>Пользователь</th>
                                <th>Задание</th>
                                <th>Ссылка</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($tasksForCheck as $task): ?>
                                <tr>
                                    <th scope="row"><?php echo $task['tasks_complete_id']; ?></th>
                                    <td>
                                        <?php echo $task['user_firstname']; ?> <?php echo $task['user_lastname']; ?> [<?php echo $task['user_id']; ?>]
                                    </td>
                                    <td><?php echo getTaskTitle($task['task_type']) ?></td>
                                    <td><?php echo $task['task_extra'] ?></td>
                                    <td>
                                        <a href="<?php echo $task['task_extra']; ?>" target="_blank" class="btn btn-sm btn-outline-primary">Посмотреть</a>
                                        <a href="javascript:;" onClick="confirmCompletedTask(<?php echo $task['tasks_complete_id']; ?>)" class="btn btn-sm btn-outline-success">
                                            Подтвердить
                                        </a>&nbsp;
                                        <a href="javascript:;" onClick="revokeCompletedTask(<?php echo $task['tasks_complete_id']; ?>)" class="btn btn-sm btn-outline-danger">
                                            Отменить
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $footer?>

<?php
function getTaskTitle($type)
{
    return match ((int)$type) {
        1 => "Подписаться на группу ВК",
        2 => "Сделать репост ВК",
        3 => "Оставить отзыв",
        default => "NONE $type",
    };
}

function getRewardTypeText($type) {
    return match ((int)$type) {
        1 => "RUB",
        2 => "% Промокод",
        default => "NONE $type",
    };
}

function checkType($type) {
    return match ((int)$type) {
        1, 2 => "vk",
        3 => "support"
    };
}
?>

<script>
    function editTask(taskId) {
        window.location.pathname = '/admin/tasks/edit/index/' + taskId;
    }

    function confirmCompletedTask(tasksCompleteId) {
        $.ajax({
            url: '/admin/tasks/confirm/' + tasksCompleteId,
            method: 'POST',
            dataType: 'json',
            success: (data) => {
                switch(data.status) {
                    case 'error':
                        toastr.error(data.error);
                        break;
                    case 'success':
                        toastr.success(data.success);
                        break;
                }
            }
        });
    }

    function revokeCompletedTask(tasksCompleteId) {
        $.ajax({
            url: '/admin/tasks/revoke/' + tasksCompleteId,
            method: 'POST',
            dataType: 'json',
            success: (data) => {
                switch(data.status) {
                    case 'error':
                        toastr.error(data.error);
                        break;
                    case 'success':
                        toastr.success(data.success);
                        break;
                }
            }
        });
    }
</script>