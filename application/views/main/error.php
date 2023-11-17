<!DOCTYPE html>
<html lang="ru">

    <head>
        <meta charset="utf-8" />
        <title>24HoursHost - 404</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="24HoursHost Игровой хостинг провайдер, с мощной защитой от DDoS Атак, по оптимальным ценам, профессиональная техподдержка." />
        <meta name="keywords" content="Аренда серверов, игровой хостинг, аренда игровых серверов, игровой сервер с защитой от DDoS, хостинг samp, хостинг crmp, автоустановка samp, хостинг mta, хостинг MineCraft, бесплатный хостинг, bighost, doome.org, swag-host, gg-host, хостинг GTA 5, advens.ru, advens-rp, radmir-rp, Хостинг дешёвый, crmp, samp, mta, gta5, HOSTING, хостинг игровыйх серверов, crmp хостинг, samp хостинг, mta хостинг, minecraft хостинг, ragemp хостинг, лучший игровой хостинг, дешевый, стабильный, надежный, качественный, порт, fastdl, бесплатный хостинг самп, бесплатный хостинг крмп, бесплатный хостинг samp, бесплатный хостинг crmp, бесплатный хостинг, бесплатный игровой хостинг, дешевый игровой хостинг, бюджетный хостинг самп, бесплатный хостинг игровых серверов, хостинг серверов самп, хостинг самп, хостинг крмп, хостинг самп бесплатно, free hosting samp, бесплатный хостинг с автоустановкой, бесплатный хостинг игр, хостинг для сервера, samp, crmp, advens, myarena, gta24, dragonhost, 24HoursHost" />
        <meta content="Shreethemes" name="author" />
        <link rel="shortcut icon" href="/ru/favicon.ico">
        <link href="/ru/404/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/ru/404/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
        <link href="/ru/404/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="/ru/404/css/colors/default.css" rel="stylesheet" id="color-opt">

    </head>

    <body>
        <div class="back-to-home rounded d-none d-sm-block">
            <a href="/" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
        </div>
        <section class="bg-home d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="text-center">
                            <img src="/ru/404/404.png" class="img-fluid" alt="">

                            <div class="mt-5">
                                <h3>Упс... Что-то пошло не так.</h3>
                                <p class="text-muted para-desc mx-auto"><?php echo $error ?></p>

                                <a href="/" class="btn btn-soft-primary mt-2">Домой</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="/ru/404/js/jquery.min.js"></script>
        <script src="/ru/404/js/bootstrap.bundle.min.js"></script>
        <script src="/ru/404/js/jquery.easing.min.js"></script>
        <script src="/ru/404/js/scrollspy.min.js"></script>
        <script src="/ru/404/js/jquery.magnific-popup.min.js"></script>
        <script src="/ru/404/js/magnific.init.js"></script>
        <script src="/ru/404/js/owl.carousel.min.js "></script>
        <script src="/ru/404/js/owl.init.js "></script>
        <script src="/ru/404/js/feather.min.js"></script>
        <script src="/ru/404/js/app.js"></script>
        
    </body>
</html>
<script type="text/javascript">
document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}
</script>
<script>
document.oncontextmenu = cmenu; function cmenu() { return false; }
</script>
<script>
function preventSelection(element){
  var preventSelection = false;
  function addHandler(element, event, handler){
  if (element.attachEvent) element.attachEvent('on' + event, handler);
  else if (element.addEventListener) element.addEventListener(event, handler, false);  }
  function removeSelection(){
  if (window.getSelection) { window.getSelection().removeAllRanges(); }
  else if (document.selection && document.selection.clear)
  document.selection.clear();
  }

  addHandler(element, 'mousemove', function(){ if(preventSelection) removeSelection(); });
  addHandler(element, 'mousedown', function(event){ var event = event || window.event; var sender = event.target || event.srcElement; preventSelection = !sender.tagName.match(/INPUT|TEXTAREA/i) ;});

  function killCtrlA(event){
  var event = event || window.event;
  var sender = event.target || event.srcElement;
  if (sender.tagName.match(/INPUT|TEXTAREA/i)) return;
  var key = event.keyCode || event.which;
  if ((event.ctrlKey && key == 'U'.charCodeAt(0)) || (event.ctrlKey && key == 'A'.charCodeAt(0)) || (event.ctrlKey && key == 'S'.charCodeAt(0)))
  { removeSelection();
  if (event.preventDefault) event.preventDefault();
  else event.returnValue = false;}}
  addHandler(element, 'keydown', killCtrlA);
  addHandler(element, 'keyup', killCtrlA);
}
preventSelection(document);
</script>
<script>
	toastr.options = {
	"closeButton": true,
	"debug": false,
	"newestOnTop": false,
	"progressBar": true,
	"positionClass": "toast-top-right",
	"preventDuplicates": false,
	"onclick": null,
	"showDuration": "300",
	"hideDuration": "1000",
	"timeOut": "3500",
	"extendedTimeOut": "3000",
	"showEasing": "swing",
	"hideEasing": "linear",
	"showMethod": "fadeIn",
	"hideMethod": "fadeOut"   
	};
</script>
<script type="text/javascript">
	$(document).ready(
		function get() {
			setTimeout(getstatus('online'), 105000);
			setTimeout(get, 35000);
		}
	);
	function getstatus(action) {
		$.ajax({ 
			url: '/common/footer/getstatus/'+action,
			dataType: 'text',
			success: function(data) {
				data = $.parseJSON(data);
				switch(data.status) {
					case 'error':
						toastr.error(data.error);
						$('#controlBtns button').prop('disabled', false);
						break;
					case 'online':
						console.info(data.online); 
						$("#online").html(data.online_usr)
						break
				}
			},
		});
	}
</script>