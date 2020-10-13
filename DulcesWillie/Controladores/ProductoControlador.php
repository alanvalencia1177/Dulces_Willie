<?php

include_once PATH . 'Modelos/ModeloProducto/ProductoDAO.php';



class ProductoControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->ProductoControlador();
    }

    public function ProductoControlador() {

        switch ($this->datos['ruta']) {
           
                case 'VistaCompraProducto':
                    header("Location: principal.php?contenido=Vistas/VistaCompra/VistaCompraProducto.php");
                    break;
            
                case 'VistaCompraProducto':
    
                    //Instanaciamos la clase que vamos a usar
                $LlenarCombo = new Proveedor(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                //Llamamos la funcion 
                $listadoProveedor = $LlenarCombo->seleccionarTodos();
                //Iniciamos sesiones
                session_start();
                $_SESSION['listadoProveedor'] = $listadoProveedor;
                //Limpiamos
                $listadoProveedor = null;
                 header("Location: principal.php?contenido=Vistas/VistaCompra/VistaCompraProducto.php");
                    break;
           
            case 'ProductoComprar':
                    //Buscar el producto
                    //Instanciamos la clase
                    $BuscarProdcucto = new ProductoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                    //Llamamos al metodo
                    $BuscoProducto = $BuscarProdcucto->seleccionarId($this->datos['CodigoBarrasProducto']);
                     echo "<pre>";
                     print_r($BuscoProducto);
                     echo "</pre>";
                    //Verificamos la consulta
                    if (!$BuscoProducto['exitoSeleccionId'])
                    {
                     $insetarProducto = new ProductoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);               
                    $insertoProducto = $insetarProducto->insertar($this->datos);
                    
                    $exitoInsercionProducto = $insertoProducto['inserto'];
                   
                    $resultadoInsercionProducto = $insertoProducto['resultado'];                //Traer el id con que quedó el Proveedor de lo contrario la excepción o fallo  

                    session_start();
                    $_SESSION['mensaje'] = "Registrado " . $this->datos['NombreProducto'] . " con éxito.  Agregado Nuevo Producto con " . $resultadoInsercionProducto;

                    header("location:Controlador.php?ruta=VistaCompraProducto");
                    }
                    else{
                        session_start();
                    $_SESSION['NombreProducto'] = $this->datos['NombreProducto'];
                    $_SESSION['Descripcion_Producto'] = $this->datos['Descripcion_Producto'];
                    $_SESSION['CodigoBarrasProducto'] = $this->datos['CodigoBarrasProducto'];
                    $_SESSION['Stock'] = $this->datos['Stock'];
                    $_SESSION['ValorEntradaProducto'] = $this->datos['ValorEntradaProducto'];
                    $_SESSION['ValorSalidaProducto'] = $this->datos['ValorSalidaProducto'];
                    $_SESSION['Estado'] = $this->datos['Estado'];
                    
                    $_SESSION['mensaje'] = "   El código " . $this->datos['CodigoBarrasProducto'] . " ya existe en el sistema.";
                    }
                    
               header("location:Controlador.php?ruta=VistaCompraProducto");
                break;
            case "listarProveedor": //provisionalmente para trabajar con datatables

                $gestarProveedor = new ProveedorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroProveedor = $gestarProveedor->seleccionarTodos();
                

                session_start();
                //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
                $_SESSION['listaDeProveedor'] = $registroProveedor;
               
                

                header("location:principal.php?contenido=Vistas/VistasProveedor/ListaRegistrosProveedor.php");
                break;

            case "actualizarProveedor":
                $gestarProveedor = new ProveedorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $consultaDeProveedor = $gestarProveedor->seleccionarId($this->datos['idAct']); //Se consulta el libro para traer los datos.

                $actualizarDatosProveedor = $consultaDeProveedor['registroEncontrado'][0];

        
                session_start();
                $_SESSION['actualizarDatosProveedor'] = $actualizarDatosProveedor;

                header("location:principal.php?contenido=Vistas/VistasProveedor/VistaActualizarProveedor.php");
                break;
            case "confirmaActualizarProveedor":
                $gestarProveedor = new ProveedorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $actualizarProveedor = $gestarProveedor->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.                

                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:Controlador.php?ruta=listarProveedor");
                break;
            case "eliminarProveedor":
                $gestarProveedor = new ProveedorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $gestarProveedor->eliminar(array($this->datos['idAct'])); // BORRADO FÍSICO
//                $gestarProveedor->eliminarLogico(array($this->datos['idAct']));// BORRADO LÓGICO

                session_start();
                $_SESSION['mensaje'] = "   Borrado exitoso!!! ";
                header("location:Controlador.php?ruta=listarProveedor");
                break;
        }
    }

}
