<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Album;
use App\Models\AlbumCategory;
use App\Models\Category;
use App\Models\Photo;
use App\Models\User;
use Database\Factories\PhotoFactory;
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
        $this->call(UserSeeder::class);
        $this->call(AlbumSeeder::class);
        Photo::factory(20);
        $this->call(CategorySeeder::class);
        $this->call(AlbumCategorySeeder::class);


        // $this->call(UserSeeder::class);
        // $this->call(AlbumSeeder::class);
        // $this->call(PhotoSeeder::class);
    }
}
