<?php

include_once PATH . 'Modelos/ModeloCliente/ClienteDAO.php';



class ClienteControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->ClienteControlador();
    }

    public function ClienteControlador() {

        switch ($this->datos['ruta']) {
           
            
                case 'mostrarInsertarCliente':
                    header("Location: principal.php?contenido=Vistas/VistasCliente/VistaInsertarCliente.php");
    
                    break;
           
            case 'insertarCliente':
                //Se instancia ProveedorDAO para insertar
                $buscarCliente = new ClienteDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
               //Se consulta si existe ya el registro
                $ClienteHallado = $buscarCliente->seleccionarId($this->datos['IdCliente']);            
                if (!$ClienteHallado['exitoSeleccionId']) {
                    $insertarCliente = new ClienteDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);                   
                    $insertoCliente = $insertarCliente->insertar($this->datos);  //inserción de los campos en la tabla proveedor 
                    $exitoInsercionCliente = $insertoCliente['inserto'];
                     //indica si se logró inserción de los campos en la tabla Proveedor
                    $resultadoInsercionCliente = $insertoCliente['resultado'];                //Traer el id con que quedó el Proveedor de lo contrario la excepción o fallo  

                    session_start();
                    $_SESSION['mensaje'] = "Registrado " . $this->datos['IdCliente'] . " con éxito.  Agregado Nuevo Proveedor con " . $resultadoInsercionCliente;

                    header("location:Controlador.php?ruta=listarCliente");
                } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                    session_start();
                    $_SESSION['IdCliente'] = $this->datos['IdCliente'];
                    $_SESSION['DocumentoIdentificacionCliente'] = $this->datos['DocumentoIdentificacionCliente'];
                    $_SESSION['NombreCliente'] = $this->datos['NombreCliente'];
                    $_SESSION['ApellidoCliente'] = $this->datos['ApellidoCliente'];
                    $_SESSION['DireccionCliente'] = $this->datos['DireccionCliente'];
                    $_SESSION['TelefonoCliente'] = $this->datos['TelefonoCliente'];
                    
                    $_SESSION['mensaje'] = "   El código " . $this->datos['IdCliente'] . " ya existe en el sistema.";

                    header("location:Controlador.php?ruta=mostrarInsertarCliente");
                }
                break;
            case "listarCliente": //provisionalmente para trabajar con datatables

                $gestarCliente = new ClienteDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroCliente = $gestarCliente->seleccionarTodos();
                

                session_start();
                //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
                $_SESSION['listaDeCliente'] = $registroCliente;
               
                

                header("location:principal.php?contenido=Vistas/VistasCliente/ListaRegistrosCliente.php");
                break;

            case "actualizarCliente":
                $gestarCliente = new ClienteDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $consultaDeCliente = $gestarCliente->seleccionarId($this->datos['idAct']); //Se consulta el libro para traer los datos.

                $actualizarDatosCliente = $consultaDeCliente['registroEncontrado'][0];

        
                session_start();
                $_SESSION['actualizarDatosCliente'] = $actualizarDatosCliente;

                header("location:principal.php?contenido=Vistas/VistasCliente/VistaActualizarCliente.php");
                break;
            case "confirmaActualizarCliente":
                $gestarCliente = new ClienteDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $actualizarCliente = $gestarCliente->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.                

                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:Controlador.php?ruta=listarCliente");
                break;
            case "eliminarCliente":
                $gestarCliente = new ClienteDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $gestarCliente->eliminar(array($this->datos['idAct'])); // BORRADO FÍSICO
//                $gestarCliente->eliminarLogico(array($this->datos['idAct']));// BORRADO LÓGICO

                session_start();
                $_SESSION['mensaje'] = "   Borrado exitoso!!! ";
                header("location:Controlador.php?ruta=listarCliente");
                break;
        }
    }

}
