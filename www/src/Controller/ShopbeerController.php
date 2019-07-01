<?php
namespace App\Controller;

use \Core\Controller\Controller;


class ShopbeerController extends Controller
{
    public function __construct()
    {
        $this->loadModel('beer');
        $this->loadModel('users');
    }

    public function profil()
    {
        $beers = $this->beer->all();
        return  $this->render('shopbeer/profil',[
            "lastname" => $lastname,
            "firstname" => $firstname,
            "adress" => $adress,
            "zipCode" => $zipCode,
            "city" => $city,
            "country" => $country,
            "phone" => $phone,
            "mail" => $mail
            ]);
    }

    public function contact()
    {
        return  $this->render('shopbeer/contact',[

            ]);
    }

    public function commande()
    {
        return $this->render('shopbeer/commande',[

        ]);
    }

    public function boutique()
    {
        $beers = $this->beer->all();

        return $this->render('shopbeer/boutique', [
            'title'     => $title,
            'img'       => $img,
            'content'   => $content,
            'price'     => $price,
            'beers'     => $beers  
        ]);
    }

    public function index()
    {
        $beers = $this->beer->all();

        return $this->render('post/beer', [
           
            'beers'     => $beers  
        ]);
    }

    public function deconnect()
    {
        return $this->render('post/beer',[

            ]);
    }
}