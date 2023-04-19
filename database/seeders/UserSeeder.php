<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i=0; $i<30; $i++) {
        //     $sql = 'insert into users ( name, email,password, created_at, email_verified_at) values (?, ?, ?, ?, ?)';
        //     $name =  Str::random(10);
        //     /* DB::insert($sql, [
        //          $name ,
        //          $name.'@@gmail.com',
        //          Hash::make('dededede'),
        //          \Carbon\Carbon::now(),
        //          \Carbon\Carbon::now()
        //      ]);
        //     */
        //     DB::table('users')->insert( [
        //         'name' =>   $name ,
        //         'email' => $name.'@gmail.com',
        //         'password' =>  Hash::make('dededede'),
        //         'created_at'=>  Carbon::now(),
        //         'email_verified_at' => Carbon::now()
        //     ]);
        // }

        // User::factory(30)->create();

        $users = [
            [
                'name' => 'Girolamo',
                'surname' => 'De Prisco',
                'email' =>  'girolamodeprisco@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Sandra',
                'surname' => 'Iannone',
                'email' => 'sandraiannone@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => ''
            ],
            [
                'name' => 'Marilena',
                'surname' => 'Fiorentini',
                'email' => 'marilenafiorentini@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => ''
            ],
            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'email' => 'mariorossi@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => ''
            ],
            [
                'name' => 'Federico',
                'surname' => 'Masotti',
                'email' => 'federicomasotti@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => ''
            ],
            [
                'name' => 'Gianluigi',
                'surname' => 'Gialli',
                'email' => 'gianluigigialli@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => ''
            ],
            [
                'name' => 'Marco',
                'surname' => 'Verdi',
                'email' => 'marcoverdi@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Axel',
                'surname' => 'Fiorentini',
                'email' => 'axelfiorentini@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Giovanni',
                'surname' => 'Spada',
                'email' => 'giovannispada@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => ''
            ],
            [
                'name' => 'Gianfranco',
                'surname' => 'Sassi',
                'email' => 'gianfrancosassi@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => ''
            ],
            [
                'name' => 'Maria',
                'surname' => 'Masala',
                'email' => 'gianfrancomasala@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Mariangela',
                'surname' => 'Campani',
                'slug' =>  'mariangela-campani',
                'email' => 'mariangelacampani@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Gianni',
                'surname' => 'Pincopallo',
                'email' => 'giannipincopallo@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Matteo',
                'surname' => 'Canali',
                'email' => 'matteocanali@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Enrico',
                'surname' => 'Colombo',
                'email' => 'enricocolombo@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Antonio',
                'surname' => 'Fontana',
                'email' => 'antoniofontana@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Marta',
                'surname' => 'Barbieri',
                'email' => 'martabarbieri@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Camilla',
                'surname' => 'Amato',
                'email' => 'camillaamato@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Martina',
                'surname' => 'Serra',
                'email' => 'martinaserra@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],
            [
                'name' => 'Alessio',
                'surname' => 'Gentile',
                'email' => 'alessiogentile@gmail.com',
                'password'  => Hash::make('testtest'),
                'profile_pic' => '',
            ],


        ];
        foreach ($users as $user) {
            $newuser = new User();
            $newuser->name = $user['name'];
            $newuser->surname = $user['surname'];
            $newuser->email = $user['email'];
            $newuser->password = $user['password'];
            $newuser->profile_pic = $user['profile_pic'];
            $newuser->save();
        }
    }
}
