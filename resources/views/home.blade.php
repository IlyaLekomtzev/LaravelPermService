@extends('layouts.header')

@section('title')
    <title>Вперми | Главная</title>
@endsection

@section('content')
    <section class="categories">
        <div class="container container-1260">
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container categories-slider">
                        <div id="arrow-r">
                            <img src="{{asset('src/img/arr-r.svg')}}" alt="right">
                        </div>
                        <div id="arrow-l">
                            <img src="{{asset('src/img/arr-l.svg')}}" alt="left">
                        </div>
                        <div class="swiper-wrapper">
                            @foreach($categories as $cat)
                            <div class="swiper-slide">
                                <a href="{{route('items', $cat)}}" class="categories__item" style="background: url('{{Storage::url($cat->img_url)}}') center center no-repeat; background-size: cover;">
                                    <div class="categories__item--title">
                                        {{$cat->name}}
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="items">
        <div class="container">
            <div class="row">
                @foreach($items as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="{{route('item', $item)}}" class="card">
                            <div class="card__image" style="background: url('{{Storage::url($item->img_url)}}') center center no-repeat; background-size: cover;">
                                @if(round($item->getRating($item->id), 1) != 0)
                                    <div title="Рейтинг: {{round($item->getRating($item->id), 1)}} из 5" class="card__image--rating">{{round($item->getRating($item->id), 1)}}</div>
                                @endif
                                @if($item->selected() === true)
                                        <form action="{{route('unselect', $item)}}" class="card__image--select" method="POST">
                                            @csrf
                                            <button title="Убрать" type="submit">
                                                <img src="{{asset('src/img/selected.svg')}}" alt="selected">
                                            </button>
                                        </form>
                                @else
                                    <form action="{{route('select', $item)}}" class="card__image--select" method="POST">
                                        @csrf
                                        <button title="В избранное" type="submit">
                                            <img src="{{asset('src/img/heart-sel.svg')}}" alt="heart">
                                        </button>
                                    </form>
                                @endif

                            </div>
                            <div class="card__title">{{$item->name}}</div>
                            <div class="card__address">{{$item->address}}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="cards-pagination">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{$items->links()}}
                </div>
            </div>
        </div>
    </section>

    <div class="up">
        <img src="{{asset('src/img/up.svg')}}" alt="Up">
    </div>

    @include('layouts.script')
    <script>
        var swiper = new Swiper('.swiper-container.categories-slider', {
            slidesPerView: 6,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '#arrow-l',
                prevEl: '#arrow-r',
            },
            breakpoints: {
                1260: {
                    slidesPerView: 5,
                    spaceBetween: 40,
                },
                1100: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                840: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                650: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                440: {
                    slidesPerView: 1,
                    spaceBetween: 40,
                },
            }
        });
    </script>
@endsection
