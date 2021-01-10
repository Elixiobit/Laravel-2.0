<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++){
            \DB::table('sources')
                ->insert($this->getDataSource());
        }
    }

    public function getDataSource(): array
    {
        $data = [];
        $data[] = [
            'name_source' => uniqid('source'),
        ];
        return $data;
    }
}
