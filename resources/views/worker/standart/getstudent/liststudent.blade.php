@extends('layout.worker')


@section('title')
    Список студентов
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/worker/css/style_calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/worker/css/type-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/worker/css/sedit.css') }}">
@endsection

@section('bread_crumbs')
    <div #poloska>
        <div id="stud">Список студентов</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="#">&nbsp; Деканат &nbsp;</a>/
            <a href="{{ route('group.index') }}">&nbsp; Группы &nbsp;</a>/
            <a href="#">&nbsp; {{ $group->title }} &nbsp;</a>
        </div>
    </div>
@endsection


@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header col-sm-12">
                <h5>Список студентов {{ $group->title }} </h5>
                <hr>
                @if(Auth::guard('worker')->user()->department_worker->title == "Деканат")
                    <button class="btn btn-outline-info" type="button" title=""
                            onclick="window.location.href='{{ route('worker.denary.student.create',['group'=>$group->id]) }}'">
                        Добавить студента
                    </button>
                    <button class="btn btn-outline-info" onclick="window.location.href='{{ route('coming.soon') }}'"
                            type="button" title="">Добавить студентов
                    </button>
                @endif
            </div>
            <div class="card-block row">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                        @if(count($students)>0)
                            <table class="table">
                                <thead class="table-active">
                                <tr>
                                    <th scope="col" style="color: white">#</th>
                                    <th scope="col" style="color: white">Имя</th>
                                    <th scope="col" style="color: white">Фамилия</th>
                                    <th scope="col" style="color: white">№ паспотра</th>
                                    <th scope="col" style="color: white">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <th scope="row">{{ $loop->index +1}}</th>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->surname }}</td>
                                        <td>{{ $student->passport }}</td>
                                        @if(Auth::guard('worker')->user()->department_worker->title == "Деканат")
                                            <td>
                                                <a href="{{ route('worker.student.information',['id'=>$student->id]) }}">
                                                    <button class="btn btn-outline-primary" type="button" title="">
                                                        Изменить
                                                    </button>
                                                </a></td>
                                        @else
                                            <td>
                                                <a href="{{ route('worker.student.all.information',['id'=>$student->id]) }}">
                                                    <button class="btn btn-outline-primary" type="button" title="">
                                                        Посмотреть
                                                    </button>
                                                </a></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h1 align="center">Cтудентов нет</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
