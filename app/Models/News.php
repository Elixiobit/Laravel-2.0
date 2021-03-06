<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $tittle
 * @property string $content
 * @property int $category_id
 * @property int $active
 * @property string $publish_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTittle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model
{
    use HasFactory;

    protected $table = 'news'; //определитьтаблицу БД при  необходимости

    protected $fillable = [
        'tittle',
        'content',
        'category_id',
        'source_id',
        'publish_date',
        'active',
    ];


    public function getNews()
    {
        return News::orderBy('publish_date', 'desc')
            ->paginate(5);

    }

    public function getById(int $id)
    {
        return News::find($id);
    }

    public function getByCategoryId(int $categories)
    {
        return News::query()
            ->orderBy('created_at', 'desc')
            ->where('category_id', $categories)
            ->with(['category']) // возвращает сразу с категорями
            ->paginate(5);
    }

    public function saveParserNews($oneNews)
    {
            News::fill([
                'tittle' => $oneNews['title'],
                'content'=> $oneNews['description'],
                'category_id' => rand(1,3),
                'active'=> 1
            ])->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class); //многие к одному
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id');
    }


}
