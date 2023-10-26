<?php
$PERCVE = $_POST['PERCVE'];
$PDOCVE = $_POST['PDOCVE'];
$Entrada = $_POST['Entrada'];
$Salida = $_POST['Salida'];
$IDdia = $_POST['IDdia'];
$Apellidos = $_POST['Apellidos'];
$Nombres = $_POST['Nombres'];

if(!empty($PERCVE) || !empty($PDOCVE) ||!empty($Entrada) || !empty($Salida) 
|| !empty($IDdia) || !empty($Apellidos) || !empty($Nombres)){

    //if(!empty($PERCVE) || !empty($PDOCVE) ||!empty($Entrada) || !empty($Salida) || !empty($IDdia) ){
    $host = "192.168.51.40";
    $dbusername = "dbadmin";
    $dbpassword = "^Tecnm1072";
    $dbname = "Checador";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT PERCVE from Agrupado where PERCVE = ?";
        //$SELECT = "SELECT IDdia from Agrupado where IDdia = ? limit 2 ";
        $INSERT = "INSERT INTO Agrupado (PERCVE,PDOCVE,Entrada,Salida,IDdia,Apellidos,Nombres)
        values(?,?,?,?,?,?,?)";

        //$INSERT = "INSERT INTO Agrupado (PERCVE,PDOCVE,Entrada,Salida,IDdia)
        //values(?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param( "i", $PERCVE); 
        //$stmt ->bind_param( "i", $IDdia); 
        $stmt ->execute();
        $stmt ->bind_result($PERCVE);
        //$stmt ->bind_result($IDdia);
        $stmt ->store_result();
        $rnum =$stmt->num_rows;
        //if($rnum == 0)
        if($rnum == 0 || $rnum == $PERCVE)
        {
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param( "iississ", $PERCVE,$PDOCVE,$Entrada,$Salida,$IDdia,$Apellidos,$Nombres);
        //$stmt ->bind_param( "iissi", $PERCVE,$PDOCVE,$Entrada,$Salida,$IDdia);
            $stmt ->execute();
            echo "Registro Completado";
        }
        else{
            echo "Alguien registro ese numero.";
        }
        $stmt->close();
        $conn->close();
    }
}
else
{
    echo "Todos los datos son Obligatorios";
    die();
}
?>