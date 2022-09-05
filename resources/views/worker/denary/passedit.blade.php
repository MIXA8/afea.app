@extends('layout.worker')

@section('meta')
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}"/>
@endsection

@section('title')
    Журнал посещаемости
@endsection


@section('css')

    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/style_calendar.css')  }}">

    <link rel="stylesheet" href="{{ asset('assets/workers/css/datatable-extension.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/workers/css/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/workers/css/DataTable.css') }}">
    <style>
        .alert-table {
            display: none;
        }

        .valueZero {
            background-color: #6c6c6c;
            border: 1px solid #6c6c6c
        }

        .valueSuccessNB {
            background-color: #92dc35;
            border: 1px solid #92dc35;
        }

        .valueSuccessNB:hover {
            box-shadow: 2px 2px 15px #92dc35;
        }

        .valueDangerNB {
            background-color: #dc3545;
            border: 1px solid #dc3545;
        }

        .valueDangerNB:hover {
            box-shadow: 2px 2px 15px #dc3545;
        }

        .valueLate {
            background-color: #49a6e0;
            border: 1px solid #49a6e0;
        }

        .valueLate:disabled:hover {
            box-shadow: 2px 2px 15px #49a6e0;
        }
    </style>
@endsection


@section('bread_crumbs')

    <div #poloska>
        <div id="stud">Журнал учета посещаемости {{ $group->title }}</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="{{ route('worker.denary.index') }}">&nbsp; Деканат &nbsp;</a>/
            <a href="{{ route('worker.denary.group.all.student',['group'=>$group->id]) }}">&nbsp; {{ $group->title }}
                &nbsp;</a>/
            <a href="{{ route('worker.denary.index',['date'=>$date]) }}">&nbsp; {{ $date }}</a>
        </div>
    </div>

@endsection


@section('content')

    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <input type="submit" value="Назад" id="btnBack" class="btnDay">
                <input id="date" type="date" value="{{ $date }}">
                <input type="submit" value="Вперед" id="btnNext" class="btnDay">
            </div>

            @if(count($group->studentsGroup)>0)
                <div class="card-body">
                    <button class="btn btn-primary" type="button"
                            onclick="window.location.href='{{ route('pass.pdf',['group'=>$group]) }}'">Распечатать
                    </button>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                            <table class="display dataTable no-footer" id="basic-1" role="grid"
                                   aria-describedby="basic-1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        style="width: 174.288px;">ФИО студента
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1"

                                        style="width: 282.163px;">1 пара
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1"
                                        style="width: 123.85px;">
                                        2 пара
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1"
                                        style="width: 54.2125px;">
                                        3 пара
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1"

                                        style="width: 120.312px;">4 пара
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1"
                                        style="width: 97.375px;">
                                        5 пара
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1"
                                        style="width: 97.375px;">
                                        Общее
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1"
                                        style="width: 97.375px;">
                                        За семестр
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($group->studentsGroup as $student)
                                    <tr>
                                        <td>
                                            <a href="{{ route('worker.student.information',['id'=>$student->id]) }}"> {{ $student->name }} {{ $student->surname }} {{ $student->patronymic }}</a>
                                        </td>
                                        <td>
                                            <select name="lesson" data-match="1"
                                                    data-group="{{ $student->group }}"
                                                    data-url="{{ route('worker.add.pass') }}"
                                                    data-student="{{ $student->id }}"
                                                    id="lesson"
                                                    class="java"
                                            >
                                                @php
                                                    $match_1=$passes->where('student_id',$student->id)->where('lesson_part',1);
                                                @endphp
                                                {!!  \App\Models\Pass::passForm($match_1) !!}
                                            </select>
                                        </td>
                                        <td>
                                            <select name="lesson" data-match="2" data-group="{{ $student->group }}"
                                                    data-url="{{ route('worker.add.pass') }}"
                                                    data-student="{{ $student->id }}"
                                                    id="lesson"
                                                    class="java">
                                                @php
                                                    $match_2=$passes->where('student_id',$student->id)->where('lesson_part',2);
                                                @endphp
                                                {!! \App\Models\Pass::passForm($match_2) !!}
                                            </select>
                                        </td>
                                        <td>
                                            <select name="lesson" data-match="3" data-group="{{ $student->group }}"
                                                    data-url="{{ route('worker.add.pass') }}"
                                                    data-student="{{ $student->id }}"
                                                    id="lesson"
                                                    class="java">
                                                @php
                                                    $match_3=$passes->where('student_id',$student->id)->where('lesson_part',3);
                                                @endphp
                                                {!! \App\Models\Pass::passForm($match_3) !!}
                                            </select>
                                        </td>
                                        <td>
                                            <select name="lesson" data-match="4" data-group="{{ $student->group }}"
                                                    data-url="{{ route('worker.add.pass') }}"
                                                    data-student="{{ $student->id }}"
                                                    id="lesson"
                                                    class="java">
                                                @php
                                                    $match_4=$passes->where('student_id',$student->id)->where('lesson_part',4);
                                                @endphp
                                                {!! \App\Models\Pass::passForm($match_4) !!}
                                            </select>
                                        </td>
                                        <td>
                                            <select name="lesson" data-match="5" data-group="{{ $student->group }}"
                                                    data-url="{{ route('worker.add.pass') }}"
                                                    data-student="{{ $student->id }}"
                                                    id="lesson"
                                                    class="java">
                                                @php
                                                    $match_5=$passes->where('student_id',$student->id)->where('lesson_part',5);
                                                @endphp
                                                {!! \App\Models\Pass::passForm($match_5) !!}
                                            </select>
                                        </td>
                                        <td> {{ count($passes->where('student_id',$student->id)->where('day',\Carbon\Carbon::create($date)->day)->where('month',\Carbon\Carbon::create($date)->month)->where('year',\Carbon\Carbon::create($date)->year)->where('pass',1)) }}</td>
                                        <td> {{ \App\Models\Pass::countPassSeason($allPass,$date,$student->id) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <h1 align="center">Студентов нет</h1>
            @endif
        </div>
    </div>
@endsection


@section('js')
    <!-- Скрипты для таблицы -->
    <script src="{{ asset('assets/workers/js/datatable/datatables/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatables/datatable.custom.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatables/dataTableJava.js') }} "></script>
    <script src="{{ asset('assets/workers/js/dataTables.bootstrap4.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/selectChangeClass.js') }} "></script>
    {{--    <script src="{{ asset('assets/workers/js/tooltip-init.js') }} "></script>--}}

    <script>
        $("#date").change(function () {
            var date = document.getElementById('date').value;
            var url_first = '{{ route('pass.edit',['group'=>$group]) }}';
            var url_two = `?date=${date}`;
            var fullurl = url_first + url_two;
            window.location.replace(fullurl);
        });
        $("#btnBack").click(function () {
            var date = document.getElementById('date').value;
            var url_first = '{{ route('pass.edit',['group'=>$group]) }}';
            var url_two = `?date=${date}&mod=1`;
            var fullurl = url_first + url_two;
            console.log(fullurl);
            window.location.replace(fullurl);
        });
        $("#btnNext").click(function () {
            var date = document.getElementById('date').value;
            var url_first = '{{ route('pass.edit',['group'=>$group]) }}';
            var url_two = `?date=${date}&mod=2`;
            var fullurl = url_first + url_two;
            console.log(fullurl);
            window.location.replace(fullurl);
        });
    </script>
@endsection


