<?php
//Incluimos las clases pertinentes
include_once PATH . 'Modelos/ModeloTipoCargo/TipoCargoDAO.php';
include_once PATH . 'Modelos/ModeloCargo/CargoDAO.php';
class TipoCargoControlador
{
    //Definimos lavariablesque se usaran 
    private $datos;
    //    Definimos el constructor de la clase
    public function __construct($datos)
    {
        $this->datos = $datos;
        $this->TipoCargoControlador();
    }
    //Hacemos una funcion la cual nospermitira el paso asi la vista
    public function TipoCargoControlador()
    {
        //Hacemos un switch case para definir el comportamiento
        //y le damos el valor que viene por la peticion de la vista
        switch ($this->datos['ruta']) {
            case "MenuTipoCargo":
                header("Location: Principal.php?contenido=Vistas/VistasTipoCargo/MenuTipoCargo.php");
                break;
            case "mostrarInsertarTipoCargo":
                header("location:principal.php?contenido=Vistas/VistasTipoCargo/VistaInsertarTipoCargo.php");
                break;
            case "VistaActualizarTipoCargo":
                header("Location: Principal.php?contenido=Vistas/VistasTipoCargo/VistaActualizarTipoCargo.php");
                break;
            case "listarTipoCargo": //provisionalmente para trabajar con datatables

                $gestarTipoCargo = new TipoCargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroTipoCargo = $gestarTipoCargo->SeleccionarTodosTipoCargo();

                session_start();
                //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
                $_SESSION['listaDeTipoCargo'] = $registroTipoCargo;

                header("location:principal.php?contenido=Vistas/VistasTipoCargo/listarRegistroTipoCargo.php");
                break;

            case "FormActualizarTipoCargo":
                header("Location: Principal.php?contenido=Vistas/VistasTipoCargo/FormActualizarTipoCargo.php");
                break;
            case "VistaInsertarTipoCargo":

                //Instanaciamos la clase que vamos a usar
                $LlenarCombo = new TipoCargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                //Llamamos la funcion 
                $Resul = $LlenarCombo->CargarComboCargo();
                //Iniciamos sesiones
                session_start();
                $_SESSION['Resul'] = $Resul;
                //Limpiamos
                $Resul = null;
                /*Cargamos una tabla con los datos de                                             tipo cargo*/
                //Instanaciamos la clase que vamos a usar
                $CargarTabla = new TipoCargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                //Llamamos la funcion 
                $ResulCargarTabla = $CargarTabla->SeleccionarTodosTipoCargo();
                session_start();
                $_SESSION['ResulCargarTabla'] = $ResulCargarTabla;


                header("Location: Principal.php?contenido=Vistas/VistasTipoCargo/VistaInsertarTipoCargo.php");
                break;

            case "insertarTipoCargo":
                //Instanciamos la clase 
                $BuscarTipo = new TipoCargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                //Lammamos al metodo que vammos a usar
                $Existe = $BuscarTipo->seleccionarNombreTipoCargo($this->datos['NombreTipoCargo']);
                //Hacemos una condicion para valodar
                if (!$Existe['exitoSeleccionId']) {
                    //Instanciamos la clase que vamosa usar
                    $InsertarTipoCargo = new TipoCargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                    //Llamamos al metod o de la clase instanciada y le damos los datos 
                    $Result = $InsertarTipoCargo->insertarTipoCargo($this->datos);
                    //DEfinimos una variable la cual nos verificara si se hizo la insercion 
                    $ExitosaInsercion = $Result['inserto'];
                    $ResultadoInsertado = $Result['resultado'];
                    //abrimos sesion
                    session_start();
                    $_SESSION['Mensaje'] = "La insercion fue exitosa " . $this->datos['NombreTipoCargo'] . $ResultadoInsertado;
                    header("Location: Controlador.php?ruta=mostrarInsertarTipoCargo");
                } else {
                    session_start();

                    $_SESSION['NombreTipoCargo'] = $this->datos['NombreTipoCargo'];
                    $_SESSION['Cargo_IdCargo'] = $this->datos['Cargo_IdCargo'];
                    $_SESSION['mensaje'] = " El Tipo de Cargo (" . $this->datos['NombreTipoCargo'] . ") ya existe en el sistema.";

                    header("location:Controlador.php?ruta=mostrarInsertarTipoCargo");
                }
                break;
            case "actualizarTipoCargo":
                $gestarTipoCargo = new TipoCargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                // $consultaDeProveedor = $gestarProveedor->seleccionarId($this->datos['idAct']); //Se consulta el libro para traer los datos.
                $consultaTipoCargo = $gestarTipoCargo->seleccionarId($this->datos['idAct']);
                $actualizarDatosTipoCargo = $consultaTipoCargo['registroEncontrado'][0];


                session_start();
                $_SESSION['actualizarDatosTipoCargo'] = $actualizarDatosTipoCargo;

                header("location:principal.php?contenido=Vistas/VistasTipoCargo/VistaActualizarTipoCargo.php");
                break;
                case "confirmaActualizarTipoCargo":
                    $gestarTipoCargo = new TipoCargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                    $actualizarTipoCargo = $gestarTipoCargo->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.                
    
                    session_start();
                    $_SESSION['mensaje'] = "Actualización realizada.";
                    header("location:Controlador.php?ruta=listarTipoCargo");
                    break;
        }
    }
}
