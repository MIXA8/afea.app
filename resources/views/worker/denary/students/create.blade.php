@extends('layout.worker')


@section('bread_crumbs')
    <div #poloska>
        <div id="stud">Управления группамми</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="{{ route('worker.denary.index') }}">&nbsp; Деканат &nbsp;</a>/
            <a href="#">&nbsp; Группы &nbsp;</a>/
            <a href="#">&nbsp; новая группа &nbsp;</a>/
        </div>
    </div>
@endsection


@section('content')
    <div class="card">
        {{--        <div class="card-header ">--}}
        {{--            <a href="{{ route('worker.student.all.information',['id'=>$student->id])  }}">--}}
        {{--                <button class="btn btn-info col-md-12" type="button" data-bs-toggle="tooltip" title=""--}}
        {{--                        data-bs-original-title="" data-original-title="btn btn-success btn-lg">Получить полную--}}
        {{--                    информацию--}}
        {{--                </button>--}}
        {{--            </a>--}}
        {{--        </div>--}}
        <div class="card-body">
            <h2>Создание нового студента </h2>
            <form class="needs-validation" novalidate=""
                  action="{{ route('worker.denary.student.store') }}" method="post">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        {{--                        <input type="hidden" name="id" value="{{ $student->id }}">--}}
                        <label class="form-label" for="validationCustom01">Фамилия</label>
                        <input class="form-control" id="validationCustom01" name="surname" type="text"
                               placeholder="Фамилия" required="" data-bs-original-title="" title="">
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="validationCustom02">Имя</label>
                        <input class="form-control" id="validationCustom02" name="name" type="text" placeholder="Имя"
                               required="" data-bs-original-title="" title="">
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="validationCustomUsername">Отчество</label>
                        <div class="input-group">
                            <input class="form-control" id="validationCustomUsername" name="patronymic" type="text"
                                   placeholder="Отчество" aria-describedby="inputGroupPrepend" required=""
                                   data-bs-original-title="" title="">
                            <div class="invalid-feedback">Please choose a username.</div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label" for="validationCustom03">Паспортные данные</label>
                        <input class="form-control" id="validationCustom03" name="passport" type="text"
                               placeholder="Паспортные данные" required="" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid city.</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom03">Гражданство</label>
                        <input class="form-control" id="validationCustom03" name="citizenship" type="text"
                               placeholder="Гражданство" required=""
                               data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid city.</div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="validationCustom04">Группа</label>
                        <select class="form-select" id="validationCustom04" name="group">
                            @foreach($groups as $gr)
                                <option value="{{ $gr->id }}"
                                        @if($gr->id==$group)  selected @endif>{{ $gr->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">ПНФЛ</label>
                        <input class="form-control" id="validationCustom05" type="text" name="PNFL"
                               placeholder="Введите ПНФЛ"
                               data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label" for="validationCustom03">Дата рождения</label>
                        <input class="form-control" id="validationCustom03" type="date" name="birthday"
                               data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid city.</div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="validationCustom04">Семейный статус</label>
                        <select class="form-select" id="validationCustom04" name="family_status">
                            <option value="null"> выберите семейный статус</option>
                            @foreach(\App\Models\Base_student::$status_family as $satus)

                                <option value="{{ $satus }}"
                                {{ $satus }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">Место рождения</label>
                        <input class="form-control" id="validationCustom05" name="place_birthday" type="text"
                               placeholder="Место рождения" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">ИНН</label>
                        <input class="form-control" id="validationCustom05" type="text" name="INN"
                               placeholder="Введите ИНН"
                               data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label" for="validationCustom05">Пол</label>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="validationFormCheck3" type="radio" name="sex" value="Ж"
                                   required="" data-bs-original-title="" title="">
                            <label class="form-check-label" for="validationFormCheck3">Ж</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="validationFormCheck3" checked type="radio" name="sex"
                                   value="М" required="" data-bs-original-title="" title="">
                            <label class="form-check-label" for="validationFormCheck3">М</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">Номер Контракта</label>
                        <input class="form-control" id="validationCustom05" name="n_contract" type="text"
                               placeholder="Введите номер контракта студента" data-bs-original-title=""
                               title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">Начало учебы</label>
                        <input class="form-control" id="validationCustom05" name="year_start" type="text"
                               placeholder="Введите дату начала учёбы" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">Конец учебы</label>
                        <input class="form-control" id="validationCustom05" name="year_finish" type="text"
                               placeholder="Введите дату конца учёбы" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Submit form</button>
            </form>
        </div>
    </div>
@endsection
