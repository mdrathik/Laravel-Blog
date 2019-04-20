<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = \App\Post::create([
            'name' => 'Author',
            'slug' => 'author',
            'permissions' => [
                'create-post' => true,
            ],
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
    }
}
