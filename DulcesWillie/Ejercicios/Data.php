<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    </head>
    <body>
        <div class="container" style="margin-top: 90px; margin-left:auto;">  
            <div class="row">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Codigo de Barra</th>
                            <th>Nombre De Producto</th>
                            <th>Nombre Proveedor</th>
                            <th>NIT</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        
                        
                        
                        <?php
                            include "./config.php";
                            //Declaramos una varibale la cual tendra la sentencia QUERY de busqueda
                           // $SQL = 'SELECT IdCliente,NumerodocumentoCliente,TelefonoCliente,IdPersona FROM Cliente';
                            
                            $SQL = " SELECT CodigoBarras, ";
                            $SQL .= " NombreProducto, ";
                            $SQL .= " NombreProveedor, ";
                            $SQL .= " NitProveedor ";
                            $SQL .= " FROM proveedor AS pro ";
                            $SQL .= " INNER JOIN facturacompra AS fc ";
                            $SQL .= " ON pro.IdProveedor=fc.IdProveedor ";
                            $SQL .= " INNER JOIN detfacturacompra AS dfc "; 
                            $SQL .= " ON fc.IdFacturaCompra=dfc.IdFacturaCompra ";
                            $SQL .= " INNER JOIN producto AS pr "; 
                            $SQL .= " ON dfc.IdProducto=pr.IdProducto ";
                            $SQL .= " ORDER BY NombreProducto ASC; ";
                            $Query = mysqli_query($MyCon,$SQL)
                            //Mensaje que nos saldra si no cumple la funcion
                            or die ("Ha ocurrido un error con la sentencia QUERY verifique");
                            //Hacemos un ciclo while pra el llenado del select
                            //Declaramos una variable la cual uniremos con la en metodo MySql_fetch_array
                            // fetch es extraer los datos
                            while($row = mysqli_fetch_array($Query))
                            {                                                     
                        ?>
                        <tr>
                            <td><?php echo $row["CodigoBarras"];?></td>
                            <td><?php echo $row["NombreProducto"];?></td>
                            <td><?php echo $row["NombreProveedor"];?></td>
                            <td><?php echo $row["NitProveedor"];?></td>
                            <td><a href="actualizacion.php?CodigoBarras=<?php echo $row["CodigoBarras"]; ?>">actualizar</a></td>
                            <td><a href="Borrar.php?CodigoBarras=<?php echo $row["CodigoBarras"]; ?>">Eliminar</a></td>
                        </tr>
                            <?php } ?>

                    </tbody>

                </table>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>