<?php

class Factura {
    public string $producte;
    public string $client;
    public float $quantitat;
    public float $preuUnitat;
    
    function __construct($producte, $client, $quantitat, $preuUnitat) {
        $this->producte = $producte;
        $this->client = $client;
        $this->quantitat = $quantitat;
        $this->preuUnitat = $preuUnitat;
    }
    public function calcularPreutotal() {
        return $this->quantitat * $this->preuUnitat;
    }
    public function aplicarDescompte($percentatge) {
        return $this->calcularPreutotal() - ($this->calcularPreutotal() * $descompte / 100);
    }
}