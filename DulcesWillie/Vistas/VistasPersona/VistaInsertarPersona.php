<?php


if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>
<center>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Empleado</h2>
    <h3 class="panel-title">Inserción de Empleado.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                      <input class="form-control" placeholder="Id Persona" name="IdPersona" type="number" pattern="" required="required" autofocus
                               value=<?php if (isset($erroresValidacion['datosViejos']['IdPersona'])) echo "\"" . $erroresValidacion['datosViejos']['IdPersona'] . "\""; 
                               if(isset($_SESSION['IdPersona'])) echo $_SESSION['IdPersona']; unset($_SESSION['IdPersona']);?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['IdPersona'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['IdPersona'] . "</font>"; ?> </div>  
                   <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>
                      <input class="form-control" placeholder="Documento Identificacion Persona" name="DocumentoIdentificacionPersona" type="number" pattern="" required="required" autofocus
                               value=<?php if (isset($erroresValidacion['datosViejos']['DocumentoIdentificacionPersona'])) echo "\"" . $erroresValidacion['datosViejos']['DocumentoIdentificacionPersona'] . "\""; 
                               if(isset($_SESSION['DocumentoIdentificacionPersona'])) echo $_SESSION['DocumentoIdentificacionPersona']; unset($_SESSION['DocumentoIdentificacionPersona']);?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['DocumentoIdentificacionPersona'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['DocumentoIdentificacionPersona'] . "</font>"; ?> </div>  
                   <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Nombre Persona" name="NombrePersona" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['NombrePersona'])) echo "\"" . $erroresValidacion['datosViejos']['NombrePersona'] . "\"";
                                if(isset($_SESSION['NombrePersona'])) echo $_SESSION['NombrePersona']; unset($_SESSION['NombrePersona']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['NombrePersona'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['NombrePersona'] . "</font>"; ?></div>                              

                                <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Apellido Persona" name="ApellidoPersona" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['ApellidoPersona'])) echo "\"" . $erroresValidacion['datosViejos']['ApellidoPersona'] . "\"";
                                if(isset($_SESSION['ApellidoPersona'])) echo $_SESSION['ApellidoPersona']; unset($_SESSION['ApellidoPersona']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['ApellidoPersona'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['ApellidoPersona'] . "</font>"; ?></div>                              

                                <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="DireccionPersona" name="DireccionPersona" type="text"  required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['DireccionPersona'])) echo "\"" . $erroresValidacion['datosViejos']['DireccionPersona'] . "\""; 
                               if(isset($_SESSION['DireccionPersona'])) echo $_SESSION['DireccionPersona']; unset($_SESSION['DireccionPersona']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['DireccionPersona'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['DireccionPersona'] . "</font>"; ?></div> 
                    </td>
                </tr>   
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Telefono Persona" name="TelefonoPersona" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['TelefonoPersona'])) echo "\"" . $erroresValidacion['datosViejos']['TelefonoPersona'] . "\"";
                                if(isset($_SESSION['TelefonoPersona'])) echo $_SESSION['TelefonoPersona']; unset($_SESSION['TelefonoPersona']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['TelefonoPersona'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['TelefonoPersona'] . "</font>"; ?></div>                              

                                <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                                                    
                <tr>
                    <td>            
                        <button type="button" name="ruta" value="cancelarInsertarPersona">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarPersona">Agregar Proveedor</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
</center>