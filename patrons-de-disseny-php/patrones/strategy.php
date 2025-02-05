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

<?php include '../nav.php'; ?>

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
                <pre class="code cm-s-default CodeMirror" lang="pseudocode"><span class="cm-doc">// La interfaz estrategia declara operaciones comunes a todas</span>
<span class="cm-doc">// las versiones soportadas de algún algoritmo. El contexto</span>
<span class="cm-doc">// utiliza esta interfaz para invocar el algoritmo definido por</span>
<span class="cm-doc">// las estrategias concretas.</span>
<span class="cm-keyword">interface</span> <span class="cm-def1">Strategy</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">execute</span><span class="cm-bracket">(</span><span class="cm-variable">a</span>, <span class="cm-variable">b</span><span class="cm-bracket">)</span>

<span class="cm-doc">// Las estrategias concretas implementan el algoritmo mientras</span>
<span class="cm-doc">// siguen la interfaz estrategia base. La interfaz las hace</span>
<span class="cm-doc">// intercambiables en el contexto.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">ConcreteStrategyAdd</span> <span class="cm-keyword">implements</span> <span class="cm-def2">Strategy</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">execute</span><span class="cm-bracket">(</span><span class="cm-variable">a</span>, <span class="cm-variable">b</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-keyword">return</span> <span class="cm-variable">a</span> <span class="cm-operator">+</span> <span class="cm-variable">b</span>

<span class="cm-keyword">class</span> <span class="cm-def1">ConcreteStrategySubtract</span> <span class="cm-keyword">implements</span> <span class="cm-def2">Strategy</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">execute</span><span class="cm-bracket">(</span><span class="cm-variable">a</span>, <span class="cm-variable">b</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-keyword">return</span> <span class="cm-variable">a</span> <span class="cm-operator">-</span> <span class="cm-variable">b</span>

<span class="cm-keyword">class</span> <span class="cm-def1">ConcreteStrategyMultiply</span> <span class="cm-keyword">implements</span> <span class="cm-def2">Strategy</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">execute</span><span class="cm-bracket">(</span><span class="cm-variable">a</span>, <span class="cm-variable">b</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-keyword">return</span> <span class="cm-variable">a</span> <span class="cm-operator">*</span> <span class="cm-variable">b</span>

<span class="cm-doc">// El contexto define la interfaz de interés para los clientes.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">Context</span> <span class="cm-keyword">is</span>
    <span class="cm-doc">// El contexto mantiene una referencia a uno de los objetos</span>
    <span class="cm-doc">// de estrategia. El contexto no conoce la clase concreta de</span>
    <span class="cm-doc">// una estrategia. Debe trabajar con todas las estrategias a</span>
    <span class="cm-doc">// través de la interfaz estrategia.</span>
    <span class="cm-keyword">private</span> <span class="cm-def3">strategy</span><span class="cm-bracket">:</span> <span class="cm-variable">Strategy</span>

    <span class="cm-doc">// Normalmente, el contexto acepta una estrategia a través</span>
    <span class="cm-doc">// del constructor y también proporciona un setter</span>
    <span class="cm-doc">// (modificador) para poder cambiar la estrategia durante el</span>
    <span class="cm-doc">// tiempo de ejecución.</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">setStrategy</span><span class="cm-bracket">(</span><span class="cm-variable">Strategy</span> <span class="cm-variable">strategy</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-atom">this</span>.<span class="cm-variable">strategy</span> <span class="cm-operator">=</span> <span class="cm-variable">strategy</span>

    <span class="cm-doc">// El contexto delega parte del trabajo al objeto de</span>
    <span class="cm-doc">// estrategia en lugar de implementar varias versiones del</span>
    <span class="cm-doc">// algoritmo por su cuenta.</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">executeStrategy</span><span class="cm-bracket">(</span><span class="cm-variable">int</span> <span class="cm-variable">a</span>, <span class="cm-variable">int</span> <span class="cm-variable">b</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-keyword">return</span> <span class="cm-variable">strategy</span>.<span class="cm-variable">execute</span><span class="cm-bracket">(</span><span class="cm-variable">a</span>, <span class="cm-variable">b</span><span class="cm-bracket">)</span>


<span class="cm-doc">// El código cliente elige una estrategia concreta y la pasa al</span>
<span class="cm-doc">// contexto. El cliente debe conocer las diferencias entre</span>
<span class="cm-doc">// estrategias para elegir la mejor opción.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">ExampleApplication</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">main</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">Create</span> <span class="cm-variable">context</span> <span class="cm-variable">object</span>.

        <span class="cm-variable">Read</span> <span class="cm-variable">first</span> <span class="cm-variable">number</span>.
        <span class="cm-variable">Read</span> <span class="cm-variable">last</span> <span class="cm-variable">number</span>.
        <span class="cm-variable">Read</span> <span class="cm-variable">the</span> <span class="cm-variable">desired</span> <span class="cm-variable">action</span> <span class="cm-variable">from</span> <span class="cm-variable">user</span> <span class="cm-variable">input</span>.

        <span class="cm-keyword">if</span> <span class="cm-bracket">(</span><span class="cm-variable">action</span> <span class="cm-operator">=</span><span class="cm-operator">=</span> <span class="cm-variable">addition</span><span class="cm-bracket">)</span> <span class="cm-keyword">then</span>
            <span class="cm-variable">context</span>.<span class="cm-variable">setStrategy</span><span class="cm-bracket">(</span><span class="cm-keyword">new</span> <span class="cm-variable">ConcreteStrategyAdd</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span><span class="cm-bracket">)</span>

        <span class="cm-keyword">if</span> <span class="cm-bracket">(</span><span class="cm-variable">action</span> <span class="cm-operator">=</span><span class="cm-operator">=</span> <span class="cm-variable">subtraction</span><span class="cm-bracket">)</span> <span class="cm-keyword">then</span>
            <span class="cm-variable">context</span>.<span class="cm-variable">setStrategy</span><span class="cm-bracket">(</span><span class="cm-keyword">new</span> <span class="cm-variable">ConcreteStrategySubtract</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span><span class="cm-bracket">)</span>

        <span class="cm-keyword">if</span> <span class="cm-bracket">(</span><span class="cm-variable">action</span> <span class="cm-operator">=</span><span class="cm-operator">=</span> <span class="cm-variable">multiplication</span><span class="cm-bracket">)</span> <span class="cm-keyword">then</span>
            <span class="cm-variable">context</span>.<span class="cm-variable">setStrategy</span><span class="cm-bracket">(</span><span class="cm-keyword">new</span> <span class="cm-variable">ConcreteStrategyMultiply</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span><span class="cm-bracket">)</span>

        <span class="cm-variable">result</span> <span class="cm-operator">=</span> <span class="cm-variable">context</span>.<span class="cm-variable">executeStrategy</span><span class="cm-bracket">(</span><span class="cm-variable">First</span> <span class="cm-variable">number</span>, <span class="cm-variable">Second</span> <span class="cm-variable">number</span><span class="cm-bracket">)</span>

        <span class="cm-variable">Print</span> <span class="cm-variable">result</span>.
</pre>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>