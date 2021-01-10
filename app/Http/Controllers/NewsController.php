<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $categories = (new Category())->getCategories();
        return view(
            'news.index',
            [
                'categories' => $categories,
            ]);
    }

    public function categories(Category $categories)
    {
        $newsList =  (new News())->getByCategoryId($categories->id);
        return view(
            'news.list',
            [
                'newsList' => $newsList,
                'category' => $categories,
            ]);
    }

//    public function news(News $news) //вариант 1
//    {
//        return view('news.news', ['newsOne' => $news]);
//    }
    public function news(int $id)  //вариант 2
    {
        $newsOne = (new News())->getById($id);
        return view('news.news', ['newsOne' => $newsOne]);
    }
}
