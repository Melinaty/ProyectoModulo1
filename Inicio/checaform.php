<?php

    session_name("Usuario");
    session_start();

    include("./Config.php");
    if(isset($_POST["Usuario"]) || isset($_SESSION["Admin"]))//si recibió el formulario del usuario
    {
        function regresa($donde, $boton)//función para hacer botones
        {
            echo "<form action=$donde method='POST'>";
            echo "<button type='submit'>$boton</button>";
            echo "</form>";
        }

        $conexion = conecta();

        $ncuenta=$_POST["num_cuenta"];
        $correo=$_POST["Correo"];
        $correo2=explode("@", $correo);
        $lon=strlen($ncuenta);
        $tipo=$_POST["tipo"];

        //Tipo de usuario
        if($tipo=="Alumno" || $tipo=="Profesor")
            $num_tipo=1;
        else
            $num_tipo=2;
        //checa que haya ingresado bien todos los datos 
        if (($correo2[1]=="comunidad.unam.mx" || $correo2[1]=="alumno.enp.unam.mx" && ($lon==9 && $tipo=="Alumno")) || 
        (($correo2[1]=="comunidad.unam.mx" || $correo2[1]=="enp.unam.mx") && ($tipo=="Profesor" || $tipo=="Bibliotecario")))
        {
            $busca=$busca="SELECT * FROM usuario WHERE rfc_num_cuenta='$ncuenta'";
            $res= mysqli_query($conexion, $busca);
            $cont= mysqli_num_rows($res);

            if($cont>0)//si hay registro
            {
                    echo "Este número de cuenta ya está registrado";
                    regresa("./Inicio.php", "Regresar");
            }
            else// No hay registro
            {
                    $nombre=$_POST["Nombre"];
                    $apellido=$_POST["Apellido"];
                    $fecha=$_POST["Fecha"];
                    $usuario=$_POST["Usuario"];
                    $password=$_POST["Contraseña"];

                    $indicacion="INSERT INTO usuario VALUES ('$ncuenta', $num_tipo, '$usuario', '$correo','$password','$fecha', '$nombre', '$apellido')";
                    $datos= mysqli_query($conexion, $indicacion);

                    echo "Tu usuario se registró con éxito";
                    if(isset($_SESSION["Admin"]))
                    {
                        regresa("./Buscador.php", "Continuar");
                    }
                    else
                    {
                        regresa("./Inicio.php", "Continuar");
                    }
            

            }
        }
        else //si mandaron un dato mal
        {
            if($lon!=9 && $tipo=="Alumno")
            {
                echo "El número de cuenta debe de ser de 9 dígitos";
            }
            elseif((($correo2[1]!="enp.unam.mx" ||  $correo2[1]!="comunidad.unam.mx") && ($tipo=="Profesor" || $tipo=="Bibliotecario"))|| 
            (($correo2[1]!="alumno.enp.unam.mx" ||  $correo2[1]!="comunidad.unam.mx") && $tipo=="Alumno"))
            {
                echo "Ingresaste un correo inválido";
            }
            regresa("./formulario.php", "Regresar");   
        }
    }
    else//si no mandaron nada no pueden entrar a la pg
    {
        header("location:./formulario.php");
    }


?>