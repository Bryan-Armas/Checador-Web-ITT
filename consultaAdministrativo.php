<?php

$PERCVE = $_POST['PERCVE'];


if(!trait_exists($PERCVE)){
    $host = "192.168.51.40";
    $dbusername = "dbadmin";
    $dbpassword = "^Tecnm1072";
    $dbname = "Checador";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else{
        echo "<table width='840'>";
        echo "<tbody>";
        echo "<tr>";
        echo "<th width='100'> PDOCVE </th>";
        echo "<th width='100'> PERCVE </th>";
        echo "<th width='100'> HOPHRS </th>";
        echo "<th width='100'> HOPDES </th>";
        echo "<th width='100'> HOPHFG </th>";
        echo "<th width='100'> HOPOTR </th>";
        echo "<th width='100'> HOPTUT </th>";
        echo "<th width='100'> PERAPE </th>";
        echo "<th width='100'> PERNOM </th>";
        echo "<th width='100'> PERSIG </th>";
        echo "<th width='100'> PERTAR </th>";
        echo "</tr>";

        $sql=mysqli_query($conn, "SELECT* FROM administrativo where PERCVE = $PERCVE");
            while($row =mysqli_fetch_array($sql)){

        echo "<tr>";
        echo "<td align ='center'>".$row['PDOCVE']."</td>";
        echo "<td align ='center'>".$row['PERCVE']."</td>";
        echo "<td align ='center'>".$row['HOPHRS']."</td>";
        echo "<td align ='center'>".$row['HOPDES']."</td>";
        echo "<td align ='center'>".$row['HOPHFG']."</td>";
        echo "<td align ='center'>".$row['HOPOTR']."</td>";
        echo "<td align ='center'>".$row['HOPTUT']."</td>";
        echo "<td align ='center'>".$row['PERAPE']."</td>";
        echo "<td align ='center'>".$row['PERNOM']."</td>";
        echo "<td align ='center'>".$row['PERSIG']."</td>";
        echo "<td align ='center'>".$row['PERTAR']."</td>";
        echo '<td><a href="cod_eliminar.php?PERCVE='.$row['PERCVE'].'">Eliminar usuario</a></td>';
        echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

    }
}
else{
    echo "Error de conexion";
    die();
}
?>