<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $categories = (new News())->getCategories();
        return response(view(
            'news.index',
            [
                'categories' => $categories,
            ]))
            ->header('TEST', 'test'); // оставил как пример
    }

    public function categories(int $categoryId)
    {
        $news = new News();
        $newsList = $news->getByCategoryId($categoryId);
        $categories = $news->getCategory($categoryId);
        return view(
            'news.list',
            [
                'newsList' => $newsList,
                'categories' => $categories,
            ]);
    }

    public function news(int $id)
    {
        $newsOne = (new News())->getById($id);
        return view('news.news', ['newsOne' => $newsOne]);
    }
}
