<?php

namespace App\Controllers;

use App\Database\MySQL\MySQLConnection;
use App\Request;
use App\SendNotif;

class UserController
{
    public function index()
    {
        $dbConnect = MySQLConnection::getInstance();
        $dbConnect2 = MySQLConnection::getInstance();
        var_dump($dbConnect,$dbConnect2); exit;
        $id = Request::getData()['user_id'];

        $preparedStatement = $dbConnect->prepare($sql);
        $result = $preparedStatement->execute([
            ':id' => $id
        ]);

        foreach ($preparedStatement->fetchAll(\PDO::FETCH_OBJ) as $row){
            echo "<h3>" . $row->full_name . "</h3>";
        }
        echo "<br><br>";
        SendNotif::notifyAdmin();
        var_dump(memory_get_peak_usage());
    }
}