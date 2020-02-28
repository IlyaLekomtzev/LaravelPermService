<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Главная</title>
    <link rel="stylesheet" href="{{asset('src/css/animate.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('src/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/bootstrap-reboot.css.map')}}">
    <link rel="stylesheet" href="{{asset('src/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/style.css')}}">
</head>
<body>
<section class="start-page">
    <div class="start-page__head">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInDown">
                    <div class="start-page__head--wrap">
                        <a class="logo" href="/">
                            <img src="{{asset('src/img/logo-wh.svg')}}" alt="logo">
                        </a>
                        <a href="{{route('login')}}" id="login" class="login">
                            Войти
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7 wow fadeInLeft">
                <div class="start-page__content">
                    <div class="start-page__content--title">Не знаешь куда пойти?</div>
                    <div class="start-page__content--descr">
                        С помощью нашего сервиса Вы с лёгкостью сможете подобрать место в зависимости от любой жизненной ситуцаии.
                    </div>
                    <a href="{{route('register')}}" id="register" class="start-page__content--button">Попробовать</a>
                </div>
            </div>
            <div class="d-none d-md-block col-md-5 wow fadeInRight">
                <div class="start-page__content">
                    <div class="start-page__content--image">
                        <img src="{{asset('src/img/start-man.svg')}}" alt="man" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@include('layouts.script')
<script>
    new WOW().init();
</script>
</body>
</html>
