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
    //inicia conexion
        include("config.php");
        $filtro = $_POST["filtro"];
        $keyword = $_POST["Buscador"];
        //checa que categoria quiere buscar
        $conexion=conecta();
        if($filtro == 'G')//G Y E A
        {
            $busqueda = 'genero';
        }
        elseif($filtro == 'Y')
        {
            $busqueda = 'año';
        }
        elseif($filtro == 'E')
        {
            $busqueda = 'editorial';
        }
        elseif($filtro == 'A')
        {
            $busqueda = 'autor';
        }
        //dependiendo de la categoria busca de diferentes formas
        if($filtro == 'G')
        {
            $peticion = "SELECT libro.id_libro, titulo, linkImagen FROM librohasgenero
                        INNER JOIN libro ON libro.id_libro = librohasgenero.id_libro
                        INNER JOIN genero ON genero.id_genero = librohasgenero.id_genero
                        WHERE genero LIKE '$keyword'";
        }
        elseif($filtro == 'E' || $filtro == 'A')
        {
            $peticion = "SELECT libro.id_libro, titulo, linkImagen FROM libro
                        INNER JOIN $busqueda ON libro.id_$busqueda = $busqueda.id_$busqueda
                        WHERE $busqueda LIKE '$keyword'";
        }
        else
        {
            $peticion = "SELECT id_libro, titulo, linkImagen FROM libro
                        WHERE año = $keyword";
        }
        //regresa la busqueda y la pone en una tabla
        $query = mysqli_query($conexion,$peticion);
        echo "<table border=1>";
            echo "<tbody>";
                echo "<tr>";
                while($row=mysqli_fetch_array($query))
                {
                    echo "<td>";
                        echo "<img src='$row[linkImagen]' width='300' height='200'>";
                        echo "<br>";
                        echo "nombre: $row[titulo]";
                        echo "<br>";
                        echo "id del libro: $row[id_libro]";
                        echo "<br>";
                        echo "<form action='./detailbook.php' method='POST'>";
                            echo "<input type='hidden' name='id_libro' value='$row[id_libro]'>";
                            echo "<button type='submit'>Ver libro</button>";
                        echo "</form>";
                    echo "</td>";
                }
                echo "</tr>";
            echo "</tbody>";
        echo "</table>";
    ?>
</body>
</html>