<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = new User([
        	'name'=>'Mubina',
        	'email'=>'mardonova@gmail.com',
        	'password'=>Hash::make('mubina123')

        ]);
        $users->save();

        $users = new User([
            'name'=>'Mubiw',
            'email'=>'mbnabd@mail.ru',
            'password'=>Hash::make('mubi801')

        ]);
        $users->save();

        $users = new User([
            'name'=>'Komila',
            'email'=>'komila@gmail.com',
            'password'=>Hash::make('komila5685')

        ]);
        $users->save();
    }
}