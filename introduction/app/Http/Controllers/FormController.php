<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function displayForm()
    {
        return view("form");
    }

    public function showForm(Request $request)
    {
        $name = $request->post("name");
        $email = $request->post("email");

        // if (People::whereEmail($email)->count() === 0) {
        //     $people = new People();
        //     $people->name = $name;
        //     $people->email = $email;
        //     $people->save();
        // }

        People::firstOrCreate(["email" => $email], ["name" => $name, "email" => $email]);

        return redirect()->route("form.create");
    }
}
