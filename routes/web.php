<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//サインアップの時のルーティング
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログインの時のルーティング
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//ログイン状態のではない人には見せないように、認証付きルーティングを採用
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['can:is-teacher']], function() {
        Route::get('/teacher', 'TeacherController@show')->name('teachers.show');
        Route::get('/teacher/students', 'TeacherController@students')->name('teachers.students');
        Route::get('/teacher/texts', 'TeacherController@texts')->name('teacher.texts');
        
        Route::get('texts/show/{id}', 'TextsController@show')->name('texts.show');
        Route::get('texts/edit/{id}', 'TextsController@edit')->name('texts.edit');
        Route::put('texts/{id}', 'TextsController@update')->name('texts.update');
        Route::delete('texts/delete/{id}', 'TextsController@destroy')->name('texts.delete');
        
        Route::get('texts/create', 'TextsController@create')->name('texts.create');
    });
    Route::get('/student', 'StudentsController@show');
});
