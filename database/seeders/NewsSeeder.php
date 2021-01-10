<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++){
            \DB::table('news')
                ->insert($this->getDataNews());
        }

    }

    protected function getDataNews(): array
    {
        $data = [];
        $data[] = [
            'tittle' => uniqid('News'),
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Morbi sed tristique purus. Morbi consequat suscipit leo,
                            sit amet volutpat tellus eleifend at. Duis mattis vitae nulla
                            ut commodo. Suspendisse potenti. Morbi ut viverra ante. Aliquam
                            nisi dui, porttitor sed gravida in, ullamcorper at lectus.
                            Ut ut euismod nulla. Donec a mauris nisl. Quisque gravida a arcu
                            ac fermentum. Curabitur odio mi, dignissim eu dolor eu,
                            ultricies dapibus mauris.',
            'category_id' => (int) rand(1, 3),
            'publish_date' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        return $data;
    }
}
