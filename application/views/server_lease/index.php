<?php

?>
 <title>Выбор модуля</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
   <div class="d-flex flex-column-fluid">
      <div class="container">
	  <div class="alert alert-white" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">
							<i class="ki ki-close"></i>
						</span>
					</button>
				  <h4 class="alert-heading">Сервер со своей конфигурацией.</h4>
				  <p>Это реально? Да, у нас всё реально! Вы можете заказать сервер со своими конфигурациями. <br> Мы настроим RAM - CPU - SSD по вашему желанию так-же подключим подходящее для вас оборудование. </p>
				  <hr>
				  <p class="mb-0">Для заказа/изменения сис-конфигураций обратитесь в службу поддержки выберите категорию тариф и сервис.</p>
		</div>
         <div class="row">	
		 <div class="col-lg-4 col-xl-4 mb-3">
               <div class="card card-custom mb-8 mb-lg-0" style=" border-radius: 0%">
			   <span class="badge badge-success" style=" border-radius: 0%">Общественные сервера</span>
                  <div class="card-body" style="background-image: url(https://image.freepik.com/free-photo/white-grey-wooden-wall-background-texture-of-bark-wood_38607-217.jpg);">
                    <div class="kt-pricing-v1__header">
                        <div class="kt-iconbox kt-iconbox--no-hover">
						<center>
                           <i class="fa fa-fire mr-2"  width="75" height="75"></i> <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">MODULE - 1 </a>
						</center>
						   <br>
                           <!--Введите своё название услуги-->
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Общий IP адрес</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Случайный порт</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Защита от DDoS [<b  class="text-primary">PowerFull</b>]</div>
						   <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>CR:MP - SA:MP - GTA5</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Minecraft - Multi Theft Auto</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Сounter Strike 1.6 - Source</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>CPU: от 1 Ядра</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>RAM: от 732 МБ</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>SSD: от 800 МБ</div>
                           <hr>
						   <center>
                           <div class="kt-pricing-v1__price" style="font-weight: 700; font-size: 2rem;">
                              от 27.50 <!--Введите свою стоимость услуги-->
                              <span class="kt-pricing-v1__price-currency">₽</span>
                           </div>
						   <br>
						   		<center>
									<a href="javascript:;" data-toggle="modal" data-target="#info-module1" class="btn btn-outline-primary" role="button" aria-pressed="true">Информация о тарифе</a>
								</center>
                           <br>
                           <div class="kt-pricing-v1__button">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#finx-games-order">
								  Перейти к заказу
								</button>
								<div class="modal fade" id="finx-games-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Обратите внимание! MODULE - 1 (S)</h5> 
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										В связи с большим количеством не добросовестных , а иной раз и открыто мошеннических активаций демонстрационных периодов услуг хостинга игровых серверов, для перепродажи. Администрация хостинга приостанавливает не контролируемый заказ и активацию игровых серверов с демонстрационным периодом. <br>  <br> <b> <b style="color: red;">*</b>Если Вы заинтересованы в игровом хостинге и вам необходим тест, то обратитесь в службу поддержки хостинга в личном кабинете.</b>
									  </div>
									  <div class="modal-footer">
										<a href="<?echo $url?>servers/order" class="btn btn-info btn-pill btn-widest btn-taller btn-bold"> Перейти к заказу </a>
									  </div>
									</div>
								  </div>
								</div>
                           </div>
						   </center>
                        </div>
                     </div>
                  </div>
				  <span class="badge badge-success" style=" border-radius: 0%"><br></span>
               </div>
            </div>
           <div class="col-lg-4 col-xl-4 mb-3">
               <div class="card card-custom  mb-8 mb-lg-0">
			   <span class="badge badge-danger" style=" border-radius: 0%">Выделенные сервера</span>
                  <div class="card-body" style="background-image: url(https://image.freepik.com/free-photo/white-grey-wooden-wall-background-texture-of-bark-wood_38607-217.jpg);">
                     <div class="kt-pricing-v1__header">
                        <div class="kt-iconbox kt-iconbox--no-hover">
						<center>
                           <i class="fa fa-rocket mr-2"  width="75" height="75"></i> <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">MODULE - 2 </a>
						</center>
						   <br>
                           <!--Введите своё название услуги-->
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Выделенная локация</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Выделенный порт 7777 - 8904</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Защита от DDoS [<b  class="text-primary">PowerFull v2</b>]</div>
						   <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>CR:MP - SA:MP GTA5</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Minecraft - Multi Theft Auto</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Сounter Strike 1.6 - Source</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>CPU: от 2 Ядра</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>RAM: от 4 GB</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>SSD: от 40 GB</div>
                           <hr>
						   <center>
                           <div class="kt-pricing-v1__price" style="font-weight: 700; font-size: 2rem;">
                              от 201.60 <!--Введите свою стоимость услуги-->
                              <span class="kt-pricing-v1__price-currency">₽</span>
                           </div>
						   <br>
						   		<center>
									<a href="javascript:;" data-toggle="modal" data-target="#info-module2" class="btn btn-outline-primary" role="button" aria-pressed="true">Информация о тарифе</a>
								</center>
                           <br>
                           <div class="kt-pricing-v1__button">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#finx-games-order-p">
								  Перейти к заказу
								</button>
								<div class="modal fade" id="finx-games-order-p" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Обратите внимание! MODULE - 2 (P)</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										В связи с большим количеством не добросовестных , а иной раз и открыто мошеннических активаций демонстрационных периодов услуг хостинга игровых серверов, для перепродажи. Администрация хостинга приостанавливает не контролируемый заказ и активацию игровых серверов с демонстрационным периодом. <br>  <br> <b><b style="color: red;">*</b>Если Вы заинтересованы в игровом хостинге и вам необходим тест, то обратитесь в службу поддержки хостинга в личном кабинете.</b>
									  </div>
									  <div class="modal-footer">
										<a href="<?echo $url?>serversp/order" class="btn btn-info btn-pill btn-widest btn-taller btn-bold"> Перейти к заказу </a>
									  </div>
									</div>
								  </div>
								</div>
                           </div>
						   </center>
                        </div>
                     </div>
                  </div>
				  <span class="badge badge-danger" style=" border-radius: 0%"><br></span>
               </div>
            </div>
			 <div class="col-lg-4 col-xl-4 mb-3">
               <div class="card card-custom mb-8 mb-lg-0">
				<span class="badge badge-primary" style=" border-radius: 0%">Бесплатные сервера</span>
                  <div class="card-body" style="background-image: url(https://image.freepik.com/free-photo/white-grey-wooden-wall-background-texture-of-bark-wood_38607-217.jpg);">
                     	<div class="kt-pricing-v1__header">
                        <div class="kt-iconbox kt-iconbox--no-hover">
						<center>
                           <i class="fa fa-magic mr-2"  width="75" height="75"></i> <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">MODULE - 3 </a>
						</center>
						   <br>
                           <!--Введите своё название услуги-->
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Общий IP адрес</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Случайный порт</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>Защита от DDoS [<b  class="text-primary">BASIC</b>]</div>
						   <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>CR:MP - SA:MP</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-danger"></i>Minecraft - Multi Theft Auto</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-danger"></i>Сounter Strike 1.6 - Source</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>CPU: от 45% до 50% от 1-Ядра</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>RAM: от 456 МБ</div>
                           <hr>
						   <div class="kt-pricing-v2__price-type"><i class="fas fa-check mr-2 text-primary"></i>SSD: от 150 МБ</div>
                           <hr>
						   <center>
                           <div class="kt-pricing-v1__price" style="font-weight: 700; font-size: 2rem;">
                              FREE <!--Введите свою стоимость услуги-->
                              <span class="kt-pricing-v1__price-currency">₽</span>
                           </div>
                           <br>
						   		<center>
									<a href="javascript:;" data-toggle="modal" data-target="#info-module3" class="btn btn-outline-primary" role="button" aria-pressed="true">Информация о тарифе</a>
								</center>
							<br>
                           <div class="kt-pricing-v1__button">
                              <a href="<?echo $url?>serversf/order" class="btn btn-info btn-pill btn-widest btn-taller btn-bold"> Перейти к заказу </a>
                           </div>
						   </center>
                        </div>
                     </div>
                  </div>
				  <span class="badge badge-primary" style=" border-radius: 0%"><br></span>
               </div>
            </div>
		</div>
      </div>
   </div>
