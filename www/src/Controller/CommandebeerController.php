<?php
namespace App\Controller;

use Core\Controller\Controller;

class CommandebeerController extends Controller
{
    private $order;
    private $user;
    private $id;
    private $beers;
    private $lines;
    private $priceTTC;
    private $result;
    private $qty = [];

    public function __construct()
    {
        $this->loadModel('beer');
    }

    public function commande()
    {
        
        if(!empty($_POST))
        {
            //Créer tableau vide
            //Boucler sur $_POST['qty']
            //Récupérer clef si valeur > 0 et stocker dans tableau vide
            
            //implode le tableau vide avec une ","

            //appeler allinid de beerTable et lui envoyer le tableau

            //le tour est joué !!!
            for ($i=0; $i < count($_POST['qty']); $i++) { 
                if($_POST['qty'][$i] > 0){
                    $qtys[] = $i;

                }

            }
            $qtys = implode(",", $qtys);

            $beers = $this->beer->allInId($qtys);

            $prix = 0;

            foreach ($beers as $value) {
                $prix += $value->getPrice()*1.2;
                echo $value->getPriceTTC();
            }
            
            return $this->render('shopbeer/recap', [
                'beers' => $beers,
                'prix'  => $prix,
                'title' => $title
            ]);
    
        }
        
        
               
        $beers = $this->beer->all();
        
        return $this->render('shopbeer/commande', [
                'beers' => $beers
            ]);
    
        }
}