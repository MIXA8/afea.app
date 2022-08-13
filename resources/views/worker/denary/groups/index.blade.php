@extends('layout.worker')

@section('bread_crumbs')
    <div #poloska>
        <div id="stud">Управления группамми</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="#">&nbsp; Деаканат &nbsp;</a>/
            <a href="#">&nbsp; Группы &nbsp;</a>/
            <a href="#">&nbsp; {{$course}} курс &nbsp;</a>/
        </div>
    </div>
@endsection


@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header col-sm-12">
                <h5>Группы {{$course}} курса</h5>
                <hr>
                <a href="{{  route('group.create')}}">
                    <button class="btn btn-primary" type="submit">Добавить группу</button>
                </a>
                <button class="btn btn-primary" type="button">Добавить несколько групп</button>
                <hr>
                <div class="poseshenie grid-align">
                    <div class="buttonCourse">
                        <button class="btn btn-outline-info" id="buttonLesson1"
                                onClick="window.location.href='{{ route('group.index',['course'=>1]) }}';">
                            1-курс
                        </button>
                        <button class="btn btn-outline-info" id="buttonLesson2"
                                onClick="window.location.href='{{ route('group.index',['course'=>2]) }}';">
                            2-курс
                        </button>
                        <button class="btn btn-outline-info" id="buttonLesson3"
                                onClick="window.location.href='{{ route('group.index',['course'=>3]) }}';">
                            3-курс
                        </button>
                        <button class="btn btn-outline-info" id="buttonLesson4"
                                onClick="window.location.href='{{ route('group.index',['course'=>4]) }}';">
                            4-курс
                        </button>
                        <button class="btn btn-outline-info" id="buttonLesson5"
                                onClick="window.location.href='{{ route('group.index',['course'=>5]) }}';">
                            5-курс
                        </button>
                    </div>
                    <hr class="horizontalHr">
                </div>
            </div>
            <div class="card-block row">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                        @if(count($groups)>0)
                            <table class="table">
                                <thead class="table-active">
                                <tr>
                                    <th scope="col" style="color: white">#</th>
                                    <th scope="col" style="color: white">Названия</th>
                                    <th scope="col" style="color: white">Кол.во студентов</th>
                                    <th scope="col" style="color: white">Изменить</th>
                                    <th scope="col" style="color: white">Удалить</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($groups as $group)
                                    <tr>
                                        <th scope="row">{{ $loop->index+1 }}</th>
                                        <td>{{ $group->title }}</td>
                                        <td>
                                            <a href="{{ route('worker.denary.group.all.student',['group'=>$group->id]) }}">{{ count($group->studentsGroup) }}</a>
                                        </td>
                                        <td>
                                            <form class="col-sm"
                                                  action="{{ route('group.edit',['group'=>$group->id]) }}"
                                                  method="get">
                                                @csrf
                                                <input type="hidden" value="{{ $group->id  }}">
                                                <button class="btn btn-pill btn-outline-primary btn-sm" type="submit">
                                                    изменить
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="delete" class="col-sm"
                                                  action="{{ route('group.destroy',['group'=>$group->id]) }}"
                                                  method="post"
                                                  onSubmit="return confirm('Вы уверены что хотите удалить группу {{ $group->title }} ?');">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-pill btn-outline-secondary btn-sm" value="1"
                                                        type="submit"
                                                        title="">удалить
                                                </button>
                                            </form>
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



