<title>Веб - Хостинг</title>
<?php echo $header?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xl-3">
					<div class="card card-custom mb-3 pt-5">
						<div class="card-body">
							<div class="text-center">
								<div class="symbol symbol-60 symbol-circle symbol-xl-90">
									<div class="symbol-label">
										<?php if($webhost['web_status'] == 1): ?>
										<i class="fa fa-power-off icon-6x text-success"></i>
										<?php elseif($webhost['web_status'] == 0): ?>
										<i class="fas fa-exclamation-circle icon-6x text-warning"></i>
										<?php endif; ?>
									</div>
									<i class="symbol-badge symbol-badge-bottom bg-<?php if($webhost['web_status'] == 0): ?>warning
										<?php elseif($webhost['web_status'] == 1): ?>success<?php endif; ?>"></i>
								</div>
								<h4 class="font-weight-bolder my-2"><?php echo $webhost['tarif_name'] ?></h4>
								<div class="text-muted font-weight-bold mb-2"><?php if($webhost['web_status'] == 1): ?>
									Запущен
									<?php elseif($webhost['web_status'] == 0): ?>
									Заблокирован
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="card card-custom mb-3">
						<div class="card-body px-1" style="padding: 0.3rem 2.25rem;">
							<div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">
								<div class="navi-item my-2">
									<a href="javascript:;" data-toggle="modal" data-target="#pay" class="navi-link">
									<span class="navi-icon mr-3">
									<span class="svg-icon svg-icon-lg">
									<i class="fa fa-cart-plus"></i>
									</span>
									</span>
									<span class="navi-text font-weight-bolder font-size-lg">Продлить</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-9">
					<div class="row">
						<div class="col-xl-6">
							<div class="card card-custom mb-3">
								<div class="card-header border-0">
									<h3 class="card-title">Тариф<small class="text-muted font-size-sm ml-2"><?php echo $webhost['tarif_name'] ?></small></h3>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card card-custom mb-3">
								<div class="card-header border-0">
									<h3 class="card-title">Адрес<small class="text-muted font-size-sm ml-2"><?php echo $webhost['location_ip'] ?></small></h3>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card card-custom mb-3">
								<div class="card-header border-0">
									<h3 class="card-title">Оплачен до<small class="text-muted font-size-sm ml-2"><?php echo date("d.m.Y", strtotime($webhost['web_date_end'])) ?></small></h3>
									<div class="card-toolbar">
										<a href="javascript:;" data-toggle="modal" data-target="#pay" class="btn btn-clean btn-icon">
										<i class="fas fa-cogs" data-toggle="tooltip" data-placement="right" title="" data-original-title="Изменить"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card card-custom mb-3">
								<div class="card-header border-0">
									<h3 class="card-title">Локация<small class="text-muted font-size-sm ml-2"><?php echo $webhost['location_name'] ?></small></h3>
								</div>
							</div>
						</div>
						<?php if($webhost['web_status'] == 1): ?> 
						<div class="col-xl-12 mb-3">
							<div class="separator separator-dashed separator-border-2"></div>
						</div>
						<div class="col-xl-12">
							<div class="card card-custom mb-3">
								<div class="card-header border-0">
									<h3 class="card-title">Адрес ISP Manager<small class="text-muted font-size-sm ml-2">https://<?php echo $webhost['location_url'] ?>:1500/ispmgr</small></h3>
									<div class="card-toolbar">
										<a href="https://<?php echo $webhost['location_url'] ?>:1500/ispmgr" target="_blank" class="btn btn-clean btn-icon">
										<i class="fa fa-external-link-alt" data-toggle="tooltip" data-placement="right" title="" data-original-title="Перейти в панель управления"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card card-custom mb-3">
								<div class="card-header border-0">
									<h3 class="card-title">Имя пользователя<small class="text-muted font-size-sm ml-2">ws<?php echo $webhost['web_id'] ?></small></h3>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card card-custom mb-3">
								<div class="card-header border-0">
									<h3 class="card-title">Пароль доступа<small class="text-muted font-size-sm ml-2"><?php echo $webhost['web_password'] ?></small></h3>
									<div class="card-toolbar">
										<a href="javascript:;" data-toggle="modal" data-target="#ftppass" class="btn btn-clean btn-icon">
										<i class="fas fa-cogs" data-toggle="tooltip" data-placement="right" title="" data-original-title="Изменить"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--begin::Modal-->
