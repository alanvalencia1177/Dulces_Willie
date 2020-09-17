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
            case "FormConsultarTipoCargo":
                header("Location: Principal.php?contenido=Vistas/VistasTipoCargo/FormConsultarTipoCargo.php");
                break;
            case "FormActualizarTipoCargo":
                header("Location: Principal.php?contenido=Vistas/VistasTipoCargo/FormActualizarTipoCargo.php");
                break;
            case "VistaInsertarTipoCargo":
                //Instanaciamos la clase que vamos a usar
                $LlenarCombo = new TipoCargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                //Llamamos la funcion 
                $Resul = $LlenarCombo->SeleccionarTodos();
                //Iniciamos sesiones
                session_start();
                $_SESSION['Resul'] = $Resul;
                //Limpiamos
                $Resul = null;
                header("Location: Principal.php?contenido=Vistas/VistasTipoCargo/FormInsertarTipoCargo.php");
                break;
            case "FormActualizarTipoCargo":
                header("Location: Principal.php?contenido=Vistas/VistasTipoCargo/FormActualizarTipoCargo.php");
                break;
            case "insertarTipoCargo":

                //Instanciamos la clase 
                $BuscarTipo = new TipoCargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                //Lammamos al metodo que vammos a usar
                $Existe = $BuscarTipo->seleccionarNombreTipoCargo($this->datos['NombreTipoCargo']);
                
                //Hacemos una condicion para valodar
                if (!$Existe['exitoSeleccionId']) {
                    //Instanciamos la clase que vamosa usar
                    $InsertarTipo = new TipoCargoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                    //Llamamos al metod o de la clase instanciada y le damos los datos 
                    $Result = $InsertarTipo->insertarTipoCargo($this->datos);
                    //DEfinimos una variable la cual nos verificara si se hizo la insercion 
                    $ExitosaInsercion = $InsertarTipo['inserto'];
                    $ResultadoInsertado = $InsertarTipo['resultado'];
                    //abrimos sesion
                    session_start();
                    $_SESSION['Mensaje'] = "La insercion fue exitosa " . $this->datos['NombreTipoCargo'] . $ResultadoInsertado;
                    header("Location: Controlador.php?ruta=VistaInsertarTipoCargo");
                } else {
                    session_start();

                    $_SESSION['NombreTipoCargo'] = $this->datos['NombreTipoCargo'];
                    $_SESSION['Cargo_IdCargo'] = $this->datos['Cargo_IdCargo'];
                    $_SESSION['mensaje'] = "   El código " . $this->datos['IdTipoCargo'] . " ya existe en el sistema.";

                    header("location:Controlador.php?ruta=VistaInsertarTipoCargo");
                }
                break;
        }
    }
}
