<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bridge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../header.php'; ?>

    <div class="container mt-5">
        <div class="text-center mb-5">
            <h1>BRIDGE</h1>
            <p class="lead text-justify">Permite dividir una clase grande en 2 estructuras separadas que pueden evolucionar independientemente.</p>
        </div>
        <div>
            <img src="https://th.bing.com/th/id/R.e0b48fd473ef728226048e4bb62e310a?rik=s7yI85VlGPd0Wg&pid=ImgRaw&r=0" alt="bri" class="img-fluid d-block mx-auto" width="200">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm p-3 mb-4">
                    <h4 class="card-header">VENTAJAS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Creación de clases y aplicaciones independientes de plataforma.</li>
                        <li class="list-group-item">El código cliente solo interactúa con abstracciones de alto nivel. No está expuesto a los detalles de la plataforma.</li>
                        <li class="list-group-item">Puedes centrarte en la lógica de alto nivel en la abstracción y en detalles de la plataforma en la implementación.</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm p-3 mb-4">
                    <h4 class="card-header">DESVENTAJAS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Podría ser más complejo el código si se aplica a una clase muy cohesionada.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card shadow-sm p-3 mb-4">
            <h4 class="card-header">¿CÓMO IMPLEMENTARLO?</h4>
            <div class="card-body">
                <ol>
                    <li>Separa conceptos independientes como abstracción/plataforma, dominio/infraestructura, front end/back end, o interfaz/implementación.</li>
                    <li>Identifica las operaciones que necesita el cliente y defínelas en la clase base de abstracción.</li>
                    <li>Establece las operaciones habituales a todas las plataformas y decláralas en la interfaz de implementación.</li>
                    <li>Desarrolla clases para cada plataforma, asegurándote de que todas implementen la interfaz general de implementación.</li>
                    <li>Dentro de la clase de abstracción, añade un campo que haga referencia a la implementación y delega el trabajo a esta.</li>
                    <li>Crea clases derivadas para cada variante de lógica de alto nivel si es necesario.</li>
                    <li>El cliente pasa un objeto de implementación al constructor de la abstracción para asociarlos. Luego, trabaja solo con la abstracción.</li>
                </ol>
            </div>
        </div>

        <div class="text-center">
            <h4>EJEMPLO DE BRIDGE EN CÓDIGO</h4>
            <img src="Descargas/bridge.jpg" alt="bridge" class="img-fluid rounded shadow-sm mb-4" style="max-width: 80%;">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>