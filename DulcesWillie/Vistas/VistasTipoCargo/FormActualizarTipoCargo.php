<!DOCTYPE html>
<meta charset="utf-8">
<html>
    <head>
            <title>Dulces Willi'e</title>
        </head>
        <body>
        <center>
            <table class="table table-responsive" id="tabla" border="1" >
            <tr>
            <div name="FormActualizarTipoCargo">
                <td rowspan="7">
                   <img src="Cargo.png" width="256" height="256" />

                </td>
                
            <td>
                    <label class="label" id="L"> Nombre tipo cargo</label>
                  </td>
                
                </td>
            </tr>
             <tr>
                <td>
                    <input type="text" name="NombreTipoCargotxt" id="txt" class="form-control" placeholder="Nombre tipo cargo" title="Nombre tipo cargo">
                </td>
                <td>
                    <input type="button" name="BuscarTipoCargotxt" value="Buscar" id="txt" class="form-control" placeholder="Buscar tipo cargo" title="Buscar tipo cargo">
                </td>
            </tr>
            <td>
                    <label class="label" id="L">Seleccione el cargo</label>
                  </td>
                
                </td>
            </tr>
             <tr>
                <td>
                    <select >
                        <option>Seleccione el cargo</option>
                    </select>
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
                    <center><input type="submit" name="ActualizarTipoCargo" value="Actualizar Tipo Cargo" class="form-control" placeholder="Guardar Tipo Cargo" title="Guardar Tipo Cargo"></center>
                </td> 
            </tr>
            <tr>
                
            </tr>
            </table>
            <table>
                <tr>
                <thead>
                <th>Codigo de los cargos</th>
                <th>Nombre de los cargos</th>
                <th>Descripciones de los cargos</th>
                </thead>
                 <tbody>
                        <?php
                        $connect = mysqli_connect("localhost","root","","willie");
                        $query = "SELECT p.IdPersona,p.NombrePersona,p.apellidoPersona,p.direccionPersona";
                        $query .= " FROM persona p";
                        $query .= " ORDER BY p.IdPersona ASC ";
                        $sql = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($sql)) {
                            ?>                           
                            <tr>
                                <td><?php echo $row["IdPersona"]; ?></td>  
                                <td><?php echo $row["NombrePersona"]; ?></td>  
                                <td><?php echo $row["apellidoPersona"]; ?></td>  
                                <td><?php echo $row["direccionPersona"]; ?></td>   
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




    </body>
</html>




