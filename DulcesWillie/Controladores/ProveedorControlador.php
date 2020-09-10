<?php

include_once PATH . 'Modelos/ModeloProveedor/ProveedorDAO.php';



class ProveedorControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->ProveedorControlador();
    }

    public function ProveedorControlador() {

        switch ($this->datos['ruta']) {
           
            
                case 'mostrarInsertarProveedor':
    
                    /*                 * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
                    header("Location: principal.php?contenido=Vistas/VistasProveedor/vistaInsertarProveedor.php");
    
                    break;
           
            case 'insertarProveedor':
                //Se instancia ProveedorDAO para insertar
                $buscarProveedor = new ProveedorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
               //Se consulta si existe ya el registro
                $ProveedorHallado = $buscarProveedor->seleccionarId($this->datos['IdProveedor']);
    //                echo "<pre>";
//                print_r($ProveedorHallado);
//                echo "</pre>";                  
                //Si no existe el libro en la base se procede a insertar ****            
                if (!$ProveedorHallado['exitoSeleccionId']) {
                    $insertarProveedor = new ProveedorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);                   
                    $insertoProveedor = $insertarProveedor->insertar($this->datos);  //inserción de los campos en la tabla proveedor 
                    $exitoInsercionProveedor = $insertoProveedor['inserto'];
                     //indica si se logró inserción de los campos en la tabla Proveedor
                    $resultadoInsercionProveedor = $insertoProveedor['resultado'];                //Traer el id con que quedó el Proveedor de lo contrario la excepción o fallo  

                    session_start();
                    $_SESSION['mensaje'] = "Registrado " . $this->datos['IdProveedor'] . " con éxito.  Agregado Nuevo Proveedor con " . $resultadoInsercionProveedor;

                    header("location:Controlador.php?ruta=listarProveedor");
                } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                    session_start();
                    $_SESSION['IdProveedor'] = $this->datos['IdProveedor'];
                    $_SESSION['NombreProveedor'] = $this->datos['NombreProveedor'];
                    $_SESSION['NitProveedor'] = $this->datos['NitProveedor'];
                    $_SESSION['DescripcionProveedor'] = $this->datos['DescripcionProveedor'];
                    
                    $_SESSION['mensaje'] = "   El código " . $this->datos['IdProveedor'] . " ya existe en el sistema.";

                    header("location:Controlador.php?ruta=mostrarInsertarProveedor");
                }
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
