<?php

?>
<?php echo $admheader ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="card card-custom">
				<div class="card-header">
					<div class="card-title">
						<h3 class="card-label">Рассылка E-mail
						</h3>
					</div>
				</div>
				<div class="card-body">
					<form id="emailForm" method="POST">
						<div class="form-group form-md-line-input">
                            <textarea class="form-control" id="text" name="text" rows="3" placeholder="Сообщение..."></textarea>
                        </div> 
                        <hr>
						<div class="m-btn-group m-btn-group--pill btn-group m-btn-group m-btn-group--pill btn-block" role="group" aria-label="Large button group">
							<button type="submit" class="btn btn-primary btn-outline  btn-block sbold uppercase">Отправить</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#emailForm').ajaxForm({ 
		url: '/admin/emailinfo/index/ajax/',
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
					break;
			}
		},
		beforeSubmit: function(arr, $form, options) {
			toastr.info("Рассылка начата!");
		}
	});
</script>
<?php echo $footer ?>
