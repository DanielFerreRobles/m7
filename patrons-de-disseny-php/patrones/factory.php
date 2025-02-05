<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Factory Method</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../header.php'; ?>

<?php include '../nav.php'; ?>

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
            <pre class="code cm-s-default CodeMirror" lang="pseudocode"><span class="cm-doc">// La clase creadora declara el método fábrica que debe devolver</span>
<span class="cm-doc">// un objeto de una clase de producto. Normalmente, las</span>
<span class="cm-doc">// subclases de la creadora proporcionan la implementación de</span>
<span class="cm-doc">// este método.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">Dialog</span> <span class="cm-keyword">is</span>
    <span class="cm-doc">// La creadora también puede proporcionar cierta</span>
    <span class="cm-doc">// implementación por defecto del método fábrica.</span>
    <span class="cm-keyword">abstract</span> <span class="cm-keyword">method</span> <span class="cm-def3">createButton</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span><span class="cm-bracket">:</span><span class="cm-variable">Button</span>

    <span class="cm-doc">// Observa que, a pesar de su nombre, la principal</span>
    <span class="cm-doc">// responsabilidad de la creadora no es crear productos.</span>
    <span class="cm-doc">// Normalmente contiene cierta lógica de negocio que depende</span>
    <span class="cm-doc">// de los objetos de producto devueltos por el método</span>
    <span class="cm-doc">// fábrica. Las subclases pueden cambiar indirectamente esa</span>
    <span class="cm-doc">// lógica de negocio sobrescribiendo el método fábrica y</span>
    <span class="cm-doc">// devolviendo desde él un tipo diferente de producto.</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">render</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-doc">// Invoca el método fábrica para crear un objeto de</span>
        <span class="cm-doc">// producto.</span>
        <span class="cm-variable">Button</span> <span class="cm-variable">okButton</span> <span class="cm-operator">=</span> <span class="cm-variable">createButton</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
        <span class="cm-doc">// Ahora utiliza el producto.</span>
        <span class="cm-variable">okButton</span>.<span class="cm-variable">onClick</span><span class="cm-bracket">(</span><span class="cm-variable">closeDialog</span><span class="cm-bracket">)</span>
        <span class="cm-variable">okButton</span>.<span class="cm-variable">render</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>


<span class="cm-doc">// Los creadores concretos sobrescriben el método fábrica para</span>
<span class="cm-doc">// cambiar el tipo de producto resultante.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">WindowsDialog</span> <span class="cm-keyword">extends</span> <span class="cm-def2">Dialog</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">createButton</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span><span class="cm-bracket">:</span><span class="cm-variable">Button</span> <span class="cm-keyword">is</span>
        <span class="cm-keyword">return</span> <span class="cm-keyword">new</span> <span class="cm-variable">WindowsButton</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>

<span class="cm-keyword">class</span> <span class="cm-def1">WebDialog</span> <span class="cm-keyword">extends</span> <span class="cm-def2">Dialog</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">createButton</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span><span class="cm-bracket">:</span><span class="cm-variable">Button</span> <span class="cm-keyword">is</span>
        <span class="cm-keyword">return</span> <span class="cm-keyword">new</span> <span class="cm-variable">HTMLButton</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>


<span class="cm-doc">// La interfaz de producto declara las operaciones que todos los</span>
<span class="cm-doc">// productos concretos deben implementar.</span>
<span class="cm-keyword">interface</span> <span class="cm-def1">Button</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">render</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">onClick</span><span class="cm-bracket">(</span><span class="cm-variable">f</span><span class="cm-bracket">)</span>

<span class="cm-doc">// Los productos concretos proporcionan varias implementaciones</span>
<span class="cm-doc">// de la interfaz de producto.</span>

<span class="cm-keyword">class</span> <span class="cm-def1">WindowsButton</span> <span class="cm-keyword">implements</span> <span class="cm-def2">Button</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">render</span><span class="cm-bracket">(</span><span class="cm-variable">a</span>, <span class="cm-variable">b</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-doc">// Representa un botón en estilo Windows.</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">onClick</span><span class="cm-bracket">(</span><span class="cm-variable">f</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-doc">// Vincula un evento clic de OS nativo.</span>

