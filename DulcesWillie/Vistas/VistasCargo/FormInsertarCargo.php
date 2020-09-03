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
            <div name="FormInsertarCargo">
                <td>
                    <label class="label" id="L"> Nombre del cargo</label>
                <td rowspan="5">
                   <img src="Cargo.png" width="256" height="256" />

                </td>
                </td>
            </tr>
             <tr>
                <td>
                    <input type="text" name="NombreCargotxt" id="txt" class="form-control" placeholder="Nombre del cargo" title="Nombre del cargo">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="label" id="L">Descripcion del cargo</label>
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="textarea" rows="4" cols="50" class="form-control"  name="DescripCargotxt" id="txt" placeholder="Descripcion del cargo" title="Descripcion del cargo"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <center><input type="submit" name="Insertar" value="Guardar Cargo" class="form-control" placeholder="Guardar Cargo" title="Guardar Cargo"></center>
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

