<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="modrango.php">
        RFC o Numero de cuenta<input type="text" name="id" required>
        <br>
        Rango:
        <br>
        Lector <input type="radio" name="rango" value="L" required>
        Bibliotecario <input type="radio" name="rango" value="B">
        Admin <input type="radio" name="rango" value="A">
        <button type="submit">modificar</button>
    </form>
</body>
</html>