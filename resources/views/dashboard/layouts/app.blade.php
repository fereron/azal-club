<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Azal virtual airlines</title>

    <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    @include('layouts.js-vars')
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="/assets/css/site.min.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="/global/vendor/waves/waves.css">

    <link rel="stylesheet" href="/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="/global/vendor/chartist/chartist.css">
    <link rel="stylesheet" href="/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="/global/vendor/jquery-selective/jquery-selective.css">

    <link rel="stylesheet" href="/global/vendor/plyr/plyr.css">
    <link rel="stylesheet" href="/global/vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="{{ asset('css/ds.css') }}">

@stack('styles')

    <!-- Fonts -->
    <link rel="stylesheet" href="/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="/global/vendor/media-match/media.match.min.js"></script>
    <script src="/global/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class=" page-profile-v3 @if(!empty($user_options) && $user_options['menubar'] == 1) site-menubar-unfold @else site-menubar-fold @endif site-menubar-keep @yield('body-class')">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div id="app">

    @include('dashboard.layouts.header-nav')

    @include('dashboard.layouts.menubar')

    @yield('content')

<!-- Footer -->
    <footer class="site-footer">
        <div class="site-footer-legal">© 2018 <a
                    href="https://www.azal.az">Azal</a>
        </div>
        <div class="site-footer-right">
            Crafted with <i class="red-600 icon md-favorite"></i> by <a
                    href="#">Rufat Kadirov</a>
        </div>
    </footer>
</div>

<!-- Core  -->
<script src="/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
<script src="/global/vendor/jquery/jquery.js"></script>
<script src="/global/vendor/popper-js/umd/popper.min.js"></script>
<script src="/global/vendor/bootstrap/bootstrap.js"></script>
<script src="/global/vendor/animsition/animsition.js"></script>
<script src="/global/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
<script src="/global/vendor/asscrollable/jquery-asScrollable.js"></script>
<script src="/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
<script src="/global/vendor/waves/waves.js"></script>

<!-- Plugins -->
<script src="/global/vendor/switchery/switchery.js"></script>
<script src="/global/vendor/intro-js/intro.js"></script>
<script src="/global/vendor/screenfull/screenfull.js"></script>
<script src="/global/vendor/slidepanel/jquery-slidePanel.js"></script>
<script src="/global/vendor/plyr/plyr.js"></script>
<script src="/global/vendor/magnific-popup/jquery.magnific-popup.js"></script>


<!-- Scripts -->
<script src="/global/js/Component.js"></script>
<script src="/global/js/Plugin.js"></script>
<script src="/global/js/Base.js"></script>
<script src="/global/js/Config.js"></script>

<script src="/assets/js/Section/Menubar.js"></script>
<script src="/assets/js/Section/GridMenu.js"></script>
<script src="/assets/js/Section/Sidebar.js"></script>
<script src="/assets/js/Section/PageAside.js"></script>
<script src="/assets/js/Plugin/menu.js"></script>

<script src="/global/js/config/colors.js"></script>
<script src="/assets/js/config/tour.js"></script>
<script>Config.set('assets', '/assets');</script>

<!-- Page -->
<script src="/assets/js/Site.js"></script>
<script src="/global/js/Plugin/asscrollable.js"></script>
<script src="/global/js/Plugin/slidepanel.js"></script>
<script src="/global/js/Plugin/switchery.js"></script>
<script src="/global/js/Plugin/plyr.js"></script>
<script src="/global/js/Plugin/magnific-popup.js"></script>

<script src="/assets/examples/js/pages/profile_v3.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')



</body>
</html>
