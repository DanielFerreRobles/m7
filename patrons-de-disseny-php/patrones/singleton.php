<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SINGLETON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../header.php'; ?>

<?php include '../nav.php'; ?>

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
            <pre class="code cm-s-default CodeMirror" lang="pseudocode"><span class="cm-doc">// La clase Base de datos define el método `obtenerInstancia`</span>
<span class="cm-doc">// que permite a los clientes acceder a la misma instancia de</span>
<span class="cm-doc">// una conexión de la base de datos a través del programa.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">Database</span> <span class="cm-keyword">is</span>
    <span class="cm-doc">// El campo para almacenar la instancia singleton debe</span>
    <span class="cm-doc">// declararse estático.</span>
    <span class="cm-keyword">private</span> <span class="cm-keyword">static</span> <span class="cm-keyword">field</span> <span class="cm-def3">instance</span><span class="cm-bracket">:</span> <span class="cm-variable">Database</span>

    <span class="cm-doc">// El constructor del singleton siempre debe ser privado</span>
    <span class="cm-doc">// para evitar llamadas de construcción directas con el</span>
    <span class="cm-doc">// operador `new`.</span>
    <span class="cm-keyword">private</span> <span class="cm-keyword">constructor</span> <span class="cm-def3">Database</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-doc">// Algún código de inicialización, como la propia</span>
        <span class="cm-doc">// conexión al servidor de una base de datos.</span>
        <span class="cm-comment">// ...</span>

    <span class="cm-doc">// El método estático que controla el acceso a la instancia</span>
    <span class="cm-doc">// singleton.</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">static</span> <span class="cm-keyword">method</span> <span class="cm-def3">getInstance</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-keyword">if</span> <span class="cm-bracket">(</span><span class="cm-variable">Database</span>.<span class="cm-variable">instance</span> <span class="cm-operator">=</span><span class="cm-operator">=</span> <span class="cm-atom">null</span><span class="cm-bracket">)</span> <span class="cm-keyword">then</span>
            <span class="cm-variable">acquireThreadLock</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">and</span> <span class="cm-keyword">then</span>
                <span class="cm-doc">// Garantiza que la instancia aún no se ha</span>
                <span class="cm-doc">// inicializado por otro hilo mientras ésta ha</span>
                <span class="cm-doc">// estado esperando el desbloqueo.</span>
                <span class="cm-keyword">if</span> <span class="cm-bracket">(</span><span class="cm-variable">Database</span>.<span class="cm-variable">instance</span> <span class="cm-operator">=</span><span class="cm-operator">=</span> <span class="cm-atom">null</span><span class="cm-bracket">)</span> <span class="cm-keyword">then</span>
                    <span class="cm-variable">Database</span>.<span class="cm-variable">instance</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Database</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
        <span class="cm-keyword">return</span> <span class="cm-variable">Database</span>.<span class="cm-variable">instance</span>

    <span class="cm-doc">// Por último, cualquier singleton debe definir cierta</span>
    <span class="cm-doc">// lógica de negocio que pueda ejecutarse en su instancia.</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">method</span> <span class="cm-def3">query</span><span class="cm-bracket">(</span><span class="cm-variable">sql</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-doc">// Por ejemplo, todas las consultas a la base de datos</span>
        <span class="cm-doc">// de una aplicación pasan por este método. Por lo</span>
        <span class="cm-doc">// tanto, aquí puedes colocar lógica de regularización</span>
        <span class="cm-doc">// (throttling) o de envío a la memoria caché.</span>
        <span class="cm-comment">// ...</span>

<span class="cm-keyword">class</span> <span class="cm-def1">Application</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">main</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">Database</span> <span class="cm-variable">foo</span> <span class="cm-operator">=</span> <span class="cm-variable">Database</span>.<span class="cm-variable">getInstance</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
        <span class="cm-variable">foo</span>.<span class="cm-variable">query</span><span class="cm-bracket">(</span><span class="cm-string">"</span><span class="cm-string">S</span><span class="cm-string">E</span><span class="cm-string">L</span><span class="cm-string">E</span><span class="cm-string">C</span><span class="cm-string">T</span><span class="cm-string"> </span><span class="cm-string">.</span><span class="cm-string">.</span><span class="cm-string">.</span><span class="cm-string">"</span><span class="cm-bracket">)</span>
        <span class="cm-comment">// ...</span>
        <span class="cm-variable">Database</span> <span class="cm-variable">bar</span> <span class="cm-operator">=</span> <span class="cm-variable">Database</span>.<span class="cm-variable">getInstance</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
        <span class="cm-variable">bar</span>.<span class="cm-variable">query</span><span class="cm-bracket">(</span><span class="cm-string">"</span><span class="cm-string">S</span><span class="cm-string">E</span><span class="cm-string">L</span><span class="cm-string">E</span><span class="cm-string">C</span><span class="cm-string">T</span><span class="cm-string"> </span><span class="cm-string">.</span><span class="cm-string">.</span><span class="cm-string">.</span><span class="cm-string">"</span><span class="cm-bracket">)</span>
        <span class="cm-doc">// La variable `bar` contendrá el mismo objeto que la</span>
        <span class="cm-doc">// variable `foo`.</span>
</pre>        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>