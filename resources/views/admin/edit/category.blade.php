@extends('layouts.app')

@section('title')
    <title>Редактирвоание категории {{$category->name}}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('admin-category')}}"><- Назад</a>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin-category-save', $category)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Название категории</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" aria-describedby="nameHelp" value="{{$category->name}}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение категории</label>
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
