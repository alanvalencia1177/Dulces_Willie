<?php
include 'config.php';
$CodigoBarras = $_GET['$CodigoBarras'];
//Sentencia MySQL para actualizar
$SQL = "update Producto set NombreProducto where CodigoBarras = $CodigoBarras";
//Ejecutamos el QUERY
$EjecucionSQL = mysqli_query($MyCon,$SQL);
//HAcemos una condicion que nos dira si se actualizo
if($EjecucionSQL == true)
{
    echo "<script type='text/JavaScript'>alert('Los datos sean modificado con exito')</script>";
}

