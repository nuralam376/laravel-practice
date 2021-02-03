<?php

use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/auth", function () {
    return view("auth");
});

Route::get("/auth2", function () {
    return "Auth2";
})->middleware("auth");

Route::get("/auth3", function () {
    if (Auth::check())
        return "Auth3";
    else
        return "Unauthorize";
});


Route::get("/auth4", [HomeController::class, 'demo']);
