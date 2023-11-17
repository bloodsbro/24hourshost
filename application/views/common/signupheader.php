<html lang="ru">
<head>

		<title><?php echo $title ?></title>
		<meta charset="utf-8" />
        <meta name="description" content="<?php echo $description ?>">
        <meta name="keywords" content="<?php echo $keywords ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="robots" content="all">

        <meta property="og:title" content="<?php echo $title ?>"/>
        <meta property="og:site_name" content="<?php echo $title ?>"/>
        <meta property="og:description" content="<?php echo $description ?>"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://24hours.host/"/>

		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="/ru/favicon.ico" />
		<link href="/assets/css/login-2.css" rel="stylesheet" type="text/css" />
		<!--<link href="/application/public/css/autologin.min.css" rel="stylesheet">-->
		<link href="/assets/css/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<!--<link href="/application/public/css/bootstrap.min.css" rel="stylesheet">-->
		<link href="/assets/css/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<!--<link href="/application/public/css/reg.min.css" rel="stylesheet">-->
		<link href="/ru/login/font-awesome.min.css" rel="stylesheet">
		<link href="/ru/login/main.css" rel="stylesheet">
		<link href="/ru/login/bootstrap4.css" rel="stylesheet">
		<link href="/ru/login/glyphicons.css" rel="stylesheet">
	
