<?php
if (isset($_SESSION['listaDePersona'])) {
    $listaDePersona = $_SESSION['listaDePersona'];
}

?>

<table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
    <thead>
        <tr>
            <th>IdPersona</th> 
            <th>DocumentoIdentificacionPersona</th> 
            <th>NombrePersona</th> 
            <th>ApellidoPersona</th>  
            <th>DireccionPersona</th>  
            <th>TelefonoPersona</th> 
            <!--<th>Estado</th>--> 
            <th>Edit</th> 
            <th>Delete</th> 
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($listaDePersona as $key => $value) {
            ?>
            <tr>
                <td><?php echo $listaDePersona[$i]->IdPersona; ?></td>  
                <td><?php echo $listaDePersona[$i]->DocumentoIdentificacionPersona; ?></td>  
                <td><?php echo $listaDePersona[$i]->NombrePersona; ?></td>  
                <td><?php echo $listaDePersona[$i]->ApellidoPersona; ?></td>  
                <td><?php echo $listaDePersona[$i]->DireccionPersona; ?></td>  
                <td><?php echo $listaDePersona[$i]->TelefonoPersona; ?></td>  
                <!--<td>d>-->  
                <td><a href="Controlador.php?ruta=actualizarPersona&idAct=<?php echo $listaDePersona[$i]->IdPersona; ?>">Actualizar</a></td>  
                <td><a href="Controlador.php?ruta=eliminarPersona&idAct=<?php echo $listaDePersona[$i]->IdPersona; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
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
