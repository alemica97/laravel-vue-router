<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = new User;

            $user->name = 'Alessandro Micalizzi';
            $user->email = 'alex-m97@hotmail.it';
            $user->password = Hash::make('prova123');

            $user->save();
    }
}
