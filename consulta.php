        <?php
            include ("Conexion.php");
            global $conex;

            echo "<table width='840'>";
            echo "<tbody>";
            echo "<tr>";
            echo "<th width='100'> PERCVE </th>";
            echo "<th width='100'> PERAPE </th>";
            echo "<th width='100'> PERNOM </th>";
            echo "<th width='100'> PDOCVE </th>";
            echo "<th width='100'> LUNHRA </th>";
            echo "<th width='100'> LUNAUL </th>";
            echo "<th width='100'> MARHRA </th>";
            echo "<th width='100'> MARAUL </th>";
            echo "<th width='100'> MIEHRA </th>";
            echo "<th width='100'> MIEAUL </th>";
            echo "<th width='100'> JUEHRA </th>";
            echo "<th width='100'> JUEAUL </th>";
            echo "<th width='100'> VIEHRA </th>";
            echo "<th width='100'> VIEAUL </th>";
            echo "<th width='100'> SABHRA </th>";
            echo "<th width='100'> SABAUL </th>";
            echo "<th width='100'> DOMHRA </th>";
            echo "<th width='100'> DOMAUL </th>";
            echo "</th>";

            $sql=mysql_query($conex, "SELECT* FROM bd");
            while($row =mysql_fetch_array($sql)){
                echo "<tr>";
                echo "<td align ='center'>".$row['PERCVE']."</td>";
                echo "<td align ='center'>".$row['PERAPE']."</td>";
                echo "<td align ='center'>".$row['PERNOM']."</td>";
                echo "<td align ='center'>".$row['PDOCVE']."</td>";
                echo "<td align ='center'>".$row['LUNHRA']."</td>";
                echo "<td align ='center'>".$row['LUNAUL']."</td>";
                echo "<td align ='center'>".$row['MARHRA']."</td>";
                echo "<td align ='center'>".$row['MARAUL']."</td>";
                echo "<td align ='center'>".$row['MIEHRA']."</td>";
                echo "<td align ='center'>".$row['MIEAUL']."</td>";
                echo "<td align ='center'>".$row['JUEHRA']."</td>";
                echo "<td align ='center'>".$row['JUEAUL']."</td>";
                echo "<td align ='center'>".$row['VIEHRA']."</td>";
                echo "<td align ='center'>".$row['VIEAUL']."</td>";
                echo "<td align ='center'>".$row['SABHRA']."</td>";
                echo "<td align ='center'>".$row['SABAUL']."</td>";
                echo "<td align ='center'>".$row['ADOMHRApe']."</td>";
                echo "<td align ='center'>".$row['DOMAUL']."</td>";
                echo '<td><a href="cod_eliminar.php?id='.$row['id'].'">Eliminar usuario</a></td>';
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // https://www.juanonlab.com/blog/es/debug-en-php-con-visual-studio-code
        ?>