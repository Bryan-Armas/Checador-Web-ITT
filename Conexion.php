<?php

$host = "192.168.51.40";
$dbusername = "dbadmin";
$dbpassword = "^Tecnm1072";
$dbname = "Checador";

$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

if($conn->connect_error) 
{
    die("Coenxion fallida: " . $conn->connect_error);
}

?>