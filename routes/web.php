<?php

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
], function () {
    Route::get('/', [NewsController::class, 'index'])
    ->name('news-directories');
    Route::get('/card/{id}', [NewsController::class, 'news'])
    ->name('news-one')
    ->where('id', '[0-9]+');
    Route::get('/{$categoryId}', [NewsController::class, 'categories'])
    ->name('news::category');

});


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

Route::group([
    'prefix' => '/reg',
    'as' => 'user::reg::'
//    'namespace' => '\App\Http\Controllers\Admin\News'
],function (){
    Route::get('/', [RegController::class, 'index']);
    Route::get('/form', [RegController::class, 'createForm'])
        ->name('create');

    Route::post('/form', [RegController::class, 'formSubmit'])
        ->name('form');
}
);
