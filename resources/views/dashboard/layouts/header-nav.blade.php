<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation" style="background-color: #fff;">

    <div class="navbar-header" style="border-right: 1px solid #e0e0e0;">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon md-more" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <img class="navbar-brand-logo" src="{{ asset('images/azal.png') }}" title="Azal Virtual Airlines">
            <span class="navbar-brand-text hidden-xs-down" style="color: #3f51b5;"> Virtual Airlines</span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
                data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon md-search" aria-hidden="true"></i>
        </button>
    </div>

    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-float" id="toggleMenubar">
                    <menubar-toggle></menubar-toggle>
                </li>
                <li class="nav-item hidden-float">
                    <a class="nav-link icon md-search" data-toggle="collapse" href="#"
                       data-target="#site-navbar-search"
                       role="button">
                        <span class="sr-only">Toggle Search</span>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->

            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="nav-item dropdown" style="margin-right:30px">
                    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  <img src="{{ Auth::user()->avatar_path }}" alt="...">
                  <i></i>
                </span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{ route('profile') }}" role="menuitem"><i
                                    class="icon md-account" aria-hidden="true"></i> Профиль</a>
                        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-card"
                                                                                              aria-hidden="true"></i>
                            Billing</a>
                        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i
                                    class="icon md-settings" aria-hidden="true"></i> Settings</a>
                        <div class="dropdown-divider" role="presentation"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                           role="menuitem">
                            <i class="icon md-power" aria-hidden="true"></i>
                            Выйти</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->

        <search></search>

        <div class="dropdown-menu search__results" role="menu">
            <div class="search__results__wrapper">
                <ul>
                </ul>
            </div>
        </div>
    </div>
</nav>

