<html lang="ru">
<head>

    <meta charset="utf-8"/>
    <title><?php echo $title ?></title>
    <meta name="description" content="<?php echo $description ?>">
    <meta name="keywords" content="<?php echo $keywords ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="robots" content="all">

    <meta property="og:title" content="<?php echo $title ?>"/>
    <meta property="og:site_name" content="<?php echo $title ?>"/>
    <meta property="og:description" content="<?php echo $description ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://24hours.host/"/>
    <meta property="vk:image" content="/assets/image/previewsmall.png">
    <meta property="og:image" content="/assets/image/previewsmall.png">
    <meta property="twitter:image" content="/assets/image/previewsmall.png">
    <meta itemprop="image" content="/assets/image/previewsmall.png">

    <link rel="shortcut icon" href="/ru/favicon.svg"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="/assets/css/fullcalendar.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/prismjs.bundle.css" rel="stylesheet" type="text/css"/>

    <link href="/assets/css/finxgamesru/style.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/finxgamesru/lightm.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/finxgamesru/finxgamesru.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/finxgamesru/finxgamesrum.css" rel="stylesheet" type="text/css"/>

</head>

<body id="kt_body"
      class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable"
      style="opacity:0;transition:.5s;">

<!-- <div class="bg-white shadow-sm" id="vkb" style="position: fixed; bottom: 6.0rem; right: 0.5rem;z-index:99;width:240px;">
    <div class="toast fade show border-0 mb-0" role="alert" aria-live="assertive" aria-atomic="true"
         style="box-shadow:none;">
        <div class="toast-header">
            <img src="/ru/img/finxgames-logo.png" class="rounded mr-2" style="width:20px;height:20px;">
            <strong class="mr-auto" style="color:#2787f5;">24HoursHost</strong>
            <small>Служба Поддержки</small>
        </div>
    </div>
    <div class="toast-body text-center f90">
        У Вас появилась Проблема? <p> Свяжитесь с Нами!
            <a href="/tickets/create" target="_blank" class="btn btn-primary btn-sm btn-block mt-2">Написать</a>
    </div>
</div> -->

<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <a href="/">
        <img alt="Logo" src="<?php echo $logo ?>" width="75" height="75"/>
    </a>
    <div class="d-flex align-items-center">
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <button class="btn btn-hover-text-primary p-0 ml-3" id="kt_header_mobile_topbar_toggle">
               <span class="svg-icon svg-icon-xl">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                       height="24px" viewBox="0 0 24 24" version="1.1">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                              fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                              fill="#000000" fill-rule="nonzero"/>
                     </g>
                  </svg>
               </span>
        </button>
    </div>
