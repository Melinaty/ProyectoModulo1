<?php
    include("config.php");

    session_name("Usuario");
    session_start();
    var_dump($_SESSION);
    $conexion = conecta();
    $id_libro = $_POST["id_libro"];
    $usuario = $_SESSION["Usuario"];
    $peticion = "INSERT INTO usuariohaslibro (id_libro,rfc_num_cuenta)
                VALUES ($id_libro,$usuario)";
    $query = mysqli_query($conexion,$peticion);
    var_dump($peticion);
    if($query === true)
    {
        echo "<h1>Añadido a favoritos</h1>";
    }
    else
    {
        echo "<h1>Algo Salio mal</h1>";
    }
?>