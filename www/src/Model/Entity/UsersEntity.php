<?php

namespace App\Model\Entity;

use Core\Model\Entity;

class UsersEntity extends Entity
{
    private $username;
    private $password;

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}

