<?php
$IdEmpleados = $_POST['IdEmpleados'];
$Nom = $_POST['Nom'];
$Ape = $_POST['Ape'];
$Tel = $_POST['Tel'];

if(!empty($IdEmpleados) || !empty($Nom) || !empty($Ape) || !empty($Tel) ){
    $host = "192.168.51.40";
    $dbusername = "dbadmin";
    $dbpassword = "^Tecnm1072";
    $dbname = "Checador";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT Tel FROM empleados1 WHERE Tel = ? limit 1 ";
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