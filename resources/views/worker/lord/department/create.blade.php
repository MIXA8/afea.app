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

@php(var_dump($errors))
<form action="{{ route('department.store') }}" method="post" enctype="multipart/form-data">
    @csrf
{{--    @dd($categorys)--}}
    <input type="text" name="title" value="ТС">
    <input type="text" name="description" value="Рахимов">
    <select name="category">
        @foreach($categorys as $category)
            <option value="{{ $category}}">{{ $category }}</option>
        @endforeach
    </select>
    <input type="file" name="img" >
    <input type="submit" >
</form>

</body>
</html>
