<?php
/*
<!-- Панель Управления OSMPanel - 2020 -->
<!-- WWW.OSMP.GA MY.OSMP.GA OSMP.GA -->
<!-- Создатель: Паша Гайдаров vk.com/tvoi_bratiska -->
<!-- Email: anonim.gosmile@gmail.com -->
<!-- Копирование запрещено панель защищена частным лицом -->
*/
?>
 <title>Ошибка Транзакции</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
   <div class="d-flex flex-column-fluid">
      <div class="container">
         <div class="col">
            <div class="alert alert-light alert-elevate fade show" role="alert">
               <div class="alert-text">
                  Внутренняя ошибка. Возможные причины:<br>
                  - Неверная сумма платежа.<br>
                  - Неверный ID магазина.<br>
                  - Не верный ID платежа.<br>
                  - Данный счет уже оплачен.<br>
                  - Платеж был отменен.<br>
                  <br>
                  Если здесь нет выявленной вами причины, то обратитесь в <a href="/tickets/create">Службу поддержки</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php echo $footer ?>