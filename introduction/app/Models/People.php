<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    public function displayNameAndEmail()
    {
        echo $this->name . " - " . $this->email;
    }

    public function addJR()
    {
        return $this->name .= " JR";
    }
}
