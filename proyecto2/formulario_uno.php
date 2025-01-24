<?php

    echo '
<form method="POST" action="index.php">
    <label for="numJugadors">Numero de jugadors:</label>
    <input type="number" id="numJugadors" name="numJugadors" min="2" max="5" required><br><br>
    
    <label for="numCartes">Numero de cartes per jugador:</label>
    <input type="number" id="numCartes" name="numCartes" value="7"><br><br>
    
    <input type="submit" value="Iniciar partida">
</form>
';

?>