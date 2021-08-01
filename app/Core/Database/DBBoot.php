<?php

namespace App\Core\Database;

use PDO;
use App\Core\Database\QueryBuilder\Query;

class DBBoot
{
    public function boot()
    {
        $dbname = $_ENV["DB_NAME"];
        $dbuser = $_ENV["DB_USER"];
        $dbpass = $_ENV["DB_PASSWORD"];
        // var_dump($_ENV)
        $pdo = new PDO("mysql:dbname=$dbname", $dbuser, $dbpass);
        return new Query($pdo);
    }
}
