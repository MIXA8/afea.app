<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">

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
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/workers/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/responsive.css') }}">
</head>
<body>
<!-- login page start-->
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="login-card">
                <div>
                    <div class="login-main">
                        <form class="theme-form" action="{{ route('worker.authorization') }}" method="post">
                            @csrf
                            <h4>Войти в аккаунт</h4>
                            <p>Введите логин и пароль для входа</p>
                            <div class="form-group">
                                <label class="col-form-label">Логин</label>
                                <input class="form-control" type="text" name="login" required="" placeholder="Логин">
                                @if($errors->has('login'))
                                    <div class="col-6">
                                        <p style="color: red">{{ $errors->first('login') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Пароль</label>
                                <div class="form-input position-relative">
                                    <input class="form-control" type="password" name="password" required=""
                                           placeholder="*********">
                                    @if($errors->has('password'))
                                        <div class="col-6">
                                            <p style="color: red">{{ $errors->first('password') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="checkbox p-0">
                                    {{--                                </div><a class="link" href="forget-password.html">Забыл пароль?</a>--}}
                                    <div class="text-end mt-3">
                                        <style>
                                            .btn-primary {
                                                margin-top: 50px;
                                            }
                                        </style>
                                        <button class="btn btn-primary btn-block w-100" type="submit">Войти</button>
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
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
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/workers/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets/workers/js/script.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->
</div>
</body>
</html>
{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--@php--}}

{{--    var_dump($errors)--}}

{{--@endphp--}}

{{--@if(Auth::guard('workers')->check())--}}
{{--    true--}}
{{--@else--}}
{{--    false--}}
{{--@endif--}}

{{--<form action="{{ route('workersLogin') }}" method="post">--}}
{{--    @csrf--}}
{{--    <input type="text" name="login" value="Javonsher">--}}
{{--    <input type="text" name="password"  value="123456789">--}}
{{--    @if ( $errors->has('mobile'))--}}
{{--        <div class="info-block">--}}
{{--            {{ $errors->first('mobile') }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if ( $errors->has('password'))--}}
{{--        <div class="info-block">--}}
{{--            {{ $errors->first('password') }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if ( $errors->has('password_confirmation'))--}}
{{--        <div class="info-block">--}}
{{--            {{ $errors->first('password_confirmation') }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <input type="submit" >--}}
{{--</form>--}}
{{--</body>--}}
{{--</html>--}}
