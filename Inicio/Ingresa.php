<?php
    //session_name("Usuario");
    session_start();

    if(isset($_POST["Nombre"]) || isset($_SESSION["Nombre"])) //si existe una sesión o ya enviaron el formulario
    {
        if(isset($_POST["Nombre"])){
        $_SESSION["Nombre"]=$_POST["Nombre"];
        $_SESSION["Apellido"]=$_POST["Apellido"];
        $_SESSION["Correo"]=$_POST["Correo"];
        $_SESSION["Fecha"]=$_POST["Fecha"];
        $_SESSION["Grupo"]=$_POST["Grupo"];

        }
        echo "Hola".$_SESSION["Nombre"]." ".$_SESSION["Apellido"]." estás en tu sesión. Ingresaste con el correo de ".$_SESSION["Correo"];
        echo "<form action='./Cerrar.php' method='POST'>
        <button type='submit' name='Cerrar' value='c'>Cerrar sesión</button>
        </form>";
    }   
    else
    {
        header("location:./inicio.php");
    }
?>