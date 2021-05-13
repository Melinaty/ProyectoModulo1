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
        //recive todos los datos y conecta con la base
        include("config.php");
        $conexion = conecta();
        $nombre = $_POST["nombre"];
        $dato = $_POST["dato"];
        $nw = $_POST["nw"];
        //si se va a editar año entra aqui
        if($dato == 'Y')
        {
            $peticion = "UPDATE libro SET año=$nw
                        WHERE titulo LIKE '$nombre'";
            $query = mysqli_query($conexion,$peticion);
        }
        //si se va a editar Autor o Editorial entra aqui
        if($dato == 'A' || $nw == 'E')
        {
            if($dato == "A")
            {
                $opcion = "autor";
            } 
            else
            {
                $opcion = "editorial";
            }
            $peticion = "INSERT INTO $opcion ($opcion)
                        VALUES ($nw)";
            $query = mysqli_query($conexion,$peticion);
            $peticion = "SELECT id_".$opcion." FROM $opcion
                        WHERE $opcion LIKE '$nw'";
            $query = mysqli_query($conexion,$peticion);
            $array = mysqli_fetch_array($query);
            $id = $array[0];
            $peticion = "UPDATE libro SET id_".$opcion."=$id
                        WHERE titulo LIKE '$nombre'";
            $query = mysqli_query($conexion,$peticion);

        }
        //si se va a editar genero entra aqui
        if($dato == 'G')
        {
            $peticion = "INSERT INTO genero (genero)
                        VALUES ('$nw')";
            $query = mysqli_query($conexion,$peticion);
            $peticion = "SELECT id_genero FROM genero
                        WHERE genero LIKE '$nw'";
            $query = mysqli_query($conexion,$peticion);
            $array = mysqli_fetch_array($query);
            $id_genero = $array[0];
            $peticion = "SELECT id_libro FROM libro
                        WHERE titulo LIKE '$nombre'";
            $query = mysqli_query($conexion,$peticion);
            $array = mysqli_fetch_array($query);
            $id_libro = $array[0];
            $peticion = "UPDATE librohasgenero SET id_genero=$id_genero
                        WHERE id_libro = $id_libro";
            $query = mysqli_query($conexion,$peticion);
        }
        if($query === true)
        {
            echo "<h1>Datos actualizados</h1>";
        }
        else
        {
            echo "algo salio mal :(";
        }
    ?>
</body>
</html>