<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = ["name", "email"];

    public function displayNameAndEmail()
    {
        echo $this->name . " - " . $this->email;
    }

    public function addJR()
    {
        return $this->name .= " JR";
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
