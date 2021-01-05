<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    public function getCategories()
    {
        return DB::table('categories')
            ->get();
    }
    public function getCategory(int $categoryId)
    {
        return DB::table('categories')
            ->find($categoryId);
    }

    public function getById(int $id)
    {
        return DB::table('news')
            ->find($id);
    }

    public function getByCategoryId(int $categoryId)
    {
        return DB::table('news')
            ->where(['category_id' => $categoryId])
            ->get();

    }
}
