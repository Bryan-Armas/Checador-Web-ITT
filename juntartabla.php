<?php

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

        $query = "SELECT t1.PERCVE, t1.PERAPE, t1.PERNOM, t1.PDOCVE,
t1.EntradaLUN, t1.SalidaLUN, t1.EntradaMAR, t1.SalidaMAR,
t1.EntradaMIE, t1.SalidaMIE, t1.EntradaJUE, t1.SalidaJUE,
t1.EntradaVIE, t1.SalidaVIE, t1.EntradaSAB, t1.SalidaSAB,
t1.EntradaDOM, t1.SalidaDOM
FROM tabla1 AS t1
INNER JOIN tabla2 AS t2 ON t1.PERCVE = t2.PERCVE";
$result = mysqli_query($conn, $query);

$tablaNueva = array();
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['PERCVE'];

    if (!isset($tablaNueva[$id])) {
        // Si es la primera vez que se encuentra el PERCVE, se agrega como nueva entrada en la tabla
        $tablaNueva[$id] = $row;
    } else {
        // Si ya existe una entrada para el PERCVE, se compara y actualiza las horas
        $tablaNueva[$id]['EntradaLUN'] = min($tablaNueva[$id]['EntradaLUN'], $row['EntradaLUN']);
        $tablaNueva[$id]['SalidaLUN'] = max($tablaNueva[$id]['SalidaLUN'], $row['SalidaLUN']);
        $tablaNueva[$id]['EntradaMAR'] = min($tablaNueva[$id]['EntradaMAR'], $row['EntradaMAR']);
        $tablaNueva[$id]['SalidaMAR'] = max($tablaNueva[$id]['SalidaMAR'], $row['SalidaMAR']);
        $tablaNueva[$id]['EntradaMIE'] = min($tablaNueva[$id]['EntradaMIE'], $row['EntradaMIE']);
        $tablaNueva[$id]['SalidaMIE'] = max($tablaNueva[$id]['SalidaMIE'], $row['SalidaMIE']);
        $tablaNueva[$id]['EntradaJUE'] = min($tablaNueva[$id]['EntradaJUE'], $row['EntradaJUE']);
        $tablaNueva[$id]['SalidaJUE'] = max($tablaNueva[$id]['SalidaJUE'], $row['SalidaJUE']);
        $tablaNueva[$id]['EntradaVIE'] = min($tablaNueva[$id]['EntradaVIE'], $row['EntradaVIE']);
        $tablaNueva[$id]['SalidaVIE'] = max($tablaNueva[$id]['SalidaVIE'], $row['SalidaVIE']);
        $tablaNueva[$id]['EntradaSAB'] = min($tablaNueva[$id]['EntradaSAB'], $row['EntradaSAB']);
        $tablaNueva[$id]['SalidaSAB'] = max($tablaNueva[$id]['SalidaSAB'], $row['SalidaSAB']);
        $tablaNueva[$id]['EntradaDOM'] = min($tablaNueva[$id]['EntradaDOM'], $row['EntradaDOM']);
        $tablaNueva[$id]['SalidaDOM'] = max($tablaNueva[$id]['SalidaDOM'], $row['SalidaDOM']);
    }
}


echo "<table>";
echo "<tr><th>PERCVE</th><th>PERAPE</th><th>PERNOM</th><th>PDOCVE</th>
      <th>EntradaLUN</th><th>SalidaLUN</th><th>EntradaMAR</th><th>SalidaMAR</th>
      <th>EntradaMIE</th><th>SalidaMIE</th><th>EntradaJUE</th><th>SalidaJUE</th>
      <th>EntradaVIE</th><th>SalidaVIE</th><th>EntradaSAB</th><th>SalidaSAB</th>
      <th>EntradaDOM</th><th>SalidaDOM</th></tr>";

foreach ($tablaNueva as $row) {
    echo "<tr>";
    echo "<td>".$row['PERCVE']."</td>";
    echo "<td>".$row['PERAPE']."</td>";
    echo "<td>".$row['PERNOM']."</td>";
    echo "<td>".$row['PDOCVE']."</td>";
    echo "<td>".$row['EntradaLUN']."</td>";
    echo "<td>".$row['SalidaLUN']."</td>";
    echo "<td>".$row['EntradaMAR']."</td>";
    echo "<td>".$row['SalidaMAR']."</td>";
    echo "<td>".$row['EntradaMIE']."</td>";
    echo "<td>".$row['SalidaMIE']."</td>";
    echo "<td>".$row['EntradaJUE']."</td>";
    echo "<td>".$row['SalidaJUE']."</td>";
    echo "<td>".$row['EntradaVIE']."</td>";
    echo "<td>".$row['SalidaVIE']."</td>";
    echo "<td>".$row['EntradaSAB']."</td>";
    echo "<td>".$row['SalidaSAB']."</td>";
    echo "<td>".$row['EntradaDOM']."</td>";
    echo "<td>".$row['SalidaDOM']."</td>";
    echo "</tr>";
}

echo "</table>";

    }
}
else{
    echo "Error de conexion";
    die();
}

?>