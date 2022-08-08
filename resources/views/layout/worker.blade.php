<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/workers/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/workers/images/favicon.png') }}" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/vendors/animate.css') }}">
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/vendors/chartist.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/vendors/date-picker.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/workers/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/responsive.css') }}">
    <!-- Style calendar -->
{{--    <link rel="stylesheet" href="{{ asset('assets/workers/css/style_calendar.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('assets/workers/css/type-style.css') }}">
    <script src="https://kit.fontawesome.com/6378db4e91.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>

    </style>
</head>
<body onload="startTime()">
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-header">
        <div class="header-wrapper row m-0">

            <div class="poisk">
                <input class="input" type="text" placeholder="Поиск групп и студентов">
                <div class="searchbox">
                    <a href="#" class="searchbtn"><i class="fa-solid fa-magnifying-glass searchicon"></i></a>
                </div>
            </div>


            <form class="form-inline search-full col" action="#" method="get">
                <div class="form-group w-100">4
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                   placeholder="Search Cuba .." name="q" title="" autofocus>
                            <div class="spinner-border Typeahead-spinner" role="status"><span
                                    class="sr-only">Loading...</span></div>
                            <i class="close-search" data-feather="x"></i>
                        </div>
                        <div class="Typeahead-menu"></div>
                    </div>
                </div>
            </form>
            <div class="header-logo-wrapper col-auto p-0">
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid"
                                                                    src="{{ asset('assets/workers/images/our_logo.png')}}"
                                                                    alt=""></a>

                </div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                                               data-feather="align-center"></i></div>
            </div>
            <div class="left-header col horizontal-wrapper ps-0">
                <ul class="horizontal-menu">
                    <style>

                    </style>

                </ul>
            </div>
            <div class="nav-right col-8 pull-right right-header p-0">
                <ul class="nav-menus">

                    <div class="onhover-show-div bookmark-flip">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="front">
                                    <ul class="droplet-dropdown bookmark-dropdown">

                                    </ul>
                                </div>
                                <div class="back">
                                    <ul>
                                        <li>
                                            <button class="d-block flip-back" id="flip-back">Back</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </li>
                    <li>
                        <div class="mode"><i class="fa fa-moon-o"></i></div>
                    </li>

                    <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                data-feather="maximize"></i></a></li>
                    <li class="profile-nav onhover-dropdown p-0 me-0">
                        <div class="media profile-media"><img class="b-r-10"
                                                              src="{{ asset('assets/workers/images/dashboard/profile.jpg') }}" alt="">
                            <div class="media-body"><span>Emay Walter</span>
                                <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            <li><a href="#"><i data-feather="user"></i><span>Аккаунт </span></a></li>
                            <!-- <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
                            <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li> -->
                            <li><a href="#"><i data-feather="settings"></i><span>Настройки</span></a></li>
                            <li><a href="#"><i data-feather="log-in"> </i><span>Вход</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <script class="result-template" type="text/x-handlebars-template">
                <div class="ProfileCard u-cf">
                    <div class="ProfileCard-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-airplay m-0">
                            <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                            <polygon points="12 15 17 21 7 21 12 15"></polygon>
                        </svg>
                    </div>
                    <div class="ProfileCard-details">
                        <div class="ProfileCard-realName"></div>
                    </div>
                </div>
            </script>
            <script class="empty-template" type="text/x-handlebars-template">
                <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down,
                    yikes!
                </div></script>
        </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
            <div>
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                                                                    src="{{ asset('assets/workers/images/our_logo.png') }}" alt=""><img
                            class="img-fluid for-dark" src="#" alt=""></a>
                    <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
                    </div>
                </div>
                <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="#" alt=""></a></div>
                <nav class="sidebar-main">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="sidebar-menu">
                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn"><a href="index.html"><img class="img-fluid" src="#" alt=""></a>
                                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                                      aria-hidden="true"></i></div>
                            </li>
                            <li class="sidebar-main-title">
                                <
                                <div>
                                    <h6 class="lan-1">Деканат</h6>

                                </div>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span
                                        class="lan-3">Домашняя              </span></a>
                                <ul class="sidebar-submenu">
                                    <li><a class="lan-4" href="posesenie.html">Посещаемость</a></li>
                                    <li><a class="lan-5" href="#">Статистика</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title" href="#"><i data-feather="sliders"></i><span
                                        class="lan-3">Управление              </span></a>
                                <ul class="sidebar-submenu">
                                    <li><a class="lan-4" href="student-edit.html">Студенты</a></li>
                                    <li><a class="lan-5" href="#">Группы</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title" href="#"><i data-feather="mail"></i><span
                                        class="lan-3">E-mail              </span></a>
                                <ul class="sidebar-submenu">
                                    <li><a class="lan-4" href=".html">бла-бла</a></li>
                                    <li><a class="lan-5" href="#">Бла-бла</a></li>
                                </ul>
                            </li>
                            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="row second-chart-list third-news-update">


                    <!-- Календарь -->


                    <!-- <div class="col-xl-4 col-lg-12 xl-50 calendar-sec box-col-6" id="calendar_style_css">
                      <div class="card gradient-primary o-hidden">
                        <div class="card-body">
                          <div class="setting-dot">
                            <div class="setting-bg-primary date-picker-setting position-set pull-right"><i class="fa fa-spin fa-cog"></i></div>
                          </div>
                          <div class="default-datepicker">
                            <div class="datepicker-here" data-language="en"></div>
                          </div><span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">                </span></span></span>
                        </div>
                      </div>
                    </div> -->


                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
    </div>
</div>
<!-- latest jquery-->
<script src="{{ asset('assets/workers/js/jquery-3.5.1.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets/workers/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('assets/workers/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/workers/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<script src="{{ asset('assets/workers/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('assets/workers/js/scrollbar/custom.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('assets/workers/js/config.js') }}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('assets/workers/js/sidebar-menu.js') }}"></script>

<script src="{{ asset('assets/workers/js/notify/index.js') }}"></script>

<!-- скрипты на календарь не удалять -->
<script src="{{ asset('assets/workers/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('assets/workers/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('assets/workers/js/datepicker/date-picker/datepicker.custom.js') }}"></script>


<script src="{{ asset('assets/workers/js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('assets/workers/js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('assets/workers/js/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('assets/workers/js/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('assets/workers/js/typeahead-search/typeahead-custom.js') }}"></script>
<script src="{{ asset('assets/workers/js/tooltip-init.js') }}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('assets/workers/js/script.js') }}"></script>

</body>
</html>
