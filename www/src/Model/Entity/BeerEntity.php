<?php

namespace App\Model\Entity;

use Core\Model\Entity;

class BeerEntity extends Entity
{
    private $title;
    private $img;
    private $content;
    private $price;
    private $priceTTC;

    public function getTitle()
    {
        return $this->title;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getPriceHT()
    {
        $price = $this->price;
        $price = number_format($price, 2, ',', '.');
        return $price;
    }

    public function getPriceTTC()
    {
        $priceTTC = $this->price*1.2;
        $priceTTC = number_format($priceTTC, 2, ',', '.');
        return $priceTTC;
    }

    public function getPrice()
    {
        return $this->price;
    }


}