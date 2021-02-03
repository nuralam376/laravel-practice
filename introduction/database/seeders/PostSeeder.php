<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $posts = [
            [
                "title" => "Post 1",
                "content" => "Lorem ipsum dolor sit amet",
                "people_id" => 1
            ],
            [
                "title" => "Post 1",
                "content" => "Lorem ipsum dolor sit amet",
                "people_id" => 2
            ],
            [
                "title" => "Post 1",
                "content" => "Lorem ipsum dolor sit amet",
                "people_id" => 2
            ],
            [
                "title" => "Post 1",
                "content" => "Lorem ipsum dolor sit amet",
                "people_id" => 3
            ],
        ];

        DB::table("posts")->insert($posts);
    }
}
