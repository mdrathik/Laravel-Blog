<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        $author = \App\Category::create([
            'category_name'=>'Technology'

        ]);
    }
}
