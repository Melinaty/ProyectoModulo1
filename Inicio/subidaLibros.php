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
        //inicia la conexion
        include("config.php");
        $usuario = $_SESSION["usuario"];//rfc o numero de cuenta
        $conexion = conecta();
        //pide el tipo de usaurio del usuario 
        $peticion = "SELECT id_tipoUsuario FROM usuario
                    WHERE rfc_num_cuenta = '$usuario'";
        $query = mysqli_query($conexion,$peticion);
        $tipodeUsuario = mysqli_fetch_array($query);
        //checa si puede subir archivos o no
        if($tipodeUsuario[0] != 1)
        {
            echo "<form method='POST' action='./librostosql.php' enctype='multipart/form-data'>";
            echo "<fieldset>";
                echo "Nombre del libro:<input type='text' name='titulo' required>";
                echo "<br><br>";
                echo "Autor(principla)<input type='text' name='autor' required>";
                echo "<br><br>";
                echo "Editorial:<input type='text' name='editorial' required>";
                echo "<br><br>";
                echo "Año<input type='number' name='year' required>";
                echo "<br><br>";
                echo "Descripcion (maximo 255 carcactere) <input type='textarea' name='descripcion' maxlength='255' required>";
                echo "<br><br>";
                echo "Generos ";
                echo "Warning: al introducir mas de un dato separar por comas";
                echo "<br> Ejemplo: Jovenes,Literatura Universal,Terror,";
                echo "<br>";
                echo "<input type='text' name='generos' required>";
                echo "<br><br>";
                echo "Subir foto<input type='File' name='foto'>";
                echo "<br><br>";
                echo "Libro en pdf<input type='File' name='pdf' required>";
                echo "<br><br>";
                echo "<button type='submit'>Subir</button>";
            echo "</fieldset>";
            echo "</form>";
        }
        else
        {
            echo "<h1>Acesso denegada<h1>";
        }
    ?>
</body>
</html>