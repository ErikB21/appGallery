<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use Faker\Factory as Faker;
use App\Models\User;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $albums = [
            [
                'album_name' => 'Abstract',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Il nulla concreto, il tutto astratto! ',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 2
            ],
            [
                'album_name' => 'Animals',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Animali fantastici e dove trovarli...e non si tratta di un film!',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 1
            ],
            [
                'album_name' => 'Business',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Soldi soldi, sempre e solo soldi! Investi anche tu!',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 2
            ],
            [
                'album_name' => 'Cities',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Le città più belle, più romantiche o semplicemente le più amate!',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 1
            ],
            [
                'album_name' => 'Food',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Cibo, la fonte di vita del genere umano! Quanto cibooooo!',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 3
            ],
            [
                'album_name' => 'Fashion',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Il panorama mondiale della moda, in semplici foto!',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 4
            ],
            [
                'album_name' => 'People',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Il problema? La gente se ne frega del problema!',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 5
            ],
            [
                'album_name' => 'Nature',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Naturalize, immergiti nella natura più estrema!',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 7
            ],
            [
                'album_name' => 'Sports',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Sport, dal grande calcio alla pallavolo, basket, e molto altro!',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 6
            ],
            [
                'album_name' => 'Music',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Musica Maestro! I cantanti più amati, le grandi star della Musica!',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 8
            ],
            [
                'album_name' => 'Travels',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Vuoi viaggiare? Immagina, sogna, e viaggia!',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 9
            ], 
            [
                'album_name' => 'Web Development',
                'album_thumb' => $faker->imageUrl(),
                'description' => 'Sviluppo web, app mobile e IA!',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 11
            ],
        ];
        foreach ($albums as $album) {
            $newAlbum = new Album();
            $newAlbum->album_name = $album['album_name'];
            $newAlbum->album_thumb = $album['album_thumb'];
            $newAlbum->description = $album['description'];
            $newAlbum->created_at = $album['created_at'];
            $newAlbum->user_id = $album['user_id'];
            $newAlbum->save();
        }
    }
}

?>
