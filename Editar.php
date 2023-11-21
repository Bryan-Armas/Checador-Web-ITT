<?php

    require_once("conexion.php");
    
    if(isset($_GET['upd'])) $ID = $_GET['upd'];

    $sql=mysqli_query($conn, "SELECT * from Agrupado where ID = ?");
    //$sql = "SELECT * FROM Agrupado WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param( "i", $ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $datos = $result->fetch_assoc();
    //$count = $stmt->rowCount();
    $rnum =$stmt->num_rows;

    if($rnum > 0)
    {
        $datos = $stmt->fetch();
        //$datos = $stmt->mysqli_fetch_array();
    }
?>
<div class="container m-auto">
    <div class=" my-3 tect-center d-flex flex-row justify-content-center-"><p><h1>Actualizar usuario</h1></p></div>
    <form action="upd.php" method="post">
        <div class="form-group">
            <input type="hidden" name="ID" value="<?= $datos['ID']?>">
            <input type="number" name="PERCVE" id="PERCVE" class="form-control" placeholder="PERCVE" value="<?= $datos['PERCVE']?>">
        </div> 
        <div class="form-group">
            <input type="number" name="PDOCVE" id="PDOCVE" class="form-control" placeholder="PDOCVE" value="<?= $datos['PDOCVE']?>">
        </div> 
        <div class="form-group">
            <input type="time" name="Entrada" id="Entrada" class="form-control" placeholder="Entrada" value="<?= $datos['Entrada']?>">
        </div> 
        <div class="form-group">
            <input type="time" name="Salida" id="Salida" class="form-control" placeholder="Salida" value="<?= $datos['Salida']?>">
        </div> 
        <div class="form-group">
            <input type="number" name="IDdia" id="IDdia" class="form-control" placeholder="IDdia" value="<?= $datos['IDdia']?>">
        </div> 
        <div class="form-group">
            <input type="text" name="Apellidos" id="Apellidos" class="form-control" placeholder="Apellidos" value="<?= $datos['Apellidos']?>">
        </div> 
        <div class="form-group">
            <input type="text" name="Nombres" id="Nombres" class="form-control" placeholder="Nombres" value="<?= $datos['Nombres']?>">
        </div> 
        <div class="form-group">
            <input type="submit" value="Actualizar" class="btn btn-success">
        </div>
    </form>
</div>