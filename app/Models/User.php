<?php

namespace App\Models;

use App\Core\Database\Model;

class User extends Model
{
    protected function getTableName()
    {
        return "users";
    }
}
