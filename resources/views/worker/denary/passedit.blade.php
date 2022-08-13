@extends('layout.worker')

@section('meta')
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}"/>
@endsection

@section('css')
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/style_calendar.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/workers/css/DataTable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/workers/css/datatable-extension.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/workers/css/datatables.css') }}">

@endsection


@section('bread_crumbs')

    <div #poloska>
        <div id="stud">Журнал учета посещяемости {{ $group->title }}</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="{{ route('worker.denary.index') }}">&nbsp; Деаканат &nbsp;</a>/
            <a href="{{ route('worker.denary.group.all.student',['group'=>$group->id]) }}">&nbsp; {{ $group->title }} &nbsp;</a>/
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
                <div class="dt-ext table-responsive" id="tablePDF">
                    <table class="display" id="export-button">
                        <thead>
                        <tr>
                            <th>ФИО студента</th>
                            <th>1 пара</th>
                            <th>2 пара</th>
                            <th>3 пара</th>
                            <th>4 пара</th>
                            <th>5 пара</th>
                            <th>Общее</th>
                            <th>За семестр</th>
                        </tr>
                        </thead>
                        <tbody id="fuck">
                        @foreach($group->studentsGroup as $student)
                            <tr>
                                <td>
                                    <a href="{{ route('worker.student.information',['id'=>$student->id]) }}"> {{ $student->name }} {{ $student->surname }} {{ $student->patronymic }}</a>
                                </td>
                                <td>
                                    <select name="lesson" data-match="1" data-group="{{ $student->group }}"
                                            data-url="{{ route('worker.add.pass') }}" data-student="{{ $student->id }}"
                                            id="lesson"
                                            class="java">
                                        @php
                                            $match_1=$passes->where('student_id',$student->id)->where('lesson_part',1);
                                        @endphp
                                        {!!  \App\Models\Pass::passForm($match_1) !!}
                                    </select>
                                </td>
                                <td>
                                    <select name="lesson" data-match="2" data-group="{{ $student->group }}"
                                            data-url="{{ route('worker.add.pass') }}" data-student="{{ $student->id }}"
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
                                            data-url="{{ route('worker.add.pass') }}" data-student="{{ $student->id }}"
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
                                            data-url="{{ route('worker.add.pass') }}" data-student="{{ $student->id }}"
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
                                            data-url="{{ route('worker.add.pass') }}" data-student="{{ $student->id }}"
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
            @else
                <h1 align="center">Студентов нет</h1>
            @endif
        </div>
    </div>
@endsection


@section('js')
    <!-- Скрипты для таблицы -->
    <script src="{{ asset('assets/workers/js/DataTable.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatables/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/dataTables.buttons.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/jszip.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/buttons.colVis.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/pdfmake.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/vfs_fonts.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/dataTables.autoFill.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/dataTables.select.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/buttons.html5.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/buttons.print.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/dataTables.responsive.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/dataTables.keyTable.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/dataTables.colReorder.min.js') }} "></script>
    <script
        src="{{ asset('assets/workers/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/dataTables.scroller.min.js') }} "></script>
    <script src="{{ asset('assets/workers/js/datatable/datatable-extension/custom.js') }} "></script>
    <script src="{{ asset('assets/workers/js/tooltip-init.js') }} "></script>

    <script src="{{ asset('assets/workers/js/datatable/datatables/dataTableJava.js') }} "></script>
    <script src="{{ asset('assets/workers/js/dataTables.bootstrap4.min.js') }} "></script>
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


