<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the category seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Общие'
            ],
            [
                'title' => 'Covid-19'
            ],
            [
                'title' => 'Шутки'
            ]
        ]);
    }
}
