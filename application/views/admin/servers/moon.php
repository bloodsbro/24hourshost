<?php

?>
<?php echo $admheader ?>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-custom mb-2">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-45 symbol-light mr-5">
									<span class="symbol-label">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M5,2 L19,2 C20.1045695,2 21,2.8954305 21,4 L21,6 C21,7.1045695 20.1045695,8 19,8 L5,8 C3.8954305,8 3,7.1045695 3,6 L3,4 C3,2.8954305 3.8954305,2 5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L16,6 C16.5522847,6 17,5.55228475 17,5 C17,4.44771525 16.5522847,4 16,4 L11,4 Z M7,6 C7.55228475,6 8,5.55228475 8,5 C8,4.44771525 7.55228475,4 7,4 C6.44771525,4 6,4.44771525 6,5 C6,5.55228475 6.44771525,6 7,6 Z"
                                                          fill="#000000" opacity="0.3"/>
													<path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,13 C21,14.1045695 20.1045695,15 19,15 L5,15 C3.8954305,15 3,14.1045695 3,13 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L16,13 C16.5522847,13 17,12.5522847 17,12 C17,11.4477153 16.5522847,11 16,11 L11,11 Z M7,13 C7.55228475,13 8,12.5522847 8,12 C8,11.4477153 7.55228475,11 7,11 C6.44771525,11 6,11.4477153 6,12 C6,12.5522847 6.44771525,13 7,13 Z"
                                                          fill="#000000"/>
													<path d="M5,16 L19,16 C20.1045695,16 21,16.8954305 21,18 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,18 C3,16.8954305 3.8954305,16 5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L16,20 C16.5522847,20 17,19.5522847 17,19 C17,18.4477153 16.5522847,18 16,18 L11,18 Z M7,20 C7.55228475,20 8,19.5522847 8,19 C8,18.4477153 7.55228475,18 7,18 C6.44771525,18 6,18.4477153 6,19 C6,19.5522847 6.44771525,20 7,20 Z"
                                                          fill="#000000"/>
												</g>
											</svg>
										</span>
									</span>
                                </div>
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="/admin/servers"
                                       class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Module
                                        - LITE</a>
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center pr-5">
											<span class="svg-icon svg-icon-md svg-icon-primary pr-1">
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24"/>
														<rect fill="#000000" opacity="0.3"
                                                              transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) "
                                                              x="7.5" y="7.5" width="2" height="9" rx="1"/>
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                              fill="#000000" fill-rule="nonzero"
                                                              transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
													</g>
												</svg>
											</span>
                                            <span class="text-muted font-weight-bold">Онлайн: <? $tserverov = 0;
                                                foreach ($servers as $item): ?>
                                                    <? if (!($item['server_status'] == 2)) { // пропуск нечетных чисел
                                                        continue;
                                                    } ?>
                                                    <? $tserverov++; ?>
                                                <? endforeach;
                                                echo $tserverov; ?></span>
                                        </div>
                                        <div class="d-flex align-items-center">
											<span class="svg-icon svg-icon-md svg-icon-primary pr-1">
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24"/>
														<rect fill="#000000" opacity="0.3"
                                                              transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) "
                                                              x="7.5" y="7.5" width="2" height="9" rx="1"/>
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                              fill="#000000" fill-rule="nonzero"
                                                              transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
													</g>
												</svg>
											</span>
                                            <span class="text-muted font-weight-bold">Серверов: <? $tserverov1 = 0;
                                                foreach ($servers as $item): ?>
                                                    <? $tserverov1++; ?>
                                                <? endforeach;
                                                echo $tserverov1; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo $footer ?>