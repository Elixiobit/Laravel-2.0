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
    echo 'Hello';
});


Route::group([
    'prefix' => '/news',
    'as' => 'news::'
], function () {
    Route::get('/', [NewsController::class, 'index'])
    ->name('categories');
    Route::get('/card/{id}', [NewsController::class, 'news'])
    ->name('one')
    ->where('id', '[0-9]+');
    Route::get('/{categoryId}', [NewsController::class, 'categories'])
    ->name('listNews')
    ->where('categoryId', '[0-9]+');

});


/**
 * Регистриция пользователей
 */
Route::group([
    'prefix' => '/reg',
    'as' => 'user::reg::'
],function (){
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
    'prefix' => '/admin/news',
    'as' => 'admin::news::',
    'namespace' => '\App\Http\Controllers\Admin\News'
], function () {
    Route::get('/', 'NewsController@index')
        ->name('index');

    Route::get('/create', 'NewsController@createView')
        ->name('create');

    Route::post('/create', 'NewsController@create')
        ->name('create_action');

    Route::get('/update', 'NewsController@update')
        ->name('update');
});

Route::get('/laradb', [DbController::class, 'index']);
