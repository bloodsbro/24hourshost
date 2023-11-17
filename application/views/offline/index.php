<!DOCTYPE html>
<html lang="ru">

    <head>
        <meta charset="utf-8" />
        <title>24HoursHost - Timeout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="24HoursHost - Timeout" />
        <meta content="Shreethemes" name="author" />

        <link rel="shortcut icon" href="/ru/favicon.ico">
        <link href="/ru/404/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/ru/404/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
        <link href="/ru/404/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="/ru/404/css/colors/default.css" rel="stylesheet" id="color-opt">
    </head>

    <body>

        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <div>
                    <a class="logo" href="/">
                        <img src="/ru/404/logo-finxgames-dark.png" height="95" alt="">
                    </a>
                </div>                 
                <div class="buy-button">
                    <a href="https://24hours.host/" class="text-dark h6 mr-3 login-dark" data-toggle="modal" data-target="#LoginForm">Главная</a>
                    <a href="https://cp.24hours.host/" target="_blank" class="btn btn-primary">Панель Управления</a>
                </div>
                <div class="menu-extras">
                    <div class="menu-item">
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <section class="bg-home d-flex align-items-center" style="background: url('/ru/404/email.png') top center; height: auto;" id="home">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-19 mt-0 mt-md-5 pt-0 pt-md-5">
                        <div class="title-heading text-center margin-top-100">
                            <h4 class="heading mb-3">Технический Перерыв.</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Комментарий: <?php echo $result ?></p>
                        
                            <div class="watch-video mt-4 pt-2">
                                <a href="/" class="btn btn-primary mb-2 mr-2">Домой</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>

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
  if ((event.ctrlKey && key == 'U'.charCodeAt(0)) || (event.ctrlKey && key == 'A'.charCodeAt(0)) || (event.ctrlKey && key == 'S'.charCodeAt(0)))  // 'A'.charCodeAt(0) можно заменить на 65
  { removeSelection();
  if (event.preventDefault) event.preventDefault();
  else event.returnValue = false;}}
  addHandler(element, 'keydown', killCtrlA);
  addHandler(element, 'keyup', killCtrlA);
}
preventSelection(document);
</script>