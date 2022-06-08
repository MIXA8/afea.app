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

{{--@if(Auth::guard('student')->check())--}}
{{--    true--}}
{{--@else--}}
{{--    false--}}
{{--@endif--}}

<form action="{{ route('indep') }}" method="post">
    @csrf
    <input type="text" name="name" value="Javonsher">
    <input type="text" name="surname" value="Rakhimov">
    <input type="text" name="patronymic"  value="Bah">
    <input type="text" name="department" value="1">
    <input type="text" name="login" value="Javonsher">
    <input type="text" name="password"  value="123456789">

    <input type="submit" >
</form>
</body>
</html>
