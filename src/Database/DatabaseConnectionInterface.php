<?php

namespace App\Database;

interface DatabaseConnectionInterface
{
    public function connection() : \PDO;
}