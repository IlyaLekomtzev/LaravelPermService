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
    <div class="form">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="form__form wow fadeInUp">
                        <a href="/" id="close-login" class="close">
                            <img src="{{asset('src/img/close.svg')}}" alt="close">
                        </a>
                        <div class="form__form--title">
                            Регистрация
                        </div>
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <label for="name">Имя</label>
                            <input type="text" name="name" id="name" @if ($errors->has('name')) class="error" @endif required>
                            @if ($errors->has('name'))
                                <div class="errorMsg">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif

                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" @if ($errors->has('email')) class="error" @endif required>
                            @if ($errors->has('email'))
                                <div class="errorMsg">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                            <label for="password">Пароль</label>
                            <input type="password" name="password" id="password" @if ($errors->has('password')) class="error" @endif required>
                            <div id="showpas" class="showpas">Показать пароль</div>
                            @if ($errors->has('password'))
                                <div class="errorMsg">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <label for="password">Подтвержение пароля</label>
                            <input type="password" name="password_confirmation" id="confirm-password" required>
                            <div id="showpas2" class="showpas">Показать пароль</div>
                            <button type="submit">Далее</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<script src="src/js/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
<script src="src/js/jquery.validate.min.js"></script>
<script src="src/js/wow.min.js"></script>
<script src="src/js/script.js"></script>
<script>
    new WOW().init();
    $(document).ready(function(){
        //Показать/скрыть пароль
        $('#showpas').click(function(){
            var count = $('#password').val().length;
            if(count > 0){
                var type = $('#password').attr('type') == "text" ? "password" : 'text',
                    c = $(this).text() == "Скрыть пароль" ? "Показать пароль" : "Скрыть пароль";
                $(this).text(c);
                $('#password').prop('type', type);
            }
        });

        //Показать/скрыть пароль
        $('#showpas2').click(function(){
            var count2 = $('#confirm-password').val().length;
            if(count2 > 0){
                var type2 = $('#confirm-password').attr('type') == "text" ? "password" : 'text',
                    c2 = $(this).text() == "Скрыть пароль" ? "Показать пароль" : "Скрыть пароль";
                $(this).text(c2);
                $('#confirm-password').prop('type', type2);
            }
        });
    });
</script>
</body>
</html>
