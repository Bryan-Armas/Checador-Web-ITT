<?php
$PDOCVE = $_POST['PDOCVE'];
$PERCVE = $_POST['PERCVE'];
$PERAPE = $_POST['PERAPE'];
$PERNOM = $_POST['PERNOM'];
$ACTCVE = $_POST['ACTCVE'];
$OTRLUG = $_POST['OTRLUG'];
$LUNHRA = $_POST['LUNHRA'];
$MARHRA = $_POST['MARHRA'];
$MIEHRA = $_POST['MIEHRA'];
$JUEHRA = $_POST['JUEHRA'];
$VIEHRA = $_POST['VIEHRA'];
$SABHRA = $_POST['SABHRA'];
$DOMHRA = $_POST['DOMHRA'];

if(!empty($PDOCVE) || !empty($PERCVE) || !empty($PERAPE) || !empty($PERNOM) || !empty($ACTCVE) 
|| !empty($OTRLUG) || !empty($LUNHRA) || !empty($MARHRA) || !empty($MIEHRA) || !empty($JUEHRA) 
|| !empty($VIEHRA) || !empty($SABHRA) || !empty($DOMHRA) ){
    $host = "192.168.51.40";
    $dbusername = "dbadmin";
    $dbpassword = "^Tecnm1072";
    $dbname = "Checador";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT PERCVE from administrativos where PERCVE = ? limit 1 ";
        $INSERT = "INSERT INTO administrativos (PDOCVE,PERCVE,PERAPE,PERNOM,ACTCVE,OTRLUG,LUNHRA,MARHRA,MIEHRA,JUEHRA,VIEHRA,SABHRA,DOMHRA)
        values(?,?,?,?,?,?,?,?,?,?,?,?,?)";

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
            $stmt ->bind_param( "iisssssssssss", $PDOCVE,$PERCVE,$PERAPE,$PERNOM,$ACTCVE,$OTRLUG,$LUNHRA,$MARHRA,$MIEHRA,$JUEHRA,$VIEHRA,$SABHRA,$DOMHRA);
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