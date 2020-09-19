<?php
if (isset($_SESSION['listaDeTipoCargo'])) {
    $listaDeTipoCargo = $_SESSION['listaDeTipoCargo'];
}
?>

<table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
    <thead>
        <tr>
            <th>IdCargo</th> 
            <th>NombreCargo</th> 
            <th>DescripcionCargo</th>
            <!--<th>Estado</th>--> 
            <th>Edit</th> 
            <th>Delete</th> 
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($listaDeTipoCargo as $key => $value) {
            ?>
            <tr>
                <td><?php echo $listaDeTipoCargo[$i]->IdTipoCargo; ?></td>  
                <td><?php echo $listaDeTipoCargo[$i]->NombreTipoCargo; ?></td> 
                
                <!--<td>d>-->  
                <td><a href="Controlador.php?ruta=actualizarTipoCargo&idAct=<?php echo $listaDeTipoCargo[$i]->IdTipoCargo; ?>">Actualizar</a></td>  
                <td><a href="Controlador.php?ruta=eliminarTipoCargo&idAct=<?php echo $listaDeTipoCargo[$i]->IdTipoCargo; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
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
