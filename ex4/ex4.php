<?php

class Animal{
    public $nom;

    function __construct($nom){
        $this->nom = $nom;
    }

    function getNom(){
    return $this->nom;
    }
}

$animal = new Animal("gat");
echo $animal->getNom();

$animalLLL = new Animal("GOS");
echo $animalLLLL->getNom();