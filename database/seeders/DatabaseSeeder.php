<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Tag::factory(3)->create();
        \App\Models\Post::factory(10)->create();
        \App\Models\Comment::factory(50)->create();
        \App\Models\Like::factory(250)->create();
    }
}
