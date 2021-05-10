<?php
    session_name("Usuario");
    session_start();
    if(isset($_SESSION['Usuario']))// si existe ya una sesión te redirige, si no te manda el form
    {
        header('location:./Ingresa.php');
    }
    else
    {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Biblioteca</title>
        </head>
        <body>
            <form action='./Ingresa.php' method='POST'>
                <fieldset style='width: 700px;'>
                    <legend>INICIO DE SESIÓN</legend>
                    <label>Usuario:
                        <br>
                        <input type='text' name='Usuario' required>
                    </label>
                    <br><br>
                    <label>Contraseña:
                        <br>
                        <input type='password' name='Contraseña' required>
                    </label>
                    <br><br>
                    <input type='submit' name='Iniciar' value='Iniciar sesión'><hr>
                    <p>¿No tienes cuenta?</p>
                    <a href='./formulario.php'>Crea una</a>
                </fieldset>
            </form>
        </body>
        </html>";
    }
?>
