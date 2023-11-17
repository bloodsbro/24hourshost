 <title>Мониторинг Локаций</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
   <div class="d-flex flex-column-fluid">
      <div class="container">
		<div class="row">
            <div class="col-xl-4">
               <div class="card card-custom mb-3">
                  <div class="card-body p-0" style="position: relative;">
                     <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-primary mr-2">
                        <span class="symbol-label">
                        <i class="fa fa-users icon-xl text-primary"></i>
                        </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                           <span class="text-dark-75 font-weight-bolder font-size-h3"></i>
                               <?php echo count($users); ?></span>
                           <span class="text-muted font-weight-bold mt-2">Пользователей</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4">
               <div class="card card-custom mb-3">
                  <div class="card-body p-0" style="position: relative;">
                     <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-primary mr-2">
                        <span class="symbol-label">
                        <i class="fa fa-server icon-xl text-primary"></i>
                        </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                           <span class="text-dark-75 font-weight-bolder font-size-h3"></i>
						       <?php echo count($servers); ?></span>
                           <span class="text-muted font-weight-bold mt-2">Игровых серверов</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4">
               <div class="card card-custom mb-3">
                  <div class="card-body p-0" style="position: relative;">
                     <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-primary mr-2">
                        <span class="symbol-label">
                        <i class="fa fa-dice icon-xl text-primary"></i>
                        </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                           <span class="text-dark-75 font-weight-bolder font-size-h3"></i>
                               <?php echo count($games); ?></span>
                           <span class="text-muted font-weight-bold mt-2">Доступных игр</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <?php foreach($locations as $item): ?>
            <div class="col-xl-3 col-lg-6 mb-4">
			  <div class="bg-white rounded-lg p-5 shadow">
				<h2 class="h6 font-weight-bold text-center mb-4"><?php echo $item['location_name'] ?></h2>
				<center>
				<div class="col-11">
				 <span class="small text-gray">Данные обновлены в <?php echo date("H:i:00", strtotime($item['location_upd'])) ?></span>
				</div>
				</center>
				<hr>
				<!-- Progress bar 1 -->
				<div class="progress mx-auto" data-value='<?php echo (int)$item['location_ram'] ?>'>
				  <span class="progress-left">
								<span class="progress-bar border-primary"></span>
				  </span>
				  <span class="progress-right">
								<span class="progress-bar border-primary"></span>
				  </span>
				  <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
					<div class="h2 font-weight-bold"><?php echo (int)$item['location_ram'] ?><sup class="small">%</sup></div>
				  </div>
				</div>

				<div class="row text-center mt-4">
				  <div class="col-6 border-right">
					<div class="h4 font-weight-bold mb-0"><?php echo $item['location_cpu'] ?>%</div><span class="small text-gray">CPU</span>
				  </div>
				  <div class="col-6">
					<div class="h4 font-weight-bold mb-0"><?php echo (int)$item['location_hdd'] ?>%</div><span class="small text-gray">SSD</span>
				  </div>
				</div>
			  </div>
			</div>
            <?php endforeach; ?> 
         </div>
      </div>
   </div>
</div>
<!--<link href="/assets/finxgamesru-status-cpu.css" rel="stylesheet" type="text/css" />-->
<script src="/assets/finxgamesru-status-cpu.js"></script>
<?php echo $footer ?>