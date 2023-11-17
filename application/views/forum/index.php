<title>Форум</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
   <div class="d-flex flex-column-fluid">
      <div class="container">
         <div class="row">
     		<div class="col-lg-10 col-xl-12 mb-2">
               <div class="timeline timeline-justified timeline-4">
                  <div class="timeline-items">
				    <div class="col-lg-10 col-xl-12 mb-2">
					  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
						<div class="d-flex w-100 justify-content-between">
						  <h5 class="mb-1">24HoursHost </h5>
						  <small>FORUM</small>
						</div>
					  </a>
                     <?php foreach($forum as $item): ?> 
					  <a href="/forum/view/index/<?echo $item['forum_id']?>" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
						  <h5 class="mb-1"><?php echo $item['forum_title'] ?></h5>
						  <small class="text-muted"><?php echo date("d.m.Y в H:i", strtotime($item['forum_date_add'])) ?></small>
						</div>
						<small class="text-muted">Перейти к чтению статьи.</small>
					  </a>
                     <?php endforeach; ?>
					 <?php if(empty($forum)): ?>
                     <a href="https://vk.com/public<?php echo $public ?>" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
						  <h5 class="mb-1">Хостинг игровых серверов</h5>
						  <small class="text-muted"><?php echo date("d.m.Y в H:i", strtotime($item['forum_date_add'])) ?></small>
						</div>
						<p class="mb-1">К сожалению, на данный момент на хостинге нет статей</p>
						<small class="text-muted">Смотреть новости в сообществе VK.</small>
					  </a>
                     <?php endif; ?>
					 </div>
                  </div>
               </div>
               <?php echo $pagination ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php echo $footer ?>