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
                <pre class="code cm-s-default CodeMirror" lang="pseudocode"><span class="cm-doc">// La clase notificadora base incluye código de gestión de</span>
<span class="cm-doc">// suscripciones y métodos de notificación.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">EventManager</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">private</span> <span class="cm-keyword">field</span> <span class="cm-def3">listeners</span><span class="cm-bracket">:</span> <span class="cm-variable">hash</span> <span class="cm-variable">map</span> <span class="cm-variable">of</span> <span class="cm-variable">event</span> <span class="cm-variable">types</span> <span class="cm-keyword">and</span> <span class="cm-variable">listeners</span>

    <span class="cm-keyword">method</span> <span class="cm-def3">subscribe</span><span class="cm-bracket">(</span><span class="cm-variable">eventType</span>, <span class="cm-variable">listener</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">listeners</span>.<span class="cm-variable">add</span><span class="cm-bracket">(</span><span class="cm-variable">eventType</span>, <span class="cm-variable">listener</span><span class="cm-bracket">)</span>

    <span class="cm-keyword">method</span> <span class="cm-def3">unsubscribe</span><span class="cm-bracket">(</span><span class="cm-variable">eventType</span>, <span class="cm-variable">listener</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">listeners</span>.<span class="cm-variable">remove</span><span class="cm-bracket">(</span><span class="cm-variable">eventType</span>, <span class="cm-variable">listener</span><span class="cm-bracket">)</span>

    <span class="cm-keyword">method</span> <span class="cm-def3">notify</span><span class="cm-bracket">(</span><span class="cm-variable">eventType</span>, <span class="cm-variable">data</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-keyword">foreach</span> <span class="cm-bracket">(</span><span class="cm-variable">listener</span> <span class="cm-variable">in</span> <span class="cm-variable">listeners</span>.<span class="cm-variable">of</span><span class="cm-bracket">(</span><span class="cm-variable">eventType</span><span class="cm-bracket">)</span><span class="cm-bracket">)</span> <span class="cm-variable">do</span>
            <span class="cm-variable">listener</span>.<span class="cm-variable">update</span><span class="cm-bracket">(</span><span class="cm-variable">data</span><span class="cm-bracket">)</span>

<span class="cm-doc">// El notificador concreto contiene lógica de negocio real, de</span>
<span class="cm-doc">// interés para algunos suscriptores. Podemos derivar esta clase</span>
<span class="cm-doc">// de la notificadora base, pero esto no siempre es posible en</span>
<span class="cm-doc">// el mundo real porque puede que la notificadora concreta sea</span>
<span class="cm-doc">// ya una subclase. En este caso, puedes modificar la lógica de</span>
<span class="cm-doc">// la suscripción con composición, como hicimos aquí.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">Editor</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">field</span> <span class="cm-def3">events</span><span class="cm-bracket">:</span> <span class="cm-variable">EventManager</span>
    <span class="cm-keyword">private</span> <span class="cm-keyword">field</span> <span class="cm-def3">file</span><span class="cm-bracket">:</span> <span class="cm-variable">File</span>

    <span class="cm-keyword">constructor</span> <span class="cm-def3">Editor</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">events</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">EventManager</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>

    <span class="cm-doc">// Los métodos de la lógica de negocio pueden notificar los</span>
    <span class="cm-doc">// cambios a los suscriptores.</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">openFile</span><span class="cm-bracket">(</span><span class="cm-variable">path</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-atom">this</span>.<span class="cm-variable">file</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">File</span><span class="cm-bracket">(</span><span class="cm-variable">path</span><span class="cm-bracket">)</span>
        <span class="cm-variable">events</span>.<span class="cm-variable">notify</span><span class="cm-bracket">(</span><span class="cm-string">"</span><span class="cm-string">o</span><span class="cm-string">p</span><span class="cm-string">e</span><span class="cm-string">n</span><span class="cm-string">"</span>, <span class="cm-variable">file</span>.<span class="cm-variable">name</span><span class="cm-bracket">)</span>

    <span class="cm-keyword">method</span> <span class="cm-def3">saveFile</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">file</span>.<span class="cm-variable">write</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
        <span class="cm-variable">events</span>.<span class="cm-variable">notify</span><span class="cm-bracket">(</span><span class="cm-string">"</span><span class="cm-string">s</span><span class="cm-string">a</span><span class="cm-string">v</span><span class="cm-string">e</span><span class="cm-string">"</span>, <span class="cm-variable">file</span>.<span class="cm-variable">name</span><span class="cm-bracket">)</span>

    <span class="cm-comment">// ...</span>


<span class="cm-doc">// Aquí está la interfaz suscriptora. Si tu lenguaje de</span>
<span class="cm-doc">// programación soporta tipos funcionales, puedes sustituir toda</span>
<span class="cm-doc">// la jerarquía suscriptora por un grupo de funciones.</span>


<span class="cm-keyword">interface</span> <span class="cm-def1">EventListener</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">update</span><span class="cm-bracket">(</span><span class="cm-variable">filename</span><span class="cm-bracket">)</span>

<span class="cm-doc">// Los suscriptores concretos reaccionan a las actualizaciones</span>
<span class="cm-doc">// emitidas por el notificador al que están unidos.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">LoggingListener</span> <span class="cm-keyword">implements</span> <span class="cm-def2">EventListener</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">private</span> <span class="cm-keyword">field</span> <span class="cm-def3">log</span><span class="cm-bracket">:</span> <span class="cm-variable">File</span>
    <span class="cm-keyword">private</span> <span class="cm-keyword">field</span> <span class="cm-def3">message</span><span class="cm-bracket">:</span> <span class="cm-variable">string</span>

    <span class="cm-keyword">constructor</span> <span class="cm-def3">LoggingListener</span><span class="cm-bracket">(</span><span class="cm-variable">log_filename</span>, <span class="cm-variable">message</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-atom">this</span>.<span class="cm-variable">log</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">File</span><span class="cm-bracket">(</span><span class="cm-variable">log_filename</span><span class="cm-bracket">)</span>
        <span class="cm-atom">this</span>.<span class="cm-variable">message</span> <span class="cm-operator">=</span> <span class="cm-variable">message</span>

    <span class="cm-keyword">method</span> <span class="cm-def3">update</span><span class="cm-bracket">(</span><span class="cm-variable">filename</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">log</span>.<span class="cm-variable">write</span><span class="cm-bracket">(</span><span class="cm-variable">replace</span><span class="cm-bracket">(</span><span class="cm-string">'</span><span class="cm-string">%</span><span class="cm-string">s</span><span class="cm-string">'</span>,<span class="cm-variable">filename</span>,<span class="cm-variable">message</span><span class="cm-bracket">)</span><span class="cm-bracket">)</span>

<span class="cm-keyword">class</span> <span class="cm-def1">EmailAlertsListener</span> <span class="cm-keyword">implements</span> <span class="cm-def2">EventListener</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">private</span> <span class="cm-keyword">field</span> <span class="cm-def3">email</span><span class="cm-bracket">:</span> <span class="cm-variable">string</span>
    <span class="cm-keyword">private</span> <span class="cm-keyword">field</span> <span class="cm-def3">message</span><span class="cm-bracket">:</span> <span class="cm-variable">string</span>

    <span class="cm-keyword">constructor</span> <span class="cm-def3">EmailAlertsListener</span><span class="cm-bracket">(</span><span class="cm-variable">email</span>, <span class="cm-variable">message</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-atom">this</span>.<span class="cm-variable">email</span> <span class="cm-operator">=</span> <span class="cm-variable">email</span>
        <span class="cm-atom">this</span>.<span class="cm-variable">message</span> <span class="cm-operator">=</span> <span class="cm-variable">message</span>

    <span class="cm-keyword">method</span> <span class="cm-def3">update</span><span class="cm-bracket">(</span><span class="cm-variable">filename</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">system</span>.<span class="cm-variable">email</span><span class="cm-bracket">(</span><span class="cm-variable">email</span>, <span class="cm-variable">replace</span><span class="cm-bracket">(</span><span class="cm-string">'</span><span class="cm-string">%</span><span class="cm-string">s</span><span class="cm-string">'</span>,<span class="cm-variable">filename</span>,<span class="cm-variable">message</span><span class="cm-bracket">)</span><span class="cm-bracket">)</span>


<span class="cm-doc">// Una  aplicación puede configurar notificadores y suscriptores</span>
<span class="cm-doc">// durante el tiempo de ejecución.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">Application</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">config</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">editor</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Editor</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>

        <span class="cm-variable">logger</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">LoggingListener</span><span class="cm-bracket">(</span>
            <span class="cm-string">"</span><span class="cm-string">/</span><span class="cm-string">p</span><span class="cm-string">a</span><span class="cm-string">t</span><span class="cm-string">h</span><span class="cm-string">/</span><span class="cm-string">t</span><span class="cm-string">o</span><span class="cm-string">/</span><span class="cm-string">l</span><span class="cm-string">o</span><span class="cm-string">g</span><span class="cm-string">.</span><span class="cm-string">t</span><span class="cm-string">x</span><span class="cm-string">t</span><span class="cm-string">"</span>,
            <span class="cm-string">"</span><span class="cm-string">S</span><span class="cm-string">o</span><span class="cm-string">m</span><span class="cm-string">e</span><span class="cm-string">o</span><span class="cm-string">n</span><span class="cm-string">e</span><span class="cm-string"> </span><span class="cm-string">h</span><span class="cm-string">a</span><span class="cm-string">s</span><span class="cm-string"> </span><span class="cm-string">o</span><span class="cm-string">p</span><span class="cm-string">e</span><span class="cm-string">n</span><span class="cm-string">e</span><span class="cm-string">d</span><span class="cm-string"> </span><span class="cm-string">t</span><span class="cm-string">h</span><span class="cm-string">e</span><span class="cm-string"> </span><span class="cm-string">f</span><span class="cm-string">i</span><span class="cm-string">l</span><span class="cm-string">e</span><span class="cm-string">:</span><span class="cm-string"> </span><span class="cm-string">%</span><span class="cm-string">s</span><span class="cm-string">"</span><span class="cm-bracket">)</span>
        <span class="cm-variable">editor</span>.<span class="cm-variable">events</span>.<span class="cm-variable">subscribe</span><span class="cm-bracket">(</span><span class="cm-string">"</span><span class="cm-string">o</span><span class="cm-string">p</span><span class="cm-string">e</span><span class="cm-string">n</span><span class="cm-string">"</span>, <span class="cm-variable">logger</span><span class="cm-bracket">)</span>

        <span class="cm-variable">emailAlerts</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">EmailAlertsListener</span><span class="cm-bracket">(</span>
            <span class="cm-string">"</span><span class="cm-string">a</span><span class="cm-string">d</span><span class="cm-string">m</span><span class="cm-string">i</span><span class="cm-string">n</span><span class="cm-string">@</span><span class="cm-string">e</span><span class="cm-string">x</span><span class="cm-string">a</span><span class="cm-string">m</span><span class="cm-string">p</span><span class="cm-string">l</span><span class="cm-string">e</span><span class="cm-string">.</span><span class="cm-string">c</span><span class="cm-string">o</span><span class="cm-string">m</span><span class="cm-string">"</span>,
            <span class="cm-string">"</span><span class="cm-string">S</span><span class="cm-string">o</span><span class="cm-string">m</span><span class="cm-string">e</span><span class="cm-string">o</span><span class="cm-string">n</span><span class="cm-string">e</span><span class="cm-string"> </span><span class="cm-string">h</span><span class="cm-string">a</span><span class="cm-string">s</span><span class="cm-string"> </span><span class="cm-string">c</span><span class="cm-string">h</span><span class="cm-string">a</span><span class="cm-string">n</span><span class="cm-string">g</span><span class="cm-string">e</span><span class="cm-string">d</span><span class="cm-string"> </span><span class="cm-string">t</span><span class="cm-string">h</span><span class="cm-string">e</span><span class="cm-string"> </span><span class="cm-string">f</span><span class="cm-string">i</span><span class="cm-string">l</span><span class="cm-string">e</span><span class="cm-string">:</span><span class="cm-string"> </span><span class="cm-string">%</span><span class="cm-string">s</span><span class="cm-string">"</span><span class="cm-bracket">)</span>
        <span class="cm-variable">editor</span>.<span class="cm-variable">events</span>.<span class="cm-variable">subscribe</span><span class="cm-bracket">(</span><span class="cm-string">"</span><span class="cm-string">s</span><span class="cm-string">a</span><span class="cm-string">v</span><span class="cm-string">e</span><span class="cm-string">"</span>, <span class="cm-variable">emailAlerts</span><span class="cm-bracket">)</span>
</pre>            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>