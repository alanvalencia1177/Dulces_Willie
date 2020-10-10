<?php


if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>
<center>

<div class="panel-heading">
    <br><br><br><br>
    <h2 class="panel-title">Gestión de Cargo</h2>
    <h3 class="panel-title">Inserción de Cargo.</h3>
    <br><br>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                       <input class="form-control" placeholder="Id Cargo" name="IdCargo" type="number" pattern="" required="required" autofocus
                               value=<?php if (isset($erroresValidacion['datosViejos']['IdCargo'])) echo "\"" . $erroresValidacion['datosViejos']['IdCargo'] . "\""; 
                               if(isset($_SESSION['IdCargo'])) echo $_SESSION['IdCargo']; unset($_SESSION['IdCargo']);?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['IdCargo'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['IdCargo'] . "</font>"; ?> </div>  
                   <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
              
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Nombre Cargo" name="NombreCargo" type="text"   required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['NombreCargo'])) echo "\"" . $erroresValidacion['datosViejos']['NombreCargo'] . "\"";
                                if(isset($_SESSION['NombreCargo'])) echo $_SESSION['NombreCargo']; unset($_SESSION['NombreCargo']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['NombreCargo'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['NombreCargo'] . "</font>"; ?></div>                              

                                <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>       
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Descripcion Cargo" name="DescripcionCargo" type="text"  required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['DescripcionCargo'])) echo "\"" . $erroresValidacion['datosViejos']['DescripcionCargo'] . "\""; 
                               if(isset($_SESSION['DescripcionCargo'])) echo $_SESSION['DescripcionCargo']; unset($_SESSION['DescripcionCargo']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['DescripcionCargo'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['DescripcionCargo'] . "</font>"; ?></div>                      

                    </td>
                </>                       
                <tr>
                    <td>            
                        <button type="button" name="ruta" value="cancelarInsertarCargo">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarCargo">Agregar Cargo</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
</center>