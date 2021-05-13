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
        $usuario = $_SESSION["Usuario"];
        include("config.php");
        $conexion = conecta();
        //checa todos los libros favoritos del usuario
        $peticion = "SELECT * FROM usuariohaslibro
                    INNER JOIN libro ON libro.id_libro = libro.id_libro
                    WHERE usuariohaslibro.rfc_num_cuenta = $usuario
                    AND libro.id_libro = usuariohaslibro.id_libro";
        $query = mysqli_query($conexion,$peticion);
        echo "<table>";
            echo "<tbody>";
                echo "<tr>";
                //despliega todos en una tabla
                while($arreglo = mysqli_fetch_array($query))
                {
                    echo "<td>";
                        echo "<img src='$arreglo[linkImagen]'>";
                        echo "<br>";
                        echo "nombre: $arreglo[titulo]";
                        echo "<br>";
                        echo "id del libro: $arreglo[id_libro]";
                        echo "<br>";
                        echo "<form action='./detailbook.php' method='POST'>";
                            echo "<input type='hidden' name='id_libro' value='$arreglo[id_libro]'>";
                            echo "<button type='submit'>Ver libro</button>";
                        echo "</form>";
                        echo "<form method='POST' action='./borrarfav.php'>";
                            echo "<input type='hidden' name='id_libro' value='$arreglo[id_libro]'>";
                            echo "<button type='submit'>Borrar fav</button>";
                        echo "</form>";
                    echo "</td>";
                }
                echo "<tr>";
            echo "</tbodu>";
        echo "</table>";
    ?>
</body>
</html>