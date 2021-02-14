<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentationController extends Controller
{
    //
    public function index()
    {
        // $users = DB::select("select * from users where id = ?", [1]);

        // $users = DB::select("SELECT * FROM users");

        // foreach ($users as $user) {
        //     echo $user->name . "<br />";
        // }

        // $users = DB::select('Select * from users where id=:id', ["id" => 1]);
        // return response()->json([
        //     "users" => $users
        // ]);

        // $users = DB::insert("INSERT INTO users (name,email,password) VALUES (?, ?, ?)", ["Abc", "abc@gmail.com", "123456"]);

        // $users = DB::update("UPDATE users set password = 100 WHERE name = ?", ["Abc"]);

        // $users = DB::delete("DELETE FROM users WHERE name = ?", ["Abc"]);
        // $users = DB::statement("drop table users"); 
        $users = DB::unprepared("UPDATE users set name = 'Abc' WHERE id = 1");

        return response()->json([
            "data" => $users
        ]);
    }
}
