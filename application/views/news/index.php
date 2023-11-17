 <title>Новости</title>
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
						  <small>НОВОСТИ</small>
						</div>
					  </a>
                     <?php foreach($news as $item): ?> 
					  <a href="/news/view/index/<?echo $item['news_id']?>" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
						  <h5 class="mb-1"><?php echo $item['news_title'] ?></h5>
						  <small class="text-muted"><?php echo date("d.m.Y в H:i", strtotime($item['news_date_add'])) ?></small>
						</div>
						<p class="mb-1"><?php echo $item['news_text'] ?></p>
						<small class="text-muted">Перейти к новостям.</small>
					  </a>
                     <?php endforeach; ?>
					 <?php if(empty($news)): ?>
                     <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
						  <h5 class="mb-1">Ваш хостинг провайдер</h5>
						  <small class="text-muted"><?php echo date("d.m.Y в H:i", strtotime($item['news_date_add'])) ?></small>
						</div>
						<p class="mb-1">К сожалению, на данный момент на хостинге нет новостей</p>
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