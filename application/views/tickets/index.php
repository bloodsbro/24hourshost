 <title>Служба Поддержки - 24HoursHost</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
   <div class="d-flex flex-column-fluid">
      <div class="container">
         <div class="row">
            <div class="col-xl-4 col-xxl-4 mb-4">
               <div class="card card-custom card-sticky">
                  <div class="card-body px-5">
				  	<center>
						<div class="symbol symbol-100 mr-50">
						<div class="symbol-label" style="background-image:url('<?php echo $url ?><?php echo $user_img ?>')"></div>
							<i class="symbol-badge bg-success"></i>
						</div>
					</center>
                     <div class="px-4 mt-4 mb-10">
                        <a href="/tickets/create" class="btn btn-block btn-primary font-weight-bold text-uppercase py-4 px-6 text-center">Написать</a>
                     </div>
                     <div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">
                        <div class="navi-item my-2">
                           <a href="/tickets" class="navi-link active">
                           <span class="navi-icon mr-4">
                           <i class="flaticon-computer icon-lg"></i>
                           </span>
                           <span class="navi-text font-weight-bolder font-size-lg">Мои запросы</span>
                           </a>
                        </div>
                        <div class="navi-item my-2">
                           <a href="/tickets/faq" class="navi-link">
                           <span class="navi-icon mr-4">
                           <i class="flaticon-book icon-lg"></i>
                           </span>
                           <span class="navi-text font-weight-bolder font-size-lg">База знаний</span>
                           </a>
                        </div>
						<hr>
						<div class="kt-portlet__separator"></div>
						<div class="kt-portlet__body">
							<script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href","//s.bookcdn.com//css/cl/bw-cl-180x170r3.css"); document.getElementsByTagName("head")[0].appendChild(css_file); </script> <div id="tw_13_1198214636"><div style="width:145px; height:50px; margin: 0 auto;"><a href="https://nochi.com/time/moscow-18171">Москва</a><br/></div></div> <script type="text/javascript"> function setWidgetData_1198214636(data){ if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = ''; var params = data.results[i]; objMainBlock = document.getElementById('tw_'+params.widget_type+'_'+params.widget_id); if(objMainBlock !== null) objMainBlock.innerHTML = params.html_code; } } } var clock_timer_1198214636 = -1; </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/time/info?ver=2&domid=589&type=13&id=1198214636&scode=124&city_id=18171&wlangid=20&mode=2&details=0&background=ffffff&color=000000&add_background=ffffff&add_color=000000&head_color=ffffff&border=0&transparent=0"></script>
						</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-8 col-xxl-8">
				<div class="alert alert-danger" role="alert">
					<div class="alert-text">Режим работы тех.поддержки с 09:00 до 18:00</div>
					<div class="alert-text">Ответ тех.поддержки от 10-ти минуты, до 3-ёх часов.</div>
				</div>
               <?php foreach($tickets as $item): ?>
               <div class="card card-custom mb-4">
                  <div class="card-header border-0" style="min-height: 0;padding-top: 0.5rem;padding-bottom: 0.5rem;">
                     <h3 class="card-title"><span class="card-icon">
                        <?php if($item['ticket_status'] == 0): ?>
                        <i class="fa fa-user-lock text-primary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Вопрос закрыт"></i>
                        <?php elseif($item['ticket_status'] == 1): ?>
                        <i class="fa fa-user-clock text-primary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Ваш вопрос рассматривают"></i>
                        <?php elseif($item['ticket_status'] == 2): ?>
                        <i class="fa fa-user text-primary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Ответ от администрации"></i>
                        <?php endif; ?>	
                        </span><?php echo $item['ticket_name'] ?><small class="text-muted font-size-sm ml-2"><?php echo date("d.m.Y в H:i", strtotime($item['ticket_date_add'])) ?></small>
                     </h3>
                     <div class="card-toolbar">
                        <a href="/tickets/view/index/<?php echo $item['ticket_id'] ?>" class="btn btn-icon btn-primary mr-2" style="height: 24px;" data-toggle="tooltip" data-placement="right" title="" data-original-title="Перейти" >
                        <i class="fa fa-sign-in-alt"></i>
                        </a>
                     </div>
                  </div>
               </div>
			   <br>
               <?php endforeach; ?>
               <?php if(empty($tickets)): ?>
               <div class="alert alert-custom alert-light-primary fade show mb-4" role="alert">
                  <div class="alert-icon">
                     <i class="flaticon-exclamation"></i>
                  </div>
                  <div class="alert-text">Система поддержки позволяет нам реагировать на ваши проблемы и вопросы как можно быстрее. Как только мы ответим на ваш тикет, вы будете уведомлены по электронной почте.</div>
                  <div class="alert-close">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">
                     <i class="ki ki-close"></i>
                     </span>
                     </button>
                  </div>
               </div>
               <?php endif; ?>
               <?php echo $pagination ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php echo $footer ?>