</div>

							<div class="modal fade" id="info-module1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								 <div class="modal-dialog" role="document">
									<div class="modal-content">
									   <div class="modal-header">
										  <h5 class="modal-title" id="exampleModalLabel">Подробнее о тарифах в Module - 1</h5>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <i aria-hidden="true" class="ki ki-close"></i>
										  </button>
									   </div>
									   <div class="modal-body">
										<div style="font-size:18px">SAMP 0.3.7 R-2</div>
										<div style="font-size:14px">- CPU: 1 Ядро<br>
										- RAM: 732 МБ<br>
										- SSD: 300 МБ<br>
										 - От 50 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">CRMP 0.3e</div>
										<div style="font-size:14px">- CPU: 1 Ядро<br>
										- RAM: 732 МБ<br>
										- SSD: 300 МБ<br>
										 - От 50 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">CRMP 0.3.7</div>
										<div style="font-size:14px">- CPU: 1 Ядро<br>
										- RAM: 732<br>
										- SSD: 300 МБ<br>
										 - От 50 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">United Multiplayer</div>
										<div style="font-size:14px">- CPU: 1 Ядро<br>
										- RAM: 732 МБ<br>
										- SSD: 300 МБ<br>
										 - От 50 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">MTA:MP</div>
										<div style="font-size:14px">- CPU: 1 Ядро<br>
										- RAM: 732 МБ<br>
										- SSD: 1000 МБ<br>
										 - От 50 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">MineCraft: PE</div>
										<div style="font-size:14px">- CPU: 1 Ядро<br>
										- RAM: 732 МБ<br>
										- SSD: 750 МБ<br>
										 - От 15 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">MineCraft</div>
										<div style="font-size:14px">- CPU: 1 Ядро<br>
										- RAM: 732 МБ<br>
										- SSD: 1000 МБ<br>
										 - От 15 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">Counter-Strike: 1.6</div>
										<div style="font-size:14px">- CPU: 1 Ядро<br>
										- RAM: 732 МБ<br>
										- SSD: 1000 МБ<br>
										 - От 6 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">Counter-Strike: Source</div>
										<div style="font-size:14px">- CPU: 1 Ядро<br>
										- RAM: 732 МБ<br>
										- SSD: 1000 МБ<br>
										 - От 6 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">Counter-Strike: GO</div>
										<div style="font-size:14px">- CPU: 1 Ядро<br>
										- RAM: 732 МБ<br>
										- SSD: 1000 МБ<br>
										 - От 6 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">GTA V: RAGE MP</div>
										<div style="font-size:14px">- CPU: 1 Ядро<br>
										- RAM: 732 МБ<br>
										- SSD: 800 МБ<br>
										 - От 50 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <br>
										  <hr>
									   </div>
									</div>
								</div>
							</div>
							
							<div class="modal fade" id="info-module2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								 <div class="modal-dialog" role="document">
									<div class="modal-content">
									   <div class="modal-header">
										  <h5 class="modal-title" id="exampleModalLabel">Подробнее о тарифах в Module - 2</h5>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <i aria-hidden="true" class="ki ki-close"></i>
										  </button>
									   </div>
									   <div class="modal-body">
										<div style="font-size:18px">SAMP 0.3.7 R-2</div>
										<div style="font-size:14px">- CPU: 2 Ядра<br>
										- RAM: 4000 МБ<br>
										- SSD: 40000 МБ<br>
										 - От 1000 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">CRMP 0.3e</div>
										<div style="font-size:14px">- CPU: 2 Ядра<br>
										- RAM: 4000 МБ<br>
										- SSD: 40000 МБ<br>
										 - От 500 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">CRMP 0.3.7</div>
										<div style="font-size:14px">- CPU: 2 Ядра<br>
										- RAM: 4000<br>
										- SSD: 40000 МБ<br>
										 - От 500 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">United Multiplayer</div>
										<div style="font-size:14px">- CPU: 2 Ядра<br>
										- RAM: 4000 МБ<br>
										- SSD: 40000 МБ<br>
										 - От 500 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">MTA:MP</div>
										<div style="font-size:14px">- CPU: 2 Ядра<br>
										- RAM: 4000 МБ<br>
										- SSD: 40000 (ГБ)<br>
										 - От 1000 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">MineCraft: PE</div>
										<div style="font-size:14px">- CPU: 2 Ядра<br>
										- RAM: 4000 МБ<br>
										- SSD: 750 МБ<br>
										 - От 100 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">MineCraft</div>
										<div style="font-size:14px">- CPU: 2 Ядра<br>
										- RAM: 4000 МБ<br>
										- SSD: 40000 (ГБ)<br>
										 - От 100 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">Counter-Strike: 1.6</div>
										<div style="font-size:14px">- CPU: 2 Ядра<br>
										- RAM: 4000 МБ<br>
										- SSD: 40000 (ГБ)<br>
										 - От 32 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">Counter-Strike: Source</div>
										<div style="font-size:14px">- CPU: 2 Ядра<br>
										- RAM: 4000 МБ<br>
										- SSD: 40000 (ГБ)<br>
										 - От 32 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">Counter-Strike: GO</div>
										<div style="font-size:14px">- CPU: 2 Ядра<br>
										- RAM: 4000 МБ<br>
										- SSD: 40000 (ГБ)<br>
										 - От 32 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">GTA V: RAGE MP</div>
										<div style="font-size:14px">- CPU: 2 Ядра<br>
										- RAM: 4000 МБ<br>
										- SSD: 40000 (ГБ)<br>
										 - От 1000 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">PowerFull</b><br></div>
										 <br>
										  <hr>
									   </div>
									</div>
								</div>
							</div>
							
							<div class="modal fade" id="info-module3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								 <div class="modal-dialog" role="document">
									<div class="modal-content">
									   <div class="modal-header">
										  <h5 class="modal-title" id="exampleModalLabel">Подробнее о тарифах в Module - 3</h5>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <i aria-hidden="true" class="ki ki-close"></i>
										  </button>
									   </div>
									   <div class="modal-body">
										<div style="font-size:18px">SAMP 0.3.7 R-2</div>
										<div style="font-size:14px">- CPU: 0.50 от 1 ядра<br>
										- RAM: 456 МБ<br>
										- SSD: 150 МБ<br>
										 - До 100 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">BASIC</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">CRMP 0.3e</div>
										<div style="font-size:14px">- CPU: 0.50 от 1 ядра<br>
										- RAM: 456 МБ<br>
										- SSD: 150 МБ<br>
										 - До 100 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">BASIC</b><br></div>
										 <hr>
										 
										<div style="font-size:18px">CRMP 0.3.7</div>
										<div style="font-size:14px">- CPU: 0.50 от 1 ядра<br>
										- RAM: 456 МБ<br>
										- SSD: 150 МБ<br>
										 - До 100 слотов<br>
										 - Присваивается защита от DDoS атак на уровне <b style="color: blue;">BASIC</b><br></div>
										 <br>
										  <hr>
										 
									   </div>
									</div>
								</div>
							</div>

			<div class="card card-custom mb-8 mb-lg-0">
				<div class="card-header border-0 pt-7">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label font-weight-bold font-size-h4 text-dark-75">Преимущества нашего хостинга</span>
					</h3>
				</div>
				<div class="card-body pt-0 pb-4">
					<div class="row">
						<div class="col-xl-6">
							<ul class="navi">
								<li class="navi-item">
									<a class="navi-link" href="javascript:;">
									<span class="navi-bullet">
									<i class="bullet"></i>
									</span>
									<span class="navi-text">Мощные процессоры Intel</span>
									<span class="navi-label">
									<i class="fas fa-check text-primary"></i>
									</span>
									</a>
								</li>
								<li class="navi-item">
									<a class="navi-link" href="javascript:;">
									<span class="navi-bullet">
									<i class="bullet"></i>
									</span>
									<span class="navi-text">Защита от DDoS атак на оборудование.</span>
									<span class="navi-label">
									<i class="fas fa-check text-primary"></i>
									</span>
									</a>
								</li>
								<li class="navi-item">
									<a class="navi-link" href="javascript:;">
									<span class="navi-bullet">
									<i class="bullet"></i>
									</span>
									<span class="navi-text">Полный доступ к FTP</span>
									<span class="navi-label">
									<i class="fas fa-check text-primary"></i>
									</span>
									</a>
								</li>
								<li class="navi-item">
									<a class="navi-link" href="javascript:;">
									<span class="navi-bullet">
									<i class="bullet"></i>
									</span>
									<span class="navi-text">Бесплатная база MySQL</span>
									<span class="navi-label">
									<i class="fas fa-check text-primary"></i>
									</span>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-xl-6">
							<ul class="navi">
								<li class="navi-item">
									<a class="navi-link" href="javascript:;">
									<span class="navi-bullet">
									<i class="bullet"></i>
									</span>
									<span class="navi-text">Создание резервных копий backup</span>
									<span class="navi-label">
									<i class="fas fa-check text-primary"></i>       
									</span>
									</a>
								</li>
								<li class="navi-item">
									<a class="navi-link" href="javascript:;">
									<span class="navi-bullet">
									<i class="bullet"></i>
									</span>
									<span class="navi-text">Смена версии сервера одним кликом</span>
									<span class="navi-label">
									<i class="fas fa-check text-primary"></i>
									</span>
									</a>
								</li>
								<li class="navi-item">
									<a class="navi-link" href="javascript:;">
									<span class="navi-bullet">
									<i class="bullet"></i>
									</span>
									<span class="navi-text">Скоростные SSD диски</span>
									<span class="navi-label">
									<i class="fas fa-check text-primary"></i>
									</span>
									</a>
								</li>
								<li class="navi-item">
									<a class="navi-link" href="javascript:;">
									<span class="navi-bullet">
									<i class="bullet"></i>
									</span>
									<span class="navi-text">Удобная панель управления</span>
									<span class="navi-label">
									<i class="fas fa-check text-primary"></i>
									</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
<br>
<?php echo $footer ?>