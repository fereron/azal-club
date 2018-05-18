<div class="header-nav">
    <nav class="navbar navbar-static-top">
        <ul class="nav navbar-nav">
            <li>
                <a href="{{ route('home') }}">Главная</a>
            </li>
            <li>
                <a to="/news">Новости</a>
            </li>
            <li>
                <a href="{{ route('flights') }}">Рейсы</a>
            </li>
        </ul>

        <img class="img-logo" src="{{ asset('images/logo_azal.png') }}" alt="logo">

        <ul class="nav navbar-nav navbar-right">
            @guest
                <li>
                    <a href="{{ route('register') }}">Регистрация</a>
                </li>

                <li>
                    <a href="{{ route('login') }}">Войти</a>
                </li>
            @else
                <li>
                    <a href="#" :to="{ name: 'profile' }" :auth="auth">Профиль</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Выйти</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </nav>
</div>