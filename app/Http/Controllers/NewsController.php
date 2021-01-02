<?php

namespace App\Http\Controllers;

use App\Models\News;
//use Illuminate\Http\Request;
//use phpDocumentor\Reflection\Types\This;

class NewsController extends Controller
{
    public $categories = [
        '1' => [
            'ru' => 'Политика',
            'eu' => 'policy',
            ],
        '2' => [
            'ru' => 'Экономика',
            'eu' => 'economy',
        ],
        '3' => [
            'ru' => 'Мировые новости',
            'eu' => 'world_news',
        ]
    ];


    public function index()
    {
        return response(view('news.index', ['categories' => $this->categories]))
            ->header('TEST', 'test');
    }

    public function categories($categoryId)
    {
        $newsList = (new News())->getByCategoryId($categoryId);
        return view(
            'news.list',
            [
                'newsList' => $newsList,
                'categories' => $this->categories[$categoryId]['ru']
            ]);
    }

    public function news($id)
    {
        $newsOne = (new News())->getById($id);
        return view('news.news', ['newsOne' => $newsOne]);
    }
}
