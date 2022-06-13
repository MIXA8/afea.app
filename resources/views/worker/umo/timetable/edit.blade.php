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
@php( var_dump($errors) )
<form action="{{ route('timetable.update',['timetable'=>$timetable->id]) }}" method="post">
    @csrf
    @method('PUT')
    <select id="subject" name="subject">
        @foreach($subjects as $subject)
            @if($timetable->subject == $subject->id)
                <option class="subject_button"
                        value="{{ $subject->id }}"
                        data-worker="{{ $subject->worker->id }}"
                        selected>{{ $subject->title }} {{ $subject->worker->name }} {{ $subject->worker->patronymic }}</option>
            @else
                <option class="subject_button"
                        value="{{ $subject->id }}"
                        data-worker="{{ $subject->worker->id }}">{{ $subject->title }} {{ $subject->worker->name }} {{ $subject->worker->patronymic }}</option>
            @endif
        @endforeach
    </select>
    <select name="room">
        @foreach($rooms as $room)
            @if($timetable->room == $room->id)
                <option value="{{ $room->id }}" selected>{{ $room->title }}</option>
            @else
                <option value="{{ $room->id }}">{{ $room->title }}</option>
            @endif
        @endforeach
    </select>
    <select name="group">
        @foreach($groups as $group)
            @if($timetable->group == $group->id)
                <option value="{{ $group->id }}" selected>{{ $group->title }}</option>
            @else
                <option value="{{ $group->id }}">{{ $group->title }}</option>
            @endif
        @endforeach
    </select>
    <input type="hidden" id="worker_id" name="worker_id" value="{{ $timetable->worker_id }}">
    <input type="time" name="time_start" value="{{ $timetable->time_start }}">
    <input type="time" name="time_finish" value="{{ $timetable->time_finish }}">
    <input type="number" name="day" value="{{ $timetable->day }}">
    <input type="number" name="month" value="{{ $timetable->month }}">
        <input type="number" name="year" value="{{ $timetable->year }}">
{{--    <input type="date" name="date" >--}}
    <input type="submit">
</form>


<script>
    document.querySelector("select").addEventListener('click', function (e) {
        var sel = document.getElementById('subject');
        var selected = sel.options[sel.selectedIndex];
        var worker = document.getElementById('worker_id');
        worker.value = selected.dataset.worker;
    });
</script>

</body>
</html>
