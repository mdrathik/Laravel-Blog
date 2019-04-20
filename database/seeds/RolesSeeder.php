<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = \App\Role::create([
            'name' => 'Author',
            'slug' => 'author',
            'permissions' => [
                'create-post' => true,
            ],
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        $editor = \App\Role::create([
            'name' => 'Editor',
            'slug' => 'editor',
            'permissions' => [
                'update-post' => true,
                'publish-post' => true,
            ],
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
