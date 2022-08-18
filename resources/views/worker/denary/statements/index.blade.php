@extends('layout.worker')

@section('title')
    Список заявлений
@endsection

@section('css')
    {{--    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}"/>--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/style_calendar.css')  }}">--}}
    {{--    <link rel="stylesheet" href="{{ asset('assets/workers/css/DataTable.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ asset('assets/workers/css/datatable-extension.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ asset('assets/workers/css/datatables.css') }}">--}}

@endsection

@section('bread_crumbs')
    <div #poloska>
        <div id="stud">Управления заявлениями</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="#">&nbsp; Деканат &nbsp;</a>/
            <a href="{{ route('group.index') }}">&nbsp; Заявление &nbsp;</a>/
            <a href="#">&nbsp; {{ $date->format('Y-m-d') }} &nbsp;</a>
        </div>
    </div>
@endsection


@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header ">
                <h4>Заявления @if($category==null) (все) @else    ({{ $category }})  @endif
                    на {{ $date->format('Y.m.d') }} . ({{ \App\Models\Statement::initSeason($date) }})</h4>
                <hr>
                <div class="card-header p-0">
                    <div class="container m-1 ">
                        <div class="row">
                            <div class="col-sm-2 ">
                                <button class="btn btn-outline-info" id="btnBack">
                                    Назад
                                </button>
                            </div>
                            <div class="col-sm-8">
                                <input id="date" type="date" value="{{ $date->format('Y-m-d') }}">
                            </div>
                            <div class="col-sm">
                                <button class="btn btn-outline-info" id="btnNext">
                                    Вперед
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="poseshenie grid-align">
                    <div class="buttonCourse">
                        @foreach(\App\Models\Statement::$categorys as $category)
                            <button class="btn btn-primary btn-sm" id="buttonLesson1" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="{{ $category['title'] }}"
                                    data-original-title="btn btn-primary btn-lg"
                                    onClick="window.location.href='{{ route('statement.index',['category'=>$category['id'],'date'=>$date->format('Y-m-d')]) }}';">
                                {{ $category['short'] }}
                            </button>
                        @endforeach
                        {{--                        <button class="btn btn-primary btn-sm" id="buttonLesson2"--}}
                        {{--                                onClick="window.location.href='{{ route('group.index',['course'=>2]) }}';">--}}
                        {{--                            Выговор--}}
                        {{--                        </button>--}}
                        {{--                        <button class="btn btn-outline-info" id="buttonLesson3"--}}
                        {{--                                onClick="window.location.href='{{ route('group.index',['course'=>3]) }}';">--}}
                        {{--                            3-курс--}}
                        {{--                        </button>--}}
                        {{--                        <button class="btn btn-outline-info" id="buttonLesson4"--}}
                        {{--                                onClick="window.location.href='{{ route('group.index',['course'=>4]) }}';">--}}
                        {{--                            4-курс--}}
                        {{--                        </button>--}}
                        {{--                        <button class="btn btn-outline-info" id="buttonLesson5"--}}
                        {{--                                onClick="window.location.href='{{ route('group.index',['course'=>5]) }}';">--}}
                        {{--                            5-курс--}}
                        {{--                        </button>--}}
                    </div>
                    <hr class="horizontalHr">
                </div>
            </div>
            <div class="card-block row">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                        @if(count($statements)>0)
                            <table class="table">
                                <thead class="table-active">
                                <tr>
                                    <th scope="col" style="color: white">#</th>
                                    <th scope="col" style="color: white">ФИ</th>
                                    <th scope="col" style="color: white">Категория</th>
                                    <th scope="col" style="color: white">Описание</th>
                                    <th scope="col" style="color: white">Дата</th>
                                    <th scope="col" style="color: white">Изменит</th>
                                    <th scope="col" style="color: white">Удалить</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($statements as $statement)
                                    <tr>
                                        <th scope="row">{{ $loop->index+1 }}</th>
                                        <th scope="col">{{ $statement->student->name }} {{ $statement->student->surname }}</th>
                                        <th scope="col">{{ \App\Models\Statement::initCategory($statement->category) }}</th>
                                        <th scope="col">{{ $statement->description }}</th>
                                        <th scope="col">{{ $statement->year }}-{{ $statement->month }}
                                            -{{ $statement->day }}</th>
                                        <th scope="col"><a
                                                href="{{ route('statement.edit',['statement'=>$statement->id]) }}">Изменит</a>
                                        </th>
                                        <th scope="col">
                                            <form method="post"
                                                  action="{{ route('statement.destroy',['statement'=>$statement->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn-info" type="submit" value="Удалить">
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h1 align="center">Заявлений нет</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("#date").change(function () {
            var date = document.getElementById('date').value;
            var url_first = '{{ route('statement.index') }}';
            var url_two = `?date=${date}`;
            var fullurl = url_first + url_two;
            window.location.replace(fullurl);
        });
        $("#btnBack").click(function () {
            var date = document.getElementById('date').value;
            var url_first = '{{ route('statement.index') }}';
            var url_two = `?date=${date}&mod=1`;
            var fullurl = url_first + url_two;
            console.log(fullurl);
            window.location.replace(fullurl);
        });
        $("#btnNext").click(function () {
            var date = document.getElementById('date').value;
            var url_first = '{{ route('statement.index') }}';
            var url_two = `?date=${date}&mod=2`;
            var fullurl = url_first + url_two;
            console.log(fullurl);
            window.location.replace(fullurl);
        });
    </script>
@endsection

