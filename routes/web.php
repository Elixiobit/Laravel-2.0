<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\User\RegController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


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
    Route::get('/card/{id}', [NewsController::class, 'news'])
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
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => ['auth']
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

Route::post('/lang', [LocaleController::class, 'changeLanguage'])
    ->name('language');

Route::group([
    'prefix' => '/auth',
    'as' => 'auth::'
], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])
        ->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])
        ->name('logout');
});

/**
 * Админка работы с пользователями
 */
Route::group([
    'prefix' => '/admin/profile',
    'as' => 'admin::profile::',
    'middleware' => ['auth', 'isAdmin']
], function (){
    Route::get('list', [ProfileController::class, 'index'])
        ->name('userList');
    Route::get('create', [ProfileController::class, 'create'])
    ->name('create');
    Route::match(['get', 'post'],'user',[ProfileController::class, 'update'])
        ->name('update');
    Route::get('register', [ProfileController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [ProfileController::class, 'register']);
    Route::get('delete/{id}', [ProfileController::class, 'delete'])
        ->name('delete');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Auth::routes();
