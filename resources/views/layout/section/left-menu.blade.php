<div class="page-body-wrapper">
    <!-- Page Sidebar Start-->
    <div class="sidebar-wrapper">
        <div>
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                                                                src="{{ asset('assets/workers/images/our_logo.png') }}"
                                                                alt=""><img
                        class="img-fluid for-dark" src="#" alt=""></a>
                <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
                </div>
            </div>
            <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="#" alt=""></a></div>
            <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links" id="simple-bar">
                        @if(\Illuminate\Support\Facades\Auth::guard('worker')->user()->department_worker->title == "Деканат" || Auth::guard('worker')->user()->getAccessValue('dean') || Auth::guard('worker')->user()->getAccessValue('lord'))
                            <li class="back-btn"><a href="index.html"><img class="img-fluid" src="#" alt=""></a>
                                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                                      aria-hidden="true"></i></div>
                            </li>
                            <li class="sidebar-main-title">
                                <div>
                                    <h6 class="lan-1">Деканат</h6>

                                </div>
                            </li>

                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title " href="#"><i data-feather="home"></i><span
                                        class="lan-3">Домашняя              </span></a>
                                <ul class="sidebar-submenu">
                                    <li><a class="lan-4" href="{{ route('worker.denary.index') }}">Посещаемость</a></li>
                                    <li><a class="lan-5" href="{{ route('statement.index') }}">Заявление</a></li>
                                    {{--                                    <li><a class="lan-5" href="#">Статистика</a></li>--}}
                                    {{--                                    <li><a class="lan-4" href="student-edit.html">Студенты</a></li>--}}
                                    <li><a class="lan-5" href="{{ route('group.index') }}">Группы</a></li>
                                </ul>
                            </li>
                            {{--                            <li class="sidebar-list">--}}
                            {{--                                <a class="sidebar-link sidebar-title" href="#"><i data-feather="sliders"></i><span--}}
                            {{--                                        class="lan-3">Управление              </span></a>--}}
                            {{--                                <ul class="sidebar-submenu">--}}
                            {{--                                    <li><a class="lan-4" href="student-edit.html">Студенты</a></li>--}}
                            {{--                                    <li><a class="lan-5" href="#">Группы</a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </li>--}}
                        @endif
                        {{--                        <li class="sidebar-list">--}}
                        {{--                            <a class="sidebar-link sidebar-title" href="#"><i data-feather="mail"></i><span--}}
                        {{--                                    class="lan-3">E-mail              </span></a>--}}
                        {{--                            <ul class="sidebar-submenu">--}}
                        {{--                                <li><a class="lan-4" href=".html">бла-бла</a></li>--}}
                        {{--                                <li><a class="lan-5" href="#">Бла-бла</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- Page Sidebar Ends-->

