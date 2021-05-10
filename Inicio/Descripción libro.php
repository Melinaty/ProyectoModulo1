<?php
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Descripción del libro</title>
    </head>
    <body>
        <h1>Tu resultado:</h1> 
        <table border="1" cellpadding=25>
            <tbody>
                <tr>';
                    for ($i=0; $i<6 ; $i++) {                     
                        echo '<td>
                            <img src="./Hombre san Petesburgo.jpg" alt="Hombre San Petesburgo" style="width: 400px;">
                            <hr><hr>
                            <ul>
                                <li>Nombre: El hombre de San Petesburgo</li>
                                <li>Editorial: DeBolisllo</li>
                                <li>Autor: Ken Follet</li>
                            </ul>
                            <form action="./Descripción libro.php" method="POST">
                                <button type="submit" name="">Marcar como favorito</button>
                            </form>
                            <br>
                            <a href="" name="Hola">Abrir en otra ventana</a><br><br>
                            <a href="" name="Hola">Descargar el archivo</a>
                        </td>';
                    }
                echo '</tr>
            </tbody>
        </table>
    </body>
    </html>';
?>