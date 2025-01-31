<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OBSERVER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../header.php'; ?>

<?php include '../nav.php'; ?>

    <div class="container text-center mt-5">
        <h1 class="mb-4">OBSERVER</h1>
        <p class="lead mb-4 text-justify">Permite que un objeto notifique automáticamente a otros cuando cambia.</p>

        <img src="https://www.tentoo.nl/content/uploads/2021/08/Personeel-zoeken-header.png" alt="observer" class="img-fluid w-50 rounded shadow mb-4">

        <div class="row">
            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="text-start">VENTAJAS</h3>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item mb-2">Se pueden añadir nuevos suscriptores sin cambiar el emisor.</li>
                        <li class="list-group-item mb-2">Se pueden establecer relaciones dinámicas entre objetos.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="text-start">DESVENTAJAS</h3>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item mb-2">Los suscriptores reciben notificaciones aleatoriamente, lo que puede generar comportamientos inesperados.</li>
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
                                <li>Separa el notificador del resto del código.</li>
                                <li>Ha de tener al menos un método actualizar().</li>
                                <li>Ha de permitir agregar y eliminar suscriptores describiendo un par de métodos.</li>
                                <li>Usa una clase base para gestionar la suscripción o un objeto separado.</li>
                                <li>Cuando ocurra algo importante, el notificador ha de avisar a sus suscriptores.</li>
                                <li>Los suscriptores han de reaccionar a las notificaciones y recoger información.</li>
                                <li>El cliente ha de crear los suscriptores y registrarlos con los notificadores adecuados.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <h3>EJEMPLO DE OBSERVER EN CÓDIGO</h3>
                <img src="Descargas/observer.jpg" alt="observer" class="img-fluid rounded shadow-lg mt-4 w-75">
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>