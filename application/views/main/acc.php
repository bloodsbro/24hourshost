<title>Личный Кабинет</title>
<?php echo $header ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-xxl-4">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <div class="text-center mb-1">
                                <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                    <div class="symbol-label"
                                         style="background-image:url('<?php echo $url ?><?php echo $user_img ?>')"></div>
                                    <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                                </div>
                                <h4 class="font-weight-bold my-2"><?php echo $user_firstname ?><?php echo $user_lastname ?></h4>
                                <div class="text-muted mb-2">Вы с нами: <?php echo $user_date_reg ?> дней</div>
                            </div>
                            <div class="mb-1 text-center">
                                <a href="javascript:;" data-toggle="modal" data-target="#loadhostin"
                                   class="btn btn-icon btn-sm btn-default btn-hover-light-primary mr-1">
                                    <i class="fas fa-camera icon-md"></i>
                                </a>
                                <a href="javascript:;" data-toggle="modal" data-target="#loadtg"
                                   class="btn btn-icon btn-sm btn-default btn-hover-light-primary mr-1">
                                    <i class="fab fa-telegram-plane icon-md"></i>
                                </a>
                                <a href="javascript:;" data-toggle="modal" data-target="#loadvk"
                                   class="btn btn-icon btn-sm btn-default btn-hover-light-primary mr-1">
                                    <i class="fab fa-vk icon-md"></i>
                                </a>
                                <a href="javascript:;" data-toggle="modal" data-target="#loadreg"
                                   class="btn btn-icon btn-sm btn-default btn-hover-light-primary">
                                    <i class="fas fa-cog icon-md"></i>
                                </a>
                                <a href="javascript:;" data-toggle="modal" data-target="#loademail"
                                   class="btn btn-icon btn-sm btn-default btn-hover-light-primary">
                                    <i class="fas fa-mail-bulk"></i>
                                </a>
                                <a href="javascript:;" <?php echo !$users['user_totp'] ? 'data-toggle="modal" data-target="#totp"' : 'onclick="unset2FA()"' ?>
                                   class="btn btn-icon btn-sm btn-default btn-hover-light-primary">
                                    <i class="fa fa-user-lock"></i>
                                </a>
                            </div>
                            <div class="separator separator-dashed mt-8 mb-0"></div>
                        </div>
                        <ul class="navi">
                            <li class="navi-item">
                                <a class="navi-link">
									<span class="symbol symbol-30 mr-3">
									<span class="symbol-label"><i class="fa fa-user-lock text-primary"></i></span>
									</span>
                                    <div class="text-dark-25 text-hover-primary" style="flex-grow: 1">
                                        <span class="d-block font-weight-bold">2FA</span>
                                    </div>
                                    <span class="label label-light-primary font-weight-bold label-inline"><?php if (!$users['user_totp']): ?>Не привязан<?php else: ?><?php echo 'Привязан'; ?><?php endif; ?></span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link">
									<span class="symbol symbol-30 mr-3">
									<span class="symbol-label"><i class="fab fa-telegram-plane text-primary"></i></span>
									</span>
                                    <div class="text-dark-25 text-hover-primary" style="flex-grow: 1">
                                        <span class="d-block font-weight-bold">Telegram</span>
                                    </div>
                                    <span class="label label-light-primary font-weight-bold label-inline"><?php if (!$users['user_tg']): ?>Не привязан<?php else: ?><?php echo $users['user_tg'] ?><?php endif; ?></span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link">
									<span class="symbol symbol-30 mr-3">
									<span class="symbol-label"><i class="fab fa-vk text-primary"></i></span>
									</span>
                                    <div class="text-dark-25 text-hover-primary" style="flex-grow: 1">
                                        <span class="d-block font-weight-bold">VK</span>
                                    </div>
                                    <span class="label label-light-primary font-weight-bold label-inline"><?php if (!$users['user_vk_id']): ?>Не привязан<?php else: ?><?php echo $users['user_vk_id'] ?><?php endif; ?></span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link">
									<span class="symbol symbol-30 mr-3">
									<span class="symbol-label"><i
                                                class="fas fa-envelope-open-text text-primary"></i></span>
									</span>
                                    <div class="text-dark-25 text-hover-primary" style="flex-grow: 1">
                                        <span class="d-block font-weight-bold">Email</span>
                                    </div>
                                    <span class="label label-light-primary font-weight-bold label-inline user_email"></span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link" href="/servers">
									<span class="symbol symbol-30 mr-3">
									<span class="symbol-label"><i class="fas fa-server text-primary"></i></span>
									</span>
                                    <div class="text-dark-25 text-hover-primary" style="flex-grow: 1">
                                        <span class="d-block font-weight-bolder">Сервера</span>
                                    </div>
                                    <span class="label label-light-primary font-weight-bold label-inline">
									<? echo count($servers); ?>
									</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link" href="/tickets">
									<span class="symbol symbol-30 mr-3">
									<span class="symbol-label"><i class="fas fa-headset text-primary"></i></span>
									</span>
                                    <div class="text-dark-25 text-hover-primary" style="flex-grow: 1">
                                        <span class="d-block font-weight-bolder">Тикеты</span>
                                    </div>
                                    <span class="label label-light-primary font-weight-bold label-inline">
									<? echo count($tickets); ?>
									</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link" href="/account/invoices">
									<span class="symbol symbol-30 mr-3">
									<span class="symbol-label"><i class="fas fa-piggy-bank text-primary"></i></span>
									</span>
                                    <div class="text-dark-25 text-hover-primary" style="flex-grow: 1">
                                        <span class="d-block font-weight-bolder">Баланс</span>
                                    </div>
                                    <span class="label label-light-primary font-weight-bold label-inline"><?php echo $user_balance ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-xxl-8">
                    <div class="card card-custom">
                        <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                                    <li class="nav-item mr-3">
                                        <a class="nav-link active" data-toggle="tab" href="#partner">
										<span class="nav-icon">
										<i class="fas fa-people-arrows"></i>
										</span>
                                            <span class="nav-text font-size-lg">Партнерская программа</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mr-3">
                                        <a class="nav-link" data-toggle="tab" href="#waste">
										<span class="nav-icon">
										<i class="fas fa-retweet"></i>
										</span>
                                            <span class="nav-text font-size-lg">Операции</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mr-3">
                                        <a class="nav-link" data-toggle="tab" href="#visitors">
										<span class="nav-icon">
										<i class="fas fa-door-open"></i>
										</span>
                                            <span class="nav-text font-size-lg">Логи авторизации</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#auths">
										<span class="nav-icon">
										<i class="fas fa-chalkboard-teacher"></i>
										</span>
                                            <span class="nav-text font-size-lg">Сеансы</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content mt-5">
                                <div class="tab-pane fade show active" id="partner" role="tabpanel">
                                    <div class="alert alert-primary mb-5 p-5" role="alert">
                                        <h4 class="alert-heading">Партнерская программа</h4>
                                        <p>У вас есть возможность заработать вместе с нами, приглашая друзей.</p>
                                        <div class="border-bottom border-white opacity-20 mb-5"></div>
                                        <p class="mb-0">Всего заработано: <? echo $users['rmoney']; ?> руб.</p>
                                    </div>
                                    <div class="alert alert-primary mb-5 p-5" role="alert">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="hostinreff"
                                                   placeholder="http://<? echo $_SERVER['SERVER_NAME'] ?>/account/login?ref=<?php echo $user_id ?>"
                                                   value="http://<? echo $_SERVER['SERVER_NAME'] ?>/account/login?ref=<?php echo $user_id ?>">
                                            <div class="input-group-append" style="z-index: 0;">
                                                <a class="btn btn-light-primary btn-icon" data-clipboard="true"
                                                   data-clipboard-target="#hostinreff"><i
                                                            class="flaticon2-document"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php foreach ($userg as $item): ?>
                                        <? if (!($item['ref'] == $user_id)) { // пропуск нечетных чисел
                                            continue;
                                        } ?>
                                        <div class="card card-custom bg-gray-100 mb-4">
                                            <div class="card-header border-0"
                                                 style="min-height: 0;padding-top: 0.5rem;padding-bottom: 0.5rem;">
                                                <h3 class="card-title"><?php echo $item['user_firstname'] ?> <?php echo $item['user_lastname'] ?>
                                                    <small class="text-muted font-size-sm ml-2"><?php echo $item['user_date_reg'] ?></small>
                                                </h3>
                                                <div class="card-toolbar">
                                                    <span class="badge badge-primary" data-toggle="tooltip"
                                                          data-placement="right" title=""
                                                          data-original-title="ID">ID <?php echo $item['user_id'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <? $ust = 0;
                                    foreach ($userg as $item): ?>
                                        <? if (!($item['ref'] == $user_id)) { // пропуск нечетных чисел
                                            continue;
                                        } ?>
                                        <? $ust++; ?>
                                    <? endforeach; ?>
                                    <?php if (empty($ust)): ?>
                                        <div class="alert alert-custom alert-light-primary fade show mb-4" role="alert">
                                            <div class="alert-icon">
                                                <i class="flaticon-exclamation"></i>
                                            </div>
                                            <div class="alert-text">На данный момент у вас нет приглашенных друзей.
                                            </div>
                                            <div class="alert-close">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
											<span aria-hidden="true">
											<i class="ki ki-close"></i>
											</span>
                                                </button>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="waste" role="tabpanel">
                                    <?php foreach ($waste as $item): ?>
                                        <div class="card card-custom bg-gray-100 mb-4">
                                            <div class="card-header border-0"
                                                 style="min-height: 0;padding-top: 0.5rem;padding-bottom: 0.5rem;">
                                                <h3 class="card-title"><?php echo $item['waste_usluga'] ?></h3>
                                                <div class="card-toolbar">
                                                    <?php if ($item['waste_status'] == 1): ?>
                                                        <span class="badge badge-danger" data-toggle="tooltip"
                                                              data-placement="right" title=""
                                                              data-original-title="Дата операции: <?php echo date("d.m.Y в H:i", strtotime($item['waste_date_add'])) ?>">- <?php echo $item['waste_ammount'] ?> руб</span>
                                                    <?php elseif ($item['waste_status'] == 0): ?>
                                                        <span class="badge badge-success" data-toggle="tooltip"
                                                              data-placement="right" title=""
                                                              data-original-title="Дата операции: <?php echo date("d.m.Y в H:i", strtotime($item['waste_date_add'])) ?>">+ <?php echo $item['waste_ammount'] ?> руб</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php if (empty($waste)): ?>
                                        <div class="alert alert-custom alert-light-primary fade show mb-4" role="alert">
                                            <div class="alert-icon">
                                                <i class="flaticon-exclamation"></i>
                                            </div>
                                            <div class="alert-text">На данный момент у вас нет операций со счетом.</div>
                                            <div class="alert-close">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
											<span aria-hidden="true">
											<i class="ki ki-close"></i>
											</span>
                                                </button>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="visitors" role="tabpanel">
                                    <?php foreach ($visitors as $item): ?>
                                        <div class="card card-custom bg-gray-100 mb-4">
                                            <div class="card-header border-0"
                                                 style="min-height: 0;padding-top: 0.5rem;padding-bottom: 0.5rem;">
                                                <h3 class="card-title"><?php echo $item['country'] ?>
                                                    (<?php echo $item['code'] ?>) <?php echo $item['city'] ?><small
                                                            class="text-muted font-size-sm ml-2"><?php echo $item['ip'] ?></small>
                                                </h3>
                                                <div class="card-toolbar">
                                                    <?php if ($item['status'] == 0): ?>
                                                        <span class="badge badge-danger" data-toggle="tooltip"
                                                              data-placement="left" title=""
                                                              data-original-title="Дата операции: <?php echo date("d.m.Y в H:i", strtotime($item['datetime'])) ?>">Ошибка входа (<?php echo $item['system']; ?>)</span>
                                                    <?php elseif ($item['status'] == 1): ?>
                                                        <span class="badge badge-success" data-toggle="tooltip"
                                                              data-placement="left" title=""
                                                              data-original-title="Дата операции: <?php echo date("d.m.Y в H:i", strtotime($item['datetime'])) ?>">Вход в систему (<?php echo $item['system']; ?>)</span>
                                                    <?php elseif ($item['status'] == 2): ?>
                                                        <span class="badge badge-warning" data-toggle="tooltip"
                                                              data-placement="left" title=""
                                                              data-original-title="Дата операции: <?php echo date("d.m.Y в H:i", strtotime($item['datetime'])) ?>">Выход из системы</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="tab-pane fade" id="auths" role="tabpanel">
                                    <?php foreach ($auths as $item): ?>
                                        <div class="card card-custom bg-gray-100 mb-4"
                                             id="session-<?php echo $item['auth_id'] ?>">
                                            <div class="card-header border-0"
                                                 style="min-height: 0;padding-top: 0.5rem;padding-bottom: 0.5rem;">
                                                <h3 class="card-title"><span class="card-icon">
												<a href="javascript:;" class="btn btn-icon btn-light-primary btn-sm"
                                                   data-toggle="tooltip" data-placement="right" title=""
                                                   data-original-title="<?php if ($item['auth_type'] == "Vk"): ?>Тип сеанса: ВКонтакте<?php elseif ($item['auth_type'] == "Password"): ?>Тип сеанса: E-mail/Пароль<?php else: ?>Тип сеанса: Другой<?php endif; ?>">
												<i class="fa fa-info-circle"></i>
												</a></span><?php if ($item['auth_key'] == @$_COOKIE['uid']): ?>Текущий<?php else: ?>Активный<?php endif; ?>
                                                    <small class="text-muted font-size-sm ml-2"><?php echo $item['user_ip'] ?></small>
                                                </h3>
                                                <div class="card-toolbar">
                                                    <span class="badge badge-primary" data-toggle="tooltip"
                                                          data-placement="right" title=""
                                                          data-original-title="Дата создания"
                                                          style="margin-right: .25rem"><?php echo date("d.m.Y в H:i", strtotime($item['auth_date_add'])) ?></span>
                                                    <span class="badge badge-primary" data-toggle="tooltip"
                                                          data-placement="right" title=""
                                                          data-original-title="Последняя активность"
                                                          style="margin-right: .25rem"><?php echo date("d.m.Y в H:i", strtotime($item['user_last_activity'])) ?></span>
                                                    <a href="javascript:;"
                                                       onClick="sendAction('closeSession',<?php echo $item['auth_id'] ?>)"
                                                       class="btn btn-icon btn-light-danger btn-xs"
                                                       data-toggle="tooltip" data-placement="right" title=""
                                                       data-original-title="Завершить сеанс">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--begin::Modal-->
<div class="modal fade" id="loadtg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактирование профиля TG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" style="text-align: center;">
                <?php if ($users['user_tg']): ?>

                <div class="alert alert-primary mb-5 p-5" role="alert">
                    <div class="input-group">
                        <div class="input-group-prepend">
							<span class="input-group-text">
							<i class="fab fa-telegram-plane text-primary"></i>
							</span>
                        </div>

                        <input type="text" class="form-control" disabled="disabled"
                               value="<?php echo $users['user_tg'] ?>">
                        <div class="input-group-append">
                            <a href="javascript:;" onClick="sendAction('unsetTg', null)"
                               class="btn btn-light-primary btn-icon" data-toggle="tooltip" data-placement="right"
                               title="" data-original-title="Отвязать"><i class="fas fa-user-times"></i></a>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                    <script async src="https://telegram.org/js/telegram-widget.js?22" data-telegram-login="o24hourshost_bot" data-size="large" data-onauth="onTelegramAuth(user)" data-request-access="write"></script>
                    <script type="text/javascript">
                        function onTelegramAuth(user) {
                            sendAction('setTg', user);
                        }
                    </script>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<!--begin::Modal-->
<!--begin::Modal-->
<div class="modal fade" id="loadvk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактирование профиля VK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary mb-5 p-5" role="alert">
                    <div class="input-group">
                        <div class="input-group-prepend">
							<span class="input-group-text">
							<i class="fab fa-vk text-primary"></i>
							</span>
                        </div>
                        <?php if (!$users['user_vk_id']): ?>
                            <input type="text" class="form-control" disabled="disabled" value="Профиль не привязан">
                            <div class="input-group-append">
                                <a href="javascript:;" onclick="VK.Auth.login(authInfo, 262144)"
                                   class="btn btn-light-primary btn-icon" data-toggle="tooltip" data-placement="right"
                                   title="" data-original-title="Привязать"><i class="fas fa-user-plus"></i></a>
                            </div>
                        <?php else: ?>
                            <input type="text" class="form-control" disabled="disabled"
                                   value="<?php echo $users['user_vk_id'] ?>">
                            <div class="input-group-append">
                                <a href="javascript:;" onClick="sendAction('unsetVk', null)"
                                   class="btn btn-light-primary btn-icon" data-toggle="tooltip" data-placement="right"
                                   title="" data-original-title="Отвязать"><i class="fas fa-user-times"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--begin::Modal-->
<!--begin::Modal-->
<div class="modal fade" id="loadhostin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Загрузка аватара</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="imgForm" method="POST" style="padding:0px; margin:0px;">
                    <div class="alert alert-primary mb-5 p-5" role="alert">
                        <div class="input-group">
                            <div class="input-group-prepend">
								<span class="input-group-text">
								<i class="fas fa-camera text-primary"></i>
								</span>
                            </div>
                            <input class="form-control" id="file" name="userfile" type="file">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-light-primary btn-icon"><i
                                            class="fa fa-download"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--begin::Modal-->
<!--begin::Modal-->
<div class="modal fade" id="loadreg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Настройки профиля<small
                            class="text-muted font-size-sm ml-2">Ваш ID <?php echo $user_id ?></small></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="editForm" method="POST" style="padding:0px; margin:0px;">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ваше Имя</label>
                        <input class="form-control" id="firstname" name="firstname" placeholder="Введите ваше имя"
                               value="<?php echo $user['firstname'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Ваша Фамилия</label>
                        <input class="form-control" id="lastname" name="lastname" placeholder="Введите вашу фамилию"
                               value="<?php echo $user['lastname'] ?>">
                    </div>
                    <div class="card card-body" style="margin-bottom: 1rem;padding: 1rem;">
                        <div class="form-group" style="margin-bottom: 0rem;">
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" id="editpassword" name="editpassword"
                                           onChange="togglePassword()">
                                    <span></span>
                                    Сменить пароль
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Пароль</label>
                        <input class="form-control" id="password" name="password" placeholder="Пароль" disabled>
                    </div>
                    <div class="form-group">
                        <label>Повторите пароль</label>
                        <input class="form-control" id="password2" name="password2" placeholder="Повторите пароль"
                               disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Отмена
                    </button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--begin::Modal-->
<!--begin::Modal-->
<div class="modal fade" id="loademail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Смена E-Mail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="editFormEmail" method="POST" style="padding:0px; margin:0px;">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Новый E-Mail</label>
                        <input class="form-control" id="email" name="email" placeholder="Введите новый E-mail">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Отмена
                    </button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--begin::Modal-->
<!--begin::Modal-->
<div class="modal fade" id="totp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Привязка Google Authenticator</h5>
            </div>
            <form id="totpForm" method="POST" style="padding:0px; margin:0px;">
                <div class="modal-body">
                    <div id="google_auth_load_qr">
                        <center>
                            <div id="qr_img">
                                <div id="totpImage"></div>
                                <br>
                                Наведите камеру Вашего устройства на QR-Код,<br>
                                либо введите данный ключ самостоятельно в приложении Google Authenticator.
                            </div>
                            <h6>Секретный ключ:
                                <b id="totpSecretKey">Загрузка</b>
                            </h6>
                            <b>Секретный ключ рекомендуем сохранить.</b>
                        </center>
                        <hr>
                        <div class="form-group">
                            <input type="hidden" id="totp_key" name="totp_key" value="">
                            <input type="number" class="form-control" maxlength="6" id="totp_code" name="totp_code" placeholder="Введите код из приложения Google Authenticator">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button type="submit" onclick="sendActionG('set_google_auth')" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--begin::Modal-->
<script src="/assets/js/clipboard.js" type="text/javascript"></script>
<script>
    function sendAction(action, auth_id) {
        switch (action) {
            case "closeSession": {
                if (!confirm("Вы действительно хотите закончить данный сеанс?")) return;
                break;
            }
        }
        $.ajax({
            url: '/main/acc/action/' + action,
            type: "POST",
            data: {auth_id: auth_id},
            dataType: 'text',
            success: function (data) {
                data = $.parseJSON(data);
                switch (data.status) {
                    case 'error':
                        toastr.error(data.error);
                        break;
                    case 'success':
                        if(!isNaN(parseInt(auth_id))) {
                            $("div[id=session-" + auth_id + ']').remove();
                        }
                        toastr.success(data.success);

                        location.reload();
                        break;
                }
            }
        });
    }

    $('#editForm').ajaxForm({
        url: '/main/acc/ajax',
        dataType: 'text',
        success: function (data) {
            console.log(data);
            data = $.parseJSON(data);
            switch (data.status) {
                case 'error':
                    $('button[type=submit]').prop('disabled', false);
                    toastr.error(data.error);
                    break;
                case 'success':
                    $('button[type=submit]').prop('disabled', false);
                    toastr.success(data.success);
                    setTimeout("reload()", 1500);
                    break;
            }
        },
        beforeSubmit: function (arr, $form, options) {
            $('button[type=submit]').prop('disabled', true);
        }
    });

    $('#editFormEmail').ajaxForm({
        url: '/main/acc/change_email',
        dataType: 'text',
        success: function (data) {
            console.log(data);
            data = $.parseJSON(data);
            switch (data.status) {
                case 'error':
                    $('button[type=submit]').prop('disabled', false);
                    toastr.error(data.error);
                    break;
                case 'success':
                    $('button[type=submit]').prop('disabled', false);
                    toastr.success(data.success);
                    setTimeout("reload()", 2250);
                    break;
            }
        },
        beforeSubmit: function (arr, $form, options) {
            $('button[type=submit]').prop('disabled', true);
        }
    });

    $('#imgForm').ajaxForm({
        url: '/main/acc/img',
        dataType: 'text',
        success: function (data) {
            data = $.parseJSON(data);
            switch (data.status) {
                case 'error':
                    $('button[type=submit]').prop('disabled', false);
                    toastr.error(data.error);
                    $("#file").val("");
                    break;
                case 'success':
                    $('button[type=submit]').prop('disabled', false);
                    toastr.success(data.success);
                    $('#loadhostin').modal('hide');
                    $("#file").val("");
                    setTimeout("reload()", 1500);
                    break;
            }
        },
        beforeSubmit: function (arr, $form, options) {
            $('button[type=submit]').prop('disabled', true);
        }
    });

    $('#totpForm').ajaxForm({
        url: '/main/acc/set_totp',
        dataType: 'json',
        success: function (data) {
            switch (data.status) {
                case 'error':
                    $('button[type=submit]').prop('disabled', false);
                    toastr.error(data.error);
                    break;
                case 'success':
                    $('button[type=submit]').prop('disabled', false);
                    toastr.success(data.success);
                    setTimeout("reload()", 2250);
                    break;
            }
        },
        beforeSubmit: function (arr, $form, options) {
            $('button[type=submit]').prop('disabled', true);
        }
    });

    function unset2FA() {
        $.ajax({
            url: '/main/acc/unset_totp',
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                switch (data.status) {
                    case 'error':
                        $('button[type=submit]').prop('disabled', false);
                        toastr.error(data.error);
                        break;
                    case 'success':
                        $('button[type=submit]').prop('disabled', false);
                        toastr.success(data.success);
                        setTimeout("reload()", 2250);
                        break;
                }
            },
            beforeSubmit: function (arr, $form, options) {
                $('button[type=submit]').prop('disabled', true);
            }
        })
    }

    function togglePassword() {
        var status = $('#editpassword').is(':checked');
        if (status) {
            $('#password').prop('disabled', false);
            $('#password2').prop('disabled', false);
        } else {
            $('#password').prop('disabled', true);
            $('#password2').prop('disabled', true);
        }
    }
</script>
<script>
    const key = TOTP.randomKey();
    const totp = new TOTP(key);

    function authInfo(response) {
        if (response.session) {
            $.ajax({
                url: "/main/acc/action/setVk",
                type: "POST",
                data: {auth: true, response: response},
                success: function (data) {
                    data = $.parseJSON(data);
                    switch (data.status) {
                        case 'error':
                            toastr.error(data.error);
                            break;
                        case 'success':
                            toastr.success(data.success);
                            setTimeout("reload()", 1500);
                            break;
                        case 'info':
                            toastr.info(data.info);
                            setTimeout("reload()", 1500);
                            break;
                    }
                }
            });
        }
    }

    window.onload = () => {
        const uri = `otpauth://totp/${encodeURIComponent('<?php echo $user_firstname ?> <?php echo $user_lastname ?>')}?secret=${key}&issuer=${encodeURIComponent('24HoursHost')}`;
        $("#totpImage").qrcode({
            text: uri,
            render: 'image'
        });

        $("#totp_key").val(key);
        $("#totpSecretKey").text(key);
    }
</script>
<?php echo $footer ?>