<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SINGLETON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="mb-4">SINGLETON</h1>
        <p class="lead mb-4 text-justify">Con Singleton nos aseguramos de que una clase tenga una única instancia a la que podemos acceder de forma global.</p>
        
        <img src="https://refactoring.guru/images/patterns/cards/singleton-mini.png" alt="singleton" class="img-fluid rounded shadow mb-4">

        <div class="row">
            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="text-start">VENTAJAS</h3>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item mb-2">100% seguro de que una clase tiene solamente una instancia.</li>
                        <li class="list-group-item mb-2">Acceso global a la instancia.</li>
                        <li class="list-group-item mb-2">El objeto Singleton solo se inicializa cuando se necesita por primera vez.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="text-start">DESVENTAJAS</h3>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item mb-2">Vulnera el Principio de responsabilidad única porque soluciona 2 problemas a la vez.</li>
                        <li class="list-group-item mb-2">Puede ocultar un mal diseño, por ejemplo, cuando los componentes del programa conocen demasiado sobre los otros.</li>
                        <li class="list-group-item mb-2">Necesita un trato especial en entornos con muchos hilos para evitar que se cree el objeto Singleton varias veces.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container mt-5">
        <div class="text-center mb-4">
            <h1>¿Cómo se implementa? </h1>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <ol class="text-start">
                            <li>Añade un campo privado estático a la clase para guardar la instancia Singleton.</li>
                            <li>Crea un método estático público para obtener la instancia Singleton.</li>
                            <li>Usa inicialización diferida en el método estático. Crea el objeto solo la primera vez que se llame al método y guárdalo en el campo estático. En las siguientes llamadas, devuelve siempre esa misma instancia.</li>
                            <li>Haz el constructor privado. El método estático podrá llamar al constructor, pero no los demás objetos.</li>
                            <li>En el código cliente, cambia las llamadas directas al constructor del Singleton por llamadas al método estático para obtener la instancia.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <h3>EJEMPLO DE SINGLETON EN CÓDIGO</h3>
            <img src="https://resources.theframework.es/eduardoaf.com/20200916/patron-singleton-en-php.jpg" alt="bds" class="img-fluid rounded shadow-lg mt-4 w-75">
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>