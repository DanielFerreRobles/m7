<?php
include 'carta.class.php';

class Baraja {
    public $conjunto_cartas = [];

    public function crea_baraja() {
        $identificadorDeCarta = 0;
        foreach (['red', 'yellow', 'blue', 'green'] as $colorDeCarta) {
            for ($numeroDeLaCarta = 0; $numeroDeLaCarta <= 9; $numeroDeLaCarta++) {

                $this->conjunto_cartas[] = new Carta($colorDeCarta, $numeroDeLaCarta, $identificadorDeCarta++);
            }
            $this->conjunto_cartas[] = new Carta($colorDeCarta, 'reverse', $numeroDeLaCarta);
            $this->conjunto_cartas[] = new Carta($colorDeCarta, 'skip',$numeroDeLaCarta);
            $this->conjunto_cartas[] = new Carta($colorDeCarta, 'picker',$numeroDeLaCarta);
        }
    }

    public function mezcla_baraja() {
        shuffle($this->conjunto_cartas);
    }

    public function pinta_baraja() {
        foreach ($this->conjunto_cartas as $carta) {
           $carta->pinta_carta();
        }
    }

    public function pinta_baraja_girada() {
        foreach ($this->conjunto_cartas as $carta) {
           $carta->pinta_carta_girada();
        }
    }
}

?>