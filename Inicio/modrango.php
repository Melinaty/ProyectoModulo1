<?php
    include("config.php");
    $conexion = conecta();
    $id = $_POST["id"];
    $rango = $_POST["rango"];
    if($rango == 'L')
    {
        $id_tipo = 1;
    }
    if($rango == 'B')
    {
        $id_tipo = 2;
    }
    if($rango == 'A')
    {
        $id_tipo = 3;
    }
    $peticion =  "UPDATE usuario SET id_tipoUsuario=$id_tipo
                WHERE rfc_num_cuenta LIKE '$id'";
    $query = mysqli_query($conexion,$peticion);
    if($query === true)
    {
        echo "<h1>Todo salio bien</h1>";
    }
    else
    {
        echo "Algo salio mal :C";
    }
?>