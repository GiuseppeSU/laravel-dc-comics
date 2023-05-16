<?php

namespace Database\Seeders;

use App\Models\Comics;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');
        foreach ($comics as $comic) {
            $newComics = new Comics;
            $newComics->title = $comic["title"];
            $newComics->description = $comic["description"];
            $newComics->thumb = $comic["thumb"];
            $newComics->price = $comic["price"];
            $newComics->series = $comic["series"];
            $newComics->sale_date = $comic["sale_date"];
            $newComics->type = $comic["type"];
            $newComics->save();

        }

    }
}