<?php
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosEmpleado'])) {
    $actualizarDatosEmpleado = $_SESSION['actualizarDatosEmpleado'];
    unset($_SESSION['actualizarEmpleado']);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>
<center>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Empleado</h2>
    <h3 class="panel-title">Actualización de Empleado.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id Empleado" name="IdEmpleado" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php
                               if (isset($actualizarDatosEmpleado->IdEmpleado))
                                   echo $actualizarDatosEmpleado->IdEmpleado;
                               if (isset($erroresValidacion['datosViejos']['IdEmpleado']))
                                   echo $erroresValidacion['datosViejos']['IdEmpleado'];
                               if (isset($_SESSION['IdEmpleado']))
                                   echo $_SESSION['IdEmpleado'];
                               unset($_SESSION['IdEmpleado']);
                               ?>">                         
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Documento Identificacion Empleado" name="DocumentoEmpleado" type="number"   required="required" 
                               value="<?php
                               if (isset($actualizarDatosEmpleado->DocumentoEmpleado))
                                   echo $actualizarDatosEmpleado->DocumentoEmpleado;
                               if (isset($erroresValidacion['datosViejos']['DocumentoEmpleado']))
                                   echo $erroresValidacion['datosViejos']['DocumentoEmpleado'];
                               if (isset($_SESSION['DocumentoEmpleado']))
                                   echo $_SESSION['DocumentoEmpleado'];
                               unset($_SESSION['DocumentoEmpleado']);
                               ?>">                                     
                    <!--<p class="help-block">Example block-level help text here.</p>-->                      
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Nombre Empleado" name="NombreEmpleado" type="text"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosEmpleado->NombreEmpleado))
                                   echo $actualizarDatosEmpleado->NombreEmpleado;
                               if (isset($erroresValidacion['datosViejos']['NombreEmpleado']))
                                   echo $erroresValidacion['datosViejos']['NombreEmpleado'];
                               if (isset($_SESSION['NombreEmpleado']))
                                   echo $_SESSION['NombreEmpleado'];
                               unset($_SESSION['NombreEmpleado']);
                               ?>">  
                                <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Apellido Empleado" name="ApellidoEmpleado" type="text"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosEmpleado->ApellidoEmpleado))
                                   echo $actualizarDatosEmpleado->ApellidoEmpleado;
                               if (isset($erroresValidacion['datosViejos']['ApellidoEmpleado']))
                                   echo $erroresValidacion['datosViejos']['ApellidoEmpleado'];
                               if (isset($_SESSION['ApellidoEmpleado']))
                                   echo $_SESSION['ApellidoEmpleado'];
                               unset($_SESSION['ApellidoEmpleado']);
                               ?>">                                

<!--<p class="help-block">Example block-level help text here.</p>-->                          
                    </td>
                </tr>  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="DireccionEmpleado" name="DireccionEmpleado" type="text"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosEmpleado->DireccionEmpleado))
                                   echo $actualizarDatosEmpleado->DireccionEmpleado;
                               if (isset($erroresValidacion['datosViejos']['DireccionEmpleado']))
                                   echo $erroresValidacion['datosViejos']['DireccionEmpleado'];
                               if (isset($_SESSION['DireccionEmpleado']))
                                   echo $_SESSION['DireccionEmpleado'];
                               unset($_SESSION['DireccionEmpleado']);
                               ?>">  
                                <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                    </td>
                </tr> 
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Telefono Empleado" name="TelefonoEmpleado" type="number"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosEmpleado->TelefonoEmpleado))
                                   echo $actualizarDatosEmpleado->TelefonoEmpleado;
                               if (isset($erroresValidacion['datosViejos']['TelefonoEmpleado']))
                                   echo $erroresValidacion['datosViejos']['TelefonoEmpleado'];
                               if (isset($_SESSION['TelefonoEmpleado']))
                                   echo $_SESSION['TelefonoEmpleado'];
                               unset($_SESSION['TelefonoEmpleado']);
                               ?>">  
                                <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                    </td>
                </tr> 
                             
                <tr>            
                    <td>            
                        <button type="reset" name="ruta" value="cancelarActualizarEmpleado">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarEmpleado">Actualizar Empleado</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>
</center>