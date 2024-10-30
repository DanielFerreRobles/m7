<?php

$nombre = $_POST['nombre'];
$primerApellido = $_POST['apellido1'];
$segundoApellido = $_POST['apellido2'];

echo ' <h2>HOLA ' . $nombre . ' ' . $primerApellido . ' ' . $segundoApellido . '!!!</h2>';

include "array.php";

$casas = array_keys($casas_info);

$casa_seleccionada = $casas[array_rand($casas)];


echo "
<div style='text-align: center;'>
    <div style='background-color: " . $casas_info[$casa_seleccionada]['message_background'] . "; color: " . $casas_info[$casa_seleccionada]['text_color'] . ";'>
        <h3>Bienvenido a tu nueva casa en Hogwarts</h3>
        <p style='color: " . $casas_info[$casa_seleccionada]['text_color'] . ";'>" . $casas_info[$casa_seleccionada]['welcome_message'] . "</p>
        <img src='" . $casas_info[$casa_seleccionada]['image'] . "' alt='imagen'>
    </div>
</div>";