<div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Продление сервера</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<form id="payForm" method="POST" style="padding:0px; margin:0px;">
				<div class="modal-body">
					<div class="form-group mb-2">
						<div class="input-group">
							<select style="width:340px;" class="form-control" id="days" name="days" onchange="updatePrice()">
								<option value="15">15 дней</option>
								<option value="30">30 дней</option>
								<option value="60">60 дней</option>
								<option value="90">90 дней</option>
								<option value="180">180 дней</option>
								<option value="360">360 дней</option>
							</select>
						</div>
					</div>
					<div class="d-flex align-items-center bg-dark-primary rounded p-4 mb-2">
						<i class="flaticon-exclamation icon-xl text-primary mr-5"></i>
						<div class="d-flex flex-column flex-grow-1 mr-2">
							<span class="font-weight-bolder text-primary py-1 font-size-lg">Итого к оплате: <span id="price2">0.00 RUB</span></span>
						</div>
					</div>
					<div class="modal-footer" style="padding: 0.5rem;">
						<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Отмена</button>
						<button type="submit" class="btn btn-primary font-weight-bold">Оплатить</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end::Modal-->
<?php if($webhost['web_status'] == 1): ?> 
<!--begin::Modal-->
<div class="modal fade" id="ftppass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Изменить пароль доступа</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<form id="editForm" method="POST" style="padding:0px; margin:0px;">
				<div class="modal-body">
					<div class="card card-body" style="margin-bottom: 1rem;padding: 1rem;">
						<div class="form-group" style="margin-bottom: 0rem;">
							<div class="checkbox-list">
								<label class="checkbox">
								<input type="checkbox" id="editpassword" name="editpassword" onchange="togglePassword()">
								<span></span>
								Сменить пароль доступа
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Пароль</label>
						<input class="form-control" id="password" name="password" placeholder="Пароль" disabled="">
					</div>
					<div class="form-group">
						<label>Повторите пароль</label>
						<input class="form-control" id="password2" name="password2" placeholder="Повторите пароль" disabled="">
					</div>
				</div>
				<div class="modal-footer" style="padding: 0.5rem;">
					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Отмена</button>
					<button type="submit" class="btn btn-primary font-weight-bold">Сохранить</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end::Modal-->
<?php endif; ?>
<script>	
	$('#editForm').ajaxForm({ 
		url: '/webhost/control/ajax/<?php echo $webhost['web_id'] ?>',
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
					setTimeout("reload()", 1500);
					break;
			}
		},
		beforeSubmit: function(arr, $form, options) {
			$('button[type=submit]').prop('disabled', true);
		}
	});
	
    function togglePassword() {
		var status = $('#editpassword').is(':checked');
		if(status) {
			$('#password').prop('disabled', false);
			$('#password2').prop('disabled', false);
		} else {
			$('#password').prop('disabled', true);
			$('#password2').prop('disabled', true);
		}
    }
									
	$('#payForm').ajaxForm({ 
		url: '/webhost/control/buy_months/<?php echo $webhost['web_id'] ?>',
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
				    setTimeout("reload()",1000);
					break;
			}
		},
		beforeSubmit: function(arr, $form, options) {
			$('button[type=submit]').prop('disabled', true);
		}
	});
	
	$(document).ready(function() {
		updatePrice();
	});
					
	function updatePrice() {
		var price2 = <?php echo $webhost['tarif_price'] ?>;
		var days = $("#days option:selected").val();
		switch(days) {
			case "15":
				price2 = price2 / 2;
				break;
			case "30":
				break;
			case "60":
				price2 = price2 * 2;
				break;
			case "90":
				price2 = 3 * price2;
				break;
			case "180":
				price2 = 6 * price2;
				break;
			case "360":
				price2 = 12 * price2;
				break;
		}
		$('#price2').text(price2.toFixed(2) + ' руб. Дней: ' + days);
	}
</script>
<?php echo $footer ?>