<?php
$PERCVE = $_POST['PERCVE'];
$PERAPE = $_POST['PERAPE'];
$PERNOM = $_POST['PERNOM'];
$PDOCVE = $_POST['PDOCVE'];
$Entrada = $_POST['Entrada'];
$Salida = $_POST['Salida'];
$IDdia = $_POST['IDdia'];

if(!empty($PERCVE) || !empty($PERAPE) || !empty($PERNOM) || !empty($PDOCVE) ||!empty($Entrada)
|| !empty($Salida) || !empty(IDdia) ){
    $host = "192.168.51.40";
    $dbusername = "dbadmin";
    $dbpassword = "^Tecnm1072";
    $dbname = "Checador";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT PERCVE from bd where PERCVE = ? limit 1 ";
        $INSERT = "INSERT INTO bd (PERCVE,PERAPE,PERNOM,PDOCVE,Entrada,Salida,IDdia)
        values(?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param( "i", $PERCVE);
        $stmt ->execute();
        $stmt ->bind_result($PERCVE);
        $stmt ->store_result();
        $rnum =$stmt->num_rows;
        if($rnum == 0)
        {
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param( "ississi", $PERCVE,$PERAPE,$PERNOM,$PDOCVE,$Entrada,
        $Salida,$IDdia);
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