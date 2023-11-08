<?php

namespace App\Database\MySQL;

class MySQLConnection implements \App\Database\DatabaseConnectionInterface
{
    protected static $database;
    protected $connection;
    private function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=todo_app";
        $dbConnect = new \PDO($dsn,"alireza",'alireza369369');
        $dbConnect->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        $this->connection = $dbConnect;
    }

    public static function getInstance()
    {
        if (!empty(self::$database))
            return self::$database;
        self::$database = new self;

        return self::$database;
    }

    public function connection(): \PDO
    {
        return $this->connection;
    }
}