@extends('layouts.header')

@section('title')
    <title>Вперми | Места</title>
@endsection

@section('content')
    <section class="title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title__top">
                        Места для вас
                        <a onclick="javascript:history.back(); return false;">
                            <img src="{{asset('src/img/back.svg')}}" alt="back">
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title__cat">{{$cat->name}}</div>
                </div>
            </div>
        </div>
    </section>

    <section class="items">
        <div class="container">
            <div class="row">
                    @forelse($items as $item)
                        <div class="col-12 col-md-6 col-lg-4">
                            <a href="{{route('item', $item)}}" class="card">
                                <div class="card__image" style="background: url('{{Storage::url($item->img_url)}}') center center no-repeat; background-size: cover;">
                                    @if($item->getRating($item->id) !== 0)
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
                        @empty
                        <div class="col-12 d-flex justify-content-center">
                            <h3 style="text-align: center">
                                К сожалению в категории "{{$cat->name}}" сейчас нет никаких заведений. <br>
                                Попробуйте немного позже)
                            </h3>
                        </div>
                    @endforelse
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
        $(document).ready(function (){
            @if ($message = Session::get('success'))

            @endif
        });
    </script>
@endsection
