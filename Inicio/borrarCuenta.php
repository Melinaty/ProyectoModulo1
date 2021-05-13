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
        function regresa($donde, $boton)//para hacer botones
        {
            echo "<form action=$donde method='POST'>";
            echo "<button type='submit'>$boton</button>";
            echo "</form>";
        }

        session_name("Usuario");
        session_start();

        include("./Config.php");
        $conexion = conecta();
        $usuario=$_SESSION["Usuario"];
        $indicacion="DELETE FROM usuariohaslibro WHERE rfc_num_cuenta='$usuario'";//borra la FK

        $decision=$_POST["decision"];
        if($decision== "si")
        {
            $res= mysqli_query($conexion, $indicacion);
            if($res)
            {
                $indicacion2="DELETE FROM usuario WHERE rfc_num_cuenta='$usuario'";//Borra la Pk
                $res2= mysqli_query($conexion, $indicacion2);
                if($res2)
                {
                    echo "<h1>Se borró la cuenta con éxito</h1>
                    <form action='./Cerrar.php' method='POST'>
                    <button type='submit' name='Cerrar' value='c'>Inicio</button>
                    </form>";
                    
                }
                else
                {
                    echo"No se pudo eliminar la cuenta";
                    regresa("./Buscador.php", "Regresar");
                }
                    
            }
            else
            {
                echo"No se pudo eliminar la cuenta";
                regresa("./Buscador.php", "Regresar");
            }
         }
        elseif($decision== "no")//Si la decisión es no te regresa al buscador
        {
            header("location:./Buscador.php");
        }
        
    ?>
</body>
</html>