</head>

 <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
		<div id="content" class="container">
			<div class="row justify-content-md-center">
				<div class="col-sm-10 col-lg-5">
					<div class="card">
						<div class="card-body">
							<form class="form-signin"  novalidate="novalidate" id="finxgames_signup_form" method="GET">
								<h2 class="form-signin-heading">Регистрация <img alt="Logo" src="/ru/img/finxgames-logo.png" width = "50" height = "50" /></h2>
								<div class="form-group">
								  <input class="form-control form-control-solid h-auto p-6 rounded-lg font-size-h6" type="text" id="ref" name="ref" disabled placeholder="<?php
									 if(isset($_GET['ref'])) {
										 echo ' Приглашение от: '.$user['user_firstname'].'('.$_GET['ref'].')';
									 }else echo ' У Вас нет приглашения';
									 ?>">
							   </div>
								<div class="form-group row-vertical">
									<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Имя">
									<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Фамилия">
								</div>
								<input type="text" class="form-control" id="email" name="email" placeholder="E-Mail">
								<div class="form-group row-vertical">
									<input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
									<input type="password" class="form-control" id="password2" name="password2" placeholder="Повтор пароля">
								</div>
								<input type="hidden" name="ref" id="ref" value="<?echo $_GET['ref']?>">
								<div class="g-recaptcha" data-sitekey="<?php echo $recaptcha ?>" id="recaptcha1"></div>
								<div class="form-check mb-3">
									<label class="form-check-label" for="exampleCheck1"><center>Нажимая кнопку “Регистрация” вы автоматически соглашаетесь с <a target="_blank" href="/ru/oferta.html"><b>Условиями использования</b></center></a></label>
								</div>
								<button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
								<div class="other-link"><a href="/account/login">Уже зарегистрированы?</a></div>
								<center>
									<div class="row m-login__form-sub">
										<div class="col m--align-left m-login__form-left">
											<a data-toggle="modal" data-target="#hostin_supports" class="m-link">Нужна помощь ?</a>
										</div>
										<div class="col m--align-right m-login__form-right">
											<a href="javascript:;" data-toggle="modal" data-target="#hostin_supports" class="text-primary">Напишите нам!</a>
										</div>
									</div>
								</center>
							</form>
						</div>
					</div>
					<!-- <center>
							<span class="text-muted font-weight-bold mr-2"> <span> © <script>document.write(new Date().getFullYear());</script>All Rights Reserved</span></span>
					</center> -->
				</div>
			</div>
		</div>
	
		<br>
		<br>

		<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
			<div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
				<div class="text-dark order-2 order-md-1">
				<nav class="navbar navbar-expand-lg navbar-light bg-light"> 
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
					  <li class="nav-item active">
						<a class="nav-link" href="/ru/privacy.html">Политика Конфиденциальности <span class="sr-only">(current)</span></a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="https://vk.com/public<?php echo $public ?>">Сообщество VK</a>
					  </li>
					</ul>
				  </div>
				</nav>
				</div>
				<div class="nav nav-dark order-1 order-md-2">
					<span class="text-muted font-weight-bold mr-2"> community@24hours.host</span> <img alt="Logo" width = "28" height = "28" src="/ru/img/finxgames-logo.png" />
				</div>
			</div>
		</div>

      <div class="modal fade" id="hostin_supports" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Обратная связь</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i aria-hidden="true" class="ki ki-close"></i>
                  </button>
               </div>
               <div class="modal-body">
                  <form id="finxgamesForm" method="POST" style="padding:0px; margin:0px;">
                     <div class="form-group m-form__group">
                        <input class="form-control m-input" type="text" id="firstname" name="firstname" placeholder="Введите ваше имя..">
                     </div>
                     <div class="form-group m-form__group">
                        <input class="form-control m-input" id="lastname" name="lastname" placeholder="Введите вашу фамилию..">
                     </div>
                     <div class="form-group m-form__group">
                        <input class="form-control m-input" type="email" id="email" name="email" placeholder="Введите ваш email..">
                     </div>
                     <div class="form-group form-md-line-input">
                        <select class="form-control" id="subject" name="subject" size="1" aria-required="true" aria-invalid="false" aria-describedby="delivery-error">
                           <option value="Вопроос">Вопрос</option>
                           <option value="Проблемы с сервером">Проблемы с сервером</option>
                           <option value="Проблемы с аккаунтом">Проблемы с аккаунтом</option>
                           <option value="Сотрудничество">Сотрудничество</option>
                        </select>
                     </div>
                     <div class="form-group form-md-line-input">
                        <textarea class="form-control" id="msg" name="msg" rows="3" placeholder="Сообщение..."></textarea>
                     </div>
                     <div class="recaptcha">
                        <center>
                           <div class="g-recaptcha" data-sitekey="<?php echo $recaptcha ?>" id="recaptcha3"></div>
                        </center>
                     </div>
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Отмена</button>
               <button type="submit" class="btn btn-primary font-weight-bold">Отправить</button>
               </div>
               </form>
            </div>
         </div>
      </div>

      <script src="/assets/js/plugins.bundle.js"></script>
      <script src="/assets/js/prismjs.bundle.js"></script>
      <script src="/assets/js/scripts.bundle.js"></script>
      <script src="/application/public/js/jquery.form.min.js"></script>
      <script src="/application/public/js/main.js"></script>
      <script src="/assets/js/fullcalendar.bundle.js"></script>
      <script src="https://www.google.com/recaptcha/api.js?onload=recaptha&render=explicit" async defer></script>
	  
   </body>
