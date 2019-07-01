<?php
namespace App\Model\Table;

use Core\Model\Table;


class UsersTable extends Table
{
    public function ismailexist($mail)
    {
        return $this->query("SELECT * FROM users WHERE mail=?", [$mail], true);
    }

    public function connect($arrayUsers)
    {
        return $this->query("INSERT INTO users (lastname, firstname, adress, zipCode, city, country, phone, mail, password)
                            VALUES( :lastname,
                                    :firstname,
                                    :adress,
                                    :zipCode,
                                    :city,
                                    :country,
                                    :phone,
                                    :mail,
                                    :password)", $arrayUsers);
                                    
    }

    //:boolean|void
    public function usersConnect($mail){

        return $this->query("SELECT * FROM users WHERE `mail`= ?", [$mail]);
        
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}