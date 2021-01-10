<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    public function getSource()
    {
        return Source::all();
    }

    public function news()
    {
        return $this->hasMany(News::class, 'source_id'); // один ко многим
    }
}
