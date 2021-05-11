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
        $id_libro=$_POST["id_libro"];
        echo "<form>";
            echo "<fieldset>";
                echo "<legend>Reporte de contendio </legend>";
                echo "¿Cual es el problema con este contenido?";
                echo "<br><br>";
                echo 'Contenido +18:<input type="checkbox" name="reporte[]" value="M">
                    <br>
                    Discurso de odio<input type="checkbox" name="reporte[]" value="Od">
                    <br>
                    Desinformación<input type="checkbox" name="reporte[]" value="DS">
                    <br>
                    Atenta contra la integridad de un grupo de personas<input type="checkbox" name="reporte[]" value="INT">';
                    echo "<br>";
                    echo '<button type="submit">Enviar queja</button>';
            echo "</fieldser>";
        echo "</form>";
    ?>
</body>
</html>