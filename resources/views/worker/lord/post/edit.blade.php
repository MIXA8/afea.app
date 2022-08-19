@extends('layout.worker')

@section('title')
    Список групп
@endsection

@section('bread_crumbs')
    <div #poloska>
        <div id="stud">Управления постами</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="{{ route('post.index') }}">&nbsp; Посты &nbsp;</a>
            {{--            <a href="#">&nbsp; {{$course}} курс &nbsp;</a>/--}}
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Создание новой группы</h5>
        </div>
        <div class="card-body">
            {{ var_dump($errors) }}
            <form method="post" action="{{ route('post.update',['post'=>$post->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Заголовок</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{ $post->title }}" name="title" data-bs-original-title="" title="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="hidden" name="worker_id"
                                   value="{{ $post->worker_id }}">
                            <label class="col-sm-3 col-form-label">Краткий. обзор</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       data-bs-original-title="" value="{{ $post->shorts }}" name="shorts" title="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="exampleFormControlSelect12">Статус
                                select</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="exampleFormControlSelect12" name="status">
                                    @foreach(\App\Models\Post::$status as $stat)
                                        <option>{{ $stat['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Статья</label>
                            <div class="col-sm-9">
                                <textarea name="text" class="form-control" rows="5" cols="5"
                                          placeholder="Статья">{{ $post->text }}</textarea>
                            </div>
                        </div>
                        <img width="200px" src="{{ asset('storage/'.$post->img) }}">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Изображения</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="img" type="file" data-bs-original-title="" title="">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Изменить</button>
                </div>
            </form>
        </div>
@endsection
