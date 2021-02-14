<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    //
    public function index()
    {
        // $users = DB::table("users")->get();

        // foreach ($users as $user) {
        //     echo $user->name . "<br />";
        // }

        // $users = DB::table("users")->where("name", "Abc")->first();

        // $users = DB::table("users")->where("name", "Abc")->value("email");

        // $users = DB::table("users")->find(1);

        // $users = DB::table("users")->pluck("name", "email");

        // foreach ($users as $name => $title) {
        //     echo $title;
        // }

        // $users = DB::table("users")->orderBy("id")->chunk(2, function ($users) {
        //     foreach ($users as $user) {
        //         echo $user->name;
        //     }

        //     return false;
        // });

        // $users = DB::table("users")->where("name", "Abc")->chunkById(1, function ($users) {
        //     foreach ($users as $user) {
        //         DB::table("users")->where("name", "Abc")->update(["email" => "abc2@gmail.com"]);
        //     }
        // });

        // $users = DB::table("users")->where("id", ">", 2)->avg("created_at");

        // $users = DB::table("users")->where("name", "Abc")->exists();
        // $users = DB::table("users")->where("name", "Abc")->doesntExist();

        // $users = DB::table('users')->select('name', 'email as user_email')->get();

        // $users = DB::table("users")->distinct()->get();

        // $query = DB::table("users")->select("name");

        // $users = $query->addSelect("email")->get();

        // $users = DB::table("users")->select(DB::raw("count(*) as user_count, email"))->where("name", "<>", "Abc")->groupBy("email")->get();

        // $users = DB::table("users")->selectRaw("name * ? as user_name", ["Abc"])->get();

        // $users = DB::table("users")->whereRaw("id > IF(name = 'Abc', ? , 'Def')", ["as"]);

        // $users = DB::table("users")->select("name", DB::raw("SUM(id) as sum_id"))->groupBy("id")->havingRaw("sum_id > ?", [1])->get();

        // $users = DB::table("users")->orderByRaw("updated_at - created_at desc")->get();

        $users = DB::table("users")->select("name", "email")->groupByRaw("name, email")->get();

        return response()->json([
            "data" => $users
        ]);
    }
}
