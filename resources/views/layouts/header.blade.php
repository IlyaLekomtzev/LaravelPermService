<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="stylesheet" href="{{asset('src/css/animate.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('src/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/bootstrap-reboot.css.map')}}">
    <link rel="stylesheet" href="{{asset('src/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/style.css')}}">
</head>
<body>
@if(Auth::user()->isAdmin())
    <section class="admin-top" style="background: #1d68a7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('admin-index')}}">Админка</a>
                </div>
            </div>
        </div>
    </section>
@endif
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__wrap">
                    <div id="burger" class="d-flex d-md-none header__burger">
                        <img src="{{asset('src/img/burger.svg')}}" alt="burger">
                    </div>
                    <a href="/" class="header__logo">
                        <img src="{{asset('src/img/logo.svg')}}" alt="logo">
                    </a>
                    <ul class="d-none d-md-flex header__links">
                        <li><a href="/">Главная</a></li>
                        <li><a href="{{route('category')}}">Категории</a></li>
                    </ul>
                    <div class="header__items">
                        <a href="{{route('category')}}" class="d-none d-md-flex header__items--button">Подобрать место</a>
                        <a href="{{route('selected')}}" class="header__items--select">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 33.9971C17.4875 33.9971 16.9933 33.8115 16.6083 33.4742C15.154 32.2025 13.7518 31.0075 12.5148 29.9533L12.5085 29.9479C8.88161 26.8571 5.74968 24.188 3.57055 21.5587C1.13461 18.6193 0 15.8324 0 12.7878C0 9.82973 1.01431 7.10073 2.85589 5.10314C4.71944 3.08194 7.27651 1.96875 10.0569 1.96875C12.1349 1.96875 14.038 2.62573 15.7132 3.92129C16.5586 4.57525 17.3249 5.3756 18 6.30917C18.6753 5.3756 19.4414 4.57525 20.287 3.92129C21.9622 2.62573 23.8653 1.96875 25.9433 1.96875C28.7234 1.96875 31.2808 3.08194 33.1443 5.10314C34.9859 7.10073 35.9999 9.82973 35.9999 12.7878C35.9999 15.8324 34.8656 18.6193 32.4297 21.5584C30.2505 24.188 27.1189 26.8569 23.4926 29.9473C22.2533 31.0031 20.849 32.2 19.3914 33.4747C19.0066 33.8115 18.5122 33.9971 18 33.9971ZM10.0569 4.07757C7.87251 4.07757 5.86586 4.94934 4.40606 6.53246C2.92456 8.13948 2.10855 10.3609 2.10855 12.7878C2.10855 15.3484 3.06024 17.6385 5.19405 20.2132C7.25646 22.7018 10.3241 25.316 13.876 28.343L13.8826 28.3485C15.1243 29.4068 16.5319 30.6065 17.9969 31.8875C19.4708 30.604 20.8806 29.4024 22.1248 28.3425C25.6764 25.3155 28.7437 22.7018 30.8062 20.2132C32.9397 17.6385 33.8914 15.3484 33.8914 12.7878C33.8914 10.3609 33.0754 8.13948 31.5939 6.53246C30.1343 4.94934 28.1274 4.07757 25.9433 4.07757C24.3432 4.07757 22.874 4.58624 21.5768 5.58929C20.4208 6.48357 19.6155 7.61406 19.1434 8.40508C18.9006 8.81185 18.4732 9.05464 18 9.05464C17.5267 9.05464 17.0994 8.81185 16.8566 8.40508C16.3847 7.61406 15.5794 6.48357 14.4231 5.58929C13.1259 4.58624 11.6567 4.07757 10.0569 4.07757Z" fill="black"/>
                            </svg>
                        </a>
                        <div class="header__items--profile">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M30.728 23.272C28.7674 21.3116 26.4339 19.8603 23.8879 18.9817C26.6148 17.1036 28.4062 13.9604 28.4062 10.4062C28.4062 4.66826 23.738 0 18 0C12.262 0 7.59375 4.66826 7.59375 10.4062C7.59375 13.9604 9.38524 17.1036 12.1122 18.9817C9.56616 19.8603 7.23263 21.3116 5.2721 23.272C1.87235 26.6719 0 31.192 0 36H2.8125C2.8125 27.6256 9.62557 20.8125 18 20.8125C26.3744 20.8125 33.1875 27.6256 33.1875 36H36C36 31.192 34.1276 26.6719 30.728 23.272ZM18 18C13.8128 18 10.4062 14.5935 10.4062 10.4062C10.4062 6.219 13.8128 2.8125 18 2.8125C22.1872 2.8125 25.5938 6.219 25.5938 10.4062C25.5938 14.5935 22.1872 18 18 18Z" fill="black"/>
                            </svg>
                            <div id="profile-hover">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"
                                >
                                    Выйти
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="mob-menu" class="header__mob-menu">
        <ul class="d-block d-md-none header__mob-menu--links">
            <li><a href="/">Главная</a></li>
            <hr>
            <li><a href="{{route('category')}}">Категории</a></li>
        </ul>
        <a href="{{route('category')}}" class="d-flex d-md-none header__mob-menu--button">Подобрать место</a>
    </div>
</header>


@yield('content')

</body>
</html>
