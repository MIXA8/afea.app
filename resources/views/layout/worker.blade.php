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

    @yield('meta')
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/input.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/responsive.css') }}">
    <!-- Style calendar -->
    {{--    <link rel="stylesheet" href="{{ asset('assets/workers/css/style_calendar.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('assets/workers/css/type-style.css') }}">
    @yield('css')
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
@include('layout.section.header')
<!-- Page Header Ends-->
    <!-- Page Body Start-->
    @include('layout.section.left-menu')

    <div class="page-body">
        <div class="container-fluid">
            <div class="row second-chart-list third-news-update">

                @yield('bread_crumbs')

                <!-- Календарь -->

                @yield('content')
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
@yield('js')
<!-- Theme js-->
<script src="{{ asset('assets/workers/js/script.js') }}"></script>

</body>
</html>
