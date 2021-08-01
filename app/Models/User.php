<?php

namespace App\Models;

use App\Core\Database\Model;

class User extends Model
{
    protected static function getTableName()
    {
        return "users";
    }
}
