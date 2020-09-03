<?php
//
include_once '../Modelos/ConstantesMyCon.php';
include_once PATH.'Modelos/Mycon.php';
include_once PATH.'Modelos/ModeloCliente/ClienteDAO.php';
include_once PATH.'Modelos/ModeloCargo/CargoDAO.php';


$Cliente = new ClienteDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$Cliente1 = $Cliente->SeleccionarTodos();
echo "<pre>";
print_r($Cliente1);
echo "</pre>";

$cargo = new CargoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);
$carg = $cargo->SeleccionarTodos();
echo "<pre>";
print_r($carg);
echo "</pre>";

?>



