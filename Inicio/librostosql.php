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
        include("config.php");

        $conexion = conecta();
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $editorial = $_POST["editorial"];
        $año = $_POST["year"];
        $descripcion = $_POST["descripcion"];
        $generos = $_POST["generos"];
        if($_FILES["foto"]["name"] != "")
        {
            $imagen = $_FILES["foto"];
            $done = 0;
            $arrgeloImg = explode("/",$imagen["type"]);
        }
        else
            $done = 1;
        $pdf = $_FILES["pdf"];


        //arcivos
        $arrgelopdf = explode("/",$pdf["type"]);
        if($arrgelopdf[1] == "pdf")
        {
            $peticion1 = "INSERT INTO libro (titulo,descripcion,año)
                        VALUES ('$titulo','$descripcion',$año)";
            $peticion2 = "INSERT INTO autor (autor)
                        VALUES ('$autor')";
            $peticion3 = "INSERT INTO editorial (editorial)
                        VALUES ('$editorial')";
            $boolquery = mysqli_query($conexion,$peticion1);
            $boolquery = mysqli_query($conexion,$peticion2);
            $boolquery = mysqli_query($conexion,$peticion3);
            $peticion4 = "SELECT id_libro FROM libro
                        WHERE titulo LIKE '$titulo'";
            $querry = mysqli_query($conexion,$peticion4);
            $tamaño = mysqli_fetch_array($querry);
            $nombrearch=explode(".",$_FILES["pdf"]["name"]);
            $ruta = "./statics/libros/libro".$tamaño["id_libro"].".".$nombrearch[1];
            //cambia el nombre
            rename($_FILES["pdf"]["tmp_name"], $ruta);
            $peticion = "SELECT id_autor FROM autor
                         WHERE autor LIKE '$autor'";
            $querry = mysqli_query($conexion,$peticion);
            $id = mysqli_fetch_array($querry);
            //var_dump($id);
            $peticion = "UPDATE libro SET id_autor = $id[0]
                        WHERE titulo ='$titulo'";
            $querry = mysqli_query($conexion, $peticion);
            $peticion = "SELECT id_editorial FROM editorial
                        WHERE editorial LIKE '$editorial'";
            $querry = mysqli_query($conexion, $peticion);
            $id = mysqli_fetch_array($querry);
            //var_dump($id);
            $peticion = "UPDATE libro SET id_editorial = $id[0]
                        WHERE titulo ='$titulo'";
            $querry = mysqli_query($conexion, $peticion);
            //var_dump($querry);
            $peticion ="UPDATE libro SET rutaPDF = '$ruta'
                        WHERE titulo='$titulo'";
            $querry = mysqli_query($conexion, $peticion);
            //////////////////////////////////////////////////////
            $encontro=strpos($generos, ",");
            if($encontro === false)
            {
                $peticion = "INSERT INTO genero (genero)
                                VALUES ('$generos')";
                $querry = mysqli_query($conexion,$peticion);
                $peticion = "SELECT id_libro FROM libro 
                            WHERE titulo = '$titulo'";
                $querry = mysqli_query($conexion,$peticion);
                $id_libro = mysqli_fetch_array($querry);
                $peticion = "SELECT id_genero FROM genero
                            WHERE genero = '$generos'";
                $querry = mysqli_query($conexion,$peticion);
                $id_genero = mysqli_fetch_array($querry);
                $peticion = "INSERT INTO librohasgenero (id_libro,id_genero) 
                            VALUES ($id_libro[0], $id_genero[0])";
                $querry = mysqli_query($conexion,$peticion);
            }
            else
            {
                $arregloGeneros = explode(",", $generos);
                foreach($arregloGeneros as $valor)
                {
                    $peticion = "INSERT INTO genero (genero)
                                VALUES ('$valor')";
                    $querry = mysqli_query($conexion,$peticion);
                    $peticion = "SELECT id_libro FROM libro 
                                WHERE titulo = '$titulo'";
                    $querry = mysqli_query($conexion,$peticion);
                    $id_libro = mysqli_fetch_array($querry);
                    $peticion = "SELECT id_genero FROM genero
                                WHERE genero = '$valor'";
                    $querry = mysqli_query($conexion,$peticion);
                    $id_genero = mysqli_fetch_array($querry);
                    $peticion = "INSERT INTO librohasgenero (id_libro,id_genero) 
                                VALUES ($id_libro[0], $id_genero[0])";
                    $querry = mysqli_query($conexion,$peticion);
                }
            }
            if($done != 1)
            {
                if($arrgeloImg[1] === "jpeg" || $arrgeloImg[1] === "jpg" || $arrgeloImg[1] === "png")
                {
                    $nombrearch=explode(".",$_FILES["foto"]["name"]);
                    $ruta = "./statics/imagenes/imagen".$tamaño["id_libro"].".".$nombrearch[1];
                    //cambia el nombre
                    rename($_FILES["foto"]["tmp_name"], $ruta);
                    $peticion ="UPDATE libro SET linkImagen = '$ruta'
                                WHERE titulo='$titulo'";
                    $querry = mysqli_query($conexion, $peticion);
                    echo "Archivos subidos correctamente";
                }
                else
                {
                    echo "Extension de imagen incorrecta";
                }
            }
            else
            {
                $ruta = "./statics/imagenes/default.png";
                $peticion ="UPDATE libro SET linkImagen = '$ruta' 
                            WHERE titulo='$titulo'";
            
                $querry = mysqli_query($conexion, $peticion);
                echo "<h1>Archivos subidos correctamente</h1>";
            }
        }
        else
        {
            $peticion5 = "INSERT INTO libro (linkImagen)
                        VALUES ('./statics/imagenes/default.png')";
        }
    ?>
</body>
</html>