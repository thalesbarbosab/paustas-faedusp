<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name'=>'Thales Bento', 'email'=>'dev.tbarbosa.bento@gmail.com','password'=>bcrypt('dev.tbarbosa.bento@gmail.com')]);
    }
}
