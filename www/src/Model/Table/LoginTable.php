<?php

namespace App\Model\Table;

use Core\Controller\Model\Table;

class LoginTable extends Table
{
    private $user;

    public function registration()
    {
        if(!empty($user)){
        
            $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_BCRYPT);
            $sql = "INSERT INTO `users` (`lastname`, `firstname`, `adress`, `zipCode`, `city`, `country`, `phone`, `mail`, `password`) VALUES (
            :lastname,				 
            :firstname,
            :adress,
            :zipCode, 
            :city,
            :country,
            :phone,
            :mail,
            :password)";

            $statement = $pdo->prepare($sql);
            $result = $statement->execute([
                ":lastname"		=> htmlspecialchars($_POST["lastname"]),
                ":firstname"	=> htmlspecialchars($_POST["firstname"]),
                ":address"		=> htmlspecialchars($_POST["address"]),
                ":zipCode"		=> htmlspecialchars($_POST["zipCode"]),
                ":city"			=> htmlspecialchars($_POST["city"]),
                ":country"		=> htmlspecialchars($_POST["country"]),
                ":phone"		=> htmlspecialchars($_POST["phone"]),
                ":mail"			=> htmlspecialchars($_POST["mail"]),
                ":password"		=> $password
            ]);
            if ($envoiMail){
                require_once 'test.php';
                $pdo = getDB($dbuser, $dbpassword, $dbhost,$dbname);
                $sql = "SELECT * FROM mail WHERE users = ?";
                $statement1 = $pdo->prepare($sql);
                $statement1->execute([$user["mail"]]);
                $mail = $statement->fetchAll();

                envoiMail('nikkinoaya@gmail.com', [$user["mail"]], 'mailVerify');
            }
        }
    }

    public function login()
    {
        $sql = "SELECT * FROM users WHERE `mail`= ?";
                $pdo = getDB($dbuser, $dbpassword, $dbhost,$dbname);
                $statement = $pdo->prepare($sql);
                $statement->execute(
                    [
                        htmlspecialchars($_POST["mail"])
                    ]
                    );
                    $user = $statement->fetch();
    }         
}