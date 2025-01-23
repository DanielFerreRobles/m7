<?php

class Carta {
    public $color;
    public $numeroTipoCarta;
    public $identificadorCarta;

    public function __construct($color, $numeroTipoCarta, $identificadorCarta) {
        $this->color = $color;
        $this->numeroTipoCarta = $numeroTipoCarta;
        $this->identificadorCarta = $identificadorCarta;
    }

    public function pinta_carta() {
        echo "<img src='cartas_uno/".$this->numeroTipoCarta ."_".$this->color.".png' alt='carta' />";
    }
    

    public function pinta_carta_link() {
        echo "<a href='index.php?id=" . $this->identificadorCarta . "&numeroTipocarta=" . $this->numeroTipoCarta . "&color=" . $this->color . "'>
                <img src='cartas_uno/" . $this->numeroTipoCarta . "_" . $this->color . ".png' alt='link' />
              </a>";
    }    

    public function pinta_carta_girada() {
        echo "<img src='cartas_uno/carta_girada.png' alt='Carta girada' />";
    }    
}

?>