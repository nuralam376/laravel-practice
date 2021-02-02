<?php

namespace App\Http\Controllers;

use App\Models\People;
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

    public function testPeople()
    {
        // $people = People::all()->skip(1)->take(2);
        // $people = People::where("id", ">", 1)->where("id", "<", 4)->get();
        // $people = People::where("id", ">", 1)->count();
        // $people = People::whereName("Abc")->get();
        // $people = People::whereActive(0)->get();

        $people = People::find(1);
        $people->addJR();
        $people->save();
        $people = $people->fresh()->displayNameAndEmail();
        return $people;
    }
}
