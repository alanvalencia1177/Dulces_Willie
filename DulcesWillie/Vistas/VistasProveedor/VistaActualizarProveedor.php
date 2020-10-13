<?php
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosProveedor'])) {
    $actualizarDatosProveedor = $_SESSION['actualizarDatosProveedor'];
    unset($_SESSION['actualizarProveedor']);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Proveedor</h2>
    <h3 class="panel-title">Actualización de Proveedor.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id Proveedor" name="IdProveedor" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php
                               if (isset($actualizarDatosProveedor->IdProveedor))
                                   echo $actualizarDatosProveedor->IdProveedor;
                               if (isset($erroresValidacion['datosViejos']['IdProveedor']))
                                   echo $erroresValidacion['datosViejos']['IdProveedor'];
                               if (isset($_SESSION['IdProveedor']))
                                   echo $_SESSION['IdProveedor'];
                               unset($_SESSION['IdProveedor']);
                               ?>">                         
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Nombre Proveedor" name="NombreProveedor" type="text"   required="required" 
                               value="<?php
                               if (isset($actualizarDatosProveedor->NombreProveedor))
                                   echo $actualizarDatosProveedor->NombreProveedor;
                               if (isset($erroresValidacion['datosViejos']['NombreProveedor']))
                                   echo $erroresValidacion['datosViejos']['NombreProveedor'];
                               if (isset($_SESSION['NombreProveedor']))
                                   echo $_SESSION['NombreProveedor'];
                               unset($_SESSION['NombreProveedor']);
                               ?>">                                     
                    <!--<p class="help-block">Example block-level help text here.</p>-->                      
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Nit Proveedor" name="NitProveedor" type="number"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosProveedor->NitProveedor))
                                   echo $actualizarDatosProveedor->NitProveedor;
                               if (isset($erroresValidacion['datosViejos']['NitProveedor']))
                                   echo $erroresValidacion['datosViejos']['NitProveedor'];
                               if (isset($_SESSION['NitProveedor']))
                                   echo $_SESSION['NitProveedor'];
                               unset($_SESSION['NitProveedor']);
                               ?>">  
                                <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Descripcion Proveedor" name="DescripcionProveedor" type="text"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosProveedor->DescripcionProveedor))
                                   echo $actualizarDatosProveedor->DescripcionProveedor;
                               if (isset($erroresValidacion['datosViejos']['DescripcionProveedor']))
                                   echo $erroresValidacion['datosViejos']['DescripcionProveedor'];
                               if (isset($_SESSION['DescripcionProveedor']))
                                   echo $_SESSION['DescripcionProveedor'];
                               unset($_SESSION['DescripcionProveedor']);
                               ?>">                                

<!--<p class="help-block">Example block-level help text here.</p>-->                          
                    </td>
                </tr>  
                             
                <tr>            
                    <td>   
                        <a href="Controlador.php?ruta=Movimiento"><button type="button" name="ruta" value="Movimiento">Atras</button></a>&nbsp;&nbsp;||&nbsp;&nbsp;          
                        <button type="reset" name="ruta" value="cancelarActualizarProveedor">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarProveedor">Actualizar Proveedor</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>