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
        include("./Config.php");
        session_name("Usuario");
        session_start();        

        function regresa($donde, $boton)//crea los botones
        {
            echo "<form action=$donde method='POST'>";
            echo "<button type='submit'>$boton</button>";
            echo "</form>";
        }

        if(isset($_SESSION["Usuario"])) //si existe una sesión
        {
            $conexion = conecta();
            $usuario=$_SESSION["Usuario"];
            $busca="SELECT * FROM usuario WHERE rfc_num_cuenta='$usuario'";//budca ese usuario y todos sus datos
            $res= mysqli_query($conexion, $busca);
            while($row = mysqli_fetch_array($res))
            {
                $datos=$row;
            }

            //tabla con los datos
            echo "<table border='1'>
            <thead>
                <tr><strong><th colspan='2'>DATOS</strong></th><tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>Nombre:</td>
                    <td>$datos[6]</td>
                </tr>
                <tr>
                    <td>Apellido</td>
                    <td>$datos[7]
                </tr>
                <tr>
                    <td>RFC o número de cuenta:</td>
                    <td>$datos[0]</td>
                </tr>
                <tr>
                    <td>Usuario:</td>
                    <td>$datos[2]</td>
                </tr>
                <tr>
                    <td>Correo electrónico:</td>
                    <td>$datos[3]</td>
                </tr>
                <tr> 
                    <td>Fecha de nacimiento:</td>
                    <td>$datos[5]</td>
                </tr>
            </tbody>
            </table>";

            regresa("../verificacion.html", "Borrar cuenta");
            echo "<br><br>";
            regresa("./Buscador.php", "Regresar");
            echo "<br>";
            echo "<form action='./Cerrar.php' method='POST'>
            <button type='submit' name='Cerrar' value='c'>Cerrar sesión</button>
            </form>";
        }
        else//si ya hay una sesión te manda al inicio
        {
            header("location:./inicio.php");
        }
    
        
    ?>
</body>
</html>