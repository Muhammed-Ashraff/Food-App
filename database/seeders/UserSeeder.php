<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
        'first_name'=> 'Taofiq',
        'last_name' => 'Idris',
        'email' => 'idris@gmail.com',
        'address' => 'abuja',
        'phone_number' => '08187676767',
        'password' => '12387'
       ]);
    }
}
