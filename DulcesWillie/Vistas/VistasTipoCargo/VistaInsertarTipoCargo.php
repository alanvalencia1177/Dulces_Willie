<?php

//verificamos si la sesion contiene algun dato
if( isset($_SESSION['Resul']))
{
    //asignando el valor a ina variable 
    $Resul = $_SESSION['Resul'];
   //Hacemos un conteo de la variable 
    $Conteo = count($Resul);
}

if (isset($_SESSION['listaDeTipoCargo'])) {
    $listaDeTipoCargo = $_SESSION['listaDeTipoCargo'];
}

if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
if (isset($_SESSION['actualizarDatosTipoCargo'])) {
    $actualizarDatosTipoCargo = $_SESSION['actualizarDatosTipoCargo'];
    unset($_SESSION['actualizarTipoCargo']);
}
?>
<table border=1 class="table-responsive"  align ="center">    
<tr>
    <td colspan="3">
    <div class="panel-heading">
        <h4 class="panel-title" align ="center">Gestión de tipo de cargo</h4>
    </div>
    </td>
</tr>
<tr>
    <td >
    <center>
    <div>
        
    <fieldset>
        <legend>Formulario Tipo de Cargo</legend>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>Seleccione el cargo</td>
                </tr>
                <tr>
                    <td>
                        <select id='Cargo' name='Cargo_IdCargo'>
                            <?php
                                //Hacemos un ciclo for para llenar el combo
                                for($j=0; $j<$Conteo; $j++)
                                {
                            ?>
                            <option value="<?php echo $Resul[$j]->IdCargo ?>"><?php echo $Resul[$j]->IdCargo ?> - <?php echo $Resul[$j]->NombreCargo ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nombre tipo cargo</td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Nombre tipo de cargo" name="NombreTipoCargo" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['NombreTipoCargo'])) echo "\"" . $erroresValidacion['datosViejos']['NombreTipoCargo'] . "\"";
                                if(isset($_SESSION['NombreTipoCargo'])) echo $_SESSION['NombreTipoCargo']; unset($_SESSION['NombreTipoCargo']);?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['NombreTipoCargo'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['NombreTipoCargo'] . "</font>"; ?></div>                              

                        

                                    <?php
                                    
                                   
                                
                                    ?>




                        
                        <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>  
                <tr>
                    <td>Descripcion tipo cargo</td>
                </tr>               
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Descripcion Tipo de Cargo" name="DescripcionTipoCargo" type="text"  required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['DescripcionTipoCargo'])) echo "\"" . $erroresValidacion['datosViejos']['DescripcionTipoCargo'] . "\""; 
                               if(isset($_SESSION['DescripcionTipoCargo'])) echo $_SESSION['DescripcionTipoCargo']; unset($_SESSION['DescripcionTipoCargo']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['DescripcionTipoCargo'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['DescripcionTipoCargo'] . "</font>"; ?></div>                      

                    </td>
                </tr>                       
                <tr>
                    <td>    
                        <a href="Controlador.php?ruta=Movimiento"><button type="button" name="ruta" value="Movimiento">Atras</button></a>&nbsp;&nbsp;||&nbsp;&nbsp;         
                        <button type="reset" name="ruta" value="cancelarInsertarTipoCargo">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarTipoCargo">Agregar Proveedor</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
   
</div>
</center>
</td>
</tr>
<tr>
<td colspan="0">
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
                <td><?php echo $listaDeTipoCargo[$i]->NombreTipoCargo; ?></td> 
                <!--<td>d>-->  
                <td><a href="Controlador.php?ruta=actualizarTipoCargo&idAct=<?php echo $listaDeTipoCargo[$i]->IdTipoCargo; ?>">Actualizar</a></td>  
                <td><a href="Controlador.php?ruta=eliminarTipoCargo&idAct=<?php echo $listaDeTipoCargo[$i]->IdTipoCargo; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
            </tr>   
            <?php $i++;
        } ?>
    </tbody>
</table>
    </td>
</tr>
    </table>


   
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
                $(document).ready(function () {
                    $('#example').DataTable();
                });
</script>
<!--https://eldesvandejose.com/category/jquery/hacks-y-recursos/el-plugin-datatables-->

