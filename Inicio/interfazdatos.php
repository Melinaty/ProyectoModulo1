<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="ediciondedatos.php">
        Nombre del libro a editar:<input type="text" name="nombre">
        <br>
        ¿Qué dato desea edita?:
        <br>
        Genero<input type="radio" name="dato" value="G">
        Autor<input type="radio" name="dato" value="A">
        Editorial<input type="radio" name="dato" value="E">
        Año: <input type="radio" name="dato" value="Y">
        <br>
        Nuevo dato:<input type="text" name="nw">
        <button type="submit">Cambiar</button>
    </form>
</body>
</html>