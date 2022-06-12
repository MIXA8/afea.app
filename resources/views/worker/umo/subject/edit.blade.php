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
{{--@dd($subject->id)--}}
<form action="{{ route('subject.update',['subject'=>$subject->id]) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $subject->title }}">
    <input type="text" name="description" value="{{ $subject->description }}">
    <select name="type">
        @foreach($types as $type)
            @if($type->title == $subject->type)
                <option value="{{ $type->title }}" selected>{{ $type->title }}</option>
            @else
                <option value="{{ $type->title }}">{{ $type->title }}</option>
            @endif
        @endforeach
    </select>
    <select name="worker_id">
        @foreach($teachers as $teacher)
            @if ( $teacher->id == $subject->worker_id)
                <option value="{{ $teacher->id }}" selected>{{ $teacher->name }} {{ $teacher->patronymic }}</option>
            @else
                <option value="{{ $teacher->id }}">{{ $teacher->name }} {{ $teacher->patronymic }}</option>
            @endif
        @endforeach
    </select>
    <input type="color" name="colour" value="{{ $subject->colour}}">
    <input type="submit">
</form>

</body>
</html>
