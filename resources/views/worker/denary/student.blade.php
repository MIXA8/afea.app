@extends('layout.worker')

@section('title')
    Информация: {{ $student->name }} {{ $student->surname }}
@endsection
{{--http://afea/worker/denary/student/118/information--}}
@section('bread_crumbs')

    <div #poloska>
        <div id="stud">Информация о студентах</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="{{ route('worker.denary.index') }}">&nbsp; Деканат &nbsp;</a>/
            <a href="{{ route('worker.denary.group.all.student',['group'=>$student->group]) }}">&nbsp; {{ $student->title->title }}
                &nbsp;</a>/
            <a href="{{ route('worker.student.information',['id'=>$student->id]) }}">&nbsp; {{ $student->name }}
                &nbsp; {{ $student->surname }}</a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6"
         onclick="window.location.href='{{ route('worker.student.all.pass',['id'=>$student->id,'pas'=>3,'date'=>$date]) }}'">
        <div class="card o-hidden static-top-widget-card">
            <div class="card-body">
                <div class="media static-top-widget">
                    <div class="media-body">
                        <h6 class="font-roboto">Опозданий</h6>
                        <h4 class="mb-0 counter">{{ \App\Models\Pass::countPassSeason($pass,$date,$student->id,3) }}</h4>
                    </div>
                    <svg style="color: #7c4dff" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                         class="bi bi-watch" viewBox="0 0 16 16">
                        <path d="M8.5 5a.5.5 0 0 0-1 0v2.5H6a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V5z"/>
                        <path
                            d="M5.667 16C4.747 16 4 15.254 4 14.333v-1.86A5.985 5.985 0 0 1 2 8c0-1.777.772-3.374 2-4.472V1.667C4 .747 4.746 0 5.667 0h4.666C11.253 0 12 .746 12 1.667v1.86a5.99 5.99 0 0 1 1.918 3.48.502.502 0 0 1 .582.493v1a.5.5 0 0 1-.582.493A5.99 5.99 0 0 1 12 12.473v1.86c0 .92-.746 1.667-1.667 1.667H5.667zM13 8A5 5 0 1 0 3 8a5 5 0 0 0 10 0z"/>
                    </svg>
                </div>
                <div class="progress-widget">
                    <div class="progress sm-progress-bar progress-animate">
                        <div class="progress-gradient-primary" role="progressbar" style="width: 75%"
                             aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span
                                class="animate-circle"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6"
         onclick="window.location.href='{{ route('worker.student.all.pass',['id'=>$student->id,'pas'=>1,'date'=>$date]) }}'">
        <div class="card o-hidden">
            <div class="card-body">
                <div class="media static-top-widget">
                    <div class="media-body">
                        <h6 class="font-roboto">НБ</h6>
                        <h4 class="mb-0 counter">{{ \App\Models\Pass::countPassSeason($pass,$date,$student->id) }} </h4>
                    </div>
                    <svg style="color: #7c4dff" xmlns="http://www.w3.org/2000/svg" width="44" height="46"
                         fill="currentColor" class="bi bi-clipboard-x" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z"/>
                        <path
                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path
                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>
                </div>
                <div class="progress-widget">
                    <div class="progress sm-progress-bar progress-animate">
                        <div class="progress-gradient-primary" role="progressbar" style="width: 100%" aria-valuenow="75"
                             aria-valuemin="0" aria-valuemax="100"><span class="animate-circle"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6"
         onclick="window.location.href='{{ route('worker.student.all.state',['id'=>$student->id,'date'=>$date]) }}'">
        <div class="card o-hidden">
            <div class="card-body">
                <div class="media static-top-widget">
                    <div class="media-body">
                        <h6 class="font-roboto">Заявлений</h6>
                        <h4 class="mb-0 counter">{{ \App\Models\Statement::countStateSeason($statements,$date) }}</h4>
                    </div>
                    <svg style="color: #7c4dff" xmlns="http://www.w3.org/2000/svg" width="44" height="46" fill="currentColor"
                         class="bi bi-volume-up" viewBox="0 0 16 16">
                        <path
                            d="M11.536 14.01A8.473 8.473 0 0 0 14.026 8a8.473 8.473 0 0 0-2.49-6.01l-.708.707A7.476 7.476 0 0 1 13.025 8c0 2.071-.84 3.946-2.197 5.303l.708.707z"/>
                        <path
                            d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.707.707A5.483 5.483 0 0 1 11.025 8a5.483 5.483 0 0 1-1.61 3.89l.706.706z"/>
                        <path
                            d="M10.025 8a4.486 4.486 0 0 1-1.318 3.182L8 10.475A3.489 3.489 0 0 0 9.025 8c0-.966-.392-1.841-1.025-2.475l.707-.707A4.486 4.486 0 0 1 10.025 8zM7 4a.5.5 0 0 0-.812-.39L3.825 5.5H1.5A.5.5 0 0 0 1 6v4a.5.5 0 0 0 .5.5h2.325l2.363 1.89A.5.5 0 0 0 7 12V4zM4.312 6.39 6 5.04v5.92L4.312 9.61A.5.5 0 0 0 4 9.5H2v-3h2a.5.5 0 0 0 .312-.11z"/>
                    </svg>
                </div>
                <div class="progress-widget">
                    <div class="progress sm-progress-bar progress-animate">
                        <div class="progress-gradient-primary" role="progressbar" style="width: 48%" aria-valuenow="75"
                             aria-valuemin="0" aria-valuemax="100"><span class="animate-circle"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6"
         onclick="window.location.href='{{ route('worker.student.all.pass',['id'=>$student->id,'pas'=>2,'date'=>$date]) }}'">
        <div class="card o-hidden">
            <div class="card-body">
                <div class="media static-top-widget">
                    <div class="media-body">
                        <h6 class="font-roboto">Уважительные</h6>
                        <h4 class="mb-0 counter">{{ \App\Models\Pass::countPassSeason($pass,$date,$student->id,2) }}</h4>
                    </div>
                    <svg style="color: #7c4dff" xmlns="http://www.w3.org/2000/svg" width="60" height="40" fill="currentColor"
                         class="bi bi-check" viewBox="0 0 16 16">
                        <path
                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg>
                </div>
                <div class="progress-widget">
                    <div class="progress sm-progress-bar progress-animate">
                        <div class="progress-gradient-primary" role="progressbar" style="width: 48%" aria-valuenow="75"
                             aria-valuemin="0" aria-valuemax="100"><span class="animate-circle"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
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
            <h2><strong style="size: 36px">Студент:</strong> <strong style="size: 100px;color: #7c4dff">
                    &nbsp;{{ $student->name }} &nbsp;{{ $student->surname }}</strong></h2>
            <form class="needs-validation" novalidate=""
                  action="{{ route('worker.denary.student.change.information') }}" method="post">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="hidden" name="id" value="{{ $student->id }}">
                        <label class="form-label" for="validationCustom01">Фамилия</label>
                        <input class="form-control" id="validationCustom01" name="surname" type="text"
                               placeholder="Фамилия"
                               value="{{ $student->surname }}" required="" data-bs-original-title="" title="">
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="validationCustom02">Имя</label>
                        <input class="form-control" id="validationCustom02" name="name" type="text" placeholder="Имя"
                               value="{{ $student->name }}" required="" data-bs-original-title="" title="">
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="validationCustomUsername">Отчество</label>
                        <div class="input-group">
                            <input class="form-control" id="validationCustomUsername" name="patronymic" type="text"
                                   placeholder="Отчество"
                                   value="{{ $student->patronymic }}" aria-describedby="inputGroupPrepend" required=""
                                   data-bs-original-title="" title="">
                            <div class="invalid-feedback">Please choose a username.</div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label" for="validationCustom03">Паспортные данные</label>
                        <input class="form-control" id="validationCustom03" name="passport" type="text"
                               value="{{ $student->passport }}"
                               placeholder="Паспортные данные" required="" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid city.</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom03">Гражданство</label>
                        <input class="form-control" id="validationCustom03" name="citizenship" type="text"
                               value="{{ $student->citizenship }}" placeholder="Гражданство" required=""
                               data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid city.</div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="validationCustom04">Группа</label>
                        <select class="form-select" id="validationCustom04" name="group">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}"
                                        @if($group->id==$student->group)  selected @endif>{{ $group->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">ПНФЛ</label>
                        <input class="form-control" id="validationCustom05" type="text" name="PNFL"
                               value="{{ $student->PNFL }}" placeholder="Введите ПНФЛ"
                               data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label" for="validationCustom03">Дата рождения</label>
                        <input class="form-control" id="validationCustom03" type="date"
                               value="{{ \App\Models\Base_student::nullDate($student->birthday) }}" name="birthday"
                               data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid city.</div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="validationCustom04">Семейный статус</label>
                        <select class="form-select" id="validationCustom04" name="family_status">
                            <option value="null"> выберите семейный статус</option>
                            @foreach(\App\Models\Base_student::$status_family as $satus)

                                <option value="{{ $satus }}"
                                        @if($satus==$student->family_status)  selected @endif>{{ $satus }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">Место рождения</label>
                        <input class="form-control" id="validationCustom05" name="place_birthday" type="text"
                               value="{{ $student->place_birthday }}"
                               placeholder="Место рождения" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">ИНН</label>
                        <input class="form-control" id="validationCustom05" type="text" name="INN"
                               value="{{ $student->INN }}" placeholder="Введите ИНН"
                               data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label" for="validationCustom05">Пол</label>
                        {!! \App\Models\Base_student::radioButtonHtmlSex($student->sex) !!}
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">Номер Контракта</label>
                        <input class="form-control" id="validationCustom05" name="n_contract" type="text"
                               value="{{ $student->n_contract }}"
                               placeholder="Введите номер контракта студента" data-bs-original-title=""
                               title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">Начало учебы</label>
                        <input class="form-control" id="validationCustom05" name="year_start" type="text"
                               value="{{ $student->year_start }}"
                               placeholder="Введите дату начала учёбы" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="validationCustom05">Конец учебы</label>
                        <input class="form-control" id="validationCustom05" name="year_finish" type="text"
                               value="{{ $student->year_finish }}"
                               placeholder="Введите дату конца учёбы" data-bs-original-title="" title="">
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Изменить</button>
            </form>
        </div>
    </div>
@endsection
