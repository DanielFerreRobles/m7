<!-- CAPTURO VALORES DEL FORMULARIO -->
<?php
$nombre = $_POST['nombre'];
$telefono = $_POST["telefono"];
$foto = $_POST["foto"];
?>

<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Mercadona productos </title>
 <link
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
 <body>

<?php 

require "includes/header.php" ?>

<?php include "includes/funciones.php"?>


<div class="container d-flex">

<?php 

muestraInfoContacto($nombre, $telefono, $foto)

?>

<div>
<h2 class="m-5">Productos disponibles </h2>

<?php 

include 'data/productos.php';

generarTablaProductos($productos)?>

</div>




 <!-- - Modal que al clicar aparece info de contacto--> 

 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-
keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-
hidden="true">

 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="staticBackdropLabel">Información de
contacto </h5>

 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-
label="Close"> </button>

</div>
<div class="modal-body">


</div>
</div>
</div>
 </div>

    
</div>
    <?php include_once "includes/footer.php"?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>