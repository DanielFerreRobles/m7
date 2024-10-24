<?php

$nombre = $_POST['nombre'];
$primerApellido = $_POST[apellido1];
$segundoApellido = $_POST[apellido2];

echo '

<h2>"HOLA ' . $nombre . ' ' . $primerApellido . ' ' . $segundoApellido . '!!!"</h2>';

'

include "array.php";
'
$casas = array_keys($casas_info);

$casa_seleccionada = $casas[array_rand($casas)];

$casas_info[$casa_seleccionada]['clau'];

?>