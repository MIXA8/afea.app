@extends('layout.worker')

@section('title')
    Список Студентов
@endsection

@section('bread_crumbs')

    <div #poloska>
        <div id="stud">Посещаемость</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="{{ route('worker.denary.index') }}">&nbsp; Деканат &nbsp;</a>/
            <a href="{{ route('worker.denary.index',['date'=>$date]) }}">&nbsp; {{ $date }}</a>
        </div>
    </div>

@endsection


@section('content')
    <div class="inputBox">
        <div class="poseshenie grid-align">
            <form method="post" id="SubmitForm">
                <input type="date" name="date" id="calendar_style_css" value="{{ $date }}">
                @csrf
                <input type="submit" value="получить посещение">
            </form>
            <div id="p">
                <p class="pososo"> Посещаемость групп</p>
                <p style="color: #7c4dff"><strong>{{ $course }}</strong></p>
                <p> курса, на </p>
                <p style="color: #7c4dff"><strong>{{ $match }}</strong></p>
                <p>пару.&nbsp;<strong> Дата:</strong></p>
                <p id="todayDate"><strong>{{ \Carbon\Carbon::create($date)->format('d.m.y') }}</strong></p>
            </div>
            <hr class="horizontalHr">
            <div class="buttonCourse">
                <button class="buttonsCourse"
                        onClick="window.location.href='{{ route('worker.denary.index',['course'=>1,'match'=>$match]) }}';"
                        id="buttonCourse1">
                    1-курс
                </button>
                <button class="buttonsCourse"
                        onClick="window.location.href='{{ route('worker.denary.index',['course'=>2,'match'=>$match]) }}';"
                        id="buttonCourse2">
                    2-курс
                </button>
                <button class="buttonsCourse"
                        onClick="window.location.href='{{ route('worker.denary.index',['course'=>3,'match'=>$match]) }}';"
                        id="buttonCourse3">
                    3-курс
                </button>
                <button class="buttonsCourse"
                        onClick="window.location.href='{{ route('worker.denary.index',['course'=>4,'match'=>$match]) }}';"
                        id="buttonCourse4">
                    4-курс
                </button>
                <button class="buttonsCourse"
                        onClick="window.location.href='{{ route('worker.denary.index',['course'=>5,'match'=>$match]) }}';"
                        id="buttonCourse5">
                    5-курс
                </button>
            </div>
            <hr class="horizontalHr">
            <div class="buttonCourse">
                <button class="buttonsCourse" id="buttonLesson1"
                        onClick="window.location.href='{{ route('worker.denary.index',['course'=>$course,'match'=>1]) }}';">
                    1-пара
                </button>
                <button class="buttonsCourse" id="buttonLesson2"
                        onClick="window.location.href='{{ route('worker.denary.index',['course'=>$course,'match'=>2]) }}';">
                    2-пара
                </button>
                <button class="buttonsCourse" id="buttonLesson3"
                        onClick="window.location.href='{{ route('worker.denary.index',['course'=>$course,'match'=>3]) }}';">
                    3-пара
                </button>
                <button class="buttonsCourse" id="buttonLesson4"
                        onClick="window.location.href='{{ route('worker.denary.index',['course'=>$course,'match'=>4]) }}';">
                    4-пара
                </button>
                <button class="buttonsCourse" id="buttonLesson5"
                        onClick="window.location.href='{{ route('worker.denary.index',['course'=>$course,'match'=>5]) }}';">
                    5-пара
                </button>
            </div>
            <hr class="horizontalHr">
        </div>
        <div class="tableBox">
            @if(count($groups)>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Группа</th>
                        <th>Количсетво студентов</th>
                        <th>Отсутствуют</th>
                        <th>Посещаемость</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($groups as $group)
                        @php
                            $count_students= count($group->studentsGroup);
                            $count_passes = count($group->studentsPasses->where('day','=',\Carbon\Carbon::make($date)->day)
                                 ->where('month','=',\Carbon\Carbon::make($date)->month)
                                 ->where('year','=',\Carbon\Carbon::make($date)->year)
                                 ->where('month','=',\Carbon\Carbon::make($date)->month)
                                 ->where('lesson_part','=',$match)
                                 ->where('delete','=',0));

                            if($count_passes==0){
                                if($count_students!=0){
                                     $precent=100;
                                }else{
                                    $precent= "неизвестно";
                                }

                            }
                            else{
                                $precent=100-((100)*$count_passes)/$count_students;
                                $precent=round($precent,2);
                            }
                        @endphp
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td><a href="{{ route('pass.pdf',['group'=>$group->id]) }}">{{ $group->title }}</a></td>
                            <td>{{ $count_students }}</td>
                            <td>{{  $count_passes }}</td>
                            <td>{{ $precent }}&nbsp;%</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h1>Групп нет</h1>
            @endif
        </div>
    </div>

@endsection
