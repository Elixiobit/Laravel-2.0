<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminValidationCreateNews;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = (new News())->getNews();
        return view('admin.listNews', [
            'news' => $news,
        ]);
    }

    public function create(AdminValidationCreateNews $request)
    {
//        $rules = [
//            'title' => 'required|min:10|max:255|unique:news',
//            'content' => 'required',
//            'category_id' => 'required|exists:categories,id|integer',
//            'source_id' => 'required|exists:categories,id|integer',
//            'active' => 'boolean',
//            'publish_date' => 'date'
//        ];
//
//        $this->validate($request, $rules);

        $news = (new News())
            ->fill($request->all())
            ->save();
        return redirect()->route('admin::createView')
            ->with('success', "Новость добалена");
    }

    public function createView()
    {
        $categories = (new Category())->getCategories();
        $sources = (new Source())->getSource();
        return view('admin.addNews', [
            'operation' => 'Довавить новость',
            'categories' => $categories,
            'sources' => $sources,
        ]);
    }

    public function update(Request $request, News $id)
    {
        $id->fill($request->all())->save();
        return redirect()->route('admin::updateView', ['id' => $id->id])
            ->with('success', "Данные сохранены");
    }

    public function updateView(News $id)
    {
        $categories = (new Category())->getCategories();
        $sources = (new Source())->getSource();
        return view('admin.addNews', [
            'oneNews' => $id,
            'operation' => 'Редактировать новость',
            'categories' => $categories,
            'sources' => $sources,
        ]);
    }

    public function delete($id)
    {
        News::destroy([$id]);
        return redirect()->route('admin::news');
    }
}
