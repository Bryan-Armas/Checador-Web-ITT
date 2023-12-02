<?php
require_once("conexion.php");

    $ID = $_POST['ID'];
    $PERCVE = $_POST['PERCVE'];
    $PDOCVE = $_POST['PDOCVE'];
    $Entrada = $_POST['Entrada'];
    $Salida = $_POST['Salida'];
    $IDdia = $_POST['IDdia'];
    $PERAPE = $_POST['PERAPE'];
    $PERNOM = $_POST['PERNOM'];

    $sql = "UPDATE Agrupado SET PERCVE = ?, PDOCVE = ?, Entrada = ?, Salida = ?, IDdia = ?, PERAPE = ?, PERNOM = ? WHERE ID = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Vincular parámetros
        $stmt->bind_param("iississi", $PERCVE, $PDOCVE, $Entrada, $Salida, $IDdia, $PERAPE, $PERNOM, $ID);
    
        // Ejecutar la declaración
        if ($stmt->execute()) {
            header("location: Consulta.php");
            echo "Usuario actualizado correctamente";
            exit(); // Detener la ejecución después de redirigir
        } else {
            echo "Error al actualizar el usuario: " . $stmt->error;
        }
        $stmt->close(); // Cerrar la declaración
    } else {
        echo "Error en la declaración preparada: " . $conn->error;
    }
    
    $conn->close();
    ?>