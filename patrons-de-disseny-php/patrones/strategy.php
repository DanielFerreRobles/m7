<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STRATEGY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../header.php'; ?>

    <div class="container text-center mt-5">
        <h1 class="mb-4">STRATEGY</h1>
        <p class="lead mb-4 text-justify">Permite definir distintos algoritmos, separarlos en clases individuales y hacer sus objetos intercambiables.</p>

        <img src="https://www.entrenamiento.com/wp-content/uploads/2015/11/estrategias.jpg" alt="strategy" class="img-fluid w-25 rounded shadow mb-4">

        <div class="row">
            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="text-start">VENTAJAS</h3>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item mb-2">Permite cambiar algoritmos en tiempo de ejecución.</li>
                        <li class="list-group-item mb-2">Permite aislar la implementación del algoritmo del código que lo usa.</li>
                        <li class="list-group-item mb-2">Sustituye la herencia con composición.</li>
                        <li class="list-group-item mb-2">Permite la introducción de estrategias nuevas sin modificar el código existente.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="text-start">DESVENTAJAS</h3>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item mb-2">Si hay 2 algoritmos que cambian muy poco, no hay una razón para complicar el programa.</li>
                        <li class="list-group-item mb-2">El cliente ha de conocer las estrategias para elegir la adecuada.</li>
                        <li class="list-group-item mb-2">En lenguajes modernos, funciones anónimas pueden sustituir este patrón sin añadir clases extra.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="text-center mb-4">
                <h1>¿Cómo se implementa?</h1>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <ol class="text-start">
                                <li>Identifica el algoritmo en la clase contexto que cambia habitualmente o un condicional extenso que seleccione variantes en tiempo de ejecución.</li>
                                <li>Crea una interfaz estrategia habitual para todas las variantes del algoritmo.</li>
                                <li>Extrae cada algoritmo en su propia clase, implementando la interfaz estrategia.</li>
                                <li>Añade un campo en la clase contexto para guardar una estrategia y un método set para cambiarla dinámicamente.</li>
                                <li>La clase contexto solo interactúa con la estrategia a través de la interfaz común, sin depender de implementaciones específicas.</li>
                                <li>Los clientes de la clase contexto han de asociarla con una estrategia adecuada.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <h3>EJEMPLO DE STRATEGY EN CÓDIGO</h3>
                <img src="Descargas/strategy.jpg" alt="strategy" class="img-fluid rounded shadow-lg mt-4 w-75">
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>