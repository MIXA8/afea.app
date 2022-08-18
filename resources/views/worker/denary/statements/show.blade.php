@extends('layout.worker')

@section('title')
    Редактировать заявления
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/workers/css/upload.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/workers/css/vendors/photoswipe.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection



@section('bread_crumbs')
    <div #poloska>
        <div id="stud">Управления группами</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="{{ route('worker.denary.index') }}">&nbsp; Деканат &nbsp;</a>/
            <a href="{{ route('group.index') }}">&nbsp; Группы &nbsp;</a>/
            <a href="#">&nbsp;  {{ $student->name }} {{ $student->surname }} &nbsp;</a>
        </div>
    </div>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Изменение заявления для студента {{ $student->name }} {{ $student->surname }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('statement.update',['statement'=>$statement]) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="validationDefault01">Описание</label>
                        <input  name="id" readonly="" class="form-control" id="validationDefault01" hidden
                               type="text" value="{{ $student->id }}">
                        <input readonly  name="description" class="form-control" id="validationDefault01" type="text"
                               value="{{ $statement->description }}"
                               required="" data-bs-original-title="" title="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="validationDefault04">Категория</label>
                        <select  name="category" class="form-select" id="validationDefault04" required="">
                            <option selected="" value="1">Учатся</option>
                            <option value="0">Выпустились</option>
                        </select>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="validationDefault01">День</label>
                        <input readonly name="day" class="form-control" value="{{ $statement->day }}" id="validationDefault01"
                               type="number"
                               data-bs-original-title="" title="">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="validationDefault01">Месяц</label>
                        <input readonly name="month" class="form-control" id="validationDefault01"
                               value="{{ $statement->month }}"
                               type="number"
                               data-bs-original-title="" title="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="validationDefault04">Год</label>
                        <input readonly name="year" class="form-control" id="validationDefault01" value="{{ $statement->year }}"
                               type="number"
                               data-bs-original-title="" title="">
                    </div>
                    @if($statement->img!=null)
                        <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope=""><a
                                href="{{ asset('storage/'.$statement->img) }}" itemprop="contentUrl"
                                data-size="1600x950"
                                data-bs-original-title="" title=""><img class="img-thumbnail"
                                                                        src="{{ asset('storage/'.$statement->img) }}"
                                                                        itemprop="thumbnail"
                                                                        alt="Image description"></a>
                            <figcaption itemprop="caption description">Документ</figcaption>
                        </figure>
                    @endif
                </div>
{{--                <br--}}
{{--                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Добавить--}}
{{--                </button>--}}
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


@section('js')
    <script src="{{ asset('assets/worker/js/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/worker/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('assets/worker/js/photoswipe/photoswipe.js') }}"></script>
@endsection
