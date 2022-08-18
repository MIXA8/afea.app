<div class="page-header">
    <div class="header-wrapper row m-0">

{{--        <div class="poisk">--}}
{{--            <form action="">--}}
{{--                <input class="input" type="text" placeholder="Поиск студентов">--}}
{{--            </form>--}}
{{--            <div class="searchbox">--}}
{{--                <input type="submit" class="searchbtn"><i class="fa-solid fa-magnifying-glass searchicon"></i>--}}
{{--            </div>--}}
{{--        </div>--}}


        <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">4
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                               placeholder="Search Cuba .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span
                                class="sr-only">Loading...</span></div>
                        <i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid"
                                                                src="{{ asset('assets/workers/images/our_logo.png')}}"
                                                                alt=""></a>

            </div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                                           data-feather="align-center"></i></div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">
            <ul class="horizontal-menu">
                <style>

                </style>

            </ul>
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">

                <div class="onhover-show-div bookmark-flip">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="front">
                                <ul class="droplet-dropdown bookmark-dropdown">

                                </ul>
                            </div>
                            <div class="back">
                                <ul>
                                    <li>
                                        <button class="d-block flip-back" id="flip-back">Back</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </li>
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>

                <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize"></i></a></li>
                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="media profile-media"><img width="40" class="b-r-10"
                                                          src="{{ asset(Auth::guard('worker')->user()->img) }}"
                                                          alt="">
                        <div class="media-body"><span>{{ \Illuminate\Support\Facades\Auth::guard('worker')->user()->name  }} {{ \Illuminate\Support\Facades\Auth::guard('worker')->user()->patronymic  }} </span>
                            <p class="mb-0 font-roboto"> {{ \Illuminate\Support\Facades\Auth::guard('worker')->user()->department_worker->title }} <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="#"><i data-feather="user"></i><span>Аккаунт </span></a></li>
                        <!-- <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
                        <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li> -->
                        <li><a href="{{ route('worker.setting') }}"><i data-feather="settings"></i><span>Настройки</span></a></li>
                        <li><a href="{{ route('worker.logout') }}"><i data-feather="log-in"> </i><span>Выход</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
                <div class="ProfileCard-avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-airplay m-0">
                        <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                        <polygon points="12 15 17 21 7 21 12 15"></polygon>
                    </svg>
                </div>
                <div class="ProfileCard-details">
                    <div class="ProfileCard-realName"></div>
                </div>
            </div>
        </script>
        <script class="empty-template" type="text/x-handlebars-template">
            <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down,
                yikes!
            </div></script>
    </div>
</div>
