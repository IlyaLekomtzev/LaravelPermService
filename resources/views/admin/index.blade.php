@extends('layouts.app')

@section('title')
    <title>ВПерми - управление</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <div class="card-header text-white bg-primary">Пользователи:</div>
                    <div class="card-body">
                        <h1 class="card-title text-primary d-flex justify-content-center"><b>{{$users->count()}}</b></h1>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <div class="card-header text-white bg-success">Категории:</div>
                    <div class="card-body">
                        <h1 class="card-title text-success d-flex justify-content-center"><b>{{$categories->count()}}</b></h1>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <div class="card-header text-white bg-danger">Места:</div>
                    <div class="card-body">
                        <h1 class="card-title text-danger d-flex justify-content-center"><b>{{$items->count()}}</b></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">Управление контентом</div>

                    <div class="card-body">
                        <a href="{{route('admin-category')}}">Категории</a>
                        <hr>
                        <a href="{{route('admin-items')}}">Места</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">Управление пользователями</div>

                    <div class="card-body">
                        <nav class="navbar navbar-light bg-light justify-content-between">
                            <a class="navbar-brand">Поиск по E-mail</a>
                            <form action="{{route('admin-index')}}" method="GET" class="form-inline">
                                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Поиск" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                                <a class="btn btn-outline-danger ml-2" href="{{route('admin-index')}}">Сбросить</a>
                            </form>
                        </nav>
                        <table id="user_table" class="table">
                            <thead style="user-select: none">
                            <tr>
                                <th style="cursor: row-resize" scope="col">#</th>
                                <th style="cursor: row-resize" scope="col">Имя</th>
                                <th style="cursor: row-resize" scope="col">E-mail</th>
                                <th style="cursor: row-resize" scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$index++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="d-flex">
                                        @if($user->is_admin === 1)
                                            <form action="{{route('admin-off', $user)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-dark">Разжаловать</button>
                                            </form>
                                        @else
                                            <form action="{{route('admin-on', $user)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Дать права</button>
                                            </form>
                                        @endif

                                        <form action="{{route('user-delete', $user)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger ml-3">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col">{{$users->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tablesort/5.1.0/tablesort.min.js"></script>
    <script>
        $(function () {
            $('#user_table thead th:eq(1)').click(false);
            new Tablesort(document.getElementById('user_table'));
        });
    </script>
@endsection