</html>
<!-------------------------------------------------------------------------------------------->
<script>
   // Class Initialization
   jQuery(document).ready(function() {
       KTLogin.init();
   });
   
   	var captcha_login, captcha_register, captcha_restore, captcha_infobox;	
       var recaptha = function() {		
   		captcha_register = grecaptcha.render('recaptcha1', {
   			'sitekey' : '<?php echo $recaptcha ?>',
   		    'theme' : 'light'
   		});
   		captcha_restore = grecaptcha.render('recaptcha2', {
   			'sitekey' : '<?php echo $recaptcha ?>',
   			'theme' : 'light'
   		});
   		captcha_infobox = grecaptcha.render('recaptcha3', {
   			'sitekey' : '<?php echo $recaptcha ?>',
   			'theme' : 'light'
   		});		
   	};		
   			 
   	$('#finxgamesForm').ajaxForm({ 
   	    url: '/common/loginheader/finxgames_infobox',
   	    dataType: 'text',
   	    success: function(data) {
   	        console.log(data);
   	        data = $.parseJSON(data);
   	        switch(data.status) {
   				case 'error':
   					toastr.error(data.error);
   					$('button[type=submit]').prop('disabled', false);
   					grecaptcha.reset(captcha_infobox);
   					break;
   				case 'success':
   					toastr.success(data.success);
   					setTimeout("redirect('/')", 1500);
   					break;
   			}
   		},
   	    beforeSubmit: function(arr, $form, options) {
   			$('button[type=submit]').prop('disabled', true);
   		}
   	});
   	
   	$('#finxgames_signup_form').ajaxForm({ 
   	    url: '/common/loginheader/ajax',
   	    dataType: 'text',
   	    success: function(data) {
   			console.log(data);
   			data = $.parseJSON(data);
   			switch(data.status) {
   				case 'error':
   					toastr.error(data.error);
   					grecaptcha.reset(captcha_register);
   					$('button[type=submit]').prop('disabled', false);
   					break;
   				case 'success':
   					toastr.success(data.success);
   					if(data.user_activate){
   						setTimeout("redirect('/account/login/complete')", 1500);
   					}else{
   						setTimeout("redirect('/')", 1500);
   					}
   					break;
   			}
   		},
   		beforeSubmit: function(arr, $form, options) {
   			$('button[type=submit]').prop('disabled', true);
   		}
   	});
</script>
<!-------------------------------------------------------------------------------------------->
<script src="/ru/login/cookie.js"></script>
<script src="//vk.com/js/api/openapi.js" type="text/javascript"></script>
<!-------------------------------------------------------------------------------------------->
<script>
   VK.init({
       apiId: <?php echo $vk_id ?>
   });
   
   function authInfo(response) {
       if(response.session) {
           $.ajax({ 
               url: "/account/login/vk",
               type: "POST",
               data: {auth: true, response: response},
               success: function (data) {
   				console.log(data);
   				data = $.parseJSON(data);
   				switch(data.status) {
   					case 'auth_error':                        
   					toastr.error(data.auth_error);                           
   					break;
   					case 'success':
   					toastr.info(data.success);
   					setTimeout("redirect('/')", 1500);
   					break;
   				}
               }
           });
       }
   }
</script>
<!-------------------------------------------------------------------------------------------->
<!--<script>
document.oncontextmenu = cmenu; function cmenu() { return false; }
</script>
<script type="text/javascript" id="cookieinfo"
    src="//cookieinfoscript.com/js/cookieinfo.min.js"
    data-bg="#645862"
    data-fg="#FFFFFF"
    data-link="#F1D600"
    data-message="При использовании сайта 24HoursHost Вы соглашаетесь с нашей политикой файлов cookie!"
    data-moreinfo="/ru/privacy.html"
    data-linkmsg="Соглашение"
    data-close-text="Я понял!">
</script> -->
<!-------------------------------------------------------------------------------------------->
<!--	<style>
		 .modal-header{
			border-bottom: 1px solid #526aca !important;
		}
		.modal-footer{
			border-top: 1px solid #526aca !important;
			justify-content: center;
		}
	</style>
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<audio src="assets/sms.mp3" autoplay></audio>
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">24HoursHost - Обратите внимание</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<center>
						<p style="text-align: center;"><img alt="Logo" src="/ru/img/exclamation.png" class="h-65px" /></p>
						<p>У Нас вам стоит подтвердить вашу <b>Email почту</b>.</p>
						<p>Это требуется для Антиспама.</p> <p>Подтвердите ваш Email и можете заказать сервер!</p>
					</center>
					</div>
				</div>
			</div>
		</div>

<script>
            $('#exampleModalCenter').modal({
                keyboard: true,
                show: true
            })
</script>-->
<!-------------------------------------------------------------------------------------------->
<?php echo $loginfooter ?>
<?php if(isset($error)): ?><script>toastr.error('<?php echo $error ?>');</script><?php endif; ?> 
<?php if(isset($warning)): ?><script>toastr.warning('<?php echo $warning ?>');</script><?php endif; ?> 
<?php if(isset($success)): ?><script>toastr.success('<?php echo $success ?>');</script><?php endif; ?>