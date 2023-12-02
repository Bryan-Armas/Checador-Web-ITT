<?php

    require_once("conexion.php");
    
    $ID = $_GET['ID'];

    $sql = "SELECT * from Agrupado where ID = $ID";
    $result = $conn->query($sql);

    if($result->num_rows > 0) 
    {
        $row = $result->fetch_array();
?>
<p><h1>Actualizar usuario</h1></p>
    <form action="upd.php" method="post">
        PERCVE: <input type="number" name="PERCVE"  value="<?PHP echo $row['PERCVE']; ?>"><br>

        PDOCVE:<input type="number" name="PDOCVE" value="<?PHP echo $row['PDOCVE']; ?>"><br>

        Entrada: <input type="time" name="Entrada" value="<?PHP echo$row['Entrada']; ?>"><br>

        Salida: <input type="time" name="Salida" value="<?PHP echo $row['Salida']; ?>"><br>

        IDdia: <input type="number" name="IDdia" value="<?PHP echo $row['IDdia']; ?>"><br>

        PERAPE: <input type="text" name="PERAPE" value="<?PHP echo $row['PERAPE']; ?>"><br>

        PERNOM: <input type="text" name="PERNOM" value="<?PHP echo $row['PERNOM']; ?>"><br>
            
        <input type="hidden" name="ID" value="<?PHP echo $row['ID']; ?>"><br>
        <input type="submit" value="Actualizar" class="btn btn-success">
    </form>

    <?php
} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>