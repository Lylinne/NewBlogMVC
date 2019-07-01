<?php

namespace App\Model\Table;

use Core\Model\Table;

class BeerTable extends Table
{
    public function all()
    {
        return $this->query('SELECT * FROM beer');
    }

    public function allInId(string $ids)
    {
        return $this->query("SELECT * 
                FROM beer
                WHERE id IN (" . $ids . ")");
    }
}