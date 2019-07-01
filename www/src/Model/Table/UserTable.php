<?php

namespace App\Model\Table;

use Core\Model\Table;

class UserTable extends Table
{
    public function all()
    {
        return $this->query('SELECT * FROM user');
    }
}