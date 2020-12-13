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
        foreach ($this->categories as $key => $category) {
            $url = route('news-directories').'/'.$key;
            echo "<div><a href='{$url}'>{$category}</a></div>";
        }
    }

    public function news($key)
    {
        return view('news', [
            'name' => $key,
            'nameRU' => $this->categories[$key],
            'newsOne' => $this->news[$key],
        ]);

    }
}
