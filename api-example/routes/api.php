<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/articles", [ArticleController::class, "allArticles"]);
Route::get("/articles/{article}", [ArticleController::class, "getArticle"]);

Route::middleware("auth:api")->group(function () {
    Route::post("/articles", [ArticleController::class, "createArticle"]);
    Route::put("/articles/{article}", [ArticleController::class, "updateArticle"]);
    Route::delete("/articles/{article}", [ArticleController::class, "deleteArticle"]);
});

Route::post("/token", [UserController::class, "generateToken"]);

Route::get("/user", function (Request $request) {
    return $request->user();
})->middleware("auth:api");

Route::get("/create", function () {
    User::forceCreate([
        "name" => "Abc",
        "email" => "abc@gmail.com",
        "password" => Hash::make("123456")
    ]);

    User::forceCreate([
        "name" => "Def",
        "email" => "def@gmail.com",
        "password" => Hash::make("123456")
    ]);
});

Route::get("/createToken", function () {
    $user = User::find(1);
    $user->api_token = Str::random(80);
    $user->save();

    $user = User::find(2);
    $user->api_token  = Str::random(80);
    $user->save();
});

Route::get("/docs", [DocumentationController::class, "index"]);

Route::get("/query", [QueryController::class, 'index']);
