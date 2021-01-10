<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSourceIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all = News::all();
        foreach ($all as $one) {
            $one->source_id = rand(1, 5);
            $one->save();
        }
    }
}
