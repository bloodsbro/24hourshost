﻿ <title>Новости</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
   <div class="d-flex flex-column-fluid">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="card card-custom mb-4">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="symbol symbol-45 symbol-light mr-5">
                           <span class="symbol-label">
                              <span class="svg-icon svg-icon-lg svg-icon-primary">
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                       <rect x="0" y="0" width="24" height="24"></rect>
                                       <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"></path>
                                       <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"></path>
                                       <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"></rect>
                                       <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"></rect>
                                    </g>
                                 </svg>
                              </span>
                           </span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1">
                           <a href="javascript:;" class="text-dark-25 text-hover-primary mb-1 font-size-lg font-weight-bolder"><?echo $new['news_title']?></a>
                           <div class="d-flex">
                              <div class="d-flex align-items-center" data-toggle="tooltip" title="" data-placement="right" data-original-title="Просмотров">
                                 <span class="svg-icon svg-icon-md svg-icon-primary pr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                       <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                          <rect x="0" y="0" width="24" height="24"></rect>
                                          <path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000"></path>
                                          <path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3"></path>
                                       </g>
                                    </svg>
                                 </span>
                                 <span class="text-muted font-weight-bold"><?echo $new['look']?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pt-3">
                        <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2"><?echo nl2br($new['news_text'])?></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
$('#sendForm').ajaxForm({ 
    url: '/news/view/ajax/<?php echo $new['news_id'] ?>',						
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
				$('#text').val('');
				setTimeout("reload()", 1500);
				ajax_url("/news/view/"+data);
			break;
			}
		},
	beforeSubmit: function(arr, $form, options) {
	$('button[type=submit]').prop('disabled', true);
}
});
</script>
<?php echo $footer ?>