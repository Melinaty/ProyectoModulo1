<?php
    include("./Config.php");
    $conexion = conecta();

    $ncuenta=$_POST["num_cuenta"];
    $password=$_POST["Contraseña"];

    $busca=$busca="SELECT contraseña FROM usuario WHERE rfc_num_cuenta=$ncuenta AND contraseña='$password'";
    $res= mysqli_query($conexion, $busca);
    $cont= mysqli_num_rows($res);

    if($cont>0)//si hay registro
    {
        header("location:.\Buscador.php");
    }
    else// No hay registro
    {
        echo "Tu usuario o contraseña son incorrectos, intenta de nuevo";
        echo "<form action='Inicio.php' method='POST'>";
            echo "<button type='submit'>Regresar</button>";
        echo "</form>";
        echo "¿No tienes cuenta?
        <a href='./formulario.php'>Crear una</a>";

    }

    
    

?>