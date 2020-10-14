<?php
if (isset($_SESSION['listaDeEmpleado'])) {
    $listaDeEmpleado = $_SESSION['listaDeEmpleado'];
}

?>

<table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
    <thead>
        <tr>
            <th>IdEmpleado</th> 
            <th>DocumentoEmpleado</th> 
            <th>NombreEmpleado</th> 
            <th>ApellidoEmpleado</th>  
            <th>DireccionEmpleado</th>  
            <th>TelefonoEmpleado</th> 
            <!--<th>Estado</th>--> 
            <th>Edit</th> 
            <th>Delete</th> 
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($listaDeEmpleado as $key => $value) {
            ?>
            <tr>
                <td><?php echo $listaDeEmpleado[$i]->IdEmpleado; ?></td>  
                <td><?php echo $listaDeEmpleado[$i]->DocumentoEmpleado; ?></td>  
                <td><?php echo $listaDeEmpleado[$i]->NombreEmpleado; ?></td>  
                <td><?php echo $listaDeEmpleado[$i]->ApellidoEmpleado; ?></td>  
                <td><?php echo $listaDeEmpleado[$i]->DireccionEmpleado; ?></td>  
                <td><?php echo $listaDeEmpleado[$i]->TelefonoEmpleado; ?></td>  
                <!--<td>d>-->  
                <td><a href="Controlador.php?ruta=actualizarEmpleado&idAct=<?php echo $listaDeEmpleado[$i]->IdEmpleado; ?>">Actualizar</a></td>  
                <td><a href="Controlador.php?ruta=eliminarEmpleado&idAct=<?php echo $listaDeEmpleado[$i]->IdEmpleado; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
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
