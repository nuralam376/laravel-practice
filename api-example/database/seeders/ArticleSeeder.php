<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $articles = [
            [
                "title" => "Article 1",
                "content" => "Lorem Ipsum Article 1",
                "user_id" => 1
            ],
            [
                "title" => "Article 2",
                "content" => "Lorem Ipsum Article 2",
                "user_id" => 1
            ],
            [
                "title" => "Article 3",
                "content" => "Lorem Ipsum Article 3",
                "user_id" => 2
            ],
            [
                "title" => "Article 4",
                "content" => "Lorem Ipsum Article 4",
                "user_id" => 1
            ],
            [
                "title" => "Article 5",
                "content" => "Lorem Ipsum Article 5",
                "user_id" => 2
            ],
        ];

        DB::table("articles")->insert($articles);
    }
}
