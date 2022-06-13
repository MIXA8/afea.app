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
<form action="{{ route('timetable.store') }}" method="post">
    @csrf
    <select id="subject" name="subject">
        @foreach($subjects as $subject)
            <option class="subject_button"
                    value="{{ $subject->id }}"
                    data-worker="{{ $subject->worker->id }}">{{ $subject->title }} {{ $subject->worker->name }} {{ $subject->worker->patronymic }}</option>
        @endforeach
    </select>
    <select name="room">
        @foreach($rooms as $room)
            <option value="{{ $room->id }}">{{ $room->title }}</option>
        @endforeach
    </select>
    <select name="group">
        @foreach($groups as $group)
            <option value="{{ $group->id }}">{{ $group->title }}</option>
        @endforeach
    </select>
    <input type="hidden" id="worker_id" name="worker_id">
    <input type="time" name="time_start">
    <input type="time" name="time_finish">
    <input type="number" name="day">
    <input type="number" name="month">
{{--    <input type="number" name="year">--}}
    <input type="date" name="date">
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
