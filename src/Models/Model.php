<?php

namespace App\Models;

use App\Database\MySQL\MySQLConnection;

abstract class Model
{
    protected $connection;
    protected $table;
    public function __construct()
    {
        $this->connection = MySQLConnection::getInstance();
        $this->connection->setTable($this->table);
    }

    public function delete(array $where=[]): bool
    {
        return $this->connection->where($where)->delete();
    }

    public function create(array $data): bool
    {
        return $this->connection->insert($data);
    }

    public function update(array $data,array $where = []): bool
    {
        return $this->connection->where($where)->update($data);
    }

    public function get(array $columns = ['*'])
    {
        return $this->connection->select($columns);
    }

    public function where(string $column, $value): Model
    {
        $this->connection->where([$column => $value]);
        return $this;
    }

    public function orWhere(string $column, $value): Model
    {
        $this->connection->where([$column => $value],"OR");
        return $this;
    }
}