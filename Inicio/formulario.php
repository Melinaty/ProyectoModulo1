<?php
    session_name("Usuario");
    session_start();
    if(isset($_SESSION["Nombre"]))// si existe ya una sesión te redirige, si no te manda el form
    {
        header("location:./Ingresa.php");
    }
    else
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
            <form action='./Ingresa.php' method='POST'>
                <fieldset style='width: 700px;'>
                    <legend>Crea tu cuenta</legend>
                    <label>Nombre:
                        <input type='text' name='Nombre' required>
                    </label>
                    <br><br>
                    <label>Apellido:
                        <input type='text' name='Apellido' required>
                    </label>
                    <br><br>
                    <label>Grupo:
                        <input type='number' name='Grupo' required>
                    </label>
                    <br><br>
                    <label>Fecha de nacimiento:
                        <input type='date' name='Fecha' required>
                    </label>
                    <br><br>
                    <label>Correo electrónico:
                        <input type='email' name='Correo' required>
                    </label>
                    <br><br>
                    <label>Contraseña:
                        <input type='password' name='Contraseña' required>
                    </label>
                    <br><br>
                    <button type='submit' name='Crear'>Crear</button>
                </fieldset>
            </form>
        </body>
        </html>";

    }

?>