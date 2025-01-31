<?php

if (isset($_POST['patron'])) {
    if (($_POST['patron']=='singleton')){
        header("Location: patrones/singleton.php");             
    }
    else{
        header("Location: patrones/factory.php");             
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones de Creación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include 'header.php'; ?>

<?php include 'nav.php'; ?>

    <div class="container mt-5 text-center">
        <h1>Patrones de Creación</h1>
        <p class="lead">Los patrones de diseño de creación son soluciones para la creación de objetos. Estos patrones ayudan a incrementar la flexibilidad y la reutilización del código con sus mecanismos de creación de objetos. Aquí te muestro 2 de patrones de creación:</p>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <p><strong>SINGLETON</strong></p>
                <img src="https://refactoring.guru/images/patterns/cards/singleton-mini.png" class="img-fluid rounded mb-3" style="width: 300px; height: 150px; object-fit: cover;" alt="sing">
            </div>
            <div class="col-md-4">
                <p><strong>FACTORY METHOD</strong></p>
                <img src="https://img.freepik.com/fotos-premium/dibujo-fabrica-que-sale-humo_786255-1333.jpg" class="img-fluid rounded mb-3" style="width: 300px; height: 150px; object-fit: cover;" alt="fabrica">
            </div>
        </div>
        <form method="post" class="mt-4">
            <select name="patron" class="form-select w-50 mx-auto">
                <option value="singleton">Singleton</option>
                <option value="factory">Factory Method</option>
            </select>
            <button type="submit" class="btn btn-primary mt-3">Ver información</button>
        </form>
    </div>
</body>
</html>