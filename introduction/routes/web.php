<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    // echo "Hello";
    return ["name" => "Hello"];
});


Route::get("/hello/world", function () {
    return "Hello World";
});

Route::get("/greet/{greeting}/name/{name}", function ($greeting, $name) {
    $greeting = ucwords($greeting);
    $name = ucwords($name);
    // return "{$greeting} {$name}";
    return view("info", [
        "greet" => $greeting,
        "name" => $name,
        "time" => time()
    ]);
});

Route::post("/say", function (Request $request) {
    $name = $request->post("name");
    return [
        "name" => $name
    ];
});


Route::get("/sayhi", "MainController@sayHi");
Route::get("/sayname/{name}", [MainController::class, "sayHi"]);

Route::get("/info", [MainController::class, "info"]);

Route::get("/allpeople", [MainController::class, "allPeople"]);
