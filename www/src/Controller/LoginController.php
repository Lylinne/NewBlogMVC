<?php
namespace App\Controller;

use \Core\Controller\Controller;
use App\Controller\ UsersController;

class LoginController extends Controller
{
    private $mail;
    private $password;
    private $user; 
    private $verify;

    public function __construct()
    {
        $this->loadModel('shopbeer');
    }

    public function userConnect($mail, $password, $verify=false)
    {  
        $user = $this->users->userConnect($mail, $password, $verify=false);
                   
        if(	$user && 
            password_verify(
            htmlspecialchars($password), $user['password']
        )){
            
            if($verify){
                    return true;
                    //exit();
                }
    
                if (session_status() != PHP_SESSION_ACTIVE){
                    session_start();
                }
                unset($user['password']);
                $_SESSION['auth'] = $users;
                //connecté
                    
                exit();
    
        }else{
    
            if($verify){
                return false;
                //exit();
            }
            if (session_status() != PHP_SESSION_ACTIVE){
                    session_start();
                }
            $_SESSION['auth'] = false;
            header('location: /Home');
            //TODO : err pas connecté
        }

        return $this->render('shopbeer/login', [

        ]);
    }

    public function connection()
    {
        $this->render('shopbeer/login', [
           
        
        ]);
    }

}
