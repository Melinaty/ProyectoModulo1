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
        //Inicia sesio. recibe datos y inicia conexion con la DB
        session_name("Usuario");
        session_start();
        include("config.php");
        $id_libro = $_POST["id_libro"];
        $usuario = $_SESSION["Usuario"];
        $conexion=conecta();
        $peticion = "SELECT fechaNacimiento FROM usuario
                    WHERE rfc_num_cuenta = $usuario";
        $query = mysqli_query($conexion,$peticion);
        $array = mysqli_fetch_array($query);
        $fecha = explode("-", $array[0]);
        $hoy = getdate(time());
        $año = $hoy["year"];
        $edad = $año-$fecha[0];
        //checa que no sea menor de edad
        if($edad < 18)
        {
            $menor = 1;
        }
        else
        {
            $menor = 0;
        }
        $peticion = "SELECT id_libro FROM librohasgenero
                    INNER JOIN genero ON genero.id_genero = librohasgenero.id_genero
                    WHERE genero LIKE '+18'";
        $query = mysqli_query($conexion,$peticion);
        $warning = 0;
        if($menor == 1)
        {
            //checa que si es menor no sea contenido sesnisble
            while($array = mysqli_fetch_array($query))
            {
                if($id_libro == $array[0])
                {
                    $warning = 1;
                }
            }
        }
        //si no hubo avisos entra
        if($warning == 0)
        {
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
            //depliega todo en forma de lista
            echo "<img src='$arreglo[linkImagen]'>";
            echo "<ul>";
                echo "<li> Nombre del libro: $arreglo[titulo]</li>";
                echo "<li> id del libro: $arreglo[id_libro]</li>";
                echo "<li> Autor: $arreglo[autor]</li>";
                echo "<li> Año de publicación: $arreglo[año]</li>";
                echo "<li> Editorial: $arreglo[editorial]</li>";
                echo "<li> Descripcion: $arreglo[descripcion]</li>";
                echo "<li> Generos:";
                //despliega todos los generos
                while($row=mysqli_fetch_array($query1))
                {
                    echo $row['genero'];
                    echo ", ";
                }
                echo "<form method ='POST' action='librosfavtosql.php'>";
                    echo "<input type='hidden' name='id_libro' value='$arreglo[id_libro]'>";
                    echo "<button type='submit'>Añadir a favortios</button>";
                echo "</form>";
                echo "<br>";
                echo "<form method ='POST' action='reporte.php'>";
                    echo "<input type='hidden' name='id_libro' value='$arreglo[id_libro]'>";
                    echo "<button type='submit'>Reportar Libro</button>";
                echo "</form>";
                echo "</li>";
            echo "</ul>";
            echo "<a download href='$arreglo[rutaPDF]'>descargar</a>";
        }
        //si hubo un warning no lo deja ver el contenido
        else
        {
            echo "<h1>Contendio inapropiado para menores<h1>";
            echo "<a href='Buscador.php'>Regresar</a>";
        }
    ?>
</body>
</html>
