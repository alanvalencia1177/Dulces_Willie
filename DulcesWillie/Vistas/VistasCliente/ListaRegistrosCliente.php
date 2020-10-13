<?php
if (isset($_SESSION['listaDeCliente'])) {
    $listaDeCliente = $_SESSION['listaDeCliente'];
}

?>

<table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
    <thead>
        <tr>
            <th>IdCliente</th> 
            <th>DocumentoCliente</th> 
            <th>NombreCliente</th> 
            <th>ApellidoCliente</th>  
            <th>DireccionCliente</th>  
            <th>TelefonoCliente</th> 
            <!--<th>Estado</th>--> 
            <th>Edit</th> 
            <th>Delete</th> 
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($listaDeCliente as $key => $value) {
            ?>
            <tr>
                <td><?php echo $listaDeCliente[$i]->IdCliente; ?></td>  
                <td><?php echo $listaDeCliente[$i]->DocumentoCliente; ?></td>  
                <td><?php echo $listaDeCliente[$i]->NombreCliente; ?></td>  
                <td><?php echo $listaDeCliente[$i]->ApellidoCliente; ?></td>  
                <td><?php echo $listaDeCliente[$i]->DireccionCliente; ?></td>  
                <td><?php echo $listaDeCliente[$i]->TelefonoCliente; ?></td>  
                <!--<td>d>-->  
                <td><a href="Controlador.php?ruta=actualizarCliente&idAct=<?php echo $listaDeCliente[$i]->IdCliente; ?>">Actualizar</a></td>  
                <td><a href="Controlador.php?ruta=eliminarCliente&idAct=<?php echo $listaDeCliente[$i]->IdCliente; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
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
