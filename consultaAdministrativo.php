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
        echo "<th width='100'> PERAPE </th>";
        echo "<th width='100'> PERNOM </th>";
        echo "<th width='100'> ACTCVE </th>";
        echo "<th width='100'> OTRLUG </th>";
        echo "<th width='100'> LUNHRA </th>";
        echo "<th width='100'> MARHRA </th>";        
        echo "<th width='100'> MIEHRA </th>";        
        echo "<th width='100'> JUEHRA </th>";        
        echo "<th width='100'> VIEHRA </th>";        
        echo "<th width='100'> SABHRA </th>";       
        echo "<th width='100'> DOMHRA </th>";
        echo "</tr>";

        $sql=mysqli_query($conn, "SELECT* FROM administrativos where PERCVE = $PERCVE");
            while($row =mysqli_fetch_array($sql)){

        echo "<tr>";
        echo "<td align ='center'>".$row['PDOCVE']."</td>";
        echo "<td align ='center'>".$row['PERCVE']."</td>";
        echo "<td align ='center'>".$row['PERAPE']."</td>";
        echo "<td align ='center'>".$row['PERNOM']."</td>";
        echo "<td align ='center'>".$row['ACTCVE']."</td>";
        echo "<td align ='center'>".$row['OTRLUG']."</td>";
        echo "<td align ='center'>".$row['LUNHRA']."</td>";
        echo "<td align ='center'>".$row['MARHRA']."</td>";
        echo "<td align ='center'>".$row['MIEHRA']."</td>";
        echo "<td align ='center'>".$row['JUEHRA']."</td>";
        echo "<td align ='center'>".$row['VIEHRA']."</td>";
        echo "<td align ='center'>".$row['SABHRA']."</td>"; 
        echo "<td align ='center'>".$row['DOMHRA']."</td>";
        echo '<td><a href="Administrativo_eliminar.php?PERCVE='.$row['PERCVE'].'">Eliminar usuario</a></td>';
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