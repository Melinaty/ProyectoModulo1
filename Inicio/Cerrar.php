<?php

  session_name("Usuario");
  session_start();

  if(isset($_POST["Cerrar"]))
  {
    session_unset();
    session_destroy();
    header("location:./Inicio.php");

  }
?>