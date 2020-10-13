<?php
if (isset($_SESSION['listaDeProveedor'])) {
    $listaDeProveedor = $_SESSION['listaDeProveedor'];
}
  
?>

<table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
    <thead>
        <tr>
            <th>IdProveedor</th> 
            <th>NombreProveedor</th> 
            <th>NitProveedor</th> 
            <th>DescripcionProveedor</th> 
            <!--<th>Estado</th>--> 
            <th>Edit</th> 
            <th>Delete</th> 
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($listaDeProveedor as $key => $value) {
            ?>
            <tr>
                <td><?php echo $listaDeProveedor[$i]->IdProveedor; ?></td>  
                <td><?php echo $listaDeProveedor[$i]->NombreProveedor; ?></td>  
                <td><?php echo $listaDeProveedor[$i]->NitProveedor; ?></td>  
                <td><?php echo $listaDeProveedor[$i]->DescripcionProveedor; ?></td>  
                <!--<td>d>-->  
                <td><a href="Controlador.php?ruta=actualizarProveedor&idAct=<?php echo $listaDeProveedor[$i]->IdProveedor; ?>">Actualizar</a></td>  
                <td><a href="Controlador.php?ruta=eliminarProveedor&idAct=<?php echo $listaDeProveedor[$i]->IdProveedor; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
            </tr>   
            <?php $i++;
        } ?>
    </tbody>
</table>
   
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
                $(document).ready(function () {
                    $('#example').DataTable();
                });
</script>
<!--https://eldesvandejose.com/category/jquery/hacks-y-recursos/el-plugin-datatables-->