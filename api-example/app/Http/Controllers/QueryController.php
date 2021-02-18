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

        // $users = DB::table("users")->select("name", "email")->groupByRaw("name, email")->get();

        // $users = DB::table("users")
        //     ->join("contacts", "users.id", "=", "contacts.user_id")
        //     ->join("orders", "users.id", "=", "orders.user_id")
        //     ->select("users.*", "contacts.phone", "orders.price")
        //     ->get();

        // $users = DB::table("users")
        //     ->leftJoin("posts", "users.id", "=", "posts.user_id")
        //     ->get();

        // $users = DB::table("users")
        //     ->rightJoin("posts", "users.id", "=", "posts.user_id")
        //     ->get();

        // $users = DB::table("colors")->crossJoin("sizes")->get();

        // $users = DB::table("users")->join("contacts", function ($join) {
        //     $join
        //         ->on("users.id", "=", "contacts.user_id")
        //         ->orOn("users.name", "=", "contacts.name");
        // })
        //     ->get();

        // $users = DB::table("users")
        //     ->join("contacts", function ($join) {
        //         $join
        //             ->on("users.id", "=", "contacts.user__id")
        //             ->where("contacts.user_id", ">", 5);
        //     })
        //     ->get();

        // $posts = DB::table("posts")
        //     ->select("user_id", DB::raw("MAX(created_at) as last_post_created"))
        //     ->where("is_published", true)
        //     ->groupBy("user_id");

        // $users = DB::table("users")
        //     ->joinSub($posts, "latest_post", function ($join) {
        //         $join->on("users.id", "=", "latest_post.user_id");
        //     })->get();

        // $first = DB::table("users")
        //     ->whereNull("first_name")
        //     ->get();

        // $users = DB::table("users")
        //     ->whereNull("last_name")
        //     ->union($first)
        //     ->get();

        // $users = DB::table("users")
        //     ->where("votes", "=", 100)
        //     ->where("age", ">", "45")
        //     ->get();

        // $users = DB::table("users")
        //     ->where("votes", 100)
        //     ->get();

        // $users = DB::table("users")
        //     ->where("votes", ">=", 100)
        //     ->get();

        // $users = DB::table("users")
        //     ->where("votes", "<>", 100)
        //     ->get();

        // $users = DB::table("users")
        //     ->where("votes", "LIKE", "T%")
        //     ->get();

        // $users = DB::table("users")
        //     ->where([
        //         ["status", "=", 1],
        //         ["subscribed", "<>", 1]
        //     ])->get();

        // $users = DB::table("users")
        //     ->where("votes", ">", 100)
        //     ->orWhere("name", "John")
        //     ->get();

        // $users = DB::table("users")
        //     ->where("votes", ">", 100)
        //     ->orWhere(function ($query) {
        //         $query->where("name", "Abigali")
        //             ->where("votes", ">", 40);
        //     });

        // $users = DB::table("users")
        //     ->where("preference->dining->meal", "em")
        //     ->get();

        // $users = DB::table("users")
        //     ->whereJsonContains("option->languages", "en")
        //     ->get();

        // $users = DB::table("users")
        //     ->whereJsonContains("options->languages", ["en", "bng"])
        //     ->get();

        // $users = DB::table("users")
        //     ->whereJsonLength("options->languages", 0)
        //     ->get();

        $users = DB::table("users")
            ->whereJsonLength("options.languages", ">", 0)
            ->get();

        // return response()->json([
        //     "data" => $users
        // ]);
    }
}
