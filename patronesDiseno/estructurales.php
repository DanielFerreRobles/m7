<?php

if (isset($_POST['patron'])) {
    if (($_POST['patron']=='adapter')){
        header("Location: patrones/adapter.php");             
    }
    else{
        header("Location: patrones/bridge.php");             
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones Estructurales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 text-center">
        <h1>Patrones Estructurales</h1>
        <p class="lead">Los patrones de diseño estructurales son formas de organizar objetos y clases en estructuras grandes manteniendo la flexibilidad y eficiencia. Aquí te muestro 2 de patrones estructurales:</p>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <p><strong>ADAPTER</strong></p>
                <img src="https://th.bing.com/th/id/R.db2d1e39637bc07ab9f265309a3a5046?rik=7JElFeMtC0dCkA&pid=ImgRaw&r=0" class="img-fluid rounded mb-3" style="width: 300px; height: 150px; object-fit: cover;" alt="Adapter">
            </div>
            <div class="col-md-4">
                <p><strong>BRIDGE</strong></p>
                <img src="https://th.bing.com/th/id/R.e0b48fd473ef728226048e4bb62e310a?rik=s7yI85VlGPd0Wg&pid=ImgRaw&r=0" class="img-fluid rounded mb-3" style="width: 300px; height: 150px; object-fit: cover;" alt="Bridge">
            </div>
        </div>
        <form method="post" class="mt-4">
            <select name="patron" class="form-select w-50 mx-auto">
                <option value="adapter">Adapter</option>
                <option value="bridge">Bridge</option>
            </select>
            <button type="submit" class="btn btn-primary mt-3">Ver información</button>
        </form>
    </div>
</body>
</html>