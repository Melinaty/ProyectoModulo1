<?php
    session_name("Usuario");
    session_start();

    include("./Config.php");
    $conexion = conecta();
    
    echo"<fieldset style='width: 400px;''>
        <form action='./EliminarUsuarios.php' method='POST'>
            <legend><strong>Borrar usuario</strong></legend>
            <label>Ingresa el número de cuenta o RFC:
                <br>
                <input type='text' name='borrar' required>
            </label><br><br>
            <input type='submit'>
            </form>
            <form action='./Buscador.php' method='POST'>
                <button type='submit'>Regresar</button>
            </form>
        </fieldset>";

    if(isset($_POST["borrar"])) 
    {
        $borrado=$_POST["borrar"];
        $indicacion="DELETE FROM usuariohaslibro WHERE rfc_num_cuenta='$borrado'";
        $res= mysqli_query($conexion, $indicacion);
        if($res)
        {
            $indicacion2="DELETE FROM usuario WHERE rfc_num_cuenta='$borrado'";
            $res2= mysqli_query($conexion, $indicacion2);
            if($res2)
            {
                echo "<h1>Se borró la cuenta con éxito</h1>";
                
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
    
?>