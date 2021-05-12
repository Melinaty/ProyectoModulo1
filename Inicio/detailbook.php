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
        $id_libro = $_POST["id_libro"];
        $conexion=connect();
        $peticion1 = "SELECT genero FROM librohasgenero
                    INNER JOIN libro ON libro.id_libro = librohasgenero.id_libro
                    INNER JOIN genero ON genero.id_genero = librohasgenero.id_genero
                    WHERE libro.id_libro = $id_libro";
        $peticion2 = "SELECT * FROM libro
                    INNER JOIN autor ON autor.id_autor = libro.id_autor
                    INNER JOIN editorial ON editorial.id_editorial = libro.id_editorial
                    WHERE id_libro = $id_libro";
        $query2 = mysqli_query($conexion,$peticion2);
        $query1 = mysqli_query($conexion,$peticion1);
        $arreglo = mysqli_fetch_array($query2);
        echo "<img src='$arreglo[linkImagen]'>";
        echo "<ul>";
            echo "<li> Nombre del libro: $arreglo[titulo]</li>";
            echo "<li> id del libro: $arreglo[id_libro]</li>";
            echo "<li> Autor: $arreglo[autor]</li>";
            echo "<li> Año de publicación: $arreglo[año]</li>";
            echo "<li> Editorial: $arreglo[editorial]</li>";
            echo "<li> Descripcion: $arreglo[descripcion]</li>";
            echo "<li> Generos:";
            while($row=mysqli_fetch_array($query1))
            {
                echo $row['genero'];
                echo ", ";
            }
            echo "</li>";
        echo "</ul>";
    ?>
</body>
</html>