<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class NewsController extends Controller
{
    public $categories = [
        '1' => 'Политика',
        '2' => 'Экономика',
        '3' => 'Мировые новости'
    ];


    public function index()
    {
        return view('news.index', ['categories' => $this->categories]);
    }

    public function categories($categoryId)
    {
        $newsList = (new News())->getByCategoryId($categoryId);
        return view('news.list',['newsList' =>  $newsList]);
    }

    public function news($id)
    {
        $newsOne = (new News())->getById($id);
        return view('news.news', ['newsOne' => $newsOne]);
    }
}
