<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
