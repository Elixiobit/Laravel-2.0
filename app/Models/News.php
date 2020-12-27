<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public $news = [
//        'policy' => ['news_1', 'news_2', 'news_3'],
//        'economy' => ['news_1', 'news_2', 'news_3'],
//        'world_news' => ['news_1', 'news_2', 'news_3']
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
            'category_id' => 3
        ],
        3 => [
            'id' => 3,
            'title' => 'news 3',
            'content' => 'news 3 content',
            'category_id' => 3
        ],
        4 => [
            'id' => 4,
            'title' => 'news 4',
            'content' => 'news 5 content',
            'category_id' =>3
        ],
    ];
    public function getById(int $id)
    {
//        dd($this->news[$id]);
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
