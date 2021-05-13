<?php
    session_name("Usuario");
    session_start();
    if(isset($_SESSION["Usuario"])) //si existe una sesión
    {

        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Buscador</title>
        </head>
        <body>
            <fieldset style="width:800px ; background-color: burlywood;">
            <h1>Biblioteca Noséque.</h1>
                <form action="./resultadosBusqueda.php" method="POST">
                    Busqueda por categoria:<br>
                    GENERO:<input type="radio" name="filtro" value="G" required>
                    AÑO DE PUBLICACION:<input type="radio" name="filtro" value="Y">
                    EDITORIAL:<input type="radio" name="filtro" value="E">
                    AUTOR:<input type="radio" name="filtro" value="A">
                    <br>
                    <label for="Buscador"> Palabras clave<input type="text" name="Buscador" id="Buscador" required></label> <br><br>
                    <button type="submit">Buscar</button>
                </form>
            </fieldset>
            <a href="./datosUsuario.php">Datos del usuario</a>
            <br><br>
            <a href="librosFav.php">Ver favoritos</a>
            <br><br>
            <form action="./Cerrar.php" method="POST">
            <button type="submit" name="Cerrar" value="c">Cerrar sesión</button>
            </form>
        </body>
        </html>';
        if(isset($_SESSION["Tipo"]) || isset($_SESSION["Admin"]))//muestra funciones extra sólo al bibliotecario
        {
            echo "<a href='subidaLibros.php'>Subir libros</a>";
            echo "<a href='interfazdatos.php>Modificar Datos del libro</a>";
            echo "<br><form action='./EliminarUsuarios.php' method='POST'>
            <button type='submit'>Eliminar usuarios</button>
            </form>";
            if(isset($_SESSION["Admin"]))
            {
                echo "<br><form action='./formulario.php' method='POST'>
                <button type='submit' name='agrega'>Agregar usuario</button>
                </form>";
            }
        }
    }
    else
    {
        header("location:./inicio.php");
    }

?>