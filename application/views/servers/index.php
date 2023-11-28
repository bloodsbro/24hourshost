 <title>Мои Сервера</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="row">
				<?php foreach($servers as $item): ?>
				<div class="col-lg-6 mb-10">
				<div class="card card-custom wave wave-animate-slow mb-2 bg-dark-<?php if($item['server_status'] == 0): ?>warning
						<?php elseif($item['server_status'] == 1): ?>danger
						<?php elseif($item['server_status'] == 2): ?>success
						<?php elseif($item['server_status'] == 3): ?>primary
						<?php elseif($item['server_status'] == 4 || $item['server_status'] == 5 || $item['server_status'] == 6 || $item['server_status'] == 7): ?>info
						<?php endif; ?>">
						<div class="card-body">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title"><?php echo $item['game_name'] ?></h5>
							<button type="button" class="close o1" data-dismiss="modal" aria-label="ServerID">
							  <?php if($item['server_status'] == 2): ?><span class="badge badge-success" style="font-size: 10px">Включен</span>
							  <?php elseif($item['server_status'] == 1): ?> <span class="badge badge-danger" style="font-size: 10px">Выключен</span>
							  <?php elseif($item['server_status'] == 0): ?><span class="badge badge-warning" style="font-size: 10px">Заблокирован</span>
							  <?php elseif($item['server_status'] == 3): ?><span class="badge badge-primary" style="font-size: 10px">Устанавливается</span>
							  <?php elseif($item['server_status'] == 4 || $item['server_status'] == 5 || $item['server_status'] == 6 || $item['server_status'] == 7): ?><span class="badge badge-primary" style="font-size: 10px">Переустановка</span> <?php endif; ?>
							</button>
						  </div>
                            <div class="modal-body">
                                <p  style="font-size: 17px">IP: <?php echo $item['location_ip2'] ?>:<?php echo $item['server_port'] ?> <small class="text-muted font-size-sm">ID <?php echo $item['server_id'] ?></small></p>
                            </div>
						  <div class="modal-footer">
                              <p style="display: flex; flex: auto;">
                                  <?php if($item['game_code'] == "mine" || $item['game_code'] == "mcpe"): ?>
                                      <?php foreach($cores[$item['game_code']] as $_item): ?>
                                          <?php if($_item['corepath'] == $item['server_binary']): ?>
                                              <?php echo $_item['text_name'] ?>
                                          <?php endif; ?>
                                      <?php endforeach; ?>
                                  <?php endif; ?>
                                  <?php if($item['game_code'] == "cs" || $item['game_code'] == "samp" || $item['game_code'] == 'crmp'): ?>
                                      <?php foreach($builds[$item['game_code']] as $k => $_item): ?>
                                          <?php if($k == $item['server_binary']): ?>
                                              <?php echo $_item['text_name'] ?>
                                          <?php endif; ?>
                                      <?php endforeach; ?>
                                  <?php endif; ?>
                              </p>
									<div class="ml-6 ml-lg-0 ml-xxl-6 flex-shrink-0">
									<?php if($item['server_status'] == 1): ?>
									<a href="javascript:;" onClick="sendAction(<?php echo $item['server_id'] ?>,'start')" class="btn btn-icon btn-success" data-toggle="tooltip" title="Запустить">
									<i class="fa fa-power-off"></i>
									</a>
									<a href="javascript:;" class="btn btn-icon btn-light" data-toggle="tooltip" title="Сервер должен быть включен!">
									<i class="fa fa-redo"></i>
									</a>
									<?php elseif($item['server_status'] == 2): ?>
									<a href="javascript:;" onClick="sendAction(<?php echo $item['server_id'] ?>,'stop')" class="btn btn-icon btn-danger" data-toggle="tooltip" title="Остановить">
									<i class="fa fa-power-off"></i>
									</a>
									<a href="javascript:;" onClick="sendAction(<?php echo $item['server_id'] ?>,'restart')" class="btn btn-icon btn-warning" data-toggle="tooltip" title="Перезапустить">
									<i class="fa fa-redo"></i>
									</a>
									<?php elseif($item['server_status'] == 0 || $item['server_status'] == 3 || $item['server_status'] == 4 || $item['server_status'] == 5 || $item['server_status'] == 6 || $item['server_status'] == 7): ?>
									<a href="javascript:;" class="btn btn-icon btn-light" data-toggle="tooltip" title="Вы не можете использовать это действие!">
									<i class="fa fa-power-off"></i>
									</a>
									<a href="javascript:;" class="btn btn-icon btn-light" data-toggle="tooltip" title="Вы не можете использовать это действие!">
									<i class="fa fa-redo"></i>
									</a>
									<?php endif; ?> 
									<a href="/servers/control/index/<?php echo $item['server_id'] ?>" class="btn btn-icon btn-primary" data-toggle="tooltip" title="Перейти">
									<i class="fa fa-sign-in-alt"></i>
									</a>
								</div>
						  </div>
						</div>
					  </div>
				</div>
				</div>
				<?php endforeach; ?>
				<?php foreach($serversOwners as $item): ?>
				<div class="col-lg-6 mb-10">
				<div class="card card-custom wave wave-animate-slow mb-2 bg-dark-<?php if($item['server_status'] == 0): ?>warning
						<?php elseif($item['server_status'] == 1): ?>danger
						<?php elseif($item['server_status'] == 2): ?>success
						<?php elseif($item['server_status'] == 3): ?>primary
						<?php elseif($item['server_status'] == 4 || $item['server_status'] == 5 || $item['server_status'] == 6 || $item['server_status'] == 7): ?>info
						<?php endif; ?>">
						<div class="card-body">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title"><?php echo $item['game_name'] ?></h5>
							<button type="button" class="close o1" data-dismiss="modal" aria-label="ServerID">
							  <?php if($item['server_status'] == 2): ?><span class="badge badge-success" style="font-size: 10px">Включен</span>
							  <?php elseif($item['server_status'] == 1): ?> <span class="badge badge-danger" style="font-size: 10px">Выключен</span>
							  <?php elseif($item['server_status'] == 0): ?><span class="badge badge-warning" style="font-size: 10px">Заблокирован</span>
							  <?php elseif($item['server_status'] == 3): ?><span class="badge badge-primary" style="font-size: 10px">Устанавливается</span>
							  <?php elseif($item['server_status'] == 4 || $item['server_status'] == 5 || $item['server_status'] == 6 || $item['server_status'] == 7): ?><span class="badge badge-primary" style="font-size: 10px">Переустановка</span> <?php endif; ?>
							</button>
						  </div>
						  <div class="modal-body">
						  <p  style="font-size: 17px">IP: <?php echo $item['location_ip2'] ?>:<?php echo $item['server_port'] ?> <small class="text-muted font-size-sm">ID-<?php echo $item['server_id'] ?></small></p>
						  </div>
						  <div class="modal-footer">
									<div class="ml-6 ml-lg-0 ml-xxl-6 flex-shrink-0">
									<?php if($item['server_status'] == 1): ?>
									<a href="javascript:;" onClick="sendAction(<?php echo $item['server_id'] ?>,'start')" class="btn btn-icon btn-success" data-toggle="tooltip" title="Запустить">
									<i class="fa fa-power-off"></i>
									</a>
									<a href="javascript:;" class="btn btn-icon btn-light" data-toggle="tooltip" title="Сервер должен быть включен!">
									<i class="fa fa-redo"></i>
									</a>
									<?php elseif($item['server_status'] == 2): ?>
									<a href="javascript:;" onClick="sendAction(<?php echo $item['server_id'] ?>,'stop')" class="btn btn-icon btn-danger" data-toggle="tooltip" title="Остановить">
									<i class="fa fa-power-off"></i>
									</a>
									<a href="javascript:;" onClick="sendAction(<?php echo $item['server_id'] ?>,'restart')" class="btn btn-icon btn-info" data-toggle="tooltip" title="Перезапустить">
									<i class="fa fa-redo"></i>
									</a>
									<?php elseif($item['server_status'] == 0 || $item['server_status'] == 3 || $item['server_status'] == 4 || $item['server_status'] == 5 || $item['server_status'] == 6 || $item['server_status'] == 7): ?>
									<a href="javascript:;" class="btn btn-icon btn-light" data-toggle="tooltip" title="Вы не можете использовать это действие!">
									<i class="fa fa-power-off"></i>
									</a>
									<a href="javascript:;" class="btn btn-icon btn-light" data-toggle="tooltip" title="Вы не можете использовать это действие!">
									<i class="fa fa-redo"></i>
									</a>
									<?php endif; ?> 
									<a href="/servers/control/index/<?php echo $item['server_id'] ?>" class="btn btn-icon btn-primary" data-toggle="tooltip" title="Перейти">
									<i class="fa fa-sign-in-alt"></i>
									</a>
								</div>
						  </div>
						</div>
					  </div>
				</div>
				</div>
				<?php endforeach; ?>
				<?php if(empty($servers) and empty($serversOwners)): ?>
				<div class="col-xl-12 col-xxl-12">
					<div class="alert alert-custom alert-light-primary fade show mb-4" role="alert">
						<div class="alert-icon">
							<i class="flaticon-exclamation"></i>
						</div>
						<div class="alert-text">На данный момент у вас нет игровых серверов.</div>
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
			<?php echo $pagination ?>
		</div>
	</div>
