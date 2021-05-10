<?php
    session_name("Usuario");
    session_start();

    if(isset($_POST["Usuario"]) || isset($_SESSION["Usuario"])) //si existe una sesión o ya enviaron el formulario
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

        }
        echo "Hola".$_SESSION["Usuario"]." estás en tu sesión. Ingresaste con el correo de ".$_SESSION["Correo"];
        echo "<form action='./Cerrar.php' method='POST'>
        <button type='submit' name='Cerrar' value='c'>Cerrar sesión</button>
        </form>";
    }   
    else
    {
        header("location:./inicio.php");
    }
?>