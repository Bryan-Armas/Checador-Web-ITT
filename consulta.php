<html>
    <head> 
        <title> Mostrar informacion </title>
    </head>
    <body>
        <h2> Mostrar registros </h2>
        <?php
            include ("Conexion.php");
            global $conex;

            echo "<table width='840'>";
            echo "<tbody>";
            echo "<tr>";
            echo "<th width='100'> IdEmpleados </th>";
            echo "<th width='100'> Nom </th>";
            echo "<th width='100'> Ape </th>";
            echo "<th width='100'> Tel </th>";
            echo "</th>";

            $sql=mysql_query($conex, "SELECT* FROM empleados1");
            while($row =mysql_fetch_array($sql)){
                echo "<tr>";
                echo "<td align ='center'>".$row['IdEmpleados']."</td>";
                echo "<td align ='center'>".$row['Nom']."</td>";
                echo "<td align ='center'>".$row['Ape']."</td>";
                echo "<td align ='center'>".$row['Tel']."</td>";
                echo '<td><a href="cod_eliminar.php?id='.$row['id'].'">Eliminar usuario</a></td>';
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        ?>
    </body>
</html>