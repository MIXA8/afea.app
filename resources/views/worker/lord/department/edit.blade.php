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
<form action="{{ route('department.update',['department'=>$department->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{--    @dd($categorys)--}}
    <input type="text" name="title" value="{{ $department->title }}">
    <input type="text" name="description" value="{{ $department->description }}">
    <select name="category">
        @foreach($categorys as $category)
            @if($category == $department->category)
                <option value="{{ $category }}" selected>{{ $category }}</option>
            @else
                <option value="{{ $category }}">{{ $category }}</option>
            @endif
        @endforeach
    </select>
    <select name="writter">
        @foreach($workers as $worker)
            @if($worker->id == $department->writter)
                <option value="{{ $worker->id }}" selected>{{ $worker->name }} {{ $worker->patronymic }}</option>
            @else
                <option value="{{ $worker->id }}">{{ $worker->name }} {{ $worker->patronymic }}</option>
            @endif
        @endforeach
    </select>
    <select name="senior">
        @foreach($workers as $worker)
            @if($worker->id == $department->senior)
                <option value="{{ $worker->id }}" selected>{{ $worker->name }} {{ $worker->patronymic }}</option>
            @else
                <option value="{{ $worker->id }}">{{ $worker->name }} {{ $worker->patronymic }}</option>
            @endif
        @endforeach
    </select>
    <input type="file" name="img">
    <img width="20%" src="{{ asset('storage/'.$department->img) }}">
    <input type="submit">
</form>

</body>
</html>