</div>
<script>
	function sendAction(serverid, action) {
		$.ajax({ 
			url: '/servers/index/action/'+serverid+'/'+action,
			dataType: 'text',
			success: function(data) {
				data = $.parseJSON(data);
				switch(data.status) {
					case 'error':
						toastr.error(data.error);
						break;
					case 'success':
						toastr.success(data.success);
						setTimeout("reload()", 1500);
						break;
				}
			},
			beforeSend: function(arr, options) {
				toastr.warning("Ваш запрос обрабатывается, пожалуйста, подождите...");                                    
			}
		});
	}
	
	function sendActionp(serverid, action) {
		$.ajax({ 
			url: '/serversp/index/action/'+serverid+'/'+action,
			dataType: 'text',
			success: function(data) {
				data = $.parseJSON(data);
				switch(data.status) {
					case 'error':
						toastr.error(data.error);
						break;
					case 'success':
						toastr.success(data.success);
						setTimeout("reload()", 1500);
						break;
				}
			},
			beforeSend: function(arr, options) {
				toastr.warning("Ваш запрос обрабатывается, пожалуйста, подождите...");                                    
			}
		});
	}
	
	function sendActionf(serverid, action) {
		$.ajax({ 
			url: '/serversf/index/action/'+serverid+'/'+action,
			dataType: 'text',
			success: function(data) {
				data = $.parseJSON(data);
				switch(data.status) {
					case 'error':
						toastr.error(data.error);
						break;
					case 'success':
						toastr.success(data.success);
						setTimeout("reload()", 1500);
						break;
				}
			},
			beforeSend: function(arr, options) {
				toastr.warning("Ваш запрос обрабатывается, пожалуйста, подождите...");                                    
			}
		});
	}
</script>
<?php echo $footer ?>