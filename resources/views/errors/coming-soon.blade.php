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

    <title>Вы пришли слишком ранно!</title>
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
<body>
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Body Start-->
    <div class="container-fluid p-0">
        <div class="comingsoon auth-bg-video">
            <video class="bgvideo-comingsoon" id="bgvid" playsinline="" autoplay="" muted="" loop="">
                <source src="{{ asset('assets/workers/video/auth-bg.mp4')}}" type="video/mp4">
            </video>
            <div class="comingsoon-inner text-center"><img style="width: 150px"
                                                           src="{{ asset('assets/workers/images/connect-errors/connect-info.png') }}"
                                                           alt="">
                <h3>Connect</h3>
                <h2>Это часть платформы находиться в разработке</h2>
                <div class="countdown" id="clockdiv">
                    <ul>
                        <p style="font-size: 32px">Дата релиза: неизвестно</p>
                        <button class="btn btn-primary btn-sm" type="button" onclick="history.go(-1)" title="">Назад
                        </button>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
