<?php
include 'carta.class.php';

class Jugador {
    public $mano = [];
    public $id;

    public function afegir_carta($carta) {
        $this->mano[] = $carta;
    }

    public function eliminar_carta($carta) {
        array_shift($carta);
    }

    public function mostrar_ma() {
        foreach ($this->mano as $carta) {
            $carta->pinta_carta();
        }
    }
}
?>