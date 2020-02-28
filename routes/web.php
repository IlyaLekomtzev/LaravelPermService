<?php

//Гость
Route::group(['middleware' => 'guest'], function(){
    Route::get('/', function () {
        return view('welcome');
    });
});

//Авторизированный пользователь
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('category', 'HomeController@category')->name('category');
    Route::get('items/{cat}', 'HomeController@items')->name('items');
    Route::get('item/{item}', 'HomeController@item')->name('item');
    Route::post('item/comment', 'CommentController@add')->name('comment-add');

    Route::get('selected', 'HomeController@select')->name('selected');
    Route::post('select/{item}', 'SelectController@add')->name('select');
    Route::post('unselect/{item}', 'SelectController@delete')->name('unselect');
});
Auth::routes();

//Администратор
Route::group(['middleware' => 'admin'], function(){
    //Главная
    Route::get('/admin', 'AdminController@index')->name('admin-index');
    //Изменение роли
    Route::post('/admin/on/{user}', 'AdminController@adminOn')->name('admin-on');
    Route::post('/admin/off/{user}', 'AdminController@adminOff')->name('admin-off');
    //Удаление пользователя
    Route::delete('/admin/delete/{user}', 'AdminController@userDelete')->name('user-delete');

    //Категории
    Route::get('/admin/category', 'CategoryController@index')->name('admin-category');
    //Добавление
    Route::post('/admin/category/add', 'CategoryController@add')->name('admin-category-add');
    //Удаление
    Route::delete('/admin/category/delete/{category}', 'CategoryController@delete')->name('admin-category-del');
    //Редактирование
    Route::get('/admin/category/edit/{category}', 'CategoryController@show')->name('admin-category-edit');
    Route::post('/admin/category/edit/save/{category}', 'CategoryController@edit')->name('admin-category-save');

    //Места
    Route::get('/admin/items', 'ItemController@index')->name('admin-items');
    //Добавление
    Route::post('/admin/items/add', 'ItemController@add')->name('admin-items-add');
    //Удаление
    Route::delete('/admin/items/delete/{item}', 'ItemController@delete')->name('admin-items-del');
    //Редактирование
    Route::get('/admin/items/edit/{item}', 'ItemController@show')->name('admin-items-edit');
    Route::post('/admin/items/edit/save/{item}', 'ItemController@edit')->name('admin-items-save');
});
