<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sombrero Seleccionador de Hogwarts</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<h1 class="text-center mb-4">Benvinguts a Hogwarts</h1>
<form action="bienvenida.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre">
        <label for="apellido1">Primer Apellido:</label><br>
        <input type="text" name="apellido1">

        <label for="apellido2">Segundo apellido:</label><br>
        <input type="text" name="apellido2">

        <input type="submit" value="Enviar">
    </form>
</div>
</body>
</html>