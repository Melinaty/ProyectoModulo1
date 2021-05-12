<?php
    include("./Config.php");

    $conexion = conecta();

    $ncuenta=$_POST["num_cuenta"];

    $busca=$busca="SELECT * FROM usuario WHERE rfc_num_cuenta=$ncuenta";
    $res= mysqli_query($conexion, $busca);
    $cont= mysqli_num_rows($res);

    if($cont>0)//si hay registro
    {
            echo "Este número de cuenta ya está registrado";
            echo "<form action='Inicio.php' method='POST'>";
            echo "<button type='submit'>Regresar</button>";
            echo "</form>";
    }
    else// No hay registro
    {
            $nombre=$_POST["Nombre"];
            $apellido=$_POST["Apellido"];
            $fecha=$_POST["Fecha"];
            $usuario=$_POST["Usuario"];
            $correo=$_POST["Correo"];
            $password=$_POST["Contraseña"];

            $indicacion="INSERT INTO usuario VALUES ($ncuenta, 1, '$usuario', '$correo','$password',$fecha)";
            $datos= mysqli_query($conexion, $indicacion);

            echo "Tu usuario se registró con éxito";
            echo "<form action='./Buscador.php' method='POST'>";
                echo "<button type='submit'>Continuarr</button>";
            echo "</form>";
    

    }



    

?>