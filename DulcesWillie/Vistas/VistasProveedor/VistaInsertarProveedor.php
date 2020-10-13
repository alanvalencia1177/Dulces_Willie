<?php


if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>
<br>
<center>
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
                        <input class="form-control" placeholder="Nombre Proveedor" name="NombreProveedor" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['NombreProveedor'])) echo "\"" . $erroresValidacion['datosViejos']['NombreProveedor'] . "\"";
                                if(isset($_SESSION['NombreProveedor'])) echo $_SESSION['NombreProveedor']; unset($_SESSION['NombreProveedor']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['NombreProveedor'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['NombreProveedor'] . "</font>"; ?></div>                              

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
                        <a href="Controlador.php?ruta=Movimiento"><button type="button" name="ruta" value="Movimiento">Atras</button></a>&nbsp;&nbsp;||&nbsp;&nbsp;          
                        <button type="button" name="ruta" value="cancelarInsertarProveedor">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarProveedor">Agregar Proveedor</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
</center>


