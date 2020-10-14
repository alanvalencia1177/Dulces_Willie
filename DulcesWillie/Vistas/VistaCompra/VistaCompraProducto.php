<?php
//verificamos si la sesion contiene algun dato
if (isset($_SESSION['listaDeProveedor'])) {
    $listaDeProveedor = $_SESSION['listaDeProveedor'];
    //asignando el valor a ina variable 
    $listaDeProveedor = $_SESSION['listaDeProveedor'];
   //Hacemos un conteo de la variable 
    $Conteo = count($listaDeProveedor);
}

if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
if (isset($_SESSION['BuscarId'])) {
    $BuscarId = $_SESSION['BuscarId'];
    
}
?>
<div class="panel panel-default">
						<table class="table table-responsive" id="tabla" >
							<tr>
								<td>
									<h3 class="panel-title">Compra de los productos</h3>
								</td>
							</tr>
						<tr>
							<form method="POST" name="VistaCompraProducto" action="Controlador.php">
								<td><label id="L" class="label">Seleccione el nombre del proveedor</label></td>
								<td>
									<!--<select placeholder="Nombre proveedor" name="NombreProveedor" class="form-control">-->
			                         <select id='Proveedor' name='IdProveedor'>
                            <?php
                                //Hacemos un ciclo for para llenar el combo
                                for($j=0; $j<$Conteo; $j++)
                                {
                            ?>
                            <option value="<?php echo $listaDeProveedor[$j]->IdProveedor ?>"><?php echo $listaDeProveedor[$j]->IdProveedor ?> - <?php echo $listaDeProveedor[$j]->NombreProveedor ?></option>
                            <?php } ?>
                        </select>
								</td>

								
						</tr>
						<tr>
							<td>
								<label class="label" id="L">Fecha de la factura</label>
							</td>
							<td>
								<input type="date" name="FechaFacturaCompra" id="txt" class="form-control"required="required">
							</td>
							<td><label class="label" id="L">Estado de la factura</label></td>
							<td>
								<select  name="EstadoFacturaCompra" class="form-control" value="Seleccion">
										<option>
											1
										</option>
										<option>
											Por pagar
										</option>
										<option>
											Vencida
										</option>
								</select>  
								</td>
						</tr>
						<tr>
							
							<td><label class="label" id="L"> Nombre producto</label></td>

							<td>
								<input type="text" name="NombreProducto" id="txt" class="form-control" placeholder="Campo de texto"required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['NombreProducto'])) echo "\"" . $erroresValidacion['datosViejos']['NombreProducto'] . "\"";
                                if(isset($_SESSION['NombreProducto'])) echo $_SESSION['NombreProducto']; unset($_SESSION['NombreProducto']); ?> >
                       			 <div><?php if (isset($erroresValidacion['mensajesError']['NombreProducto'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['NombreProducto'] . "</font>"; ?></div>
                    </td>
							<td><label class="label" id="L">Descripcion del producto</label></td>

							<td>
								<input type="text" name="Descripcion_Producto" id="txt" class="form-control" placeholder="Campo de texto"required="required" 
                               >
							</td>
						</tr>
						<tr>
							<td><label class="label" id="L">Codigo de barras del producto</label></td>

							<td>
								<input type="text" name="CodigoBarrasProducto" class="form-control" id="txt"required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['CodigoBarrasProducto'])) echo "\"" . $erroresValidacion['datosViejos']['CodigoBarrasProducto'] . "\"";
                                if(isset($_SESSION['CodigoBarrasProducto'])) echo $_SESSION['CodigoBarrasProducto']; unset($_SESSION['CodigoBarrasProducto']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['CodigoBarrasProducto'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['CodigoBarrasProducto'] . "</font>"; ?></div>
							</td>


							<td><label class="label" id="L">Cantidad producto</label></td>

							<td>
								<input type="text" name="Stock" id="txt" class="form-control" placeholder="Campo de texto"required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['Stock'])) echo "\"" . $erroresValidacion['datosViejos']['Stock'] . "\"";
                                if(isset($_SESSION['Stock'])) echo $_SESSION['Stock']; unset($_SESSION['Stock']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['Stock'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['Stock'] . "</font>"; ?></div>

							</td>
						</tr>
						<tr>
							<td><label class="label" id="L">Precio de compra</label></td>

							<td>
								<input type="text" name="ValorEntradaProducto" id="txt" class="form-control" placeholder="Campo de texto"required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['ValorEntradaProducto'])) echo "\"" . $erroresValidacion['datosViejos']['ValorEntradaProducto'] . "\"";
                                if(isset($_SESSION['ValorEntradaProducto'])) echo $_SESSION['ValorEntradaProducto']; unset($_SESSION['ValorEntradaProducto']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['ValorEntradaProducto'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['ValorEntradaProducto'] . "</font>"; ?></div>
							</td>


							<td><label class="label" id="L">Precio de venta</label></td>

							<td>
								<input type="text" name="ValorSalidaProducto" id="txt" class="form-control" placeholder="Campo de texto"required="required" 
                               value=<?php if (isset($erroresValidacion['datosViejos']['ValorSalidaProducto'])) echo "\"" . $erroresValidacion['datosViejos']['ValorSalidaProducto'] . "\"";
                                if(isset($_SESSION['ValorSalidaProducto'])) echo $_SESSION['ValorSalidaProducto']; unset($_SESSION['ValorSalidaProducto']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['ValorSalidaProducto'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['ValorSalidaProducto'] . "</font>"; ?></div>

							</td>
						</tr>
						<tr>
							<td><label class="label" id="L">Estado</label></td>
							<td>
								<select  name="Estado" class="form-control" value="Seleccion">
										<option>
											Activo
										</option>
										<option>
											Inactivo
										</option>
										<option>
											Descontinuado
										</option>
								</select>  
								</td>
						</tr>
						<tr>
							<td><a href="Controlador.php?ruta=Movimiento"><button type="button" name="ruta" value="Movimiento" class="form-control">Atras</button></a></td>
							<td colspan="4">
								<center><button type="submit" name="ruta" value="ProductoComprar" class="form-control" placeholder="Campo de texto">Comprar ´</button></center>
							</td>
							
						</tr>
						<!-------------------------------------------------------->
						<tr>
							<th colspan="4" id="Borde"><input type="text" name="IdEmpleado" class="form-control" id="txt"required="required" placeholder="Codigo empleado"
                               value=<?php if (isset($erroresValidacion['datosViejos']['IdEmpleado'])) echo "\"" . $erroresValidacion['datosViejos']['IdEmpleado'] . "\"";
                                if(isset($_SESSION['IdEmpleado'])) echo $_SESSION['IdEmpleado']; unset($_SESSION['IdEmpleado']); ?> >
                        <div><?php if (isset($erroresValidacion['mensajesError']['IdEmpleado'])) echo "<font color='red'>" . $erroresValidacion['mensajesError']['IdEmpleado'] . "</font>"; ?></div></th>
						</tr>


						

						<tr>
							<th colspan="4" id="Borde"><input type="text" name="CodigoBarrasProducto1" class="form-control" id="txt" placeholder="CodigoBarrasProducto"
                               value=<?php if(isset($_SESSION['CodigoBarrasProducto1'])) echo $_SESSION['CodigoBarrasProducto1']; unset($_SESSION['CodigoBarrasProducto1']); ?> >
                        </th>
						</tr>

						<tr>
							<th colspan="4" id="Borde"><input type="text" name="CodigoBarrasProducto2" class="form-control" id="txt" placeholder="Id Producto" 
                               value=<?php if(isset($_SESSION['CodigoBarrasProducto2']))echo $_SESSION['CodigoBarrasProducto2']; unset($_SESSION['CodigoBarrasProducto2']); ?> >
                       </th>
						</tr>
						<tr>
							<th colspan="4" id="Borde"><h1>        </h1></th>
						</tr>
					</table>
					</div>
				</div>
				     	</div>
				     </div>
				     </form>
				 </div>
					
