<?php

namespace App\Controller;

use \Core\Controller\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->loadModel('user');
    }
    public function all()
    {
        $sentence = 'Hello world !';

        $users = $this->user->all();

        return $this->render('user/index', [
            'sentence'  => $sentence,
            'users'     => $users     
        ]);
    }
}