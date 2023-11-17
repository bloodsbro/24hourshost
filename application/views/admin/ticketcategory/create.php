<?php

?>
<?php echo $admheader ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-xxl-4 mb-4">
					<div class="card card-custom card-sticky">
						<div class="card-body px-5">
							<div class="px-4 mt-4 mb-10">
								<a href="/admin/tickets/create" class="btn btn-block btn-primary font-weight-bold text-uppercase py-4 px-6 text-center">Написать клиенту</a>
							</div>
							<div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">
								<div class="navi-item my-2">
									<a href="/admin/tickets/index?status=1" class="navi-link">
									<span class="navi-icon mr-4">
									<i class="fa fa-user-clock icon-lg"></i>
									</span>
									<span class="navi-text font-weight-bolder font-size-lg">Новые запросы</span>
									</a>
								</div>
								<div class="navi-item my-2">
									<a href="/admin/tickets" class="navi-link">
									<span class="navi-icon mr-4">
									<i class="fa fa-headset icon-lg"></i>
									</span>
									<span class="navi-text font-weight-bolder font-size-lg">Все запросы</span>
									</a>
								</div>
								<hr>
								<div class="navi-item my-2">
									<a href="/admin/ticketcategory" class="navi-link">
									<span class="navi-icon mr-4">
									<i class="fa fa-list-alt icon-lg"></i>
									</span>
									<span class="navi-text font-weight-bolder font-size-lg">Все категории</span>
									</a>
								</div>
								<div class="navi-item my-2">
									<a href="/admin/ticketcategory/create" class="navi-link active">
									<span class="navi-icon mr-4">
									<i class="fa fa-plus icon-lg"></i>
									</span>
									<span class="navi-text font-weight-bolder font-size-lg">Создать категорию</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-xxl-8">
					<div class="card card-custom">
						<div class="card-body">
							<form class="form-group form-md-line-input" action="#" id="createForm" method="POST">
								<div class="form-group form-md-line-input">
									<input type="text" class="form-control" id="name" name="name" placeholder="Введите название" value="<?php echo $category['category_name'] ?>">
								</div>
								<div class="form-group form-md-line-input">
									<select class="form-control" id="status" name="status" aria-required="true" aria-invalid="false" aria-describedby="delivery-error">
										<option value="0">Выключена</option>
										<option value="1">Включена</option>
									</select>
								</div>
								<hr>
								<input type="submit" name="otp" class="btn btn-primary m-btn m-btn--air btn-outline  btn-block sbold uppercase" value="Сохранить">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#createForm').ajaxForm({ 
		url: '/admin/ticketcategory/create/ajax',
		dataType: 'text',
		success: function(data) {
			console.log(data);
			data = $.parseJSON(data);
			switch(data.status) {
				case 'error':
					toastr.error(data.error);
					$('button[type=submit]').prop('disabled', false);
					break;
				case 'success':
					toastr.success(data.success);
					setTimeout("redirect('/admin/ticketcategory')", 1500);
					break;
			}
		},
		beforeSubmit: function(arr, $form, options) {
			$('button[type=submit]').prop('disabled', true);
		}
	});
</script>
<?php echo $footer ?>