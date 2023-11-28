<?php echo $header?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Задания
                        </h3>
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
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($tasks as $task): ?>
                                <?php if(!$task['tasks_complete_id'] || $task['tasks_complete_user_id'] != $userId || (!$task['tasks_complete_gived_reward'])): ?>
                                    <tr>
                                        <th scope="row"><?php echo $task['task_id']; ?></th>
                                        <td>
                                            <?php echo getTaskTitle($task['task_type']); ?>
                                        </td>
                                        <td><?php echo $task['task_reward_count'] ?> <?php echo getRewardTypeText($task['task_reward_type']) ?></td>
                                        <td>

                                            <?php if(!$task['tasks_complete_id'] || $task['tasks_complete_user_id'] != $userId): ?>
                                                <a href="<?php echo $task['task_extra'] ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                                    Выполнить
                                                </a>&nbsp;
                                                <a href="javascript:;" onClick="checkTask(<?php echo $task['task_id'] ?>, '<?php echo checkType($task['task_type']) ?>')" class="btn btn-sm btn-outline-success">
                                                    Проверить
                                                </a>
                                            <?php elseif(!$task['tasks_complete_gived_reward']): ?>
                                                Ожидает ручной проверки Администрацией...
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
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
    function checkTask(taskId, taskType) {
        switch(taskType) {
            case 'vk': {
                location.href = `https://oauth.vk.com/authorize?client_id=<?php echo $vk_id; ?>&redirect_uri=${location.origin}${location.pathname}&display=page&scope=offline,groups,wall&response_type=token&v=5.13&revoke=10&state=checkTask${taskId}`;
                break;
            }
            case 'support': {
                $.ajax({
                    url: `/main/acc/checkTask`,
                    type: 'POST',
                    dataType: 'json',
                    data: {taskId: taskId},
                    success: function(data) {
                        switch(data.status) {
                            case 'error':
                                toastr.error(data.error);
                                break;
                            case 'success':
                                toastr.success(data.success);
                                break;
                        }
                    },
                });
                break;
            }
        }
    }

    window.onload = () => {
        if(location.hash.length <= 1) return;

        const hash = location.hash ? location.hash.substring(1) : '';
        const data = hash.split('&');
        const res = {};
        const tasks = <?php echo json_encode($tasks); ?>;

        data.forEach((el) => {
            const parsed = el.split('=', 2);

            if(parsed[0] === 'state' && parsed[1].startsWith('checkTask')) {
                res['taskId'] = Number(parsed[1].substring('checkTask'.length));
            } else {
                res[parsed[0]] = parsed[0] !== 'access_token' ? Number(parsed[1]) : parsed[1];
            }
        })

        const task = tasks.find((el) => Number(el.task_id) === res['taskId']);
        if(!task) return;

        $.ajax({
            url: `/main/acc/checkTask`,
            type: 'POST',
            dataType: 'json',
            data: res,
            success: function(data) {
                switch(data.status) {
                    case 'error':
                        toastr.error(data.error);
                        break;
                    case 'success':
                        toastr.success(data.success);
                        break;
                }
            },
            beforeSend: function () {
                location.hash = '';
            }
        });
    }
</script>
