<?php

namespace App\Database;

interface DatabaseOperationInterface
{
    public function insert(array $data);

    public function update(array $data);

    public function delete();

    public function select(array $columns);
}