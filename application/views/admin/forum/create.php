<?php echo $admheader ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="card card-custom">
				<div class="card-header">
					<div class="card-title">
						<h3 class="card-label">Создание статьи для форума
						</h3>
					</div>
				</div>
				<div class="card-body">
					<form id="createForm" method="POST">
						<div class="form-group form-md-line-input">
							<input type="text" class="form-control" id="name" name="name" placeholder="Введите заголовок">
						</div>
						<div class="form-group form-md-line-input">
							<textarea class="form-control" id="text" name="text" rows="3" placeholder="Введите текст статьи"></textarea>
						</div>
						<hr>
						<input type="submit" name="otp" class="btn btn-primary m-btn m-btn--air btn-outline  btn-block sbold uppercase" value="Сохранить">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#createForm').ajaxForm({ 
		url: '/admin/forum/create/ajax',
		dataType: 'json',
		success: function(data) {
			switch(data.status) {
				case 'error':
					toastr.error(data.error);
					$('button[type=submit]').prop('disabled', false);
					break;
				case 'success':
					toastr.success(data.success);
					setTimeout("redirect('/admin/forum/view/index/" + data.id + "')", 1500);
					break;
			}
		},
		beforeSubmit: function(arr, $form, options) {
			$('button[type=submit]').prop('disabled', true);
		}
	});
</script>
<?php echo $footer ?>