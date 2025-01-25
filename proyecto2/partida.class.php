<?php
include 'jugador.class.php';
session_start();

class Partida {
    public $numero_jugadores;
    public $numero_cartas;
    public $turno;
    public $baraja;
    public $carta_en_mesa;
    public $array_jugadores;
    public $constante_sentido;

    public function __construct($numero_jugadores, $numero_cartas) {
        if (isset($_SESSION['partida'])) {
            $this->numero_jugadores ='numeroDeJugadors';
            $this->numero_cartas = 'numeroDeCartes';
            $this->turno = 'turno';
            $this->array_jugadores ='arrayJugadores';
            $this->carta_en_mesa = 'cartaEnMesa';
            $this->baraja = 'baraja';
        } else {
            $this->numero_jugadores = $numero_jugadores;
            $this->numero_cartas = $numero_cartas;
            $this->turno = 0;
            $this->array_jugadores = [];
            $this->constante_sentido = 1;
            $this->baraja = new Baraja();

            for ($jugador = 0; $jugador < $this->numero_jugadores; $jugador++) {
                $jugador = new Jugador();
                $this->array_jugadores[$jugador] = array_splice($this->baraja->conjunto_cartas, 0, $this->numero_cartas);
            }

            $this->carta_en_mesa = array_shift($this->baraja->conjunto_cartas);
            echo "<p>Carta sobre la mesa:</p>";
            $this->carta_en_mesa->pinta_carta();

            $this->guardarPartida();
        }
    }

    public function guardarPartida() {
        $_SESSION['partida'] = [
            'numeroDeJugadors' => $this->numero_jugadores,
            'numeroDeCartes' => $this->numero_cartas,
            'turno' => $this->turno,
            'arrayJugadores' => $this->array_jugadores,
            'cartaEnMesa' => $this->carta_en_mesa,
            'baraja' => $this->baraja,
        ];
    }

    public function jugar() {
        $jugadorActual = $this->array_jugadores[$this->turno];

        foreach ($jugadorActual->mano as $carta) {
            if ($_GET['numeroTipocarta'] == $carta->numeroTipoCarta || $_GET['color'] == $carta->colorDeCarta) {
                $this->carta_en_mesa = $carta;
                $jugadorActual->eliminar_carta($carta);
                $this->carta_en_mesa->pinta_carta();
                $this->cambiarTurno();
            } else {
                $nuevaCartaRobada = array_shift($this->baraja->conjunto_cartas);
                $jugadorActual->afegir_carta($nuevaCartaRobada);
            }
            if ($carta->numeroTipoCarta == 'reverse') {
                $this->cambiarSentido();
            }
        }

        if (count($jugadorActual->mano) == 0) {
            echo "El jugador " . $jugadorActual . " ha ganado";
        }

        $this->guardarPartida();
    }

    public function cambiarTurno() {
        for ($this->turno; $this->turno < $this->numeroDeJugadores; $this->turno++) {
            if ($this->turno >= $this->numeroDeJugadores) {
                $this->turno = 0;
            }
        }
    
    }

    public function cambiarSentido() {
        $this->constante_sentido = -1;
    }

}
?>