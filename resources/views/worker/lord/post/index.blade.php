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

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Список постов</h4>
                <button class="btn btn-primary" type="button"  onclick="window.location.href='{{ route('post.create') }}'">Добавить статью
                </button>
            </div>
            <div class="card-header col-sm-12">
                <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            @if(count($posts)>0)
                                <table class="table">
                                    <thead class="table-active">
                                    <tr>
                                        <th scope="col" style="color: white">#</th>
                                        <th scope="col" style="color: white">Заголовок</th>
                                        <th scope="col" style="color: white">Текст(короткий)</th>
                                        <th scope="col" style="color: white">Картинка</th>
                                        <th scope="col" style="color: white">Кафедра</th>
                                        <th scope="col" style="color: white">Статус</th>
                                        <th scope="col" style="color: white">Удален</th>
                                        <th scope="col" style="color: white">Изменить</th>
                                        <th scope="col" style="color: white">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $loop->index+1 }}</th>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->shorts }}</td>
                                            <td><img width="70px" src="{{ asset('storage/'.$post->img ) }}"></td>
                                            <td>{{ $post->department->title }}</td>
                                            <td>{{ $post->status }}</td>
                                            <td>{{ $post->delete }}</td>
                                            <td><a href="{{ route('post.edit',['post'=>$post->id]) }}">Изменить</a></td>
                                            <td>
                                                <form action="{{ route('post.destroy',['post'=>$post->id]) }}"
                                                      method='post'>@csrf @method('DELETE')<input class="btn btn-info" value="Удалить"
                                                                                                  type="submit"></form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h1 align="center">Групп нет</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection



