<?php
// Conexión a la base de datos
$servername = "192.168.51.40";
$username = "dbadmin";
$password = "^Tecnm1072";
$dbname = "Checador";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Crear una nueva tabla para almacenar los resultados
$createTableSQL = "CREATE TABLE IF NOT EXISTS nueva_tabla1 (
    ID int not null AUTO_INCREMENT,
    PERCVE INT,
    PDOCVE INT,
    Entrada time,
    Salida time,
    IDdia int,
    IDturno int, 
    PRIMARY KEY(ID)
)";
$conn->query($createTableSQL);

// Consulta para obtener los datos de la tabla 1
$sql1 = "SELECT PERCVE, PDOCVE FROM tabla1
GROUP by PERCVE, PDOCVE;";
$result1 = $conn->query($sql1);

// Iterar sobre los datos de la tabla 1
if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {
        $PERCVE = $row1['PERCVE'];
        $PDOCVE = $row1['PDOCVE'];

        if ($PDOCVE != '') {
        //Lunes
        $sql2 = "SELECT EntradaLUN, SalidaLUN FROM tabla1
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $Entrada1 = $row2['EntradaLUN'];
                $Salida1 = $row2['SalidaLUN'];
                $IDdia1 = 1;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }

        // Martes
        $sql2 = "SELECT EntradaMAR, SalidaMAR FROM tabla1
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result3 = $conn->query($sql2);
        if ($result3->num_rows > 0) {
            while ($row3 = $result3->fetch_assoc()) {
                $Entrada1 = $row3['EntradaMAR'];
                $Salida1 = $row3['SalidaMAR'];
                $IDdia1 = 2;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }

        // miercoles
        $sql2 = "SELECT EntradaMIE, SalidaMIE FROM tabla1
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result4 = $conn->query($sql2);
        if ($result4->num_rows > 0) {
            while ($row4 = $result4->fetch_assoc()) {
                $Entrada1 = $row4['EntradaMIE'];
                $Salida1 = $row4['SalidaMIE'];
                $IDdia1 = 3;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }

        // jueves
        $sql2 = "SELECT EntradaJUE, SalidaJUE FROM tabla1
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result5 = $conn->query($sql2);
        if ($result5->num_rows > 0) {
            while ($row5 = $result5->fetch_assoc()) {
                $Entrada1 = $row5['EntradaJUE'];
                $Salida1 = $row5['SalidaJUE'];
                $IDdia1 = 4;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }

        // viernes
        $sql2 = "SELECT EntradaVIE, SalidaVIE FROM tabla1
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result6 = $conn->query($sql2);
        if ($result6->num_rows > 0) {
            while ($row6 = $result6->fetch_assoc()) {
                $Entrada1 = $row6['EntradaVIE'];
                $Salida1 = $row6['SalidaVIE'];
                $IDdia1 = 5;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }

        // sabado
        $sql2 = "SELECT EntradaSAB, SalidaSAB FROM tabla1
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result7 = $conn->query($sql2);
        if ($result7->num_rows > 0) {
            while ($row7 = $result7->fetch_assoc()) {
                $Entrada1 = $row7['EntradaSAB'];
                $Salida1 = $row7['SalidaSAB'];
                $IDdia1 = 6;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }
    }

}
}

// Consulta para obtener los datos de la tabla 2
$sql1 = "SELECT PERCVE, PDOCVE FROM tabla2
GROUP by PERCVE, PDOCVE;";
$result1 = $conn->query($sql1);

// Iterar sobre los datos de la tabla 2
if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {
        $PERCVE = $row1['PERCVE'];
        $PDOCVE = $row1['PDOCVE'];

        if ($PDOCVE != '') {
        
        // Lunes
        $sql2 = "SELECT EntradaLUN, SalidaLUN FROM tabla2
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $Entrada1 = $row2['EntradaLUN'];
                $Salida1 = $row2['SalidaLUN'];
                $IDdia1 = 1;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }

        // Martes
        $sql2 = "SELECT EntradaMAR, SalidaMAR FROM tabla2
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result3 = $conn->query($sql2);
        if ($result3->num_rows > 0) {
            while ($row3 = $result3->fetch_assoc()) {
                $Entrada1 = $row3['EntradaMAR'];
                $Salida1 = $row3['SalidaMAR'];
                $IDdia1 = 2;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }

        // miercoles
        $sql2 = "SELECT EntradaMIE, SalidaMIE FROM tabla2
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result4 = $conn->query($sql2);
        if ($result4->num_rows > 0) {
            while ($row4 = $result4->fetch_assoc()) {
                $Entrada1 = $row4['EntradaMIE'];
                $Salida1 = $row4['SalidaMIE'];
                $IDdia1 = 3;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }

        // jueves
        $sql2 = "SELECT EntradaJUE, SalidaJUE FROM tabla2
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result5 = $conn->query($sql2);
        if ($result5->num_rows > 0) {
            while ($row5 = $result5->fetch_assoc()) {
                $Entrada1 = $row5['EntradaJUE'];
                $Salida1 = $row5['SalidaJUE'];
                $IDdia1 = 4;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }

        // viernes
        $sql2 = "SELECT EntradaVIE, SalidaVIE FROM tabla2
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result6 = $conn->query($sql2);
        if ($result6->num_rows > 0) {
            while ($row6 = $result6->fetch_assoc()) {
                $Entrada1 = $row6['EntradaVIE'];
                $Salida1 = $row6['SalidaVIE'];
                $IDdia1 = 5;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }

        // sabado
        $sql2 = "SELECT EntradaSAB, SalidaSAB FROM tabla2
        Where PERCVE = ". $PERCVE ." and PDOCVE = ". $PDOCVE;
        $result7 = $conn->query($sql2);
        if ($result7->num_rows > 0) {
            while ($row7 = $result7->fetch_assoc()) {
                $Entrada1 = $row7['EntradaSAB'];
                $Salida1 = $row7['SalidaSAB'];
                $IDdia1 = 6;
                if ($Entrada1 != '' and $Salida1 != '') {
                    $IDturno = 0;
                    if (str_contains($Entrada1,'p. m.')){
                        $IDturno = 1;
                    }
                    $insertSQL = "INSERT INTO nueva_tabla1 (PERCVE, PDOCVE, Entrada, Salida, IDdia, IDturno)
                    VALUES ('$PERCVE', '$PDOCVE', '$Entrada1', '$Salida1', '$IDdia1', '$IDturno')";
                    $conn->query($insertSQL);
                }          
            }      
        }
    }
}
}



// Cerrar la conexión
$conn->close();
?>
