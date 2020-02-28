@extends('layouts.app')

@section('title')
    <title>Редактирвоание места {{$item->name}}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('admin-items')}}"><- Назад</a>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin-items-save', $item)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category">Категория</label>
                                <select name="category" class="form-control" id="category" required>
                                    <option value="{{$item->getCategory()->id}}">{{$item->getCategory()->name}}</option>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" aria-describedby="nameHelp" value="{{$item->name}}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="descr">Описание</label>
                                <textarea class="form-control{{ $errors->has('descr') ? ' is-invalid' : '' }}" name="descr" id="descr">{{$item->descr}}</textarea>
                                @if ($errors->has('descr'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descr') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="address" aria-describedby="addressHelp" value="{{$item->address}}" required>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="phone" aria-describedby="phoneHelp" value="{{$item->phone}}" required>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="time_start">Начало работы</label>
                                    <input type="time" value="{{date('H:i', strtotime($item->time_start))}}" class="form-control{{ $errors->has('time_start') ? ' is-invalid' : '' }}" name="time_start" id="time_start" aria-describedby="time_startHelp" required>
                                    @if ($errors->has('time_start'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('time_start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-6">
                                    <label for="time_end">Конец работы</label>
                                    <input type="time" value="{{date('H:i', strtotime($item->time_end))}}" class="form-control{{ $errors->has('time_end') ? ' is-invalid' : '' }}" name="time_end" id="time_end" aria-describedby="time_endHelp" required>
                                    @if ($errors->has('time_end'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('time_end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение</label>
                                <input type="file" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" id="image">
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
