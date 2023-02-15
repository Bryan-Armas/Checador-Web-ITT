<?php
$Nom = $_POST['PERCVE'];
$Ape = $_POST['PERAPE'];
$Tel = $_POST['PERNOM'];
$Nom = $_POST['PDOCVE'];
$Ape = $_POST['LUNHRA'];
$Tel = $_POST['LUNAUL'];
$Ape = $_POST['MARHRA'];
$Tel = $_POST['MARAUL'];
$Ape = $_POST['MIEHRA'];
$Tel = $_POST['MIEAUL'];
$Ape = $_POST['JUEHRA'];
$Tel = $_POST['JUEAUL'];
$Ape = $_POST['VIEHRA'];
$Tel = $_POST['VIEAUL'];
$Ape = $_POST['SABHRA'];
$Tel = $_POST['SABAUL'];
$Ape = $_POST['DOMHRA'];
$Tel = $_POST['DOMAUL'];

if(!empty($PERCVE) || !empty($PERAPE) || !empty($PERNOM) || !empty($PDOCVE) || !empty($LUNHRA) || !empty($LUNAUL) || !empty($MARHRA) || !empty($MARAUL) || !empty($MIEHRA) || !empty($MIEAUL) 
    || !empty($JUEHRA) || !empty($JUEAUL) || !empty($VIEHRA) || !empty($VIEAUL) || !empty($SABHRA) || !empty($SABAUL) || !empty($DOMHRA) || !empty($DOMAUL) ){
    $host = "192.168.51.40";
    $dbusername = "dbadmin";
    $dbpassword = "^Tecnm1072";
    $dbname = "Checador";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else{
        $INSERT = "INSERT INTO empleados1 (IdEmpleados,Nom,Ape,Tel)
        values(?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param( "i", $Tel);
        $stmt ->execute();
        $stmt ->bind_result($Tel);
        $stmt ->store_result();
        $rnum =$stmt->num_rows;
        if($rnum == 0){
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param( "issi", $IdEmpleados,$Nom,$Ape,$Tel);
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