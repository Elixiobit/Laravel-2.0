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

    public function news(int $id)
    {

        session()->push('last_viewed_page', $id);

        $newsOne = (new News())->getById($id);
        return view('news.news', ['newsOne' => $newsOne]);
    }
}
