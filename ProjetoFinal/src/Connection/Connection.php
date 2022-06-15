<?php

declare(strict_types=1);

namespace App\Connection;

abstract class Connection
{
    public static function getConnection(): \PDO
    {
        $database = 'store';
        $username = 'root';
        $password = 'well';

        return new \PDO('mysql:host=localhost;dbname='.$database, $username, $password);
    }
}