<?php
  global $conn;

  if(isset($_GET['id']) ){

    if(!mysql_query($conn,"DELETE FROM bd where id='".$PERCVE."'"))
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