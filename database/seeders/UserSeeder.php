<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => "Jamal Admin",
        //     'email' => "admin@admin.com",
        //     'password' => Hash::make('admin'),
        // ]);
       $user = User::create([
            'name' => "Admin",
            'email' => "admin@admin.com",
            'password' => Hash::make('admin'),
        ]);
        $user->assignRole('super-admin');


        $user = User::create([
            'name' => "Mr Mansoor Ahmad",
            'email' => "Mansoor@gmail.com",
            'password' => Hash::make('faheem'),
        ]);
        $user->assignRole('CEO');


        $user = User::create([
            'name' => "IT man",
            'email' => "IT@gmail.com",
            'password' => Hash::make('faheem'),
        ]);
        $user->assignRole('IT');
    }
}
