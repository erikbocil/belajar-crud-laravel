<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::create([
            "email" => 'Kobo@kanaeru.com',
            "username" => 'kobokanaeru',
            "password" => 'kobo1234567890',
        ]);
        User::factory(10)->create();
    }
}
