<?php
    session_name("Usuario");
    session_start();
    if(isset($_SESSION["Usuario"]) && !isset($_SESSION["Admin"]))// si existe ya una sesión te redirige, si no te manda el form
    {
        header("location:./Buscador.php");
    }
    else//llenar el formulario según el tipo de usuario
    {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Crear sesión</title>
        </head>
        <body>
        <form action='./formulario.php' method='POST'>
        <label><strong>Elige el tipo de cuenta</strong>
            <input type='radio' name='Tipo' value='Alumno' required>Alumno
            <input type='radio' name='Tipo' value='Profesor' required>Profesor, Técnico, laboratoriasta.
            <input type='radio' name='Tipo' value='Bibliotecario' required>Bibliotecario
        </label>
        <br>
            <button type='submit' name='envia'>Elegir</button>
        </form>";

        $tipo=(isset($_POST["Tipo"]) && $_POST["Tipo"]!="") ? $_POST["Tipo"]:"No especifico";

        if(isset($_POST["Tipo"]) || isset($_SESSION["Admin"]))
        {
            echo"<form action='./checaform.php' method='POST'>
                <fieldset style='width: 700px;'>
                    <legend>Crea tu cuenta</legend>
                    <label>Nombre:
                        <input type='text' name='Nombre' required>
                    </label>
                    <br><br>
                    <label>Apellido:
                        <input type='text' name='Apellido' required>
                    </label>
                    <br><br>";

                if($tipo=="Alumno")
                {
                    echo "<label>Número de cuenta(sin guion):
                    <input type='number' name='num_cuenta'  required>";
                }
                else
                {
                    echo "<label>RFC:
                    <input type='text' name='num_cuenta' minlength='10' maxlength='10' required>";

                }   
                
                echo "</label><br><br> 
                    <label>Fecha de nacimiento:
                    <input type='date' name='Fecha' required>
                    </label>
                    <br><br>
                    <label>Correo institucional:
                        <input type='email' name='Correo' required>
                    </label>
                    <br><br>
                    <label>Usuario:
                        <input type='text' name='Usuario' required>
                    </label>
                    <br><br>
                    <label>Contraseña:
                        <input type='password' name='Contraseña' required>
                    </label>
                    <br><br>
                    <button type='submit' name='Crear'>Crear</button>
                </fieldset>
                <input type='hidden' name='tipo' value='".$tipo."'>
            </form>
        </body>
        </html>";
        }
        

    }

?>