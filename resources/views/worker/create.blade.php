<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ВВВВВВВВВВВВВВВВВВВВВВВВВ</title>
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

<form action="{{ route('workers/umo/room') }}" method="post">
    @csrf

    <input type="submit" >
</form>
</body>
</html>
