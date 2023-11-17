<?php echo $admheader ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="card card-custom">
				<div class="card-header">
					<div class="card-title">
						<h3 class="card-label">Создание локации
						</h3>
					</div>
				</div>
				<div class="card-body">
					<form id="createForm" method="POST">
						<div class="form-group form-md-line-input">
							<label>Введите название локации</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Введите название локации">
						</div>
						<div class="form-group form-md-line-input">
							<label>Введите IP (Который видит пользователь)</label>
							<input type="text" class="form-control" id="ip2" name="ip2" placeholder="Введите IP (Который видит пользователь)">
						</div>
						<div class="form-group form-md-line-input">
							<label>Введите IP (По которому подключаются)</label>
							<input type="text" class="form-control" id="ip" name="ip" placeholder="Введите IP (По которому подключаются)">
						</div>
						<div class="form-group form-md-line-input">
							<label>Введите имя пользователя</label>
							<input type="text" class="form-control" id="user" name="user" placeholder="Введите имя пользователя">
						</div>
                        <div class="form-group form-md-line-input">
                            <label for="publicKey">Публичный ключ</label>
                            <textarea class="form-control" id="publicKey" name="publicKey" placeholder="Публичный ключ"></textarea>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="privateKey">Приватный ключ</label>
                            <textarea class="form-control" id="privateKey" name="privateKey" placeholder="Приватный ключ"></textarea>
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
		url: '/admin/locations/create/ajax',
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
					setTimeout("redirect('/admin/locations')", 1500);
					break;
			}
		},
		beforeSubmit: function(arr, $form, options) {
			$('button[type=submit]').prop('disabled', true);
		}
	});
</script>
<?php echo $footer ?>
