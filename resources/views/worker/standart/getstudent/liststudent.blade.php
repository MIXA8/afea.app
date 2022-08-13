@extends('layout.worker')


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
            <a href="Posesenie.html">Главная &nbsp;</a>/
            <a href="student-edit.html">&nbsp; Деаканат &nbsp;</a>/
            <a href="student-edit.html">&nbsp; Группы &nbsp;</a>/
            <a href="student-edit.html">&nbsp; {{ $group->title }} &nbsp;</a>
        </div>
    </div>
@endsection


@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header col-sm-12">
                <h5>Список студентов {{ $group->title }} </h5>
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
                                        <td><a href="{{ route('worker.student.information',['id'=>$student->id]) }}">
                                                <button class="btn btn-outline-primary" type="button" title="">
                                                    Изменить
                                                </button>
                                            </a></td>
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
