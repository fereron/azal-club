<div class="site-menubar">
    {{--<div class="site-menubar-header">--}}
        {{--<div class="cover overlay">--}}
            {{--<img class="cover-image" src="../assets//examples/images/dashboard-header.jpg" alt="...">--}}
            {{--<div class="overlay-panel vertical-align overlay-background">--}}
                {{--<div class="vertical-align-middle">--}}
                    {{--<a class="avatar avatar-lg" href="{{ route('profile') }}">--}}
                        {{--<img src="{{ Auth::user()->avatar_path }}" alt="">--}}
                    {{--</a>--}}
                    {{--<div class="site-menubar-info">--}}
                        {{--<h5 class="site-menubar-user">{{ Auth::user()->full_name }}</h5>--}}
                        {{--<p class="site-menubar-email">{{ Auth::user()->email }}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category"></li>
                    <li class="site-menu-item @if(url()->current() == route('profile')) active @endif">
                        <a class="animsition-link" href="{{ route('profile') }}">
                            <i class="site-menu-icon md-account" aria-hidden="true"></i>
                            <span class="site-menu-title">Профиль</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-google-pages" aria-hidden="true"></i>
                            <span class="site-menu-title">Группы</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('groups') }}">
                                    <span class="site-menu-title">Все группы</span>
                                </a>
                            </li>
                            @foreach(Auth::user()->groups as $group)

                                @if(Auth::user()->isAdmin($group->id))
                                    <li class="site-menu-item has-sub">
                                        <a href="javascript:void(0)">
                                            <span class="site-menu-title">{{ $group->name }}</span>
                                            <span class="site-menu-arrow"></span>
                                        </a>
                                        <ul class="site-menu-sub">

                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ route('group.show', [$group->id]) }}">
                                                    <span class="site-menu-title">Перейти в группу</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ route('group.requests', [$group->id]) }}">
                                                    <span class="site-menu-title">Заявки на вступление</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="site-menu-item has-sub">
                                        <a class="animsition-link" href="{{ route('group.show', [$group->id]) }}">
                                            <span class="site-menu-title">{{ $group->name }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="site-menubar-footer">

        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Выйти"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();"
           style="width:100%">
            <span class="icon md-power" aria-hidden="true"></span>
        </a>


    </div>
</div>

