<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
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
                "name" => "Abc",
                "email" => "abc@gmail.com",
                "age" => 21
            ],
            [
                "name" => "Def",
                "email" => "def@gmail.com",
                "age" => 23
            ],
            [
                "name" => "Ghi",
                "email" => "ghi@gmail.com",
                "age" => 29
            ], [
                "name" => "Jkl",
                "email" => "jkl@gmail.com",
                "age" => 26
            ],
        ];

        DB::table("people")->insert($posts);
    }
}
