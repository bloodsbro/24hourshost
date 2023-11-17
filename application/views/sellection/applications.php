<title>Магазин</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin: 1px 0;">
   <div class="col-lg-2 col-xl-12 mb-2">
		<span class="d-block p-1 bg-primary text-white"><marquee>Ваша реклама!</marquee></span>
		<div class="card text-center">
			<div class="card-header"> Обратите пожалуйста внимание!</div>
			<div class="card-body">
					<p>В Пополнение магазина нет точного графика, товары могут дополниться в любой момент!</p>
					<p>Мы вышлем вам письмо на почту если будет что то новое.</p>
				<a href="/tickets/create" class="btn btn-primary">Поддержка</a>
			</div>
			<div class="card-footer text-muted">
				Обновление было 14.01.2021 11:05
			</div>
		</div>
	</div>
   <div class="col-lg-10 col-xl-12 mb-2">
		<div id="24HoursHostForum">
		  <div class="card">
			<div class="card-header" id="24HoursHostForum">
			  <h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseForum" aria-expanded="false" aria-controls="collapseForum">
				  Форум: Откройте что-бы воспользоваться нашим форумом!
				</button>
			  </h5>
			</div>
			<div id="collapseForum" class="collapse" aria-labelledby="24HoursHostForum" data-parent="#FinxGamesForum">
			  <div class="card-body">
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin: 4px 0;">
						   <div class="timeline timeline-justified timeline-4">
								<div class="col-lg-10 col-xl-12 mb-2">
								  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
									<div class="d-flex w-100 justify-content-between">
									  <h5 class="mb-1">Информационный мини-форум </h5>
									  <small>Forum</small>
									</div>
								  </a>
								 <?php foreach($forum as $item): ?> 
								  <a href="/forum/view/index/<?echo $item['forum_id']?>" class="list-group-item list-group-item-action flex-column align-items-start">
									<div class="d-flex w-100 justify-content-between">
									  <h5 class="mb-1"><?php echo $item['forum_title'] ?></h5>
									  <small class="text-muted"><?php echo date("d.m.Y в H:i", strtotime($item['forum_date_add'])) ?></small>
									</div>
									<p class="mb-1">Перейдите к статье чтобы прочитать её.</p>
									<small class="text-muted">Перейти к статье.</small>
								  </a>
								 <?php endforeach; ?>
								 </div>
						   </div>
					</div> 
					</div>
			  </div>
			</div>
		  </div>
		</div>
		</div>
	</div>
</div>
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
<script>
var banner = $("#banner-message-text")
banner.val(parseInt(Math.random()*18546876546));
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
<?php echo $footer ?>
