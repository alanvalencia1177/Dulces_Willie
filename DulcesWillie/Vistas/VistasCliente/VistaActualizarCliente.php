<?php
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosCliente'])) {
    $actualizarDatosCliente = $_SESSION['actualizarDatosCliente'];
    unset($_SESSION['actualizarCliente']);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>
<center>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Cliente </h2>
    <h3 class="panel-title">Actualización de Cliente   .</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id Cliente" name="IdCliente   " type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php
                               if (isset($actualizarDatosCliente   ->IdCliente))
                                   echo $actualizarDatosCliente->IdCliente ;
                               if (isset($erroresValidacion['datosViejos']['IdCliente  ']))
                                   echo $erroresValidacion['datosViejos']['IdCliente   '];
                               if (isset($_SESSION['IdCliente  ']))
                                   echo $_SESSION['IdCliente   '];
                               unset($_SESSION['IdCliente  ']);
                               ?>">                         
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Documento Identificacion Cliente  " name="DocumentoCliente  " type="number"   required="required" 
                               value="<?php
                               if (isset($actualizarDatosCliente   ->DocumentoCliente ))
                                   echo $actualizarDatosCliente->DocumentoCliente  ;
                               if (isset($erroresValidacion['datosViejos']['DocumentoCliente   ']))
                                   echo $erroresValidacion['datosViejos']['DocumentoCliente'];
                               if (isset($_SESSION['DocumentoCliente   ']))
                                   echo $_SESSION['DocumentoCliente'];
                               unset($_SESSION['DocumentoCliente   ']);
                               ?>">                                     
                    <!--<p class="help-block">Example block-level help text here.</p>-->                      
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Nombre Cliente" name="NombreCliente   " type="text"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosCliente   ->NombreCliente))
                                   echo $actualizarDatosCliente->NombreCliente ;
                               if (isset($erroresValidacion['datosViejos']['NombreCliente  ']))
                                   echo $erroresValidacion['datosViejos']['NombreCliente   '];
                               if (isset($_SESSION['NombreCliente  ']))
                                   echo $_SESSION['NombreCliente   '];
                               unset($_SESSION['NombreCliente  ']);
                               ?>">  
                                <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Apellido Cliente  " name="ApellidoCliente   " type="text"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosCliente   ->ApellidoCliente  ))
                                   echo $actualizarDatosCliente->ApellidoCliente   ;
                               if (isset($erroresValidacion['datosViejos']['ApellidoCliente']))
                                   echo $erroresValidacion['datosViejos']['ApellidoCliente '];
                               if (isset($_SESSION['ApellidoCliente']))
                                   echo $_SESSION['ApellidoCliente '];
                               unset($_SESSION['ApellidoCliente']);
                               ?>">                                

<!--<p class="help-block">Example block-level help text here.</p>-->                          
                    </td>
                </tr>  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="DireccionCliente  " name="DireccionCliente  " type="text"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosCliente   ->DireccionCliente ))
                                   echo $actualizarDatosCliente->DireccionCliente  ;
                               if (isset($erroresValidacion['datosViejos']['DireccionCliente   ']))
                                   echo $erroresValidacion['datosViejos']['DireccionCliente'];
                               if (isset($_SESSION['DireccionCliente   ']))
                                   echo $_SESSION['DireccionCliente'];
                               unset($_SESSION['DireccionCliente   ']);
                               ?>">  
                                <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                    </td>
                </tr> 
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Telefono Cliente  " name="TelefonoCliente   " type="number"  required="required" 
                               value="<?php
                               if (isset($actualizarDatosCliente   ->TelefonoCliente  ))
                                   echo $actualizarDatosCliente->TelefonoCliente   ;
                               if (isset($erroresValidacion['datosViejos']['TelefonoCliente']))
                                   echo $erroresValidacion['datosViejos']['TelefonoCliente '];
                               if (isset($_SESSION['TelefonoCliente']))
                                   echo $_SESSION['TelefonoCliente '];
                               unset($_SESSION['TelefonoCliente']);
                               ?>">  
                                <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                    </td>
                </tr> 
                             
                <tr>            
                    <td>            
                        <button type="reset" name="ruta" value="cancelarActualizarCliente  ">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarCliente ">Actualizar Cliente </button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>
</center>