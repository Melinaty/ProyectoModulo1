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
    session_name("Usuario");
    session_start();
    include("config.php");
    $usuario = $_SESSION["Usuario"];//rfc o numero de cuenta
    $conexion = conecta();
    //pide el tipo de usaurio del usuario 
    $peticion = "SELECT id_tipoUsuario FROM usuario
                WHERE rfc_num_cuenta = '$usuario'";
    $query = mysqli_query($conexion,$peticion);
    $tipodeUsuario = mysqli_fetch_array($query);
    //checa si puede subir archivos o no
    if($tipodeUsuario[0] == 3)
    {
        echo '<form method="POST" action="modrango.php">
        RFC o Numero de cuenta<input type="text" name="id" required>
        <br>
        Rango:
        <br>
        Lector <input type="radio" name="rango" value="L" required>
        Bibliotecario <input type="radio" name="rango" value="B">
        Admin <input type="radio" name="rango" value="A">
        <button type="submit">modificar</button>
        </form>';
    }
    else
    {
        echo "<h1>NO tienes acceso a esto</h1>";
    }
    ?>
</body>
</html>