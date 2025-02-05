<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADAPTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../header.php'; ?>

<?php include '../nav.php'; ?>

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
            <pre class="code cm-s-default CodeMirror" lang="pseudocode"><span class="cm-doc">// Digamos que tienes dos clases con interfaces compatibles:</span>
<span class="cm-doc">// RoundHole (HoyoRedondo) y RoundPeg (PiezaRedonda).</span>
<span class="cm-keyword">class</span> <span class="cm-def1">RoundHole</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">constructor</span> <span class="cm-def3">RoundHole</span><span class="cm-bracket">(</span><span class="cm-variable">radius</span><span class="cm-bracket">)</span> <span class="cm-bracket">{</span> ... <span class="cm-bracket">}</span>

    <span class="cm-keyword">method</span> <span class="cm-def3">getRadius</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-doc">// Devuelve el radio del agujero.</span>

    <span class="cm-keyword">method</span> <span class="cm-def3">fits</span><span class="cm-bracket">(</span><span class="cm-variable">peg</span><span class="cm-bracket">:</span> <span class="cm-variable">RoundPeg</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-keyword">return</span> <span class="cm-atom">this</span>.<span class="cm-variable">getRadius</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-operator">&gt;</span><span class="cm-operator">=</span> <span class="cm-variable">peg</span>.<span class="cm-variable">getRadius</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>

<span class="cm-keyword">class</span> <span class="cm-def1">RoundPeg</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">constructor</span> <span class="cm-def3">RoundPeg</span><span class="cm-bracket">(</span><span class="cm-variable">radius</span><span class="cm-bracket">)</span> <span class="cm-bracket">{</span> ... <span class="cm-bracket">}</span>

    <span class="cm-keyword">method</span> <span class="cm-def3">getRadius</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-doc">// Devuelve el radio de la pieza.</span>


<span class="cm-doc">// Pero hay una clase incompatible: SquarePeg (PiezaCuadrada).</span>
<span class="cm-keyword">class</span> <span class="cm-def1">SquarePeg</span> <span class="cm-keyword">is</span>
    <span class="cm-keyword">constructor</span> <span class="cm-def3">SquarePeg</span><span class="cm-bracket">(</span><span class="cm-variable">width</span><span class="cm-bracket">)</span> <span class="cm-bracket">{</span> ... <span class="cm-bracket">}</span>

    <span class="cm-keyword">method</span> <span class="cm-def3">getWidth</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-doc">// Devuelve la anchura de la pieza cuadrada.</span>


<span class="cm-doc">// Una clase adaptadora te permite encajar piezas cuadradas en</span>
<span class="cm-doc">// hoyos redondos. Extiende la clase RoundPeg para permitir a</span>
<span class="cm-doc">// los objetos adaptadores actuar como piezas redondas.</span>
<span class="cm-keyword">class</span> <span class="cm-def1">SquarePegAdapter</span> <span class="cm-keyword">extends</span> <span class="cm-def2">RoundPeg</span> <span class="cm-keyword">is</span>
    <span class="cm-doc">// En realidad, el adaptador contiene una instancia de la</span>
    <span class="cm-doc">// clase SquarePeg.</span>
    <span class="cm-keyword">private</span> <span class="cm-keyword">field</span> <span class="cm-def3">peg</span><span class="cm-bracket">:</span> <span class="cm-variable">SquarePeg</span>

    <span class="cm-keyword">constructor</span> <span class="cm-def3">SquarePegAdapter</span><span class="cm-bracket">(</span><span class="cm-variable">peg</span><span class="cm-bracket">:</span> <span class="cm-variable">SquarePeg</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-atom">this</span>.<span class="cm-variable">peg</span> <span class="cm-operator">=</span> <span class="cm-variable">peg</span>

    <span class="cm-keyword">method</span> <span class="cm-def3">getRadius</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
        <span class="cm-doc">// El adaptador simula que es una pieza redonda con un</span>
        <span class="cm-doc">// radio que pueda albergar la pieza cuadrada que el</span>
        <span class="cm-doc">// adaptador envuelve.</span>
        <span class="cm-keyword">return</span> <span class="cm-variable">peg</span>.<span class="cm-variable">getWidth</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span> <span class="cm-operator">*</span> <span class="cm-variable">Math</span>.<span class="cm-variable">sqrt</span><span class="cm-bracket">(</span><span class="cm-number">2</span><span class="cm-bracket">)</span> / <span class="cm-number">2</span>


<span class="cm-doc">// En algún punto del código cliente.</span>
<span class="cm-variable">hole</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">RoundHole</span><span class="cm-bracket">(</span><span class="cm-number">5</span><span class="cm-bracket">)</span>
<span class="cm-variable">rpeg</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">RoundPeg</span><span class="cm-bracket">(</span><span class="cm-number">5</span><span class="cm-bracket">)</span>
<span class="cm-variable">hole</span>.<span class="cm-variable">fits</span><span class="cm-bracket">(</span><span class="cm-variable">rpeg</span><span class="cm-bracket">)</span> <span class="cm-doc">// verdadero</span>

<span class="cm-variable">small_sqpeg</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">SquarePeg</span><span class="cm-bracket">(</span><span class="cm-number">5</span><span class="cm-bracket">)</span>
<span class="cm-variable">large_sqpeg</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">SquarePeg</span><span class="cm-bracket">(</span><span class="cm-number">10</span><span class="cm-bracket">)</span>
<span class="cm-variable">hole</span>.<span class="cm-variable">fits</span><span class="cm-bracket">(</span><span class="cm-variable">small_sqpeg</span><span class="cm-bracket">)</span> <span class="cm-doc">// esto no compila (tipos incompatibles)</span>

<span class="cm-variable">small_sqpeg_adapter</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">SquarePegAdapter</span><span class="cm-bracket">(</span><span class="cm-variable">small_sqpeg</span><span class="cm-bracket">)</span>
<span class="cm-variable">large_sqpeg_adapter</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">SquarePegAdapter</span><span class="cm-bracket">(</span><span class="cm-variable">large_sqpeg</span><span class="cm-bracket">)</span>
<span class="cm-variable">hole</span>.<span class="cm-variable">fits</span><span class="cm-bracket">(</span><span class="cm-variable">small_sqpeg_adapter</span><span class="cm-bracket">)</span> <span class="cm-doc">// verdadero</span>
<span class="cm-variable">hole</span>.<span class="cm-variable">fits</span><span class="cm-bracket">(</span><span class="cm-variable">large_sqpeg_adapter</span><span class="cm-bracket">)</span> <span class="cm-doc">// falso</span>
</pre>        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>