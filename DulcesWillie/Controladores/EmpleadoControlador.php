<?php

include_once PATH . 'Modelos/ModeloEmpleado/EmpleadoDAO.php';



class EmpleadoControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->EmpleadoControlador();
    }

    public function EmpleadoControlador() {

        switch ($this->datos['ruta']) {
           
            
                case 'mostrarInsertarEmpleado':
    
                    /*                 * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
                    header("Location: principal.php?contenido=Vistas/VistasEmpleado/VistaInsertarEmpleado.php");
    
                    break;
           
            case 'insertarEmpleado':
                //Se instancia ProveedorDAO para insertar
                $buscarEmpleado = new EmpleadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
               //Se consulta si existe ya el registro
                $EmpleadoHallado = $buscarEmpleado->seleccionarId($this->datos['IdEmpleado']);            
                if (!$EmpleadoHallado['exitoSeleccionId']) {
                    $insertarEmpleado = new EmpleadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);                   
                    $insertoEmpleado = $insertarEmpleado->insertar($this->datos);  //inserción de los campos en la tabla proveedor 
                    $exitoInsercionEmpleado = $insertoEmpleado['inserto'];
                     //indica si se logró inserción de los campos en la tabla Proveedor
                    $resultadoInsercionEmpleado = $insertoEmpleado['resultado'];                //Traer el id con que quedó el Proveedor de lo contrario la excepción o fallo  

                    session_start();
                    $_SESSION['mensaje'] = "Registrado " . $this->datos['IdEmpleado'] . " con éxito.  Agregado Nuevo Proveedor con " . $resultadoInsercionEmpleado;

                    header("location:Controlador.php?ruta=listarEmpleado");
                } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                    session_start();
                    $_SESSION['IdEmpleado'] = $this->datos['IdEmpleado'];
                    $_SESSION['DocumentoIdentificacionEmpleado'] = $this->datos['DocumentoIdentificacionEmpleado'];
                    $_SESSION['NombreEmpleado'] = $this->datos['NombreEmpleado'];
                    $_SESSION['ApellidoEmpleado'] = $this->datos['ApellidoEmpleado'];
                    $_SESSION['DireccionEmpleado'] = $this->datos['DireccionEmpleado'];
                    $_SESSION['TelefonoEmpleado'] = $this->datos['TelefonoEmpleado'];
                    
                    $_SESSION['mensaje'] = "   El código " . $this->datos['IdEmpleado'] . " ya existe en el sistema.";

                    header("location:Controlador.php?ruta=mostrarInsertarEmpleado");
                }
                break;
            case "listarEmpleado": //provisionalmente para trabajar con datatables

                $gestarEmpleado = new EmpleadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroEmpleado = $gestarEmpleado->seleccionarTodos();
                

                session_start();
                //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
                $_SESSION['listaDeEmpleado'] = $registroEmpleado;
               
                

                header("location:principal.php?contenido=Vistas/VistasEmpleado/ListaRegistrosEmpleado.php");
                break;

            case "actualizarEmpleado":
                $gestarEmpleado = new EmpleadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $consultaDeEmpleado = $gestarEmpleado->seleccionarId($this->datos['idAct']); //Se consulta el libro para traer los datos.

                $actualizarDatosEmpleado = $consultaDeEmpleado['registroEncontrado'][0];

        
                session_start();
                $_SESSION['actualizarDatosEmpleado'] = $actualizarDatosEmpleado;

                header("location:principal.php?contenido=Vistas/VistasEmpleado/VistaActualizarEmpleado.php");
                break;
            case "confirmaActualizarEmpleado":
                $gestarEmpleado = new EmpleadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $actualizarEmpleado = $gestarEmpleado->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.                

                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:Controlador.php?ruta=listarEmpleado");
                break;
            case "eliminarEmpleado":
                $gestarEmpleado = new EmpleadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $gestarEmpleado->eliminar(array($this->datos['idAct'])); // BORRADO FÍSICO
//                $gestarEmpleado->eliminarLogico(array($this->datos['idAct']));// BORRADO LÓGICO

                session_start();
                $_SESSION['mensaje'] = "   Borrado exitoso!!! ";
                header("location:Controlador.php?ruta=listarEmpleado");
                break;
        }
    }

}
