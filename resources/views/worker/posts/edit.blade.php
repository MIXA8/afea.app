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
<form action="{{ route('writter.update',['writter'=>$post->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{--    @dd($categorys)--}}
    <input type="text" name="title" value="{{ $post->title }}">
    <input type="text" name="shorts" value="{{ $post->shorts }}">
    <textarea  name="text" >{{ $post->text }}</textarea>
    <img width="10%" src="{{ asset('/storage/'.$department->img) }}" >
    <img width="10%" src="{{ asset('/storage/'.$post->img) }}" >
    <input type="hidden" name="worker_id" value="{{ \Illuminate\Support\Facades\Auth::guard('worker')->user()->id }}">
    <select name="status">
        @foreach($status as $stat)
            @if($stat==$post->status)
            <option value="{{ $stat }}" selected> {{ $stat }}</option>
            @else
                <option value="{{ $stat }}" > {{ $stat }}</option>
            @endif
        @endforeach
    </select>
    <input type="file" name="img" >
    <input type="submit" >
</form>

</body>
</html>
