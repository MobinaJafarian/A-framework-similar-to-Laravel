<?php

namespace App\Models;

use Core\Database\ORM\Model;

class User extends  Model
{
    protected $table = "users";

    protected $fillable = ['name', 'email'];

}