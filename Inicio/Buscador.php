<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
</head>
<body>
    <fieldset style="width:800px ; background-color: burlywood;">
    <h1>Biblioteca Noséque.</h1>
        <form action="./Descripción libro.php" method="POST">
            <label for="Buscador"> Buscador <input type="text" name="Buscador" id="Buscador" ></label> <br><br>
            <button type="submit">Buscar</button>
        </form>
    </fieldset>
    <form action="./Buscador.php" method="POST">
        <label for="Buscador"> Buscador <input type="text" name="Buscador" id="Buscador" ></label> <br><br>
        <button type="submit">Buscar</button>
        <a href="./datosUsuario.php">Datos del usuario</a>
    </form>
    <br><br>
    <form action='./Cerrar.php' method='POST'>
    <button type='submit' name='Cerrar' value='c'>Cerrar sesión</button>
    </form>
</body>
</html>