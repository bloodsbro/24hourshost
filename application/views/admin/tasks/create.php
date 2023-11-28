<?php echo $admheader; ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Создание задания
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form id="createForm" method="POST">
                        <div class="form-group form-md-line-input">
                            <label>Тип задания</label>
                            <select class="form-control" id="taskType" name="taskType" aria-required="true" aria-invalid="false" aria-describedby="delivery-error">
                                <option value="1" selected>Подписаться на группу</option>
                                <option value="2">Сделать репост ВК</option>
                                <option value="3">Оставить отзыв</option>
                            </select>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label>Данные для задания</label>
                            <input type="text" class="form-control" id="taskExtra" name="taskExtra" placeholder="Данные для задания">
                        </div>
                        <div class="form-group form-md-line-input">
                            <label>Дата начала действия</label>
                            <input type="datetime-local" class="form-control" id="taskDateAdd" name="taskDateAdd" placeholder="Дата начала действия">
                        </div>
                        <div class="form-group form-md-line-input">
                            <label>Дата окончания действия</label>
                            <input type="datetime-local" class="form-control" id="taskDateEnd" name="taskDateEnd" placeholder="Дата окончания действия">
                        </div>
                        <div class="form-group form-md-line-input">
                            <label>Тип награды</label>
                            <select class="form-control" id="taskRewardType" name="taskRewardType" aria-required="true" aria-invalid="false" aria-describedby="delivery-error">
                                <option value="1" selected>Деньги на баланс</option>
                            </select>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label>Количество награды</label>
                            <input type="number" class="form-control" id="taskRewardCount" name="taskRewardCount" placeholder="Количество награды">
                        </div>
                        <hr>
                        <div class="m-btn-group m-btn-group--pill btn-group m-btn-group m-btn-group--pill btn-block" role="group" aria-label="Large button group">
                            <button type="submit" class="btn btn-primary btn-outline  btn-block sbold uppercase">Создать задание</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#createForm').ajaxForm({
        url: '/admin/tasks/create/ajax',
        dataType: 'json',
        success: function(data) {
            switch(data.status) {
                case 'error':
                    toastr.error(data.error);
                    $('button[type=submit]').prop('disabled', false);
                    break;
                case 'success':
                    toastr.success(data.success);
                    setTimeout("redirect('/admin/tasks')", 1500);
                    break;
            }
        },
        beforeSubmit: function(arr, $form, options) {
            $('button[type=submit]').prop('disabled', true);
        }
    });
</script>
<?php echo $footer ?>

