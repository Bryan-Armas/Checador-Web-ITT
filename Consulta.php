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
        echo "<th width='100'> ID </th>";
        echo "<th width='100'> PERCVE </th>";
        echo "<th width='100'> PDOCVE </th>";
        echo "<th width='100'> Entrada </th>";
        echo "<th width='100'> Salida </th>";
        echo "<th width='100'> IDdia </th>";
        echo "<th width='100'> PERAPE </th>";
        echo "<th width='100'> PERNOM </th>";
        echo "</tr>";

        $sql=mysqli_query($conn, "SELECT* FROM Agrupado where PERCVE = $PERCVE");
            while($row =mysqli_fetch_array($sql)){

        echo "<tr>";
        echo "<td align ='center'>".$row['ID']."</td>";
        echo "<td align ='center'>".$row['PERCVE']."</td>";
        echo "<td align ='center'>".$row['PDOCVE']."</td>";
        echo "<td align ='center'>".$row['Entrada']."</td>";
        echo "<td align ='center'>".$row['Salida']."</td>";
        echo "<td align ='center'>".$row['IDdia']."</td>";
        echo "<td align ='center'>".$row['PERAPE']."</td>";
        echo "<td align ='center'>".$row['PERNOM']."</td>";
        echo '<td><a href="Editar.html?ID='.$row['ID'].'">Editar registro</a></td>';
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