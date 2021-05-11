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
        <p align='center'><img src='../statics/inicio.png' width='500' height='200' alt='soy una imagen'></p>
            <form action='./Ingresa.php' method='POST'>
            <p align='center'><fieldset style='background-color:#F6CEF5;'>
                    <legend align='center'>INICIO DE SESIÓN</legend>
                    <p align='center'><label>Usuario:
                        <input type='text' name='Usuario' align='center' required>
                    </label>
                    <br><br>
                    <label align='center'>Contraseña:
                        <input type='password' name='Contraseña' align='center' required>
                    </label></p>
                    <br>
                    <p align='center'><input type='submit' name='Iniciar' value='Iniciar sesión' align='center'></p><hr>
                    <p align='center'>¿No tienes cuenta?</p>
                    <p align='center'><a href='./formulario.php'>Crea una</a></p>
                </fieldset></p>
            </form>
        </body>
        </html>";
    }
?>
