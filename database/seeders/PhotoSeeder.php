<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i < 240; $i++){
            $newPhoto = new Photo();
            $newPhoto->name = $faker->text(60);
            $newPhoto->description = $faker->text(128);
            $newPhoto->img_path = $faker->imageUrl();
            $newPhoto->created_at = $faker->date('Y-m-d H:i:s');
            $newPhoto->album_id = rand(1, 12);
            $newPhoto->save();
        }
    }
}
