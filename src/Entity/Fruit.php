<?php


namespace App\Entity;


class Fruit
{
    public $Nom;
    public $Couleur;

    public function __construct($nom, $couleur)
    {
        $this->Nom = $nom;
        $this->Couleur = $couleur;
    }
}