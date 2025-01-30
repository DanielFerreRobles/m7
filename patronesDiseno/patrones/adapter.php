

<?php?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADAPTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h1>ADAPTER</h1>
            <p class="lead text-justify">Permite que objetos con interfaces incompatibles trabajen juntos.</p>
        </div>
        <div>
            <img src="https://th.bing.com/th/id/R.db2d1e39637bc07ab9f265309a3a5046?rik=7JElFeMtC0dCkA&pid=ImgRaw&r=0" alt="adapter" class="img-fluid d-block mx-auto" width="200">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 mb-4">
                    <h3 class="text-start">VENTAJAS</h3>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item">Separa la conversión de datos de la lógica principal.</li>
                        <li class="list-group-item">Puedes agregar nuevos adaptadores sin modificar el código existente.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 mb-4">
                    <h3 class="text-start">DESVENTAJAS</h3>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item">Se añaden más interfaces y clases, es posible que el código más complejo de manejar.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card shadow-sm p-3 mb-4">
            <h4 class="card-header">¿CÓMO IMPLEMENTARLO?</h4>
            <div class="card-body">
                <ol class="text-start">
                    <li>Has de disponer de una clase de servicio y una o varias clases cliente que necesitan esa clase de servicio.</li>
                    <li>Define cómo las clases cliente se comunicarán con el servicio.</li>
                    <li>Haz que la clase adaptadora siga la interfaz del cliente, dejando los métodos vacíos.</li>
                    <li>La clase adaptadora guardará el objeto de servicio, a través de su constructor.</li>
                    <li>La clase adaptadora implementa los métodos, delegando el trabajo real al servicio y gestionando la conversión de datos.</li>
                    <li>Las clases cliente deben interactuar con la clase adaptadora a través de la interfaz del cliente, permitiendo cambios o extensiones sin afectar al código cliente.</li>
                </ol>
            </div>
        </div>

        <div class="text-center">
            <h3>EJEMPLO DE ADAPTER EN CÓDIGO</h3>
            <img src="Descargas" class="img-fluid rounded shadow-lg mt-4" alt="adapter" style="max-width: 80%;">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>