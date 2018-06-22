<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">

    <title>Регистрация | Azal Virtual Airlines</title>

    <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

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
    <link rel="stylesheet" href="/assets/examples/css/pages/register-v3.css">


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
<body class="animsition page-register-v3 layout-full">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Page -->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
        <div class="panel">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Закрыть</span>
                    </button>
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            <div class="panel-body">
                <div class="brand">
                    <img class="brand-img" src="{{ asset('images/logo_azal.png') }}" style="width:80%">
                    {{--<h2 class="brand-text font-size-18">Remark</h2>--}}
                </div>
                <form method="post" action="{{ route('register') }}" autocomplete="off" class="register">
                    @csrf
                    <div class="form-group form-material row floating" data-plugin="formMaterial">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required/>
                            <label class="floating-label">Имя</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required/>
                            <label class="floating-label">Фамилия</label>
                        </div>
                    </div>
                    <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required/>
                        <label class="floating-label">Email</label>
                    </div>
                    <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="position" value="{{ old('position') }}"/>
                        <label class="floating-label">Ваша должность</label>
                    </div>
                    <div class="form-group form-material row" data-plugin="formMaterial">
                        <div class="col-md-6" style="margin-left:-20px">
                            <div class="radio-custom radio-primary" style="padding:0;">
                                <input type="radio" id="male" name="gender" value="0">
                                <label for="male">Мужчина</label>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-left:-10px">
                            <div class="radio-custom radio-primary">
                                <input type="radio" id="female" name="gender" value="1">
                                <label for="female">Женщина</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="password" class="form-control" name="password" />
                        <label class="floating-label">Пароль</label>
                    </div>
                    <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="password" class="form-control" name="password_confirmation"/>
                        <label class="floating-label">Подтвердите пароль</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Зарегистрироваться</button>
                </form>
                <p>Вы имеете аккаунт? <a href="{{ route('login') }}">Войти</a></p>
            </div>
        </div>

        <footer class="page-copyright page-copyright-inverse">
            <p>WEBSITE BY Rufat Kadirov</p>
            <p>© 2018. All RIGHT RESERVED.</p>
        </footer>
    </div>
</div>
<!-- End Page -->


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
<script src="/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>

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
<script src="/global/js/Plugin/jquery-placeholder.js"></script>
<script src="/global/js/Plugin/material.js"></script>

<script>
    (function(document, window, $){
        'use strict';

        var Site = window.Site;
        $(document).ready(function(){
            Site.run();
        });
    })(document, window, jQuery);
</script>

</body>
</html>

