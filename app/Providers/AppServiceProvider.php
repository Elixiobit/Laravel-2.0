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
                'title' => __('nameMenu.first'),
                'alias' => 'home'
            ],
            [
                'title' => __('nameMenu.second'),
                'alias' => 'news::categories'
            ],
            [
                'title' => __('nameMenu.third'),
                'alias' => 'admin::news'
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
