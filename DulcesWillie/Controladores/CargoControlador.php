<?php
include_once PATH . 'Modelos/ModeloCargo/CargoDAO.php';

class CargoControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->CargoControlador();
    }

    public function CargoControlador() {

        switch ($this->datos['ruta']) {
            case 'mostrarInsertarCargo':
               
                header("Location: principal.php?contenido=Vistas/vistasCargo/vistaInsertarCargo.php");

                break;
            case 'insertarCargo':
                //Se instancia LibroDAO para insertar
                $buscarCargo = new CargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
//                echo "<pre>";
//                print_r($libroHallado);
//                echo "</pre>";                
                //Se consulta si existe ya el registro
                $CargoHallado = $buscarCargo->seleccionarId(array($this->datos['IdCargo']));
                //Si no existe el libro en la base se procede a insertar ****            
                if (!$CargoHallado['exitoSeleccionId']) {
                    $insertarCargo = new CargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                    $insertoCargo = $insertarCargo->insertar($this->datos);  //inserción de los campos en la tabla libros 
                    $exitoInsercionCargo = $insertoCargo['inserto']; //indica si se logró inserción de los campos en la tabla libros
                    $resultadoInsercionCargo = $insertoCargo['resultado'];                //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

                    session_start();
                    $_SESSION['mensaje'] = "Registrado " . $this->datos['IdCargo'] . " con éxito.  Agregado Nuevo Cargo con " . $resultadoInsercionCargo;

                    header("location:Controlador.php?ruta=listarCargo");
                } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                    session_start();
                    $_SESSION['IdCargo'] = $this->datos['IdCargo'];
                    $_SESSION['NombreCargo'] = $this->datos['NombreCargo'];
                    $_SESSION['DescripcionCargo'] = $this->datos['DescripcionCargo'];

                    $_SESSION['mensaje'] = "   El código " . $this->datos['IdCargo'] . " ya existe en el sistema.";

                    header("location:Controlador.php?ruta=mostrarInsertarCargo");
                }
                break;
            case "listarCargo": //provisionalmente para trabajar con datatables

                $gestarCargo = new CargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroCargo = $gestarCargo->seleccionarTodos();

                session_start();
                //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
                $_SESSION['listaDeCargo'] = $registroCargo;

                header("location:principal.php?contenido=Vistas/VistasCargo/listaRegistrosCargo.php");
                break;
            case "actualizarCargo":
                $gestarCargo = new CargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $consultaDeCargo = $gestarCargo->seleccionarId($this->datos['idAct']); //Se consulta el libro para traer los datos.

                $actualizarDatosCargo = $consultaDeCargo['registroEncontrado'][0];

                session_start();
                $_SESSION['actualizarDatosCargo'] = $actualizarDatosCargo;

                header("location:principal.php?contenido=Vistas/VistasCargo/VistaActualizarCargo.php");
                break;
            case "confirmaActualizarCargo":
                $gestarCargo = new CargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $actualizarCargo = $gestarCargo->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.                

                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:Controlador.php?ruta=listarCargo");
                break;
            case "eliminarCargo":
                $gestarCargo = new CargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $gestarCargo->eliminar(array($this->datos['idAct'])); // BORRADO FÍSICO
//                $gestarLibros->eliminarLogico(array($this->datos['idAct']));// BORRADO LÓGICO

                session_start();
                $_SESSION['mensaje'] = "   Borrado exitoso!!! ";
                header("location:Controlador.php?ruta=listarCargo");
                break;
        }
    }

}
