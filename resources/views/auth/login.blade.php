<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                        <a href="{{route('register')}}" id="login" class="login">
                            Регистрация
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="form__form wow fadeInUp">
                        <a href="/" id="close-login" class="close">
                            <img src="{{asset('src/img/close.svg')}}" alt="close">
                        </a>
                        <div class="form__form--title">
                            Авторизация
                        </div>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" @if ($errors->has('email')) class="error" @endif required>
                            @if ($errors->has('email'))
                                <div class="errorMsg">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                            <label for="password">Пароль</label>
                            <input type="password" name="password" id="password" @if ($errors->has('password')) class="error" @endif required>
                            <div class="showpas">Показать пароль</div>
                            @if ($errors->has('password'))
                                <div class="errorMsg">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <button type="submit">Войти</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@include('layouts.script')
<script>
    new WOW().init();
    $(document).ready(function(){

        //Показать/скрыть пароль
        $('.showpas').click(function(){
            var count = $('#password').val().length;
            if(count > 0){
                var type = $('#password').attr('type') == "text" ? "password" : 'text',
                    c = $(this).text() == "Скрыть пароль" ? "Показать пароль" : "Скрыть пароль";
                $(this).text(c);
                $('#password').prop('type', type);
            }
        });

    });
</script>
</body>
</html>
