 <title>Форум</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-xxl-4 mb-4 ">
					<div class="card card-custom card-sticky">
						<div class="card-body px-5">
							<center>
								<div class="symbol symbol-100 mr-50">
								<div class="symbol-label" style="background-image:url('<?php echo $url ?><?php echo $user_img ?>')"></div>
									<i class="symbol-badge bg-success"></i>
								</div>
							</center>
							<div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">
								<div class="navi-item my-2">
									<a href="#" class="navi-link active">
									<span class="navi-icon mr-4">
									<i class="flaticon-computer icon-lg"></i>
									</span>
									<span class="navi-text font-weight-bolder font-size-lg">Форум</span>
									</a>
								</div>
								<hr>
								<?php foreach($messages as $item): ?>
								<div class="navi-item my-2">
									<a href="javascript:;" class="navi-link" data-toggle="tooltip" data-placement="right" title="" data-original-title="Дата создания темы">
									<span class="navi-icon mr-4">
									<i class="flaticon-calendar icon-lg"></i>
									</span>
									<span class="navi-text"><?php echo date("d.m.Y в H:i", strtotime($item['forum_message_date_add'])) ?></span>
									</a>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-xxl-8">
					<form id="sendForm" action="" method="POST">
						<div class="card card-custom card-sticky">
							<div class="card-header align-items-center px-4 py-3">
								<div class="text-right flex-grow-1">
								<center><span><b><h5 class="mb-1">24HoursHost - Мини Форум</h5></b></span></center>
								</div>
							</div>
							<?php if(empty($messages)): ?>
								<form id="sendForm" action="" method="POST">
									  <div class="card card-custom mb-4">
										 <div class="card-body">
											<center>
											<div class="form-group">
												<div class="g-recaptcha" data-sitekey="<?php echo $recaptcha ?>" id="recaptcha1"></div>
											</div>
											</center>
											<div class="d-flex align-items-center">
											   <span class="text-muted font-weight-bold font-size-lg">Отправьте комментарий (доступ) для просмотра темы.</span>
											</div>
											<hr>
											<div class="input-group">
											   <input type="text" class="form-control" type="text" id="text" name="text" placeholder="Ваш комментарий...">
											   <div class="input-group-append">
												  <button class="btn btn-primary btn-icon" type="submit"><i class="flaticon2-paper-plane"></i></button>
											   </div>
											</div>
										 </div>
									  </div>
								   </form>
							<?php endif; ?>
							<?php foreach($messages as $item): ?>
									<div class="card-body">
										<div class="scroll scroll-pull"  id="scroll" data-scroll="true" style="height: 250px; overflow: auto;" data-mobile-height="300">
											<div class="pt-3">
											<p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2"><?echo nl2br($new['forum_text'])?></p>
										 </div>
										</div>
									</div>
							<div class="card-body">
								<div class="scroll scroll-pull"  id="scroll" data-scroll="true" style="height: 650px; overflow: auto;" data-mobile-height="400">
									<form id="sendForm" action="" method="POST">
									  <div class="card card-custom mb-4">
										 <div class="card-body">
											<center>
											<div class="d-flex align-items-center">
											   <div class="kt-pricing-v2__price-type"><i class="fas fa-lock mr-2 text-primary"></i>Данная тема <b style="color: red ;">закрыта</b> от комментирования</div>
											</div>
											<hr>
											<!--<div class="form-group">
												<div class="g-recaptcha" data-sitekey="<?php echo $recaptcha ?>" id="recaptcha1"></div>
											</div>
											</center>
											<div class="input-group">
											   <input type="text" class="form-control" type="text" id="text" name="text" placeholder="Ваш комментарий...">
											   <div class="input-group-append">
												  <button class="btn btn-primary btn-icon" type="submit"><i class="flaticon2-paper-plane"></i></button>
											   </div>
											</div>-->
										 </div>
									  </div>
									  <div class="card card-custom mb-4">
										 <div class="card-body">
											<div class="d-flex align-items-center">
											   <div class="symbol symbol-85 mr-5">
												  <center>
													<div class="symbol symbol-85 mr-50">
													<div class="symbol-label" style="background-image:url('/tmp/avatar/20210109214016995.jpg')"></div>
														<i class="symbol-badge bg-success"></i>
													</div>
												</center>
											   </div>
											   <div class="d-flex flex-column flex-grow-1">
												  <a href="javascript:;" class="text-dark-25 text-hover-primary mb-1 font-size-lg font-weight-bolder">Администратор 24HoursHost</a>
												  <span class="text-muted font-weight-bold">Комментарий Администратора: <?php echo nl2br($item['forum_message']) ?></span>
											   </div>
												<span class="text-muted font-weight-normal font-size-sm"><?php if($item['user_access_level'] == 1): ?>Клиент<?php endif; ?><?php if($item['user_access_level'] == 2): ?><span class="badge badge-danger">admin</span><?php endif; ?><?php if($item['user_access_level'] == 3): ?><span class="badge badge-danger">admin</span><?php endif; ?></span> <hr>
											</div>
										 </div>
									  </div>
								   </form>
								</div>
							</div>
							<?php endforeach; ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://www.google.com/recaptcha/api.js?onload=recaptha&render=explicit" async defer></script>
<script>
$('#sendForm').ajaxForm({ 
    url: '/forum/view/ajax/<?php echo $new['forum_id'] ?>',						
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
				$('#text').val('');
				setTimeout("reload()", 1500);
				ajax_url("/forum/view/"+data);
			break;
			}
		},
	beforeSubmit: function(arr, $form, options) {
	$('button[type=submit]').prop('disabled', true);
}
});
</script>
<script>
var captcha_login, captcha_register, captcha_restore, captcha_infobox;	
       var recaptha = function() {		
   		captcha_register = grecaptcha.render('recaptcha1', {
   			'sitekey' : '<?php echo $recaptcha ?>',
   		    'theme' : 'light'
   		});	
   	};		
</script>
<?php echo $footer ?>