<span class="cm-keyword">class</span> <span class="cm-def1">HTMLButton</span> <span class="cm-keyword">implements</span> <span class="cm-def2">Button</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">render</span><span class="cm-bracket">(</span><span class="cm-variable">a</span>, <span class="cm-variable">b</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-doc">// Devuelve una representación HTML de un botón.</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">onClick</span><span class="cm-bracket">(</span><span class="cm-variable">f</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-doc">// Vincula un evento clic de navegador web.</span>

<span class="cm-keyword">class</span> <span class="cm-def1">Application</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">field</span> <span class="cm-def3">dialog</span><span class="cm-bracket">:</span> <span class="cm-variable">Dialog</span>

    <span class="cm-doc">// La aplicación elige un tipo de creador dependiendo de la</span>
    <span class="cm-doc">// configuración actual o los ajustes del entorno.</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">initialize</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-variable">config</span> <span class="cm-operator">=</span> <span class="cm-variable">readApplicationConfigFile</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>

        <span class="cm-keyword">if</span> <span class="cm-bracket">(</span><span class="cm-variable">config</span>.<span class="cm-variable">OS</span> <span class="cm-operator">=</span><span class="cm-operator">=</span> <span class="cm-string">"</span><span class="cm-string">W</span><span class="cm-string">i</span><span class="cm-string">n</span><span class="cm-string">d</span><span class="cm-string">o</span><span class="cm-string">w</span><span class="cm-string">s</span><span class="cm-string">"</span><span class="cm-bracket">)</span> <span class="cm-keyword">then</span>
            <span class="cm-variable">dialog</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">WindowsDialog</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
        <span class="cm-keyword">else</span> <span class="cm-keyword">if</span> <span class="cm-bracket">(</span><span class="cm-variable">config</span>.<span class="cm-variable">OS</span> <span class="cm-operator">=</span><span class="cm-operator">=</span> <span class="cm-string">"</span><span class="cm-string">W</span><span class="cm-string">e</span><span class="cm-string">b</span><span class="cm-string">"</span><span class="cm-bracket">)</span> <span class="cm-keyword">then</span>
            <span class="cm-variable">dialog</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">WebDialog</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
        <span class="cm-keyword">else</span>
            <span class="cm-variable">throw</span> <span class="cm-keyword">new</span> <span class="cm-variable">Exception</span><span class="cm-bracket">(</span><span class="cm-string">"</span><span class="cm-string">E</span><span class="cm-string">r</span><span class="cm-string">r</span><span class="cm-string">o</span><span class="cm-string">r</span><span class="cm-string">!</span><span class="cm-string"> </span><span class="cm-string">U</span><span class="cm-string">n</span><span class="cm-string">k</span><span class="cm-string">n</span><span class="cm-string">o</span><span class="cm-string">w</span><span class="cm-string">n</span><span class="cm-string"> </span><span class="cm-string">o</span><span class="cm-string">p</span><span class="cm-string">e</span><span class="cm-string">r</span><span class="cm-string">a</span><span class="cm-string">t</span><span class="cm-string">i</span><span class="cm-string">n</span><span class="cm-string">g</span><span class="cm-string"> </span><span class="cm-string">s</span><span class="cm-string">y</span><span class="cm-string">s</span><span class="cm-string">t</span><span class="cm-string">e</span><span class="cm-string">m</span><span class="cm-string">.</span><span class="cm-string">"</span><span class="cm-bracket">)</span>

    <span class="cm-doc">// El código cliente funciona con una instancia de un</span>
    <span class="cm-doc">// creador concreto, aunque a través de su interfaz base.</span>
    <span class="cm-doc">// Siempre y cuando el cliente siga funcionando con el</span>
    <span class="cm-doc">// creador a través de la interfaz base, puedes pasarle</span>
    <span class="cm-doc">// cualquier subclase del creador.</span>
    <span class="cm-keyword">method</span> <span class="cm-def3">main</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-atom">this</span>.<span class="cm-variable">initialize</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
        <span class="cm-variable">dialog</span>.<span class="cm-variable">render</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
</pre>        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>