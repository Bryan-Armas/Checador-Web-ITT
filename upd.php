<?php

if(!empty($_POST['ID']) && !empty($_POST['PERCVE']) && !empty($_POST['PDOCVE']) && !empty($_POST['Entrada']) 
   && !empty($_POST['Salida']) && !empty($_POST['IDdia']) && !empty($_POST['Apellidos']) 
   && !empty($_POST['Nombres']))
   {
    $ID = $POST['ID'];
    $PERCVE = $POST['PERCVE'];
    $PDOCVE = $POST['PDOCVE'];
    $Entrada = $POST['Entrada'];
    $Salida = $POST['Salida'];
    $IDdia = $POST['IDdia'];
    $Apellidos = $POST['Apellidos'];
    $Nombres = $POST['Nombres'];

    $host = "192.168.51.40";
    $dbusername = "dbadmin";
    $dbpassword = "^Tecnm1072";
    $dbname = "Checador";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

    $sql = "UPDATE Agrupado SET PERCVE = PERCVE, PDOCVE = PDOCVE, Entrada = Entrada, Salida = Salida, 
           IDdia = IDdia, Apellidos = Apellidos, Nombres = Nombres WHERE ID = ID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ID", $ID);
    $stmt->bind_param("PERCVE", $PERCVE);
    $stmt->bind_param("PDOCVE", $PDOCVE);
    $stmt->bind_param("Entrada", $Entrada);
    $stmt->bind_param("Salida", $Salida);
    $stmt->bind_param("IDdia", $IDdia);
    $stmt->bind_param("Apellidos", $Apellidos);
    $stmt->bind_param("Nombres", $Nombres);
    if($stmt->execute())
    {
        header("location: Consulta.php");
    }
    else
    {
        echo "Todos los datos son Obligatorios";
        die();
    }
   }