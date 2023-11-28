
 <link rel="stylesheet" href="/application/public/css-2/css-privacy/stily2.css" />
  <title>24HoursHost | Служба Поддержки</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-xxl-4 mb-4">
					<div class="card card-custom card-sticky">
						<div class="card-body px-5">
						<center>
						<div class="symbol symbol-150 mr-50">
						<div class="symbol-label" style="background-image:url('<?php echo $url ?><?php echo $user_img ?>')"></div>
							<i class="symbol-badge bg-success"></i>
						</div>
						<hr>
						</center>
							<div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">
								<div class="navi-item my-2">
									<a href="/tickets" class="navi-link">
									<span class="navi-icon mr-4">
									<i class="flaticon-computer icon-lg"></i>
									</span>
									<span class="navi-text font-weight-bolder font-size-lg">Мои запросы</span>
									</a>
								</div>
								<div class="navi-item my-2">
									<a href="/tickets/faq" class="navi-link">
									<span class="navi-icon mr-4">
									<i class="flaticon-book icon-lg"></i>
									</span>
									<span class="navi-text font-weight-bolder font-size-lg">База знаний</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-xxl-8">
					<div class="card card-custom card-sticky">
						<div class="card-body px-5">
							<div class="alert alert-danger" role="alert">
								<div class="alert-text">Режим работы тех.поддержки 09:00 - 18:00 (МСК)</div>
								<div class="alert-text">Ответ тех.поддержки от 10-ти минуты, до 3-ёх часов.</div>
							</div>
							<form method="POST" id="createForm" style="padding:0px; margin:0px;">
								<div class="form-group form-md-line-input mb-4">
									<input type="text" class="form-control" id="name" name="name" placeholder="Введите тему">
								</div>
								<br>
								<div class="form-group form-md-line-input mb-4">
									<select class="form-control" id="category" name="category" aria-required="true" aria-invalid="false" aria-describedby="delivery-error">
										<?php foreach($category as $item): ?> 
										<option value="<?php echo $item['category_id'] ?>"><?php echo $item['category_name'] ?></option>
										<?php endforeach; ?> 
									</select>
								</div>
								<br>
								<div class="form-group form-md-line-input mb-4">
									<textarea class="form-control" id="text" name="text" rows="3" placeholder="Сообщение..."></textarea>
								</div>
								<br>
								<div class="recaptcha">
									<center>
										<div class="g-recaptcha" data-sitekey="<?php echo $recaptcha ?>" id="recaptcha1"></div>
									</center>
								</div>
								<br>
								<button type="submit" class="btn btn-primary btn-lg btn-block">Отправить</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://www.google.com/recaptcha/api.js?onload=recaptha&render=explicit" async defer></script>
<script>
	var captcha_ticket; 
		var recaptha = function() { 
		captcha_ticket = grecaptcha.render('recaptcha1', {
			'sitekey' : '<?php echo $recaptcha ?>',
			'theme' : 'light'
		});     
	};  
	
	$('#createForm').ajaxForm({ 
		url: '/tickets/create/ajax',
		dataType: 'text',
		success: function(data) {
			console.log(data);
			data = $.parseJSON(data);
			switch(data.status) {
				case 'error':
					toastr.error(data.error);
					grecaptcha.reset(captcha_ticket);
					$('button[type=submit]').prop('disabled', false);
					break;
				case 'success':
					toastr.success(data.success);
					setTimeout("redirect('/tickets/view/index/" + data.id + "')", 1500);
					break;
			}
		},
		beforeSubmit: function(arr, $form, options) {
			$('button[type=submit]').prop('disabled', true);
		}
	});
</script>
<?php echo $footer ?>