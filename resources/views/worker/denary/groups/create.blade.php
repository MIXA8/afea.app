@extends('layout.worker')

@section('title')
    Создание новой группы
@endsection

@section('bread_crumbs')
    <div #poloska>
        <div id="stud">Управления группами</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="{{ route('worker.denary.index') }}">&nbsp; Деканат &nbsp;</a>/
            <a href="{{ route('group.index') }}">&nbsp; Группы &nbsp;</a>/
            <a href="#">&nbsp; новая группа &nbsp;</a>/
        </div>
    </div>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Создание новой группы</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('group.store') }}" method="post">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="validationDefault01">Аббревиатура</label>
                        <input name="title" class="form-control" id="validationDefault01" type="text" placeholder="УТС"
                               required="" data-bs-original-title="" title="">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="validationDefault02">Курс</label>
                        <input name="course"  class="form-control" id="validationDefault02" type="number" min="1" max="5" value="1"
                               required="" data-bs-original-title="" title="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="validationDefault04">Учатся?</label>
                        <select  name="study"  class="form-select" id="validationDefault04" required="">
                            <option selected="" value="1">Учатся</option>
                            <option value="0">Выпустились</option>
                        </select>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Создать группу
                </button>
            </form>
        </div>
    </div>
@endsection
