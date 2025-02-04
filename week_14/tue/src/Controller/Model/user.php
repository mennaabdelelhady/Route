<?php

namespace User\Tue\Controller\Model;
use User\Tue\Model;

class user extends Model
{
    $protected $tableName = 'users';
    public function all()
    {
        $query = "SELECT * FROM $this->tableName";
        return $this->connection->query
        
    }
}