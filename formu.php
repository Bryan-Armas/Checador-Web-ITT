<?php
$PERCVE = $_POST['PERCVE'];
$PERAPE = $_POST['PERAPE'];
$PERNOM = $_POST['PERNOM'];
$PDOCVE = $_POST['PDOCVE'];
$LUNHRA = $_POST['LUNHRA'];
$LUNAUL = $_POST['LUNAUL'];
$MARHRA = $_POST['MARHRA'];
$MARAUL = $_POST['MARAUL'];
$MIEHRA = $_POST['MIEHRA'];
$MIEAUL = $_POST['MIEAUL'];
$JUEHRA = $_POST['JUEHRA'];
$JUEAUL = $_POST['JUEAUL'];
$VIEHRA = $_POST['VIEHRA'];
$VIEAUL = $_POST['VIEAUL'];
$SABHRA = $_POST['SABHRA'];
$SABAUL = $_POST['SABAUL'];
$DOMHRA = $_POST['DOMHRA'];
$DOMAUL = $_POST['DOMAUL'];

if(!empty($PERCVE) || !empty($PERAPE) || !empty($PERNOM) || !empty($PDOCVE) || !empty($LUNHRA) 
    || !empty($LUNAUL) || !empty($MARHRA) || !empty($MARAUL) || !empty($MIEHRA) || !empty($MIEAUL) 
    || !empty($JUEHRA) || !empty($JUEAUL) || !empty($VIEHRA) || !empty($VIEAUL) 
    || !empty($SABHRA) || !empty($SABAUL) || !empty($DOMHRA) || !empty($DOMAUL) ){
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
        $INSERT = "INSERT INTO bd (PERCVE,PERAPE,PERNOM,PDOCVE,LUNHRA,LUNAUL,MARHRA,MARAUL,MIEHRA
                   ,MIEAUL,JUEHRA,JUEAUL,VIEHRA,VIEAUL,SABHRA,SABAUL,DOMHRA,DOMAUL)
        values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param( "i", $PERCVE);
        $stmt ->execute();
        $stmt ->bind_result($PERCVE);
        $stmt ->store_result();
        $rnum =$stmt->num_rows;
        if($rnum == 0){
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param( "iiiiisisisisisisis", $PERCVE,$PERAPE,$PERNOM,$PDOCVE,$LUNHRA
                                 ,$LUNAUL,$MARHRA,$MARAUL,$MIEHRA,$MIEAUL,$JUEHRA,$JUEAUL
                                 ,$VIEHRA,$VIEAUL,$SABHRA,$SABAUL,$DOMHRA,$DOMAUL);
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
else{
    echo "Todos los datos son Obligatorios";
    die();
}
?>