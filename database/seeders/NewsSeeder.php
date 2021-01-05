<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')
            ->insert($this->getDataCategory());
        \DB::table('news')
            ->insert($this->getDataNews());
    }

    protected function getDataNews(): array
    {
        $data = [];
        $data[] = [
            'tittle' => 'News'. uniqid(),
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Morbi sed tristique purus. Morbi consequat suscipit leo,
                            sit amet volutpat tellus eleifend at. Duis mattis vitae nulla
                            ut commodo. Suspendisse potenti. Morbi ut viverra ante. Aliquam
                            nisi dui, porttitor sed gravida in, ullamcorper at lectus.
                            Ut ut euismod nulla. Donec a mauris nisl. Quisque gravida a arcu
                            ac fermentum. Curabitur odio mi, dignissim eu dolor eu,
                            ultricies dapibus mauris.',
            'category_id' => '3',
            'publish_date' => date('Y-m-d'),
            'created_at' => date('Y-m-d'),
        ];
        return $data;
    }

    protected function getDataCategory():array
    {
        $data = [];
        $data[] = [
            'categories' => 'Мировые новости"',
            'created_at' => date('Y-m-d'),
        ];
        return $data;
    }
}
