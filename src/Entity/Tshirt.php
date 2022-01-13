<?php


namespace App\Entity;


class Tshirt
{
    public $Id;
    public $Prix;
    public $Nom;
    public $Couleur;

    public function __construct($id, $nom, $prix, $couleur)
    {
        $this->Id = $id;
        $this->Nom = $nom;
        $this->Couleur = $couleur;
        $this->Prix = $prix;
    }
}