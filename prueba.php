<?php
$ID = $_POST['ID'];
?>
<div class="container m-auto">
    <div class=" my-3 tect-center d-flex flex-row justify-content-center-"><p><h1>Actualizar usuario</h1></p></div>
    <form action="upd.php" method="post">
        <div class="form-group">
            <input type="hidden" name="ID">
            <input type="number" name="PERCVE" id="PERCVE" class="form-control" placeholder="PERCVE" >
        </div> 
        <div class="form-group">
            <input type="number" name="PDOCVE" id="PDOCVE" class="form-control" placeholder="PDOCVE" >
        </div> 
        <div class="form-group">
            <input type="time" name="Entrada" id="Entrada" class="form-control" placeholder="Entrada" >
        </div> 
        <div class="form-group">
            <input type="time" name="Salida" id="Salida" class="form-control" placeholder="Salida" >
        </div> 
        <div class="form-group">
            <input type="number" name="IDdia" id="IDdia" class="form-control" placeholder="IDdia" >
        </div> 
        <div class="form-group">
            <input type="text" name="Apellidos" id="Apellidos" class="form-control" placeholder="Apellidos" >
        </div> 
        <div class="form-group">
            <input type="text" name="Nombres" id="Nombres" class="form-control" placeholder="Nombres" >
        </div> 
        <div class="form-group">
            <input type="submit" value="Enviar" name="enviar">
        </div>