<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Album;
use App\Models\AlbumCategory;
use App\Models\Category;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        AlbumCategory::truncate();
        Category::truncate();
        Album::truncate();
        Photo::truncate();
        $this->call(CategorySeeder::class);
        User::factory(20)->has(
            Album::factory(10)->has(
                Photo::factory(20)
            )
        )->create();
        $this->call(AlbumCategorySeeder::class);


        // $this->call(UserSeeder::class);
        // $this->call(AlbumSeeder::class);
        // $this->call(PhotoSeeder::class);
    }
}
