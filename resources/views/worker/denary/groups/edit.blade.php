@extends('layout.worker')


@section('bread_crumbs')
    <div #poloska>
        <div id="stud">Управления группамми</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="#">&nbsp; Деаканат &nbsp;</a>/
            <a href="#">&nbsp; Группы &nbsp;</a>/
            <a href="#">&nbsp; {{$group->title}} &nbsp;</a>/
        </div>
    </div>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Обновление группы {{$group->title}}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('group.update',['group'=>$group->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="validationDefault01">Аббревиатура</label>
                        <input name="title" class="form-control" id="validationDefault01" type="text" placeholder="УТС"
                               required="" data-bs-original-title="" value="{{ $group->title }}" title="">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="validationDefault02">Курс</label>
                        <input name="course"  class="form-control" id="validationDefault02"  value="{{ $group->course }}" type="number" min="1" max="5"
                               required="" data-bs-original-title="" title="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="validationDefault04">Учатся?</label>
                        <select  name="study"  class="form-select" id="validationDefault04" required="" >
                            <option  value="1" @if($group->study==1) selected @endif >Учатся</option>
                            <option value="0"  @if($group->study==0) selected @endif>Выпустились</option>
                        </select>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Обновить группу
                </button>
            </form>
        </div>
    </div>
@endsection
