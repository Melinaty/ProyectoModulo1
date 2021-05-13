<?php

    session_name("Usuario");
    session_start();
    include("./Config.php");
    $conexion = conecta();

    $ncuenta=$_POST["num_cuenta"];
    $password=$_POST["Contraseña"];
    //busca el tipo de usuario en la BD con respecto al número de cuenta o RFC
    $busca="SELECT id_tipoUsuario FROM usuario WHERE rfc_num_cuenta='$ncuenta' AND contraseña='$password'";
    $res= mysqli_query($conexion, $busca);
    $cont= mysqli_num_rows($res);

    while($row = mysqli_fetch_array($res))
    {
        $datos=$row;
    }
    if($cont>0)//si hay registro
    {
        if($datos["id_tipoUsuario"]=="2")
        {
            $_SESSION["Tipo"]=$datos;//asigna el tipo para que si es bibliotecario aparezcan más funciones
        }
        if($datos["id_tipoUsuario"]=="3")
        {
            $_SESSION["Admin"]=$datos;
        }
        $_SESSION["Usuario"]=$ncuenta;
        header("location:./Buscador.php");
       
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