<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class NewsController extends Controller
{
    public $categories = [
        '1' => 'Политика',
        '2' => 'Экономика',
        '3' => 'Мировые новости'
    ];
//    public $news = [
////        'policy' => ['news_1', 'news_2', 'news_3'],
////        'economy' => ['news_1', 'news_2', 'news_3'],
////        'world_news' => ['news_1', 'news_2', 'news_3']
//        1 => [
//            'id' => 1,
//            'title' => 'news 1',
//            'content' => 'news 1 content',
//            'category_id' => 1
//        ],
//        2 => [
//            'id' => 2,
//            'title' => 'news 2',
//            'content' => 'news 2 content',
//            'category_id' => 3
//        ],
//        3 => [
//            'id' => 3,
//            'title' => 'news 3',
//            'content' => 'news 3 content',
//            'category_id' => 3
//        ],
//        4 => [
//            'id' => 4,
//            'title' => 'news 4',
//            'content' => 'news 5 content',
//            'category_id' => 5
//        ],
//    ];

    public function index()
    {
        return view('news.index', ['categories' => $this->categories]);
    }

    public function news($key)
    {
        return view('news.news',
            [
                'newsOne' => $this->news[$key]
//            'name' => $key,
//            'nameRU' => $this->categories[$key],
//            'newsOne' => $this->news[$key],
            ]);

    }
}
