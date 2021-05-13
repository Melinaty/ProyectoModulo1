<?php
    session_name("Usuario");
    session_start();
    if(isset($_SESSION['Usuario']))// si existe ya una sesión te redirige, si no te manda el form
    {
        header('location:./Ingresa.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Biblioteca (nombrependiente)</h1>
    <hr>
    <a href="./formulario.php">Crear cuenta</a>
    |
    <a href="./Inicio.php">Iniciar sesion</a>
    <hr>
    
</body>
</html>
