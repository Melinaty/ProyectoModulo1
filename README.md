# ProyectoModulo1
<h3>Nombre del proyecto:<strong> Biblioteca El saber</strong></h3><br>
Nombre del equipo: <br>
Nombre de los integrantes: <br>
  + Archundia Tapia Melissa Natalia <br>
  + Flores Medero Campos Alexa <br>
  + González Falcón Luis Adrián <br>
  + Juárez Salgado Eduardo Andreco <br>
<br>
<h3>Guía de instalación del proyecto:</h3>
Si no se tiene instalado el XAMPP, dirigete a https://www.apachefriends.org/es/index.html e instala la versión 7.4.19. <br>
En tu explorador de archivos dirigete a la ubicación C:\xampp\htdocs y crea una carpeta en la cual quieras que se guarde el repositorio <br>
En tu consola de comandos, dirigete a la ubicacion C:\xampp\htdocs y en la carpeta que creaste, después utiliza el comando git clone y como argumento pon el siguiente link: https://github.com/Melinaty/ProyectoModulo1.git y ya se estará copiando el repositorio a tu carpeta.
<br>
<h3>Guía de configuración del proyecto:</h3>
Antes de hacer los siguentes pasos, asegurate de prender los primeros 2 servidores (Apache y MYSQL), ahora que están prendidos dirigete a tu consola de comandos y también debes de mover de ubicación el archivo 'BaseDatos.sql' que se encuentra en la carpeta que creaste a la dirección C:\xampp\mysql\bin (esto se realiza para que el archivo .sql pueda ser añadida a la base de datos), después dirigete a la ruta C:\mysql\bin e introduce el comando 'mysql -u root' y vas a entrar a la base de datos de MARIA DB, después debes ejecutar el siguiente comando 'CREATE DATABASE modulo1 CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;' y crearás una base de datos de nombre 'modulo1'. Para añadir el respaldo a la base de datos debes de salirte de MARIA DB pulsando ctrl+c, te aparecerá un mensaje de 'bye', después corre el comando mysql -u root modulo1 > 'BaseDatos.sql' y ya habrás añadido el respaldo a la base de datos. 
Una vez completado, dirigete al siguiente link: http://localhost/CursoWeb/Proyecto/ProyectoModulo1/Inicio/ y estará listo.
