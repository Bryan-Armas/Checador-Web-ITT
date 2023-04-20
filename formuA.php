<?php
$PDOCVE = $_POST['PDOCVE'];
$PERCVE = $_POST['PERCVE'];
$HOPHRS = $_POST['HOPHRS'];
$HOPDES = $_POST['HOPDES'];
$HOPHFG = $_POST['HOPHFG'];
$HOPOTR = $_POST['HOPOTR'];
$HOPTUT = $_POST['HOPTUT'];
$PERAPE = $_POST['PERAPE'];
$PERNOM = $_POST['PERNOM'];
$PERSIG = $_POST['PERSIG'];
$PERTAR = $_POST['PERTAR'];

if(!empty($PDOCVE) || !empty($PERCVE) || !empty($HOPHRS) || !empty($HOPDES) || !empty($HOPHFG) 
|| !empty($HOPOTR) || !empty($HOPTUT) || !empty($PERAPE) || !empty($PERNOM) || !empty($PERSIG) 
|| !empty($PERTAR) ){
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
        $INSERT = "INSERT INTO bd (PDOCVE,PERCVE,HOPHRS,HOPDES,HOPHFG,HOPOTR,HOPTUT,PERAPE,PERNOM,PERSIG,PERTAR)
        values(?,?,?,?,?,?,?,?,?,?,?)";

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
            $stmt ->bind_param( "iiiiiiissii", $PDOCVE,$PERCVE,$HOPHRS,$HOPDES,$HOPHFG,$HOPOTR,$HOPTUT,$PERAPE,$PERNOM,$PERSIG,$PERTAR);
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