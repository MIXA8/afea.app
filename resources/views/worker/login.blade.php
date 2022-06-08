<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@php

    var_dump($errors)

@endphp

@if(Auth::guard('worker')->check())
    true
@else
    false
@endif

<form action="{{ route('WorkerLogin') }}" method="post">
    @csrf
    <input type="text" name="login" value="Javonsher">
    <input type="text" name="password"  value="123456789">
    @if ( $errors->has('mobile'))
        <div class="info-block">
            {{ $errors->first('mobile') }}
        </div>
    @endif
    @if ( $errors->has('password'))
        <div class="info-block">
            {{ $errors->first('password') }}
        </div>
    @endif
    @if ( $errors->has('password_confirmation'))
        <div class="info-block">
            {{ $errors->first('password_confirmation') }}
        </div>
    @endif
    <input type="submit" >
</form>
</body>
</html>
