@extends('layouts.app')

@section('title')
    <title>Добавление мест</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('admin-index')}}"><- </a>
                        Управление Местами
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin-items-add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category">Категория</label>
                                <select name="category" class="form-control" id="category" required>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" aria-describedby="nameHelp" placeholder="Название" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="descr">Описание</label>
                                <textarea class="form-control{{ $errors->has('descr') ? ' is-invalid' : '' }}" name="descr" id="descr" placeholder="Описание"></textarea>
                                @if ($errors->has('descr'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descr') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="address" aria-describedby="addressHelp" value="ул. " required>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="phone" aria-describedby="phoneHelp" placeholder="Телефон" required>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="time_start">Начало работы</label>
                                    <input type="time" value="10:00:00" class="form-control{{ $errors->has('time_start') ? ' is-invalid' : '' }}" name="time_start" id="time_start" aria-describedby="time_startHelp" required>
                                    @if ($errors->has('time_start'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('time_start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-6">
                                    <label for="time_end">Конец работы</label>
                                    <input type="time" value="23:00:00" class="form-control{{ $errors->has('time_end') ? ' is-invalid' : '' }}" name="time_end" id="time_end" aria-describedby="time_endHelp" required>
                                    @if ($errors->has('time_end'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('time_end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение</label>
                                <input type="file" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" id="image" required>
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">Места</div>

                    <div class="card-body row">
                        @foreach($items as $item)
                            <div class="col-4 mb-2">
                                <div class="card">
                                    <img class="card-img-top" src="{{Storage::url($item->img_url)}}" alt="{{$item->name}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->name}}</h5>
                                        <p class="card-text">{{mb_strimwidth($item->descr, 0, 100, "....")}}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">{{$item->getCategory()->name}}</li>
                                        <li class="list-group-item">{{$item->address}}</li>
                                        <li class="list-group-item">{{$item->phone}}</li>
                                        <li class="list-group-item">c {{date('H:i', strtotime($item->time_start))}} до {{date('H:i', strtotime($item->time_end))}}</li>
                                    </ul>
                                    <div class="card-body">
                                        <form action="{{route('admin-items-del', $item)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('admin-items-edit', $item)}}" class="btn btn-secondary">Редактировать</a>
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12">{{$items->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
