<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public $news = [
        1 => [
            'id' => 1,
            'title' => 'news 1',
            'content' => 'news 1 content',
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'news 2',
            'content' => 'news 2 content',
            'category_id' => 2,
        ],
        3 => [
            'id' => 3,
            'title' => 'news 3',
            'content' => 'news 3 content',
            'category_id' => 3,
        ],
        4 => [
            'id' => 4,
            'title' => 'news 4',
            'content' => 'news 4 content',
            'category_id' => 1,
        ],
        5 => [
            'id' => 5,
            'title' => 'news 5',
            'content' => 'news 5 content',
            'category_id' => 2
        ],
        6 => [
            'id' => 6,
            'title' => 'news 6',
            'content' => 'news 6 content',
            'category_id' => 3
        ],
        7 => [
            'id' => 7,
            'title' => 'news 7',
            'content' => 'news 7 content',
            'category_id' => 3
        ],
    ];
    public function getById(int $id)
    {
        return $this->news[$id];
    }

    public function getByCategoryId(int $categoryId)
    {
        $news = [];
        foreach ($this->news as $id => $items) {
            if ($items['category_id'] == $categoryId)
            {
                $news[$id] = $items;

            }
        }
        return $news;

    }
}
