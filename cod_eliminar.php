<?php
  include ("Conexion.php");
  global $conex;

  if(isset($_GET['id']) ){

    if(!mysql_query($conex,"DELETE FROM usuario where id='".$PERCVE."'"))
    {
        echo "Error!";
    }
    else
    {
        echo "Accion exitosa!";
    }
 }
 else{
    echo "No llego el valor";
 }