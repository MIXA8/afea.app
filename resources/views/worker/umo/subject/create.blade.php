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
@php(var_dump($errors));
<form action="{{ route('subject.store') }}" method="post">
    @csrf
    <input type="text" name="title" value="Laravel Основы">
    <input type="text" name="description" >
    <select name="type">
        @foreach($types as $type)
            <option value="{{ $type->title }}">{{ $type->title }}</option>
        @endforeach
    </select>
    <select name="worker_id">
        @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->name }} {{ $teacher->patronymic }}</option>
        @endforeach
    </select>
    <input type="color" name="colour" value="#ffffff">
    <input type="submit">
</form>

</body>
</html>
