<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class NewsController extends Controller
{
    public $categories = [
        'policy' => 'Политика',
        'economy' => 'Экономика',
        'world_news' => 'Мировые новости'
    ];
    public $news = [
        'policy' => ['news_1', 'news_2', 'news_3'],
        'economy' => ['news_1', 'news_2', 'news_3'],
        'world_news' => ['news_1', 'news_2', 'news_3']
    ];
    public function index()
    {
        return view('news.index', ['categories' => $this->categories]);
    }

    public function news($key)
    {
        return view('news.news',
            [
            'name' => $key,
            'nameRU' => $this->categories[$key],
            'newsOne' => $this->news[$key],
            ]);

    }
}
