<?php
/*
 echo "<pre>";
    print_r($_SESSION);
 echo "</pre>";
 */
 //Limpiamos la sesion 
 if( isset($_SESSION['Resul']))
 {
     $Resul = $_SESSION['Resul'];
     //Definimos una varuable que me va a contar o servir de contador
     $Conteo = count($Resul);
 }

?>
        <center>
            <div>
                <fieldset>
                    <legend>Formulario tipo de cargo</legend>
                    <form action="Controlador.php?Ruta=InsertarTipoCargo" method="POST">
                        <table class="table table-responsive" id="tabla" border="1" >
                            <tr>
                           
                                <td rowspan="7">
                                    <img src="Cargo.png" width="256" height="256" />
                                </td>
                                <td>
                                    <label class="label" id="L">Seleccione el cargo</label>
                                </td>
                                </tr>
                                <tr>
                                    <td>
                                    
                                        <select id='Cargo' name='Cargo'>
                                            <?php
                                                //Hacemos un ciclo for para llenar el combo
                                                for($j=0; $j<$Conteo; $j++)
                                                {
                                            ?>
                                            <option value="<?php echo $Resul[$j]->IdCargo ?>"><?php echo $Resul[$j]->IdCargo ?> - <?php echo $Resul[$j]->NombreCargo ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <td>
                                    <label class="label" id="L"> Nombre tipo cargo</label>
                                </td>
                                <tr>
                                    <td>
                                        <input type="text" name="NombreTipoCargotxt" id="txt" class="form-control" placeholder="Nombre tipo cargo" title="Nombre tipo cargo">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="label" id="L">Descripcion tipo  cargo</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea name="textarea" rows="4" cols="50" class="form-control"  name="DescripTipoCargotxt" id="txt" placeholder="Descripcion tipo cargo" title="Descripcion tipo cargo"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                <center><button input type="submit" name="InsertarTipoCargo" value="InsertarTipoCargo" class="form-control" placeholder="Guardar Tipo Cargo" title="Guardar Tipo Cargo">Guardar Tipo Cargo</button></center>
                                    </td> 
                                </tr>
                        </table>
                    </form>
                </fieldset>
            </div>
            
            <table>
                <tr>
                <thead>
                <th>Codigo de los cargos</th>
                <th>Nombre de los cargos</th>
                <th>Descripciones de los cargos</th>
                </thead>
                 <tbody>
                 <?php
                        //Hacemos un ciclo for para llenar el combo
                        for($j=0; $j<$Conteo; $j++)
                        {
                ?>
                            <tr>
                                <td><?php echo $Resul[$j]->IdCargo ?></td>  
                                <td><?php echo $Resul[$j]->NombreCargo ?></td>  
                                <td><?php echo $Resul[$j]->DescripcionCargo ?></td>
                            </tr> 
                 <?php } ?>            
                    </tbody>
                </tr>
            </form>
        </tr>
        <tr>
            <th colspan="4" id="Borde"><h1>        </h1></th>
        </tr>
        <tr>
            <th colspan="4" id="Borde"><h1>        </h1></th>
        </tr>
    </table>
</div>
</center>


