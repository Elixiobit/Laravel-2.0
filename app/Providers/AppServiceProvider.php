<?php

namespace App\Providers;

use App\Http\Middleware\Locale;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
    public function boot()
    {
        $menu = [
            [
                'title' => 'main',
                'alias' => 'home'
            ],
            [
                'title' => 'News',
                'alias' => 'news::categories'
            ],
            [
                'title' => 'admin',
                'alias' => 'admin::news'
            ],
            [
                'title' => 'userList',
                'alias' => 'admin::profile::userList'
            ],

        ];

        $language = [
            'ru' => 'Русский',
            'eu' => 'England'
        ];


        View::share([
            'menu' => $menu,
            'language' => $language,
        ]);

    }
}
