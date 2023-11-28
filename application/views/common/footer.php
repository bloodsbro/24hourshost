<?php	
	$start_array = explode(" ",$requestTime);
	
	$requestTime = $start_array[1] + $start_array[0];
?>
<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
	<div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
		<div class="text-dark order-2 order-md-1">
					 <a href="" target="_blank" class="text-dark-50 text-hover-primary"></a>
            <span class="text-muted font-weight-bold mr-2"> © <script>document.write(new Date().getFullYear());</script> 24Hours.Host - All Rights Reserved</span>
        </div>
		<div class="nav nav-dark order-1 order-md-2">
			<a href="https://24hours.host/oferta" target="_blank" class="nav-link px-3">Конфиденциальность</a>
			<a href="https://24hours.host/privacy" target="_blank" class="nav-link px-3">Условия Использования</a>
		</div>
		
	</div>
	<div>
		<center>
            Made with ❤️<br />
            Серверное время: <span id="servertime"></span>
			<a class="nav-link px-3">
				<?php
				$end_time = microtime();
				$end_array = explode(" ",$end_time);
				$end_time = $end_array[1] + $end_array[0];
				$time = $end_time - $requestTime;
				printf("Страница загружена за %f секунд",$time);
				?>
			</a>
		</center>
	</div>
</div>
<div id="vk_api_transport"></div>

<script type="text/javascript">
	function getDate()
	{
		var d = new Date();
		var utc = d.getTime() + (d.getTimezoneOffset() * 60000);
		var nd = new Date(utc + (3600000*3));
		document.getElementById('servertime').innerHTML = nd.toLocaleTimeString();
	}
	setInterval(getDate, 1000);
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
<script>
    setTimeout(function() {
        var el = document.createElement("script");
        el.type = "text/javascript";
        el.src = "https://vk.com/js/api/openapi.js?169";
        el.async = true;
        document.getElementById("vk_api_transport").appendChild(el);
    }, 0);

    window.vkAsyncInit = function() {
        VK.init({
            apiId: <?php echo $vk_id ?>
        });
    };
</script>