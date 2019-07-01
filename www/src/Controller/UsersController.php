<?php
namespace App\Controller;

use \Core\Controller\Controller;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->loadModel('users');
    }

    public function login()
    {
        if(!empty($_POST))
        {
            $user = $this->users->ismailexist($_POST["mail"]);
            if($user)
            {
                if(password_verify($_POST["password"], $user->getPassword()))
                {
                    $_SESSION['user'] = $user;
                    //dd($_SESSION['user']);

                    $user->setPassword($password);
                    

                }
                if (session_status() != PHP_SESSION_ACTIVE){
                    session_start();
                }
                // est pas defini et false
                if(empty($_SESSION["auth"])){
                    if($verify){
                        return false;
                    //exit();
                    }
                    header('location: /Home');
                    exit();
                }
                return $_SESSION["auth"];
            }
            
        }

        
        return $this->render('shopbeer/login', [
        
        ]);
    }

    public function deconnect()
    {
        
        unset($_SESSION['user']);
        header('location: /Home');
        exit;
    }



    public function register()
    {
        if($_POST['register'] == 'register')
        {
            
            //$_POST récupère les name du formulaire
            $lastname   = $_POST["lastname"];
            $firstname  = $_POST["firstname"];
            $adress     = $_POST["adress"];
            $zipCode    = $_POST["zipCode"];
            $city       = $_POST["city"];
            $country    = $_POST["country"];
            $phone      = $_POST["phone"];
            $mail       = $_POST["mail"];
            $password   = $_POST["password"];
            $verifpassword   = $_POST["Verifpassword"];

            if(
                ( 	filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)
                ) &&
                ( $_POST["password"] == $_POST["Verifpassword"])
            ){
                
                //vérifie si les variables ne sont pas vide
                if(!empty($lastname && $firstname && $adress && $zipCode && $city && $country && $phone && $mail && $password && $verifpassword))
                {   
                    
                    //retourne les emails de la db avec la fonction ismailexist de usersController
                    $user = $this->users->ismailexist($mail);

                    if(!$user)
                    {
                        $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_BCRYPT);

                        $arrayUsers = [
                            ":lastname"		=> htmlspecialchars($lastname),
                            ":firstname"	=> htmlspecialchars($firstname),
                            ":adress"		=> htmlspecialchars($adress),
                            ":zipCode"		=> htmlspecialchars($zipCode),
                            ":city"			=> htmlspecialchars($city),
                            ":country"		=> htmlspecialchars($country),
                            ":phone"		=> htmlspecialchars($phone),
                            ":mail"			=> htmlspecialchars($mail),
                            ":password"		=> $password
                        ];

                        $result = $this->users->connect($arrayUsers);

                    }
                }
            }
            /**
            * verifie que l'utilisateur est connecté
            * @return array|void
            */
            if (session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
            // est pas defini et false
            if(empty($_SESSION["auth"])){
                if($verify){
                    return false;
                //exit();
                }
                header('location: /profil');
                exit();
            }
            return $_SESSION["auth"];
        }

        return $this->render('shopbeer/login', [

            ]);
    
    }
}