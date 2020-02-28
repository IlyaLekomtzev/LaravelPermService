@extends('layouts.header')

@section('title')
    <title>Вперми | Категории</title>
@endsection

@section('content')
    <section class="title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title__top">
                        Выбор категории
                        <a onclick="javascript:history.back(); return false;">
                            <img src="{{asset('src/img/back.svg')}}" alt="back">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="categories-page">
        <div class="container">
            <div class="row">
                @foreach($categories as $cat)
                    <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                        <a href="{{route('items', $cat)}}" class="categories-page__el" style="background: url('{{Storage::url($cat->img_url)}}') center center no-repeat; background-size: cover;">
                            <div class="categories-page__el--title">{{$cat->name}}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="up">
        <img src="{{asset('src/img/up.svg')}}" alt="Up">
    </div>

    @include('layouts.script')
@endsection
