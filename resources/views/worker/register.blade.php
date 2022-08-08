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
                    <div><a class="logo" href="index.html"><img class="img-fluid for-light"
                                                                src="{{ asset('assets/workers/images/logo/our_logo.png') }}"
                                                                alt="looginpage"><img class="img-fluid for-dark"
                                                                                      src="{{ asset('assets/workers/images/logo/our_logo.png') }}"
                                                                                      alt="looginpage"></a></div>
                    <div class="login-main">
                        <form class="theme-form" action="{{ route('worker.registration') }}" method="post">
                            @csrf
                            <h4>Сойздайте свой аккаунт</h4>
                            <p>Введите свои персональные данные, чтобы создать аккаунт</p>
                            <div class="form-group">
                                <label class="col-form-label pt-0">Ваше имя</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input class="form-control" type="text" required="" name="name"
                                               placeholder="Имя*">
                                    </div>
                                    @if($errors->has('name'))
                                        <div class="col-6">
                                            <p style="color: red">{{ $errors->first('name') }}</p>
                                        </div>
                                    @endif
                                    <div class="col-6">
                                        <input class="form-control" type="text" required="" name="surname"
                                               placeholder="Фамилия*">
                                    </div>
                                    @if($errors->has('surname'))
                                        <div class="col-6">
                                            <p style="color: red">{{ $errors->first('surname') }}</p>
                                        </div>
                                    @endif
                                    <div class="col-6">
                                        <input class="form-control" type="text" required="" name="patronymic"
                                               placeholder="Отчество*">
                                    </div>
                                    @if($errors->has('patronymic'))
                                        <div class="col-6">
                                            <p style="color: red">{{ $errors->first('patronymic') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Отделение*</label> <br>
                                <select required name="department" id="form-control">
                                    <option disabled="disabled" selected> -Выберите ваше отделение-</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('department'))
                                <div class="col-6">
                                    <p style="color: red">{{ $errors->first('department') }}</p>
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="col-form-label">Придумайте логин*</label>
                                <input class="form-control" type="text" name="login" required=""
                                       placeholder="IvanIvanov">
                                @if($errors->has('login'))
                                    <div class="col-6">
                                        <p style="color: red">{{ $errors->first('login') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Пароль*</label>
                                <div class="form-input position-relative">
                                    <input class="form-control" type="password" name="password" required=""
                                           placeholder="*********">
                                    <div class="show-hide"><span class="show"></span></div>
                                </div>
                                <label class="col-form-label">Повторите пароль*</label>
                                <div class="form-input position-relative">
                                    <input class="form-control" type="password" name="password_confirmation" required=""
                                           placeholder="*********">
                                    <div class="show-hide"><span class="show"></span></div>
                                </div>
                                @if($errors->has('password'))
                                    <div class="col-6">
                                        <p style="color: red">{{ $errors->first('password') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block w-100" type="submit">Создать аккаунт</button>
                            </div>
                            {{--                            <p class="mt-4 mb-0">У вас уже есть аккаунт?<a class="ms-2" href="login.html">Войти</a></p>--}}
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
