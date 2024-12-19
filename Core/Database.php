<?php

namespace Core;

use PDO;

class Database
{
    protected $connection;
    protected $stmt;

    public function __construct($config,$username='root',$password='')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);
        return $this;
    }

    public function get()
    {
        return $this->stmt->fetchAll();
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

}
