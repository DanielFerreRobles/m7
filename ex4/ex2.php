<?php

class Persona{
    public string $nom;
    public int $edat;

    public function __construct($nom, $edat){
        $this->nom = $nom;
        $this->edat = $edat;
    }
}

$persona = new Persona("Anna", "25");
echo $persona->edat; 

