<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function sayHi()
    {
        return "Hello World";
    }

    public function sayName($name)
    {
        return "Hello {$name}";
    }

    public function info()
    {
        return view("info");
    }

    public function allPeople()
    {
        return (array) DB::table("people")->where("id", '>', 1)->where("id", '<', 4)->orderBy("id", "desc")->first();

        // return DB::select("select * from people where id  = 1");
    }
}