</div>

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
            <div class="brand flex-column-auto" id="kt_brand">
                <a href="/" class="brand-logo">
                    <img alt="Logo" src="<?php echo $logo ?>" width = "175" height = "75" />
                </a>
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                     <rect x="0" y="0" width="24" height="24"/>
                     <path fill-rule="evenodd" clip-rule="evenodd"
                           d="M22 11.5C22 12.3284 21.3284 13 20.5 13H3.5C2.6716 13 2 12.3284 2 11.5C2 10.6716 2.6716 10 3.5 10H20.5C21.3284 10 22 10.6716 22 11.5Z"
                           fill="black"/>
                     <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                           d="M14.5 20C15.3284 20 16 19.3284 16 18.5C16 17.6716 15.3284 17 14.5 17H3.5C2.6716 17 2 17.6716 2 18.5C2 19.3284 2.6716 20 3.5 20H14.5ZM8.5 6C9.3284 6 10 5.32843 10 4.5C10 3.67157 9.3284 3 8.5 3H3.5C2.6716 3 2 3.67157 2 4.5C2 5.32843 2.6716 6 3.5 6H8.5Z"
                           fill="black"/>
                  </g>
               </svg>
            </span>
                </button>
            </div>

            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                     data-menu-dropdown-timeout="500">
                    <ul class="menu-nav">
                        <li class="menu-item menu-item<?php if ($activesection == "main"): ?>-active<?php endif; ?>"
                            aria-haspopup="true">
                            <a href="/" class="menu-link">
                                <i class="menu-icon fas fa-coffee"></i>
                                <span class="menu-text">Главная</span>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu <?php if ($activesection == "server_lease" && $activeitem == "index"): ?>menu-item-here<?php endif; ?>"
                            data-menu-toggle="hover" aria-haspopup="true">
                            <a href="/server_lease" class="menu-link">
                                <i class="menu-icon fa fa-shopping-cart"></i>
                                <span class="menu-text">Заказать Сервер</span>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu <?php if ($activesection == "servers" && $activeitem == "index"): ?>menu-item-here<?php endif; ?>"
                            data-menu-toggle="hover" aria-haspopup="true">
                            <a href="/servers" class="menu-link">
                                <i class="menu-icon fa fa-desktop"></i>
                                <span class="menu-text">Мои сервера</span>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu menu-item-rel <?php if ($activesection == "tickets"): ?>menu-item-here<?php endif; ?>"
                            data-menu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <i class="menu-icon fa fa-headset"></i>
                                <span class="menu-text">Служба Поддержки</span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                <ul class="menu-subnav">
                                    <li class="menu-item menu-item-submenu <?php if ($activesection == "tickets" && $activeitem == "create"): ?>menu-item-here<?php endif; ?>"
                                        data-menu-toggle="hover" aria-haspopup="true">
                                        <a href="/tickets/create" class="menu-link">
                                            <span class="menu-text">Создать тикет</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                    </li>
                                    <li class="menu-item menu-item-submenu <?php if ($activesection == "tickets" && $activeitem == "index"): ?>menu-item-here<?php endif; ?>"
                                        data-menu-toggle="hover" aria-haspopup="true">
                                        <a href="/tickets" class="menu-link">
                                            <span class="menu-text">Мои тикеты</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                    </li>
                                    <li class="menu-item menu-item-submenu <?php if ($activesection == "tickets" && $activeitem == "faq"): ?>menu-item-here<?php endif; ?>"
                                        data-menu-toggle="hover" aria-haspopup="true">
                                        <a href="/tickets/faq" class="menu-link">
                                            <span class="menu-text">База знаний (FAQ)</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php if ($webhost == 1): ?>
                            <li class="menu-item menu-item-submenu menu-item-rel <?php if ($activesection == "webhost"): ?>menu-item-here<?php endif; ?>"
                                data-menu-toggle="click" aria-haspopup="true">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <i class="menu-icon fa fa-server"></i>
                                    <span class="menu-text">WEB Хостинг</span>
                                    <span class="menu-desc"></span>
                                </a>
                                <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-submenu <?php if ($activesection == "webhost" && $activeitem == "order"): ?>menu-item-here<?php endif; ?>"
                                            data-menu-toggle="hover" aria-haspopup="true">
                                            <a href="/webhost/order" class="menu-link">
                                                <span class="menu-text">Заказать веб-хостинг</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-submenu <?php if ($activesection == "webhost" && $activeitem == "index"): ?>menu-item-here<?php endif; ?>"
                                            data-menu-toggle="hover" aria-haspopup="true">
                                            <a href="/webhost" class="menu-link">
                                                <span class="menu-text">Мои веб-сайты</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>
                        <li class="menu-item menu-item-submenu menu-item-rel <?php if ($activesection == "account"): ?>menu-item-here<?php endif; ?>"
                            data-menu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <i class="menu-icon fa fa-money-check-alt"></i>
                                <span class="menu-text">Баланс</span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                <ul class="menu-subnav">
                                    <li class="menu-item menu-item-submenu <?php if ($activesection == "account" && $activeitem == "pay"): ?>menu-item-here<?php endif; ?>"
                                        data-menu-toggle="hover" aria-haspopup="true">
                                        <a href="/account/pay" class="menu-link">
                                            <span class="menu-text">Пополнить баланс</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                    </li>
                                    <li class="menu-item menu-item-submenu <?php if ($activesection == "account" && $activeitem == "invoices"): ?>menu-item-here<?php endif; ?>"
                                        data-menu-toggle="hover" aria-haspopup="true">
                                        <a href="/account/invoices" class="menu-link">
                                            <span class="menu-text">История баланса</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                    </li>
                                    <li class="menu-item menu-item-submenu <?php if ($activesection == "account" && $activeitem == "perevod"): ?>menu-item-here<?php endif; ?>"
                                        data-menu-toggle="hover" aria-haspopup="true">
                                        <a href="/account/perevod" class="menu-link">
                                            <span class="menu-text">Перевод средств</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- <li class="menu-item menu-item-submenu <?php if ($activesection == "sellection" && $activeitem == "applications"): ?>menu-item-here<?php endif; ?>"
                            data-menu-toggle="hover" aria-haspopup="true">
                            <a href="/sellection/applications" class="menu-link">
                                <i class="menu-icon fa fa-shopping-bag"></i>
                                <span class="menu-text">Магазин</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li> -->
                        <!-- <li class="menu-item menu-item-submenu <?php if ($activesection == "team" && $activeitem == "index"): ?>menu-item-here<?php endif; ?>"
                            data-menu-toggle="hover" aria-haspopup="true">
                            <a href="/team" class="menu-link">
                                <i class="menu-icon fa fa-chalkboard-teacher"></i>
                                <span class="menu-text">Контакты</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li> -->
                        <li class="menu-item menu-item-submenu <?php if ($activesection == "news" && $activeitem == "index"): ?>menu-item-here<?php endif; ?>"
                            data-menu-toggle="hover" aria-haspopup="true">
                            <a href="/news" class="menu-link">
                                <i class="menu-icon fa fa-newspaper"></i>
                                <span class="menu-text">Новости</span>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu <?php if ($activesection == "tasks" && $activeitem == "index"): ?>menu-item-here<?php endif; ?>"
                            data-menu-toggle="hover" aria-haspopup="true">
                            <a href="/tasks" class="menu-link">
                                <i class="menu-icon fa fa-hand-holding-usd"></i>
                                <span class="menu-text">Бесплатные рубли</span>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu <?php if ($activesection == "data_information" && $activeitem == "index"): ?>menu-item-here<?php endif; ?>"
                            data-menu-toggle="hover" aria-haspopup="true">
                            <a href="/data_information" class="menu-link">
                                <i class="menu-icon fa fa-database"></i>
                                <span class="menu-text">Мониторинг локаций</span>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu <?php if ($activesection == "ball" && $activeitem == "ball"): ?>menu-item-here<?php endif; ?>"
                            data-menu-toggle="hover" aria-haspopup="true">
                            <a href="https://stats.uptimerobot.com/ppxJBUQy9n" target="_blank" class="menu-link">
                                <i class="menu-icon fa fa-hdd"></i>
                                <span class="menu-text">Технический мониторинг</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu <?php if ($activesection == "ball" && $activeitem == "ball"): ?>menu-item-here<?php endif; ?>"
                            data-menu-toggle="hover" aria-haspopup="true">
                            <a href="https://ddos-guard.net?affiliate=151085" target="_blank" class="menu-link">
                                <i class="menu-icon fa fa-cloud"></i>
                                <span class="menu-text">Защита сайтов Anti DDoS</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

            <div id="kt_header" class="header header-fixed">
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                            <ul class="menu-nav">
                                <li class="menu-item menu-item-submenu menu-item-rel menu-item-active"
                                    data-menu-toggle="click" aria-haspopup="true">
                                    <a href="https://t.me/HoursHost_RU" title="Сообщество TG" target="_blank"
                                       class="navi-link">
                        <span class="symbol symbol-30 mr-3">
                        <span class="symbol-label"><i class="fab fa-telegram-plane text-primary"></i></span>
                        </span>
                                    </a>
                                </li>
                            </ul>
                            <?php if ($user_access_level > 1): ?>
                                <ul class="menu-nav">
                                    <li class="menu-item menu-item-submenu menu-item-rel menu-item-active"
                                        data-menu-toggle="click" aria-haspopup="true">
                                        <a href="/admin" title="AdminTeam" target="_blank" class="navi-link">
                        <span class="symbol symbol-30 mr-3">
                        <span class="symbol-label"><i class="fa fa-user"></i></span>
                        </span>
                                        </a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="topbar">
                        <div class="topbar-item mr-1 mr-lg-3">
                            <a title="Число Пользователей на сайте"
                               class="btn btn-fixed-height btn-light-primary font-weight-bolder font-size-sm px-5 my-1">
                     <span class="svg-icon svg-icon-md">
                        <i class="fa fa-users"></i>
                     </span>
                                <b id="online"></b>
                            </a>
                        </div>
                        <div class="topbar-item mr-1 mr-lg-3">
                            <a <?php if ($oplata_status == 1): ?> data-toggle="modal" data-target="#hostin" <?php else: ?>onClick="redirect('/account/pay')"<?php endif; ?>
                                    class="btn btn-fixed-height btn-light-primary font-weight-bolder font-size-sm px-5 my-1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"/>
                              <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                              <rect fill="#000000" opacity="0.3"
                                    transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                    x="3" y="3" width="18" height="7" rx="1"/>
                              <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                    fill="#000000"/>
                           </g>
                        </svg>
                     </span>
                                <?php echo $user_balance ?> RUB
                            </a>
                        </div>
                        <div class="topbar-item mr-1 mr-lg-3">
                            <div class="btn btn-icon btn-circle btn-hover-light-primary <?php foreach ($tickets as $item): ?>
                     <?php if ($item['ticket_status'] == 2): ?>pulse pulse-primary<?php endif; ?>
                     <?php endforeach; ?>" id="kt_quick_panel_toggle">
                                <span class="pulse-ring"></span>
                                <span class="svg-icon svg-icon-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"/>
                              <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.4862 18L12.7975 21.0566C12.5304 21.54 11.922 21.7153 11.4386 21.4483C11.2977 21.3704 11.1777 21.2597 11.0887 21.1255L9.01653 18H5C3.34315 18 2 16.6569 2 15V6C2 4.34315 3.34315 3 5 3H19C20.6569 3 22 4.34315 22 6V15C22 16.6569 20.6569 18 19 18H14.4862Z"
                                    fill="black"/>
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6 7H15C15.5523 7 16 7.44772 16 8C16 8.55228 15.5523 9 15 9H6C5.44772 9 5 8.55228 5 8C5 7.44772 5.44772 7 6 7ZM6 11H11C11.5523 11 12 11.4477 12 12C12 12.5523 11.5523 13 11 13H6C5.44772 13 5 12.5523 5 12C5 11.4477 5.44772 11 6 11Z"
                                    fill="black"/>
                           </g>
                        </svg>
                     </span>
                            </div>
                        </div>
                        <div class="topbar-item mr-1 mr-lg-3">
                            <div class="btn btn-icon btn-circle btn-hover-light-primary" id="kt_quick_actions_toggle">
                                <span class="pulse-ring"></span>
                                <span class="svg-icon svg-icon-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"/>
                              <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z"
                                    fill="#000000"/>
                              <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z"
                                    fill="#000000" opacity="0.3"/>
                           </g>
                        </svg>
                     </span>
                            </div>
                        </div>
                        <div class="topbar-item">
                            <div class="btn btn-icon btn-circle btn-light-primary" id="kt_quick_user_toggle">
                                <div class="symbol symbol-45 mr-1">
                                    <div class="symbol-label"
                                         style="background-image:url('<?php echo $url ?><?php echo $user_img ?>')"></div>
                                    <i class="symbol-badge bg-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
                <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                    <h3 class="font-weight-bold m-0">Профиль
                        <small class="text-muted font-size-sm ml-2"><?php if ($user_access_level >= 3): ?> Администратора<?php elseif ($user_access_level == 2): ?>Тех.поддержки<?php elseif ($user_access_level == 1): ?>Пользователя<?php endif; ?></small>
                    </h3>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-hover-primary"
                       id="kt_quick_user_close">
                        <i class="ki ki-close icon-xs text-muted"></i>
                    </a>
                </div>
                <div class="offcanvas-content pr-5 mr-n5">
                    <div class="d-flex align-items-center mt-5">
                        <div class="symbol symbol-50 mr-5">
                            <div class="symbol-label"
                                 style="background-image:url('<?php echo $url ?><?php echo $user_img ?>')"></div>
                            <i class="symbol-badge bg-success"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="javascript:;"
                               class="font-weight-bold font-size-h5 text-dark-25 text-hover-primary"><?php echo $user_lastname ?> <?php echo $user_firstname ?></a>
                            <div class="navi mt-1">
                                <a href="javascript:;" class="navi-item">
                     <span class="navi-link p-0 pb-2">
                     <span class="navi-text text-muted text-hover-primary user_email"><?php echo $user_email ?? $user_tg ?></span>
                     </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed mt-8 mb-5"></div>
                    <div class="navi navi-spacer-x-0 p-0">
                        <a href="/main/acc" class="navi-item">
                            <div class="navi-link">
                                <div class="symbol symbol-40 mr-3">
                                    <div class="symbol-label">
                           <span class="svg-icon svg-icon-md svg-icon-danger">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                   width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z"
                                          fill="#000000" opacity="0.3"/>
                                    <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                          fill="#000000"/>
                                 </g>
                              </svg>
                           </span>
                                    </div>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold text-dark-25 text-hover-primary">Мой профиль</div>
                                    <div class="text-muted">Личные данные</div>
                                </div>
                            </div>
                        </a>
                        <a href="/servers" class="navi-item">
                            <div class="navi-link">
                                <div class="symbol symbol-40 mr-3">
                                    <div class="symbol-label">
                           <span class="svg-icon svg-icon-md svg-icon-success">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                   width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                          fill="#000000"/>
                                    <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                          fill="#000000" opacity="0.3"/>
                                 </g>
                              </svg>
                           </span>
                                    </div>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold text-dark-25 text-hover-primary">Мои сервера</div>
                                    <div class="text-muted">Список серверов</div>
                                </div>
                            </div>
                        </a>
                        <a href="/account/invoices" class="navi-item">
                            <div class="navi-link">
                                <div class="symbol symbol-40 mr-3">
                                    <div class="symbol-label">
                           <span class="svg-icon svg-icon-md svg-icon-primary">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                   width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                                    <rect fill="#000000" opacity="0.3"
                                          transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                          x="3" y="3" width="18" height="7" rx="1"/>
                                    <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                          fill="#000000"/>
                                 </g>
                              </svg>
                           </span>
                                    </div>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold text-dark-25 text-hover-primary">История баланса</div>
                                    <div class="text-muted">Список пополнений</div>
                                </div>
                            </div>
                        </a>
                        <a href="/account/waste" class="navi-item">
                            <div class="navi-link">
                                <div class="symbol symbol-40 mr-3">
                                    <div class="symbol-label">
                           <span class="svg-icon svg-icon-md svg-icon-warning">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                   width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect opacity="0.200000003" x="0" y="0" width="24" height="24"/>
                                    <path d="M4.5,7 L9.5,7 C10.3284271,7 11,7.67157288 11,8.5 C11,9.32842712 10.3284271,10 9.5,10 L4.5,10 C3.67157288,10 3,9.32842712 3,8.5 C3,7.67157288 3.67157288,7 4.5,7 Z M13.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L13.5,18 C12.6715729,18 12,17.3284271 12,16.5 C12,15.6715729 12.6715729,15 13.5,15 Z"
                                          fill="#000000" opacity="0.3"/>
                                    <path d="M17,11 C15.3431458,11 14,9.65685425 14,8 C14,6.34314575 15.3431458,5 17,5 C18.6568542,5 20,6.34314575 20,8 C20,9.65685425 18.6568542,11 17,11 Z M6,19 C4.34314575,19 3,17.6568542 3,16 C3,14.3431458 4.34314575,13 6,13 C7.65685425,13 9,14.3431458 9,16 C9,17.6568542 7.65685425,19 6,19 Z"
                                          fill="#000000"/>
                                 </g>
                              </svg>
                           </span>
                                    </div>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold text-dark-25 text-hover-primary">История операций</div>
                                    <div class="text-muted">Список операций</div>
                                </div>
                            </div>
                        </a>
                        <a href="/tickets" class="navi-item">
                            <div class="navi-link">
                                <div class="symbol symbol-40 mr-3">
                                    <div class="symbol-label">
                           <span class="svg-icon svg-icon-md svg-icon-info">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                   width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"
                                          fill="#000000" opacity="0.3"/>
                                    <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"
                                          fill="#000000"/>
                                 </g>
                              </svg>
                           </span>
                                    </div>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold text-dark-25 text-hover-primary">Мои тикеты</div>
                                    <div class="text-muted">Список запросов</div>
                                </div>
                            </div>
                        </a>
                        <span class="navi-item mt-2">
               <span class="navi-link">
               <a href="/account/logout" class="btn btn-sm btn-light-primary font-weight-bolder py-3 px-6">Выйти</a>
               </span>
               </span>
                        <?php if ($user_access_level > 1): ?>
                            <div class="separator separator-dashed mt-8 mb-5"></div>
                            <a href="/admin" class="navi-item">
                                <div class="navi-link">
                                    <div class="symbol symbol-40 mr-3">
                                        <div class="symbol-label">
                           <span class="svg-icon svg-icon-md svg-icon-dark">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                   width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                          fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                          fill="#000000" fill-rule="nonzero"/>
                                 </g>
                              </svg>
                           </span>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold text-dark-25 text-hover-primary">Управление</div>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div id="kt_quick_panel" class="offcanvas offcanvas-right p-10">
                <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                    <h3 class="font-weight-bold m-0">Тикеты
                        <small class="text-muted font-size-sm ml-2">Список запросов</small>
                    </h3>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-hover-primary"
                       id="kt_quick_panel_close">
                        <i class="ki ki-close icon-xs text-muted"></i>
                    </a>
                </div>
                <div class="tab-pane fade pt-2 pr-5 mr-n5 scroll active show" id="kt_quick_panel_notifications"
                     role="tabpanel" style="height: auto; overflow: hidden;">
                    <ul class="navi navi-hover navi-active">
                        <?php foreach ($tickets as $item): ?>
                            <li class="navi-item">
                                <a class="navi-link" href="/tickets/view/index/<?php echo $item['ticket_id'] ?>">
                                    <div class="navi-text">
                                        <span class="d-block font-weight-bold text-dark-25 text-hover-primary"><?php echo $item['ticket_name'] ?></span>
                                        <span class="text-muted"><?php if ($item['ticket_status'] == 0): ?> Вопрос закрыт.
                                            <?php elseif ($item['ticket_status'] == 1): ?> Ваш вопрос рассматривают.
                                            <?php elseif ($item['ticket_status'] == 2): ?> Ответ от администрации.
                                            <?php endif; ?></span>
                                    </div>
                                    <?php if ($item['ticket_status'] == 2): ?>
                                        <span class="label label-light-primary font-weight-bold label-inline">new</span>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php if (empty($tickets)): ?>
                        <div class="alert alert-primary" role="alert">
                            На данный момент у вас нет запросов.
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div id="kt_quick_actions" class="offcanvas offcanvas-right p-10">
                <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                    <h3 class="font-weight-bold m-0">Авторизация
                        <small class="text-muted font-size-sm ml-2">История авторизации</small>
                    </h3>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-hover-primary"
                       id="kt_quick_actions_close">
                        <i class="ki ki-close icon-xs text-muted"></i>
                    </a>
                </div>
                <div class="offcanvas-content pr-5 mr-n5 scroll" style="height: auto; overflow: hidden;">
                    <?php foreach ($visitors as $item): ?>
                        <div class="d-flex align-items-center bg-dark-<?php if ($item['status'] == 0): ?>danger<?php elseif ($item['status'] == 1): ?>success<?php elseif ($item['status'] == 2): ?>warning<?php endif; ?>	 rounded p-5 mb-9">
                            <div class="d-flex flex-column flex-grow-1 mr-2">
                                <a href="/main/acc"
                                   class="font-weight-bold text-dark-25 text-hover-primary text-hover-primary font-size-lg mb-1">IP: <?php echo $item['ip'] ?></a>
                                <span class="text-muted font-weight-bold"><?php if ($item['status'] == 0): ?>
                                        Попытка входа в аккаунт -
                                    <?php elseif ($item['status'] == 1): ?>
                                        Вход в аккаунт -
                                    <?php elseif ($item['status'] == 2): ?>
                                        Выход с аккаунта -
                                    <?php endif; ?>
                                    <?php echo date("d.m.Y в H:i", strtotime($item['datetime'])) ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if (empty($visitors)): ?>
                        <span class="m-widget14__desc">
               <center>У вас нет активов.</center>
            </span>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($oplata_status == 1): ?>
            <div class="modal fade" id="hostin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Пополнение баланса</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <form id="samirForm" method="POST" class="form_0" style="padding:0px; margin:0px;">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Введите сумму</label>
                                    <input class="form-control" id="ammount" name="ammount" placeholder="100">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Отмена
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Пополнить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div id="kt_scrolltop" class="scrolltop">
         <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                 height="24px" viewBox="0 0 24 24" version="1.1">
               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24"/>
                  <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
                  <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero"/>
               </g>
            </svg>
         </span>
            </div>

            <script>var KTAppSettings = {"breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200},
                    "colors": {
                        "theme": {
                            "base": {
                                "white": "#ffffff",
                                "primary": "#0BB783",
                                "secondary": "#E5EAEE",
                                "success": "#1BC5BD",
                                "info": "#8950FC",
                                "warning": "#FFA800",
                                "danger": "#F64E60",
                                "light": "#F3F6F9",
                                "dark": "#212121"
                            },
                            "light": {
                                "white": "#ffffff",
                                "primary": "#D7F9EF",
                                "secondary": "#ECF0F3",
                                "success": "#C9F7F5",
                                "info": "#EEE5FF",
                                "warning": "#FFF4DE",
                                "danger": "#FFE2E5",
                                "light": "#F3F6F9",
                                "dark": "#D6D6E0"
                            },
                            "inverse": {
                                "white": "#ffffff",
                                "primary": "#ffffff",
                                "secondary": "#212121",
                                "success": "#ffffff",
                                "info": "#ffffff",
                                "warning": "#ffffff",
                                "danger": "#ffffff",
                                "light": "#464E5F",
                                "dark": "#ffffff"
                            }
                        },
                        "gray": {
                            "gray-100": "#F3F6F9",
                            "gray-200": "#ECF0F3",
                            "gray-300": "#E5EAEE",
                            "gray-400": "#D6D6E0",
                            "gray-500": "#B5B5C3",
                            "gray-600": "#80808F",
                            "gray-700": "#464E5F",
                            "gray-800": "#1B283F",
                            "gray-900": "#212121"
                        }
                    },
                    "font-family": "Poppins"
                };</script>
            <script src="/assets/js/darkjs/plugins.bundle.js"></script>
            <script src="/assets/js/darkjs/prismjs.bundle.js"></script>
            <script src="/assets/js/darkjs/scripts.bundle.js"></script>
            <script src="/application/public/js/main.js"></script>
            <script src="/application/public/js/jquery.form.min.js"></script>
            <script src="/assets/js/darkjs/fullcalendar.bundle.js"></script>
            <script src="/assets/js/darkjs/widgets.js"></script>
            <script src="/assets/js/totp.min.js"></script>
            <script src="/assets/js/jquery-qrcode-0.18.0.min.js"></script>
            <script>
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            </script>
            <script>
                $(document).ready(function () {
                    $("body").css("opacity", "1");

                    $(".user_email").each(function() {
                        $(this).text('<?php echo $user_email ?>'.replace(/(\w{3})[\w.-]+@([\w.]+\w)/, "$1***@$2"))
                    });
                });
            </script>
            <style>
                .toast {
                    -ms-flex-preferred-size: 350px;
                    flex-basis: 350px;
                    max-width: 350px;
                    font-size: 0.875rem;
                    background-color: rgba(255, 255, 255, 0.85);
                    background-clip: padding-box;
                    border: 1px solid rgba(0, 0, 0, 0.1);
                    box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
                    opacity: 0;
                    border-radius: 0.25rem;
                }

                .toast:not(:last-child) {
                    margin-bottom: 0.75rem;
                }

                .toast.showing {
                    opacity: 1;
                }

                .toast.show {
                    display: block;
                    opacity: 1;
                }

                .toast.hide {
                    display: none;
                }

                .toast-header {
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-align: center;
                    align-items: center;
                    padding: 0.25rem 0.75rem;
                    color: #bbc1cb;
                    background-color: rgba(255, 255, 255, 0.85);
                    background-clip: padding-box;
                    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
                    border-top-left-radius: calc(0.25rem - 1px);
                    border-top-right-radius: calc(0.25rem - 1px);
                }

                .toast-body {
                    padding: 0.75rem;
                }
            </style>
</body>
</html>