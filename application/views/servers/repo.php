<?php

?>
<?php echo $header?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<?php include 'application/views/common/menuserver.php';?>
				</div>
				<?php foreach($repos as $item):?>
				<?php if($server['game_id'] == $item['game_id']): ?>
				<div class="col-lg-4 col-xl-4 mb-3">
				  <div class="card card-custom wave wave-animate-slow mb-1 mb-lg-0">
					  <div class="card-body">
						 <div class="kt-pricing-v1__header">
							<div class="kt-iconbox kt-iconbox--no-hover">
							<center>
								<a href="#" class="text-light text-hover-primary font-weight-bold font-size-h4 mb-3"><?php echo $item['repo_name']?></a>
							</center>
							<hr>
							<center>
							   <div class="m-card-profile__pic">
									<div class="m-card-profile__pic-wrapper">
										<img src="<?php echo $item['repo_img'] ?>" alt="" class="mw-100 w-200px">
									</div>
								</div>
							</center>
							   <br>
							   <div class="kt-pricing-v2__price-type"><i class="text-hover-primary font-weight-bold font-size-h4 flaticon-star mr-2"></i><?php echo $item['repo_textx']?></div>
							   <hr> 
									<?php if($item['repo_price'] > 0): ?>
								<?php foreach($userrepos as $repo):  ?>
								<? if($repo['repo_id'] == $item['repo_id']) $item['free_repo'] = 1; ?>
								<?php endforeach; ?>
								<? if($item['free_repo'] == 1): ?>
								<a href="<?echo $item['repo_url']?>" target="_blank" class="btn btn-light-primary btn-shadow-hover font-weight-bolder w-100 py-3" data-toggle="tooltip" data-placement="right"data-original-title="Файл куплен">Скачать файл</a>
								<? else: ?>
								<button type="submit" onClick="sendAction(<?php echo $server['server_id'] ?>,'<?echo $item['repo_id']?>')" class="btn btn-primary btn-shadow-hover font-weight-bolder w-100 py-3">Купить за <?php echo $item['repo_price']?> RUB.</button>
								<?php endif;?>
								<?php elseif($item['repo_price'] == 0): ?>
								<a href="<?echo $item['repo_url']?>" target="_blank" class="btn btn-primary btn-shadow-hover font-weight-bolder w-100 py-3">Скачать файл</a>
								<?php endif; ?>
							   <br>
							</div>
						 </div>
					  </div>
				   </div>
				</div>
				<?php endif; ?>   
				<?php endforeach; ?>
				<?php if(empty($repos)): ?>
				<div class="col-xl-12 col-xxl-12">
					<div class="alert alert-custom alert-light-primary fade show mb-4" role="alert">
						<div class="alert-icon">
							<i class="flaticon-exclamation"></i>
						</div>
						<div class="alert-text">На данный момент список пуст.</div>
						<div class="alert-close">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">
							<i class="ki ki-close"></i>
							</span>
							</button>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<script>	
	function sendAction(serverid, action) {	
		$.ajax({ 
			url: '/servers/repo/action/'+serverid+'/'+action,
			type: 'POST',
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
			beforeSend: function(arr, options) {
				$('button[type=submit]').prop('disabled', true);
			}
		});  
	}
</script>
<?php echo $footer ?>