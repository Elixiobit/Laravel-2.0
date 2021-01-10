<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++) {
            \DB::table('categories')
                ->insert($this->getDataCategory());
        }
    }

    protected function getDataCategory(): array
    {
        $data = [];
        $data[] = [
            'categories' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        return $data;
    }
}
