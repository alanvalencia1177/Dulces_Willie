<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";

include ("config.php");
//Declaramos una variable
$CodigoBarras = $_GET['CodigoBarras'];
$Query = "delete from producto where CodigoBarras = $CodigoBarras";
//Hacemosla conexion 
$resul = mysqli_query($MyCon, $Query);
header("Location: Data.php");

