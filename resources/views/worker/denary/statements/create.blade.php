@extends('layout.worker')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/workers/css/upload.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection

@section('title')
    Создание заявление заявления
@endsection


@section('bread_crumbs')
    <div #poloska>
        <div id="stud">Управления группами</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="{{ route('worker.denary.index') }}">&nbsp; Деканат &nbsp;</a>/
            <a href="{{ route('group.index') }}">&nbsp; Группы &nbsp;</a>/
            <a href="#">&nbsp; {{ $student->name }} {{ $student->surname }} &nbsp;</a>
        </div>
    </div>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Добавление нового заявления для студента {{ $student->name }} {{ $student->surname }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('statement.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="validationDefault01">Описание</label>
                        <input name="id" readonly="" class="form-control" id="validationDefault01" hidden
                               type="text" value="{{ $student->id }}">
                        <input name="description" class="form-control" id="validationDefault01" type="text"
                               value="dadasda"
                               required="" data-bs-original-title="" title="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="validationDefault04">Категория</label>
                        <select name="category" class="form-select" id="validationDefault04" required="">
                            <option selected="" value="1">Учатся</option>
                            <option value="0">Выпустились</option>
                        </select>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="validationDefault01">День</label>
                        <input name="day" class="form-control" id="validationDefault01" type="number"
                               data-bs-original-title="" title="">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="validationDefault01">Месяц</label>
                        <input name="month" class="form-control" id="validationDefault01" type="number"
                               data-bs-original-title="" title="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="validationDefault04">Год</label>
                        <input name="year" class="form-control" id="validationDefault01" type="number"
                               data-bs-original-title="" title="">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <input type="file" name="img" id="file1" onchange="uploadFile()"><br>
                    <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                    <h3 id="status"></h3>
                    <p id="loaded_n_total"></p>
                </div>
                <br>
                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Добавить
                </button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/workers/js/upload.js') }}"></script>
    <script>
        function _(el) {
            return document.getElementById(el);
        }

        function uploadFile() {
            var file = _("file1").files[0];
            // alert(file.name+" | "+file.size+" | "+file.type);
            var formdata = new FormData();
            formdata.append("file1", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "file_upload_parser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
            //use file_upload_parser.php from above url
            ajax.send(formdata);
        }

        function progressHandler(event) {
            _("loaded_n_total").innerHTML = "Загруженно " + event.loaded + " bytes of " + event.total;
            var percent = (event.loaded / event.total) * 100;
            _("progressBar").value = Math.round(percent);
            _("status").innerHTML = Math.round(percent) + "% загрузка... подождите";
        }

        function completeHandler(event) {
            _("status").innerHTML = event.target.responseText;
            _("progressBar").value = 0; //wil clear progress bar after successful upload
        }

        function errorHandler(event) {
            _("status").innerHTML = "Загрузка не удалась";
        }

        function abortHandler(event) {
            _("status").innerHTML = "Загрузка удалась";
        }
    </script>
@endsection
