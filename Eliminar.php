<?php

$PERCVE = $_POST['PERCVE'];

  if(isset($_GET['PERCVE']) ){
    $PERCVE = $_GET['PERCVE'];

    $host = "192.168.51.40";
    $dbusername = "dbadmin";
    $dbpassword = "^Tecnm1072";
    $dbname = "Checador";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

    if(!mysqli_query($conn,"DELETE FROM administrativos where PERCVE = '".$PERCVE."'")) 
    {
      echo "Error!";
    }
    else
    {
      echo "Accion exitosa";
    }
 }
 else{
    echo "No llego el valor";
    die();
 }