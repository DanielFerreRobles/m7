<?php
include 'baraja.class.php';

if (isset($_POST)) {
    $numeroDeJugadors = $_POST['numJugadors'];
    $numeroDeCartes = $_POST['numCartes'];
}

$baraja = new Baraja();

$cartaDelJugador = new Carta($color, $numeroTipoCarta, $idCarta);

$cartaInicial = new Carta($color, $numeroTipoCarta, $idCarta);

$baraja->crea_baraja();

$baraja->mezcla_baraja();

$baraja->pinta_baraja();

for ($jugador = 1; $jugador <= $numeroDeJugadors; $jugador++) {
    $jugadores[$jugador] = array_splice($baraja->conjunto_cartas, 0, $numeroDeCartes);
}

$cartaInicial = array_shift($baraja->conjunto_cartas);

    $_SESSION['baraja'] = $baraja->conjunto_cartas;
    $_SESSION['jugadores'] = $jugadores;
    $_SESSION['cartaInicial'] = $cartaInicial;
    $_SESSION['numeroDeJugadors'] = $numeroDeJugadors;
    $_SESSION['numeroDeCartes'] = $numeroDeCartes;

echo '<h1>Carta En Mesa</h1>';
$cartaInicial->pinta_carta();

    foreach ($jugadores as $jugador => $cartasDelJugador) {
        echo "<h3>Jugador " . ($jugador) . ":</h3>";
        
        foreach ($cartasDelJugador as $cartaDelJugador) {
            $cartaDelJugador->pinta_carta_link();
        }
    }    
?>