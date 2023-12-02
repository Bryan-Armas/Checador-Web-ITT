<?php
require_once("conexion.php");

if (isset($_POST['enviar'])) {
    // Obtener y limpiar la variable POST
    $PERCVE = $_POST['PERCVE'];
    $PERCVE = mysqli_real_escape_string($conn, $PERCVE); // Escapar la entrada para prevenir inyección SQL

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


    $sql = "SELECT * FROM Agrupado WHERE PERCVE = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $PERCVE); // Asumiendo que PERCVE es una cadena (si es un entero, usa "i")
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Procesar los resultados
            while ($row = $result->fetch_assoc()) {
                // Tu lógica para mostrar los resultados aquí

                echo "<tr>";
                echo "<td align ='center'>".$row['ID']."</td>";
                echo "<td align ='center'>".$row['PERCVE']."</td>";
                echo "<td align ='center'>".$row['PDOCVE']."</td>";
                echo "<td align ='center'>".$row['Entrada']."</td>";
                echo "<td align ='center'>".$row['Salida']."</td>";
                echo "<td align ='center'>".$row['IDdia']."</td>";
                echo "<td align ='center'>".$row['PERAPE']."</td>";
                echo "<td align ='center'>".$row['PERNOM']."</td>";
                echo '<td><a href="Editar.php?ID='.$row['ID'].'">Editar registro</a></td>';
                echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
            
        } else {
            echo "No se encontraron resultados para PERCVE: $PERCVE";
        }
        $stmt->close(); // Cerrar la declaración preparada
    } else {
        echo "Error en la declaración preparada: " . $conn->error;
    }
}
?>
