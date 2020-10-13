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
                      <input class="form-control" placeholder="Id Empleado" name="IdEmpleado" type="number" pattern="" required="required" autofocus
                               value=<?php if (isset($erroresValidacion['datosViejos']['IdEmpleado'])) echo "\"" . $erroresValidacion['datosViejos']['IdEmpleado'] . "\""; 
                               if(isset($_SESSION['IdEmpleado'])) echo $_SESSION['IdEmpleado']; unset($_SESSION['IdEmpleado']);?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['IdEmpleado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['IdEmpleado'] . "</font>"; ?> </div>  
                   <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>
                      <input class="form-control" placeholder="Documento Identificacion Empleado" name="DocumentoEmpleado" type="number" pattern="" required="required" autofocus
                               value=<?php if (isset($erroresValidacion['datosViejos']['DocumentoEmpleado'])) echo "\"" . $erroresValidacion['datosViejos']['DocumentoEmpleado'] . "\""; 
                               if(isset($_SESSION['DocumentoEmpleado'])) echo $_SESSION['DocumentoEmpleado']; unset($_SESSION['DocumentoEmpleado']);?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['DocumentoEmpleado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['DocumentoEmpleado'] . "</font>"; ?> </div>  
                   <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Nombre Empleado" name="NombreEmpleado" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['NombreEmpleado'])) echo "\"" . $erroresValidacion['datosViejos']['NombreEmpleado'] . "\"";
                                if(isset($_SESSION['NombreEmpleado'])) echo $_SESSION['NombreEmpleado']; unset($_SESSION['NombreEmpleado']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['NombreEmpleado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['NombreEmpleado'] . "</font>"; ?></div>                              

                                <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Apellido Empleado" name="ApellidoEmpleado" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['ApellidoEmpleado'])) echo "\"" . $erroresValidacion['datosViejos']['ApellidoEmpleado'] . "\"";
                                if(isset($_SESSION['ApellidoEmpleado'])) echo $_SESSION['ApellidoEmpleado']; unset($_SESSION['ApellidoEmpleado']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['ApellidoEmpleado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['ApellidoEmpleado'] . "</font>"; ?></div>                              

                                <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="DireccionEmpleado" name="DireccionEmpleado" type="text"  required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['DireccionEmpleado'])) echo "\"" . $erroresValidacion['datosViejos']['DireccionEmpleado'] . "\""; 
                               if(isset($_SESSION['DireccionEmpleado'])) echo $_SESSION['DireccionEmpleado']; unset($_SESSION['DireccionEmpleado']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['DireccionEmpleado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['DireccionEmpleado'] . "</font>"; ?></div> 
                    </td>
                </tr>   
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Telefono Empleado" name="TelefonoEmpleado" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['TelefonoEmpleado'])) echo "\"" . $erroresValidacion['datosViejos']['TelefonoEmpleado'] . "\"";
                                if(isset($_SESSION['TelefonoEmpleado'])) echo $_SESSION['TelefonoEmpleado']; unset($_SESSION['TelefonoEmpleado']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['TelefonoEmpleado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['TelefonoEmpleado'] . "</font>"; ?></div>                              

                                <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                                                    
                <tr>
                    <td>            
                        <button type="button" name="ruta" value="cancelarInsertarEmpleado">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarEmpleado">Agregar Proveedor</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
</center>