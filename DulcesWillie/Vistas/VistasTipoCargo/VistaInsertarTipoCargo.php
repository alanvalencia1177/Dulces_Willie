<?php

//verificamos si la sesion contiene algun dato
if( isset($_SESSION['Resul']))
{
    //asignando el valor a ina variable 
    $Resul = $_SESSION['Resul'];
   //Hacemos un conteo de la variable 
    $Conteo = count($Resul);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Proveedor</h2>
    <h3 class="panel-title">Inserción de Proveedor.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
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
                    <td>                
                        <input class="form-control" placeholder="Nombre tipo de cargo" name="NombreTipoCargo" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['NombreTipoCargo'])) echo "\"" . $erroresValidacion['datosViejos']['NombreTipoCargo'] . "\"";
                                if(isset($_SESSION['NombreTipoCargo'])) echo $_SESSION['NombreTipoCargo']; unset($_SESSION['NombreTipoCargo']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['NombreTipoCargo'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['NombreTipoCargo'] . "</font>"; ?></div>                              

                                <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Nit Proveedor" name="NitProveedor" type="text"  required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['NitProveedor'])) echo "\"" . $erroresValidacion['datosViejos']['NitProveedor'] . "\""; 
                               if(isset($_SESSION['NitProveedor'])) echo $_SESSION['NitProveedor']; unset($_SESSION['NitProveedor']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['NitProveedor'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['NitProveedor'] . "</font>"; ?></div> 
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Descripcion Proveedor" name="DescripcionProveedor" type="text"  required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['DescripcionProveedor'])) echo "\"" . $erroresValidacion['datosViejos']['DescripcionProveedor'] . "\""; 
                               if(isset($_SESSION['DescripcionProveedor'])) echo $_SESSION['DescripcionProveedor']; unset($_SESSION['DescripcionProveedor']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['DescripcionProveedor'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['DescripcionProveedor'] . "</font>"; ?></div>                      

                    </td>
                </tr>                       
                <tr>
                    <td>            
                        <button type="button" name="ruta" value="cancelarInsertarTipoCargo">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarTipoCargo">Agregar Proveedor</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>



