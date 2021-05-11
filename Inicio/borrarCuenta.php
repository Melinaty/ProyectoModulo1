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
        session_start();
        $decision=$_POST["decision"];
        if($decision === "si")
        {
            echo "<h1>SESION BORRADA CON EXITO</h1>";
            session_unset();
            session_destroy();
            echo "<a href='index.html'></a>";
        }
        elseif($desicion === "no")
        {
            header("location=./Buscador.html");
        }
    ?>
</body>
</html>