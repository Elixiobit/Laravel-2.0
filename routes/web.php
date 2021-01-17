<?php

use App\Http\Controllers\DbController;
use App\Http\Controllers\User\RegController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;


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
})->name('home');

/**
 * Пользовательский интерфейс
 */
Route::group([
    'prefix' => '/news',
    'as' => 'news::'
], function () {
    Route::get('/', [NewsController::class, 'index'])
        ->name('categories');
//    Route::get('/card/{news}', [NewsController::class, 'news']) //вариант 1
//    ->name('one')
//    ->where('news', '[0-9]+');
    Route::get('/card/{id}', [NewsController::class, 'news']) //вариант 2
    ->name('one')
        ->where('id', '[0-9]+');
    Route::get('/{categories}', [NewsController::class, 'categories']) //по умолчанию счет по id
    ->name('listNews')
        ->where('categories', '[0-9]+');

});


/**
 * Регистриция пользователей
 */
Route::group([
    'prefix' => '/reg',
    'as' => 'user::reg::'
], function () {
    Route::get('/', [RegController::class, 'index']);
    Route::get('/form', [RegController::class, 'createForm'])
        ->name('create');

    Route::post('/form', [RegController::class, 'formSubmit'])
        ->name('form');
}
);


/**
 * Админка новостей
 */
Route::group([
    'prefix' => '/admin',
    'as' => 'admin::',
    'namespace' => 'App\Http\Controllers\Admin'
], function () {
    Route::get('/', 'NewsController@index')
        ->name('news');

    Route::get('/create', 'NewsController@createView')
        ->name('createView');

    Route::post('/create', 'NewsController@create')
        ->name('create');

    Route::get('/update/{id}', 'NewsController@updateView')
        ->name('updateView');

    Route::post('/update/{id}', 'NewsController@update')
        ->name('update');

    Route::get('/delete/{id}', 'NewsController@delete')
        ->name('delete');
});

Route::get('/laradb', [DbController::class, 'index']);
