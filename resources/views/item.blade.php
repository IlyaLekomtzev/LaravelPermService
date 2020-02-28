@extends('layouts.header')

@section('title')
    <title>Вперми | {{$item->name}}</title>
@endsection

@section('content')
    <section class="preview">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="preview__el" style="background: url('{{Storage::url($item->img_url)}}') center center no-repeat; background-size: cover;">
                        <a onclick="javascript:history.back(); return false;" class="preview__el--back">
                            <img src="{{asset('src/img/back-item.svg')}}" alt="back">
                        </a>
                        @if($item->selected() === true)
                            <form action="{{route('unselect', $item)}}" class="preview__el--select" method="POST">
                                @csrf
                                <button title="Убрать" type="submit">
                                    <img src="{{asset('src/img/selected2.svg')}}" alt="unselect">
                                </button>
                            </form>
                        @else
                            <form action="{{route('select', $item)}}" class="preview__el--select" method="POST">
                                @csrf
                                <button title="В избранное" type="submit">
                                    <img src="{{asset('src/img/heart-item.svg')}}" alt="heart">
                                </button>
                            </form>
                        @endif
                        @if($comments->count() != 0)
                            <div title="Рейтинг: {{round($item->getRating($item->id), 1)}} из 5" class="preview__el--rating">{{round($item->getRating($item->id), 1)}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="item-info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="item-info__title">{{$item->name}}</div>
                    <div class="item-info__descr">{{$item->descr}}</div>
                </div>
            </div>
        </div>
    </section>

    <section class="item-links">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="item-links__el">
                        <img src="{{asset('src/img/geo.svg')}}" alt="location">
                        <span>{{$item->address}}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="item-links__el">
                        <img src="{{asset('src/img/clock.svg')}}" alt="clock">
                        <span>с {{date('H:i', strtotime($item->time_start))}}  до {{date('H:i', strtotime($item->time_end))}}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="item-links__el">
                        <img src="{{asset('src/img/phone.svg')}}" alt="phone">
                        <span>{{$item->phone}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feedback">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="feedback__title">Оставьте отзыв</div>
                </div>
                <div class="col-12">
                    <div class="feedback__form">
                        <form action="{{route('comment-add')}}" method="POST">
                            @csrf
                            <input type="hidden" name="item_id" value="{{$item->id}}">
                            <input type="hidden" name="author_id" value="{{Auth::user()->id}}">
                            <div class="feedback__form--boxes">
                                <label>
                                    <input type="radio" name="rating" class="radio" value="1" checked>
                                    <span class="text">1</span>
                                </label>
                                <label>
                                    <input type="radio" name="rating" class="radio" value="2">
                                    <span class="text">2</span>
                                </label>
                                <label>
                                    <input type="radio" name="rating" class="radio" value="3">
                                    <span class="text">3</span>
                                </label>
                                <label>
                                    <input type="radio" name="rating" class="radio" value="4">
                                    <span class="text">4</span>
                                </label>
                                <label>
                                    <input type="radio" name="rating" class="radio" value="5">
                                    <span class="text">5</span>
                                </label>
                            </div>
                            <textarea class="textarea" name="message" required></textarea>
                            <div class="button-box">
                                <button type="submit">Опубликовать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="comments">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="comments__title">Комментарии(<span id="comments-count"></span>)</div>
                </div>
            </div>
            @foreach($comments as $comment)
            <div class="row comment">
                <div class="col-12">
                    <div class="comments__mail-date">
                        <div class="mail">{{$comment->getAuthor()->email}}</div>
                        <div class="date">{{date('d/m/y H:i', strtotime($comment->created_at))}}</div>
                    </div>
                    <div class="comments__stars">
                        @if($comment->rating === 1)
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                        @endif
                        @if($comment->rating === 2)
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                        @endif
                        @if($comment->rating === 3)
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                        @endif
                        @if($comment->rating === 4)
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                        @endif
                        @if($comment->rating === 5)
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                            <img src="{{asset('src/img/star.svg')}}" alt="star">
                        @endif
                    </div>
                    <div class="comments__message">{{$comment->message}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="see-more">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div id="see-more" class="see-more__button">Показать ещё</div>
                </div>
            </div>
        </div>
    </section>

    <div class="up">
        <img src="{{asset('src/img/up.svg')}}" alt="Up">
    </div>

    @include('layouts.script')
    <script>
        $(function(){
            let commentCount = $('.comment').length;
            $('#comments-count').text(commentCount);
            if(commentCount === 0){
                $('#see-more').css({
                    display: 'none'
                });
                $('.comments__title').css({
                    color: '#808080'
                });
            } else{
                $('.comment').slice(0, 3).show();
            }
            if($('.comment:hidden').length === 0){
                $('#see-more').css({
                    display: 'none'
                });
            }
            $('#see-more').on('click', () => {
                $('.comment:hidden').slice(0, 3).slideDown();
                let commentHiddenCount = $('.comment:hidden').length;
                if(commentHiddenCount === 0){
                    $('#see-more').hide(200);
                }
            });
        });
    </script>
@endsection
