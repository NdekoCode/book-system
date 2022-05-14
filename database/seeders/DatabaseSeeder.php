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
        \App\Models\User::factory(10)->create();
        \App\Models\Author::factory(25)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Book::factory(100)->create();
        \App\Models\BookCategory::factory(100)->create();
    }
}
