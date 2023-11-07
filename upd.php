<?php

if(!empty($_POST['ID']) && !empty($_POST['PERCVE']) && !empty($_POST['PDOCVE']) && !empty($_POST['Entrada']) 
   && !empty($_POST['Salida']) && !empty($_POST['IDdia']) && !empty($_POST['Apellidos']) 
   && !empty($_POST['Nombres']))
   {
    $ID = $POST['ID'];
    $ID = $POST['PERCVE'];
    $ID = $POST['PDOCVE'];
    $ID = $POST['Entrada'];
    $ID = $POST['Salida'];
    $ID = $POST['IDdia'];
    $ID = $POST['Apellidos'];
    $ID = $POST['Nombres'];

    $sql = "UPDATE Agrupado SET PERCVE = :PERCVE, PDOCVE = :PDOCVE, Entrada = :Entrada, Salida = :Salida, 
           IDdia = :IDdia, Apellidos = :Apellidos, Nombres = :Nombres WHERE ID = :ID";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(":ID",$ID);
    $stmt->bindParam(":PERCVE",$PERCVE);
    $stmt->bindParam(":PDOCVE",$PDOCVE);
    $stmt->bindParam(":Entrada",$Entrada);
    $stmt->bindParam(":Salida",$Salida);
    $stmt->bindParam(":IDdia",$IDdia);
    $stmt->bindParam(":Apellidos",$Apellidos);
    $stmt->bindParam(":Nombres",$Nombres);
    if($stmt->execute())
    {
        header("location: Consulta.php");
    }
    else
    {
        print"Complete todos los campos";
    }
   }