<?php
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosPersona'])) {
    $actualizarDatosPersona = $_SESSION['actualizarDatosPersona'];
    unset($_SESSION['actualizarPersona']);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Persona</h2>
    <h3 class="panel-title">Actualización de Persona.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id Persona" name="IdPersona" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php
                               if (isset($actualizarDatosPersona->IdPersona))
                                   echo $actualizarDatosPersona->IdPersona;
                               if (isset($erroresValidacion['datosViejos']['IdPersona']))
                                   echo $erroresValidacion['datosViejos']['IdPersona'];
                               if (isset($_SESSION['IdPersona']))
                                   echo $_SESSION['IdPersona'];
                               unset($_SESSION['IdPersona']);
                               ?>">                         
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Documento Identificacion Persona" name="DocumentoIdentificacionPersona" type="number"   required="required" 
                               value="<?php
                               if (isset($actualizarDatosPersona->DocumentoIdentificacionPersona))
                                   echo $actualizarDatosPersona->DocumentoIdentificacionPersona;
                               if (isset($erroresValidacion['datosViejos']['DocumentoIdentificacionPersona']))
                                   echo $erroresValidacion['datosViejos']['DocumentoIdentificacionPersona'];
                               if (isset($_SESSION['DocumentoIdentificacionPersona']))
                                   echo $_SESSION['DocumentoIdentificacionPersona'];
                               unset($_SESSION['DocumentoIdentificacionPersona']);
                               ?>">                                     
                    <!--<p class="help-block">Example block-level help text here.</p>-->                      
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Nombre Persona" name="NombrePersona" type="text"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosPersona->NombrePersona))
                                   echo $actualizarDatosPersona->NombrePersona;
                               if (isset($erroresValidacion['datosViejos']['NombrePersona']))
                                   echo $erroresValidacion['datosViejos']['NombrePersona'];
                               if (isset($_SESSION['NombrePersona']))
                                   echo $_SESSION['NombrePersona'];
                               unset($_SESSION['NombrePersona']);
                               ?>">  
                                <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Apellido Persona" name="ApellidoPersona" type="text"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosPersona->ApellidoPersona))
                                   echo $actualizarDatosPersona->ApellidoPersona;
                               if (isset($erroresValidacion['datosViejos']['ApellidoPersona']))
                                   echo $erroresValidacion['datosViejos']['ApellidoPersona'];
                               if (isset($_SESSION['ApellidoPersona']))
                                   echo $_SESSION['ApellidoPersona'];
                               unset($_SESSION['ApellidoPersona']);
                               ?>">                                

<!--<p class="help-block">Example block-level help text here.</p>-->                          
                    </td>
                </tr>  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="DireccionPersona" name="DireccionPersona" type="number"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosPersona->DireccionPersona))
                                   echo $actualizarDatosPersona->DireccionPersona;
                               if (isset($erroresValidacion['datosViejos']['DireccionPersona']))
                                   echo $erroresValidacion['datosViejos']['DireccionPersona'];
                               if (isset($_SESSION['DireccionPersona']))
                                   echo $_SESSION['DireccionPersona'];
                               unset($_SESSION['DireccionPersona']);
                               ?>">  
                                <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                    </td>
                </tr> 
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Telefono Persona" name="TelefonoPersona" type="number"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosPersona->TelefonoPersona))
                                   echo $actualizarDatosPersona->TelefonoPersona;
                               if (isset($erroresValidacion['datosViejos']['TelefonoPersona']))
                                   echo $erroresValidacion['datosViejos']['TelefonoPersona'];
                               if (isset($_SESSION['TelefonoPersona']))
                                   echo $_SESSION['TelefonoPersona'];
                               unset($_SESSION['TelefonoPersona']);
                               ?>">  
                                <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                    </td>
                </tr> 
                             
                <tr>            
                    <td>            
                        <button type="reset" name="ruta" value="cancelarActualizarPersona">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarPersona">Actualizar Proveedor</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>