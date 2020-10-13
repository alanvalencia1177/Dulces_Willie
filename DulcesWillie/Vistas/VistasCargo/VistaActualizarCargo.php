<?php
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosCargo'])) {
    $actualizarDatosCargo = $_SESSION['actualizarDatosCargo'];
    unset($_SESSION['actualizarCargo']);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Cargo</h2>
    <h3 class="panel-title">Actualización de Cargo.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id Cargo" name="IdCargo" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php
                               if (isset($actualizarDatosCargo->IdCargo))
                                   echo $actualizarDatosCargo->IdCargo;
                               if (isset($erroresValidacion['datosViejos']['IdCargo']))
                                   echo $erroresValidacion['datosViejos']['IdCargo'];
                               if (isset($_SESSION['IdCargo']))
                                   echo $_SESSION['IdCargo'];
                               unset($_SESSION['IdCargo']);
                               ?>">                         
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Nombre Cargo" name="NombreCargo" type="text"   required="required" 
                               value="<?php
                               if (isset($actualizarDatosCargo->NombreCargo))
                                   echo $actualizarDatosCargo->NombreCargo;
                               if (isset($erroresValidacion['datosViejos']['NombreCargo']))
                                   echo $erroresValidacion['datosViejos']['NombreCargo'];
                               if (isset($_SESSION['NombreCargo']))
                                   echo $_SESSION['NombreCargo'];
                               unset($_SESSION['NombreCargo']);
                               ?>">                                     
                    <!--<p class="help-block">Example block-level help text here.</p>-->                      
                    </td>
                </tr>
                          
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Descripcion Cargo" name="DescripcionCargo" type="text"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosCargo->DescripcionCargo))
                                   echo $actualizarDatosCargo->DescripcionCargo;
                               if (isset($erroresValidacion['datosViejos']['DescripcionCargo']))
                                   echo $erroresValidacion['datosViejos']['DescripcionCargo'];
                               if (isset($_SESSION['DescripcionCargo']))
                                   echo $_SESSION['DescripcionCargo'];
                               unset($_SESSION['DescripcionCargo']);
                               ?>">                                

<!--<p class="help-block">Example block-level help text here.</p>-->                          
                    </td>
                </tr>  
                             
                <tr>            
                    <td>    
                        <a href="Controlador.php?ruta=Movimiento"><button type="button" name="ruta" value="Movimiento">Atras</button></a>        
                        <button type="reset" name="ruta" value="cancelarActualizarCargo">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarCargo">Actualizar Proveedor</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>
