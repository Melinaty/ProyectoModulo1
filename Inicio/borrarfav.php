<?php
//recibe datos e inicia la conexion entre sql
    include("config.php");
    $conexion = conecta();
    session_name("Usuario");
    session_start();
    $usuario = $_SESSION["Usuario"];
    $id_libro = $_POST["id_libro"];
    //pide borrar de la tabla usuariohaslibro los libros fav
    $peticion = "DELETE FROM usuariohaslibro
                WHERE id_libro = $id_libro AND
                rfc_num_cuenta LIKE '$usuario'";
    $query = mysqli_query($conexion, $peticion);
    if($query === true)
    {
        echo "Libro borrado de favoritos";
    }
    else
    {
        echo "algo salio mal";
    }
?>