@extends('layout.worker')


@section('bread_crumbs')
    <div #poloska>
        <div id="stud">Управления группамми</div>
        <div id="road">
            <i class="roadIcon" data-feather="home"></i>
            <a href="{{ route('worker.denary.index') }}">Главная &nbsp;</a>/
            <a href="#">&nbsp; Настройки &nbsp;</a>
        </div>
    </div>
@endsection


@section('content')
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Мой профиль</h4>
                <div class="card-options"><a class="card-options-collapse" href="#"
                                             data-bs-toggle="card-collapse" data-bs-original-title=""
                                             title=""><i class="fe fe-chevron-up"></i></a><a
                        class="card-options-remove" href="#" data-bs-toggle="card-remove"
                        data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">


                <div class="row mb-2">
                    <div class="profile-title">
                        <div class="media"><img class="b-r-6 img-90" alt=""
                                                src="{{ asset(Auth::guard('worker')->user()->img) }}">
                            <div class="media-body">
                                <h5 class="mb-1">{{ Auth::guard('worker')->user()->login }}</h5>
                                <p>{{ Auth::guard('worker')->user()->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('worker.change.img') }}" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        @csrf
                        <label class="form-label">Изменить фото </label>
                        <input class="form-control" required="" type="file" max="3240" data-bs-original-title="" title=""
                               name="img">
                        @if($errors->has('img'))
                            <div> {{ $errors('img') }}</div>
                        @endif
                        <hr>
                        <button class="btn btn-primary btn-block" type="submit" data-bs-original-title=""
                                title="">Сохранить фото
                        </button>
                        @error('login')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
                <form action="{{ route('worker.change.login.password') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Login <span style="color: red;">*</span></label>
                        <input class="form-control" name="login"
                               value="{{ Auth::guard('worker')->user()->login }}" data-bs-original-title="">
                        @error('login')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input class="form-control" name="id" type="hidden"
                           value="{{ Auth::guard('worker')->user()->id }}" data-bs-original-title="">
                    <div class="mb-3">
                        <label class="form-label">Старый пароль</label>
                        <input class="form-control" type="password" name="last_pass" value=""
                               data-bs-original-title="" title="">
                        @error('last_pass')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Новый пароль (если хотите)</label>
                        <input class="form-control" name="password" type="password"
                               data-bs-original-title="" title="">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Потверждение нового пароля</label>
                        <input class="form-control" name="password_confirmation" type="password"
                               data-bs-original-title="" title="">
                        @error('password_confirmed')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-footer">
                        <button class="btn btn-primary btn-block" type="submit" data-bs-original-title=""
                                title="">Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <form class="card" action="{{ route('worker.change.information.account') }}" method="post">
            @method('POST')
            <div class="card-header">
                <h4 class="card-title mb-0">Изменить профиль</h4>
                <div class="card-options"><a class="card-options-collapse" href="#"
                                             data-bs-toggle="card-collapse" data-bs-original-title=""
                                             title=""><i class="fe fe-chevron-up"></i></a><a
                        class="card-options-remove" href="#" data-bs-toggle="card-remove"
                        data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
            </div>
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label">Фамилия</label>
                            <input class="form-control" name="surname" type="text"
                                   required=""
                                   value="{{ Auth::guard('worker')->user()->surname }}"
                                   placeholder="Фамилия" data-bs-original-title="" title="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Имя</label>
                            <input class="form-control" type="text" name="name"
                                   required=""
                                   value="{{ Auth::guard('worker')->user()->name }}" placeholder="Username"
                                   data-bs-original-title="" title="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Отчество</label>
                            <input class="form-control" type="text" name="patronymic"
                                   required=""
                                   value="{{ Auth::guard('worker')->user()->patronymic }}"
                                   placeholder="Отчество" data-bs-original-title="" title="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Отдел/Кафедра</label>
                            <input class="form-control" type="text" name="department"
                                   value="{{ \Illuminate\Support\Facades\Auth::guard('worker')->user()->department_worker->title }}"
                                   readonly
                                   placeholder="Отдел/Кафедра" data-bs-original-title="" title="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Рейтинг</label>
                            <input class="form-control" type="text" name="rating"
                                   value="{{ \Illuminate\Support\Facades\Auth::guard('worker')->user()->rating }}"
                                   readonly
                                   placeholder="Рейтинг" data-bs-original-title="" title="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <label class="form-label">О себе</label>
                            <textarea id="editor" name="description"
                                      class="form-control">{{ Auth::guard('worker')->user()->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Обновить
                </button>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>

@endsection
