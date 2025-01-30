<?php

if (isset($_POST['patron'])) {
    if (($_POST['patron']=='singleton')){
        header("Location: singleton.php");             
    }
    else{
        header("Location: factory.php");             
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones de Comportamiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 text-center">
        <h1>Patrones de Comportamiento</h1>
        <p class="lead">Los patrones de diseño de comportamiento ayudan a los objetos a trabajar mejor entre ellos, reutilizar el código y permiten construir aplicaciones más flexibles y fáciles de actualizar. Aquí te muestro 2 de patrones de comportamiento:</p>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <p><strong>OBSERVER</strong></p>
                <img src="https://www.tentoo.nl/content/uploads/2021/08/Personeel-zoeken-header.png" class="img-fluid rounded mb-3" style="width: 300px; height: 150px; object-fit: cover;" alt="observadir">
            </div>
            <div class="col-md-4">
                <p><strong>STRATEGY</strong></p>
                <img src=https://www.entrenamiento.com/wp-content/uploads/2015/11/estrategias.jpg" class="img-fluid rounded mb-3" style="width: 300px; height: 150px; object-fit: cover;" alt="estrategia">
            </div>
        </div>
        <form method="post" class="mt-4">
            <select name="patron" class="form-select w-50 mx-auto">
                <option value="singleton">Observer</option>
                <option value="factory">Strategy</option>
            </select>
            <button type="submit" class="btn btn-primary mt-3">Ver información</button>
        </form>
    </div>
</body>
</html>