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
        $albums = [
            [
                'album_name' => 'Astratto',
                'album_thumb' => 'https://images.pexels.com/photos/12939554/pexels-photo-12939554.jpeg?auto=compress&cs=tinysrgb&w=400&h=400&dpr=2',
                'description' => '“La verità è un quadro astratto. Prendi una bugia invece, ha dettagli talmente nitidi che la scambi per una fotografia”',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 2
            ],
            [
                'album_name' => 'Animali',
                'album_thumb' => 'https://images.pexels.com/photos/133459/pexels-photo-133459.jpeg?auto=compress&cs=tinysrgb&w=400',
                'description' => '“Se si guarda negli occhi un animale, tutti i sistemi filosofici del mondo crollano”',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 1
            ],
            [
                'album_name' => 'Business',
                'album_thumb' => 'https://images.pexels.com/photos/3184451/pexels-photo-3184451.jpeg?auto=compress&cs=tinysrgb&w=400',
                'description' => '“Non c’è alcun segreto per avere successo. E’ il risultato di preparazione, duro lavoro e di imparare dai propri errori”',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 2
            ],
            [
                'album_name' => 'Città',
                'album_thumb' => 'https://images.pexels.com/photos/1105766/pexels-photo-1105766.jpeg?auto=compress&cs=tinysrgb&w=400',
                'description' => '“La città consente di vedere senza essere visti e di essere visti senza vedere”',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 1
            ],
            [
                'album_name' => 'Cibo',
                'album_thumb' => 'https://images.pexels.com/photos/3186654/pexels-photo-3186654.jpeg?auto=compress&cs=tinysrgb&w=400',
                'description' => '“Mangiare è uno dei quattro scopi della vita… quali siano gli altri tre, nessuno lo ha mai saputo”',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 3
            ],
            [
                'album_name' => 'Fashion',
                'album_thumb' => 'https://images.pexels.com/photos/1478477/pexels-photo-1478477.jpeg?auto=compress&cs=tinysrgb&w=400',
                'description' => '“La moda è quella che viene suggerita e che spesso conviene evitare, lo stile è ciò che ciascuno ha e che deve conservare per tutta la vita”',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 4
            ],
            [
                'album_name' => 'Persone',
                'album_thumb' => 'https://images.pexels.com/photos/889545/pexels-photo-889545.jpeg?auto=compress&cs=tinysrgb&w=400',
                'description' => '“Le persone raramente fanno quello in cui credono. Fanno ciò che conviene, e poi se ne pentono”',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 5
            ],
            [
                'album_name' => 'Natura',
                'album_thumb' => 'https://images.pexels.com/photos/3408744/pexels-photo-3408744.jpeg?auto=compress&cs=tinysrgb&w=400',
                'description' => '“E poi, ho la natura e l’arte e la poesia, e se questo non è sufficiente, che cosa posso volere di più?”',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 7
            ],
            [
                'album_name' => 'Sport',
                'album_thumb' => 'https://images.pexels.com/photos/163444/sport-treadmill-tor-route-163444.jpeg?auto=compress&cs=tinysrgb&w=400',
                'description' => '“Nello sport si vince senza uccidere, in guerra si uccide senza vincere”',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 6
            ],
            [
                'album_name' => 'Musica',
                'album_thumb' => 'https://images.pexels.com/photos/154147/pexels-photo-154147.jpeg?auto=compress&cs=tinysrgb&w=400',
                'description' => '“E coloro che furono visti danzare vennero giudicati pazzi da quelli che non potevano sentire la musica”',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 8
            ],
            [
                'album_name' => 'Viaggi',
                'album_thumb' => 'https://images.pexels.com/photos/346885/pexels-photo-346885.jpeg?auto=compress&cs=tinysrgb&w=400',
                'description' => '“Di una città non apprezzi le sette o settantasette meraviglie, ma la risposta che dà ad una tua domanda”',
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => 9
            ], 
            [
                'album_name' => 'Web Development',
                'album_thumb' => 'https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg?auto=compress&cs=tinysrgb&w=400',
                'description' => '“Internet. Oceano dove molti navigano su una zattera”',
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
