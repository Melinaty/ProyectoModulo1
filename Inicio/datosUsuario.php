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
        session_name("Usuario");
        session_start();        
        if(isset($_POST["num_cuenta"]) || isset($_SESSION["num_cuenta"])) //si existe una sesión o ya enviaron el formulario
    {
        if(isset($_POST["Usuario"])){
            $usuario=(isset($_POST["Usuario"]) && $_POST["Usuario"]!="") ? $_POST["Usuario"]:"No especifico";
            $nombre=(isset($_POST["Nombre"]) && $_POST["Nombre"]!="") ? $_POST["Nombre"]:"No especifico";
            $apellido=(isset($_POST["Apellido"]) && $_POST["Apellido"]!="") ? $_POST["Apellido"]:"No especifico";
            $correo=(isset($_POST["Correo"]) && $_POST["Correo"]!="") ? $_POST["Correo"]:"No especifico";
            $fecha=(isset($_POST["Fecha"]) && $_POST["Fecha"]!="") ? $_POST["Fecha"]:"No especifico";

            $_SESSION["Usuario"]=$usuario;
            $_SESSION["Nombre"]=$nombre;
            $_SESSION["Apellido"]=$apellido;
            $_SESSION["Correo"]=$correo;
            $_SESSION["Fecha"]=$fecha;

            
            
                

        echo "Nombre: $nombre";
        echo "<br>";
        echo "Apellido: $apellido";
        echo "<br>";
        echo "Correo: $correo";
        echo "<br>";
        echo "Fecha de nacimiento: $fecha";
        echo "<br>";
        echo "Usuario: $usuario";
        echo "<br>";
        }
        echo "<form action='../verificacion.html' method='POST'>";
            echo "<button type='submit'>Borrar cuenta</button>";
        echo "</form>";
        echo "<form action='./Cerrar.php' method='POST'>
        <button type='submit' name='Cerrar' value='c'>Cerrar sesión</button>
        </form>";
    }
    else
    {
        header("location:./inicio.php");
    }
        
    ?>
</body>
</html>