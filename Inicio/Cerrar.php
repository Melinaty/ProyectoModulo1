<?php
  session_start();

  if(isset($_POST["Cerrar"]))
  {
    session_unset();
    header("location:./Inicio.php");

  }
?>