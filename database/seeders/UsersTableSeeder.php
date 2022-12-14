<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Volodymyr';
        $user->email = 'volodymyr@gmail.com';
        $user->password = Hash::make('12345678');
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();
    }

}
