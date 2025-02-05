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

<?php include '../nav.php'; ?>

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
            <pre class="code cm-s-default CodeMirror" lang="pseudocode"><span class="cm-doc">// La "abstracción" define la interfaz para la parte de</span>
<span class="cm-doc">// "control" de las dos jerarquías de clase. Mantiene una</span>
<span class="cm-doc">// referencia a un objeto de la jerarquía de "implementación" y</span>
<span class="cm-doc">// delega todo el trabajo real a este objeto.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">RemoteControl</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">protected</span> <span class="cm-keyword">field</span> <span class="cm-def3">device</span><span class="cm-bracket">:</span> <span class="cm-variable">Device</span>
    <span class="cm-keyword">constructor</span> <span class="cm-def3">RemoteControl</span><span class="cm-bracket">(</span><span class="cm-variable">device</span><span class="cm-bracket">:</span> <span class="cm-variable">Device</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-atom">this</span>.<span class="cm-variable">device</span> <span class="cm-operator">=</span> <span class="cm-variable">device</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">togglePower</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-keyword">if</span> <span class="cm-bracket">(</span><span class="cm-variable">device</span>.<span class="cm-variable">isEnabled</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span><span class="cm-bracket">)</span> <span class="cm-keyword">then</span>
            <span class="cm-variable">device</span>.<span class="cm-variable">disable</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
        <span class="cm-keyword">else</span>
            <span class="cm-variable">device</span>.<span class="cm-variable">enable</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">volumeDown</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">device</span>.<span class="cm-variable">setVolume</span><span class="cm-bracket">(</span><span class="cm-variable">device</span>.<span class="cm-variable">getVolume</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-operator">-</span> <span class="cm-number">10</span><span class="cm-bracket">)</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">volumeUp</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">device</span>.<span class="cm-variable">setVolume</span><span class="cm-bracket">(</span><span class="cm-variable">device</span>.<span class="cm-variable">getVolume</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-operator">+</span> <span class="cm-number">10</span><span class="cm-bracket">)</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">channelDown</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">device</span>.<span class="cm-variable">setChannel</span><span class="cm-bracket">(</span><span class="cm-variable">device</span>.<span class="cm-variable">getChannel</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-operator">-</span> <span class="cm-number">1</span><span class="cm-bracket">)</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">channelUp</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">device</span>.<span class="cm-variable">setChannel</span><span class="cm-bracket">(</span><span class="cm-variable">device</span>.<span class="cm-variable">getChannel</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-operator">+</span> <span class="cm-number">1</span><span class="cm-bracket">)</span>


<span class="cm-doc">// Puedes extender clases de la jerarquía de abstracción</span>
<span class="cm-doc">// independientemente de las clases de dispositivo.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">AdvancedRemoteControl</span> <span class="cm-keyword">extends</span> <span class="cm-def2">RemoteControl</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">mute</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">device</span>.<span class="cm-variable">setVolume</span><span class="cm-bracket">(</span><span class="cm-number">0</span><span class="cm-bracket">)</span>


<span class="cm-doc">// La interfaz de "implementación" declara métodos comunes a</span>
<span class="cm-doc">// todas las clases concretas de implementación. No tiene por</span>
<span class="cm-doc">// qué coincidir con la interfaz de la abstracción. De hecho,</span>
<span class="cm-doc">// las dos interfaces pueden ser completamente diferentes.</span>
<span class="cm-doc">// Normalmente, la interfaz de implementación únicamente</span>
<span class="cm-doc">// proporciona operaciones primitivas, mientras que la</span>
<span class="cm-doc">// abstracción define operaciones de más alto nivel con base en</span>
<span class="cm-doc">// las primitivas.</span>
<span class="cm-keyword">interface</span> <span class="cm-def1">Device</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">isEnabled</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">enable</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">disable</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">getVolume</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">setVolume</span><span class="cm-bracket">(</span><span class="cm-variable">percent</span><span class="cm-bracket">)</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">getChannel</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">setChannel</span><span class="cm-bracket">(</span><span class="cm-variable">channel</span><span class="cm-bracket">)</span>


<span class="cm-doc">// Todos los dispositivos siguen la misma interfaz.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">Tv</span> <span class="cm-keyword">implements</span> <span class="cm-def2">Device</span> <span class="cm-keyword">is</span>
    <span class="cm-comment">// ...</span>

<span class="cm-keyword">class</span> <span class="cm-def1">Radio</span> <span class="cm-keyword">implements</span> <span class="cm-def2">Device</span> <span class="cm-keyword">is</span>
    <span class="cm-comment">// ...</span>


<span class="cm-doc">// En algún lugar del código cliente.</span>
<span class="cm-variable">tv</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Tv</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
<span class="cm-variable">remote</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">RemoteControl</span><span class="cm-bracket">(</span><span class="cm-variable">tv</span><span class="cm-bracket">)</span>
<span class="cm-variable">remote</span>.<span class="cm-variable">togglePower</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>

<span class="cm-variable">radio</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Radio</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
<span class="cm-variable">remote</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">AdvancedRemoteControl</span><span class="cm-bracket">(</span><span class="cm-variable">radio</span><span class="cm-bracket">)</span>
</pre>        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>