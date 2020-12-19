<?php

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
    echo ('Hello');
});


Route::group([
    'prefix' => '/news',
], function () {
    Route::get('/', [NewsController::class, 'index'])
    ->name('news-directories');
    Route::get('/{key}', [NewsController::class, 'news'])
    ->name('news-one');

});
