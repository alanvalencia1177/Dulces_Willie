<?php


if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>
<center>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Cliente</h2>
    <h3 class="panel-title">Inserción de Cliente.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                      <input class="form-control" placeholder="Id Cliente" name="IdCliente" type="number" pattern="" required="required" autofocus
                               value=<?php if (isset($erroresValidacion['datosViejos']['IdCliente'])) echo "\"" . $erroresValidacion['datosViejos']['IdCliente'] . "\""; 
                               if(isset($_SESSION['IdCliente'])) echo $_SESSION['IdCliente']; unset($_SESSION['IdCliente']);?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['IdCliente'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['IdCliente'] . "</font>"; ?> </div>  
                   <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>
                      <input class="form-control" placeholder="Documento Identificacion Cliente" name="DocumentoCliente" type="number" pattern="" required="required" autofocus
                               value=<?php if (isset($erroresValidacion['datosViejos']['DocumentoCliente'])) echo "\"" . $erroresValidacion['datosViejos']['DocumentoCliente'] . "\""; 
                               if(isset($_SESSION['DocumentoCliente'])) echo $_SESSION['DocumentoCliente']; unset($_SESSION['DocumentoCliente']);?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['DocumentoCliente'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['DocumentoCliente'] . "</font>"; ?> </div>  
                   <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Nombre Cliente" name="NombreCliente" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['NombreCliente'])) echo "\"" . $erroresValidacion['datosViejos']['NombreCliente'] . "\"";
                                if(isset($_SESSION['NombreCliente'])) echo $_SESSION['NombreCliente']; unset($_SESSION['NombreCliente']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['NombreCliente'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['NombreCliente'] . "</font>"; ?></div>                              

                                <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Apellido Cliente" name="ApellidoCliente" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['ApellidoCliente'])) echo "\"" . $erroresValidacion['datosViejos']['ApellidoCliente'] . "\"";
                                if(isset($_SESSION['ApellidoCliente'])) echo $_SESSION['ApellidoCliente']; unset($_SESSION['ApellidoCliente']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['ApellidoCliente'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['ApellidoCliente'] . "</font>"; ?></div>                              

                                <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="DireccionCliente" name="DireccionCliente" type="text"  required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['DireccionCliente'])) echo "\"" . $erroresValidacion['datosViejos']['DireccionCliente'] . "\""; 
                               if(isset($_SESSION['DireccionCliente'])) echo $_SESSION['DireccionCliente']; unset($_SESSION['DireccionCliente']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['DireccionCliente'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['DireccionCliente'] . "</font>"; ?></div> 
                    </td>
                </tr>   
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Telefono Cliente" name="TelefonoCliente" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['TelefonoCliente'])) echo "\"" . $erroresValidacion['datosViejos']['TelefonoCliente'] . "\"";
                                if(isset($_SESSION['TelefonoCliente'])) echo $_SESSION['TelefonoCliente']; unset($_SESSION['TelefonoCliente']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['TelefonoCliente'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['TelefonoCliente'] . "</font>"; ?></div>                              

                                <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                                                    
                <tr>
                    <td>            
                        <button type="button" name="ruta" value="cancelarInsertarCliente">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarCliente">Agregar Proveedor</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
</center>