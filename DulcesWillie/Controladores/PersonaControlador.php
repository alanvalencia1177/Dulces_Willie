<?php

include_once PATH . 'Modelos/ModeloPersona/PersonaDAO.php';



class PersonaControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->PersonaControlador();
    }

    public function PersonaControlador() {

        switch ($this->datos['ruta']) {
           
            
                case 'mostrarInsertarPersona':
    
                    /*                 * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
                    header("Location: principal.php?contenido=Vistas/VistasPersona/VistaInsertarPersona.php");
    
                    break;
           
            case 'insertarPersona':
                //Se instancia ProveedorDAO para insertar
                $buscarPersona = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
               //Se consulta si existe ya el registro
                $PersonaHallado = $buscarPersona->seleccionarId($this->datos['IdPersona']);
    //                echo "<pre>";
//                print_r($ProveedorHallado);
//                echo "</pre>";                  
                //Si no existe el libro en la base se procede a insertar ****            
                if (!$PersonaHallado['exitoSeleccionId']) {
                    $insertarPersona = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);                   
                    $insertoPersona = $insertarPersona->insertar($this->datos);  //inserción de los campos en la tabla proveedor 
                    $exitoInsercionPersona = $insertoPersona['inserto'];
                     //indica si se logró inserción de los campos en la tabla Proveedor
                    $resultadoInsercionPersona = $insertoPersona['resultado'];                //Traer el id con que quedó el Proveedor de lo contrario la excepción o fallo  

                    session_start();
                    $_SESSION['mensaje'] = "Registrado " . $this->datos['IdPersona'] . " con éxito.  Agregado Nuevo Proveedor con " . $resultadoInsercionPersona;

                    header("location:Controlador.php?ruta=listarPersona");
                } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                    session_start();
                    $_SESSION['IdPersona'] = $this->datos['IdPersona'];
                    $_SESSION['DocumentoIdentificacionPersona'] = $this->datos['DocumentoIdentificacionPersona'];
                    $_SESSION['NombrePersona'] = $this->datos['NombrePersona'];
                    $_SESSION['ApellidoPersona'] = $this->datos['ApellidoPersona'];
                    $_SESSION['DireccionPersona'] = $this->datos['DireccionPersona'];
                    $_SESSION['TelefonoPersona'] = $this->datos['TelefonoPersona'];
                    
                    $_SESSION['mensaje'] = "   El código " . $this->datos['IdPersona'] . " ya existe en el sistema.";

                    header("location:Controlador.php?ruta=mostrarInsertarPersona");
                }
                break;
            case "listarPersona": //provisionalmente para trabajar con datatables

                $gestarPersona = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroPersona = $gestarPersona->seleccionarTodos();
                

                session_start();
                //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
                $_SESSION['listaDePersona'] = $registroPersona;
               
                

                header("location:principal.php?contenido=Vistas/VistasPersona/ListaRegistrosPersona.php");
                break;

            case "actualizarPersona":
                $gestarPersona = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $consultaDePersona = $gestarPersona->seleccionarId($this->datos['idAct']); //Se consulta el libro para traer los datos.

                $actualizarDatosPersona = $consultaDePersona['registroEncontrado'][0];

        
                session_start();
                $_SESSION['actualizarDatosPersona'] = $actualizarDatosPersona;

                header("location:principal.php?contenido=Vistas/VistasPersona/VistaActualizarPersona.php");
                break;
            case "confirmaActualizarPersona":
                $gestarPersona = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $actualizarPersona = $gestarPersona->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.                

                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:Controlador.php?ruta=listarPersona");
                break;
            case "eliminarPersona":
                $gestarPersona = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $gestarPersona->eliminar(array($this->datos['idAct'])); // BORRADO FÍSICO
//                $gestarPersona->eliminarLogico(array($this->datos['idAct']));// BORRADO LÓGICO

                session_start();
                $_SESSION['mensaje'] = "   Borrado exitoso!!! ";
                header("location:Controlador.php?ruta=listarPersona");
                break;
        }
    }

}
