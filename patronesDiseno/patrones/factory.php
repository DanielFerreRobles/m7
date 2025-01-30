<?php?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Factory Method</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h1>FACTORY METHOD</h1>
            <p class="lead text-justify">Permite a las subclases decidir qué tipo de objetos crear, a la vez que usa una interfaz habitual en la superclase.</p>
        </div>
        <div>
            <img src="https://img.freepik.com/fotos-premium/dibujo-fabrica-que-sale-humo_786255-1333.jpg" alt="fab" class="img-fluid d-block mx-auto" width="200">
        </div>






        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm p-3 mb-4">
                    <h4 class="card-header">VENTAJAS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Evitas que el creador dependa directamente de los productos concretos.</li>
                        <li class="list-group-item">Al separar la creación del producto en un lugar, el código es más organizado.</li>
                        <li class="list-group-item">Puedes agregar nuevos tipos de productos sin que afecte el código existente.</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm p-3 mb-4">
                    <h4 class="card-header">DESVENTAJAS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Introducir muchas subclases puede hacer que el código sea más complicado.</li>
                        <li class="list-group-item">Es más útil cuando ya tienes una estructura de clases creadoras.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card shadow-sm p-3 mb-4">
            <h4 class="card-header">¿CÓMO IMPLEMENTARLO?</h4>
            <div class="card-body">
                <ol>
                    <li>Todos los productos han de seguir la misma interfaz con métodos habituales.</li>
                    <li>Añade un método Factory en la clase base, que devuelva objetos del tipo de la interfaz habitual.</li>
                    <li>Substituye los constructores de productos en la clase base con invocaciones al Factory Method, moviendo la creación del producto al método.</li>
                    <li>Añade un parámetro temporal al Factory Method para decidir qué tipo de producto se crea.</li>
                    <li>Si el Factory Method es complejo, con un operador switch largo, lo simplificamos después.</li>
                    <li>Crea subclases para cada tipo de producto y sobrescribe el Factory Method en las subclases, sacando la lógica del constructor de la clase base.</li>
                    <li>Si hay muchos productos, el código cliente puede controlar el tipo de producto a través de un parámetro en la subclase.</li>
                    <li>Si el Factory Method base está vacío después de las extracciones, hazlo abstracto. Si queda código dentro, conviértelo en un comportamiento por defecto.</li>
                </ol>
            </div>
        </div>

        <div class="text-center">
            <h4>EJEMPLO DE FACTORY METHOD EN CÓDIGO</h4>
            <img src="Descargas\codigoFactory.JPG" alt="factory" class="img-fluid rounded shadow-sm mb-4" style="max-width: 80%;">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>