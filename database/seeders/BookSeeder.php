<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'title' => [
                'How to be the greatest blacksmith',
                'How to be the greatest rain shaman',
                'How to be the greatest agent',
            ],
            'author' => [
                'Kaela Kovalskia 🐧',
                'Kobo Kanaeru ☔',
                'Vestia Zeta 😻'
            ],
            'price' => [
                100000,
                100000,
                100000,
            ],
            'description' => [
                'I will teach you how to be the greatest blacksmith in the world and also how to bonk 🔨',
                'Bokobokobo kobo kanaeru at your service let me be your sun to shine your day ehekk ☔',
                'Kijang 1 ganti 🕵️‍♀️'
            ],
        ];
        for ($i = 0; $i < 3; $i++) {
            DB::table('books')->insert(
                [
                    'title' => $data['title'][$i],
                    'author' => $data['author'][$i],
                    'price' => $data['price'][$i],
                    'description' => $data['description'][$i],
                ]
            );
        }
        Book::factory(30)->create();
    }
}
