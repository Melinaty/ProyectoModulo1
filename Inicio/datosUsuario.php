<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        //var_dump($_SESSION);
        $nombre = $_SESSION["Nombre"];
        $apellido = $_SESSION["Apellido"];
        $correo = $_SESSION["Correo"];
        $fecha = $_SESSION["Fecha"];
        $grupo = $_SESSION["Grupo"];

        echo "Nombre: $nombre";
        echo "<br>";
        echo "Apellido: $apellido";
        echo "<br>";
        echo "Correo: $correo";
        echo "<br>";
        echo "fecha de nacimiento: $fecha";
        echo "<br>";
        echo "Grupo: $grupo";
        echo "<br>";
        echo "<form action='./verificacion.html' method='POST'>";
            echo "<button type='submit'>Borrar cuenta</button>";
        echo "</form>"
    ?>
</body>
</html>