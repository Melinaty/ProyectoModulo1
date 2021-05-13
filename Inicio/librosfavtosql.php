<?php
    //recive datos y los integra a la tabla usuariohaslibro
    include("config.php");

    session_name("Usuario");
    session_start();
    $conexion = conecta();
    $id_libro = $_POST["id_libro"];
    $usuario = $_SESSION["Usuario"];
    $peticion = "INSERT INTO usuariohaslibro (id_libro,rfc_num_cuenta)
                VALUES ($id_libro,$usuario)";
    $query = mysqli_query($conexion,$peticion);
    if($query === true)
    {
        echo "<h1>Añadido a favoritos</h1>";
    }
    else
    {
        echo "<h1>Algo Salio mal</h1>";
    }
?>