<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Bienvenido a Mercadona </title>
 <link
href="https: /cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-
1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
crossorigin="anonymous">
</head>
 <body>

 <div class="container-fluid">
 <div class="container text-center my-5">
 <h1>Bienvenido a Mercadona </h1>
 <p>Por favor, completa el siguiente formulario para continuar tu compra.>/p>
</div>

 <div class="container">
 <form action="index.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre">
        <label for="telefono">Teléfono:</label><br>
        <input type="number" name="telefono">

        <label for="foto">URL foto perfil:</label><br>
        <input type="url" name="foto">

        <input type="submit" value="Enviar">
    </form>
</div>
</div>

 <script
src="https: /cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-
ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"> </script>
</body>
 </html>