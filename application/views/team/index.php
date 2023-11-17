<title>Контакты</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
   <div class="d-flex flex-column-fluid">
      <div class="container">
         <div class="row">
            <?php foreach($users as $item): ?>
            <? if (!($item['user_access_level'] == 3)) {
               continue;
               }?>
					<div class="card" style="width: 22rem;  border-radius: 7%;  margin: 10px;">
					  <br>
						<center>
							<div class="symbol symbol-100 flex-shrink-0 mr-3">
							   <img alt="Pic" class="rounded-circle" alt="Circular Image" src="<?php echo $url ?><?if($item['user_img']) {echo $item['user_img'];}else{ echo '/application/public/img/user.png';}?>">
							</div>
						</center>
					  <div class="card-body">
						<center>
						<h5 class="card-title"> <a href="#" class="text-dark text-hover-primary font-weight-bolder font-size-lg"><?php echo $item['user_firstname'] ?> <?php echo $item['user_lastname'] ?></a>
						<span class="card-icon">
						<a href="javascript:;" style="color: #3ba0f7;" class="btn-light-primary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Главный Администратор">
						<i style="color: #3ba0f7;" class="fa fa-check success"></i>
						</a>
						</span>
						</h5>
						<br>
							<a href="/tickets/create" class="btn btn-outline-primary" role="button" aria-pressed="true">Сообщение</a>
						</center>
					  </div>
					</div>
            <?php endforeach; ?>
			<?php foreach($users as $item): ?>
            <? if (!($item['user_access_level'] == 5)) {
               continue;
               }?>
					<div class="card" style="width: 22rem;  border-radius: 7%;  margin: 10px;">
					  <br>
						<center>
							<div class="symbol symbol-100 flex-shrink-0 mr-3">
							   <img alt="Pic" class="rounded-circle" alt="Circular Image" src="<?php echo $url ?><?if($item['user_img']) {echo $item['user_img'];}else{ echo '/application/public/img/user.png';}?>">
							</div>
						</center>
					  <div class="card-body">
						<center>
						<h5 class="card-title"> <a href="#" class="text-dark text-hover-primary font-weight-bolder font-size-lg"><?php echo $item['user_firstname'] ?> <?php echo $item['user_lastname'] ?></a> <i class='fa fa-check success' title='Официальный Администратор' style="color: #3ba0f7;"> </i></h5>
						    <a href="/tickets/create" class="btn btn-outline-primary" role="button" aria-pressed="true">Сообщение</a>
						</center>
					  </div>
					</div>
            <?php endforeach; ?>
			<?php foreach($users as $item): ?>
            <? if (!($item['user_access_level'] == 4)) {
               continue;
               }?>
					<div class="card" style="width: 22rem;  border-radius: 7%;  margin: 10px;">
					  <br>
						<center>
							<div class="symbol symbol-100 flex-shrink-0 mr-3">
							   <img alt="Pic" class="rounded-circle" alt="Circular Image" src="<?php echo $url ?><?if($item['user_img']) {echo $item['user_img'];}else{ echo '/application/public/img/user.png';}?>">
							</div>
						</center>
					  <div class="card-body">
						<center>
						<h5 class="card-title"> <a href="#" class="text-dark text-hover-primary font-weight-bolder font-size-lg"><?php echo $item['user_firstname'] ?> <?php echo $item['user_lastname'] ?></a> <i class='fa fa-check success' title='Официальный Администратор' style="color: #3ba0f7;"> </i></h5>
						    <a href="/tickets/create" class="btn btn-outline-primary" role="button" aria-pressed="true">Сообщение</a>
						</center>
					  </div>
					</div>
            <?php endforeach; ?>
			<?php foreach($users as $item): ?>
            <? if (!($item['user_access_level'] == 2)) {
               continue;
               }?>
					<div class="card" style="width: 22rem;  border-radius: 7%;  margin: 10px;">
					  <br>
						<center>
							<div class="symbol symbol-100 flex-shrink-0 mr-3">
							   <img alt="Pic" class="rounded-circle" alt="Circular Image" src="<?php echo $url ?><?if($item['user_img']) {echo $item['user_img'];}else{ echo '/application/public/img/user.png';}?>">
							</div>
						</center>
					  <div class="card-body">
						<center>
						<h5 class="card-title"> <a href="#" class="text-dark text-hover-primary font-weight-bolder font-size-lg"><?php echo $item['user_firstname'] ?> <?php echo $item['user_lastname'] ?></a> <i class='fa fa-check success' title='Официальный Администратор' style="color: #3ba0f7;"> </i></h5>
						<a href="/tickets/create" class="btn btn-outline-primary" role="button" aria-pressed="true">Сообщение</a>
						</center>
					  </div>
					</div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</div>
<?php echo $footer ?>