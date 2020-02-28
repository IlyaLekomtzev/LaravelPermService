@extends('layouts.app')

@section('title')
    <title>Добавление категорий</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('admin-index')}}"><- </a>
                        Управление категориями
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin-category-add')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Название категории</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" aria-describedby="nameHelp" placeholder="Название категории" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение категории</label>
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
                    <div class="card-header">Категории</div>

                    <div class="card-body row">
                        @foreach($categories as $cat)
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <div class="card">
                                    <img class="card-img-top" src="{{Storage::url($cat->img_url)}}" alt="{{$cat->name}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$cat->name}}</h5>
                                        <form action="{{route('admin-category-del', $cat)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('admin-category-edit', $cat)}}" class="btn btn-secondary">Редактировать</a>
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
