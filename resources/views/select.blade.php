@extends('layouts.header')

@section('title')
    <title>Вперми | Избранное</title>
@endsection

@section('content')
    <section class="title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title__top">
                        Избранные вами места
                        <a onclick="javascript:history.back(); return false;">
                            <img src="{{asset('src/img/back.svg')}}" alt="back">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="items mt-5">
        <div class="container">
            <div class="row">
                @if($selects->count() == 0)
                    <div class="col-12 d-flex justify-content-center">
                        <h3 style="text-align: center">
                            В избранном пусто((
                        </h3>
                    </div>
                @else
                    @foreach($selects as $select)
                        @if($select->selected())
                        <div class="col-12 col-md-6 col-lg-4">
                            <a href="{{route('item', $select->id)}}" class="card">
                                <div class="card__image" style="background: url('{{Storage::url($select->img_url)}}') center center no-repeat; background-size: cover;">
                                    @if($select->getRating($select->id) !== 0)
                                        <div title="Рейтинг: {{round($select->getRating($select->id), 1)}} из 5" class="card__image--rating">{{round($select->getRating($select->id), 1)}}</div>
                                    @endif
                                    <form action="{{route('unselect', $select)}}" class="card__image--select" method="POST">
                                        @csrf
                                        <button title="Убрать" type="submit">
                                            <img src="{{asset('src/img/selected.svg')}}" alt="delete">
                                        </button>
                                    </form>
                                </div>
                                <div class="card__title">{{$select->name}}</div>
                                <div class="card__address">{{$select->address}}</div>
                            </a>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="cards-pagination">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{$selects->links()}}
                </div>
            </div>
        </div>
    </section>

    <div class="up">
        <img src="{{asset('src/img/up.svg')}}" alt="Up">
    </div>

    @include('layouts.script')
@endsection
