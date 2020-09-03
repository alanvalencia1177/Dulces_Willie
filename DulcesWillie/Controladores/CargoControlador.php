<?php
//Incluimos las clases pertinentes
include_once PATH . 'Modelos/ModeloCargo/CargoDAO.php';
class CargoControlador {
    //Definimos lavariablesque se usaran 
    private $Datos;
//    Definimos el constructor de la clase
    public function __construct($Datos) {
        $this->Datos = $Datos;
        $this->CargoControlador();
        
    }
    //Hacemos una funcion la cual nospermitira el paso asi la vista
    public function CargoControlador() {
        //Hacemos un switch case para definir el comportamiento
        //y le damos el valor que viene por la peticion de la vista
        switch ($this->Datos['Ruta']) {
            case "MenuCargo":
                header("Location: Principal.php?Contenido=Vistas/VistasCargo/MenuCargo.php");
                break;
            case "FormInsertarCargo":
                header("Location: Principal.php?Contenido=Vistas/VistasCargo/FormInsertarCargo.php");
                break;
            case "FormConsultarCargo":
                header("Location: Principal.php?Contenido=Vistas/VistasCargo/FormConsultarCargo.php");
                break;
            case "FormActualizarCargo":
                header("Location: Principal.php?Contenido=Vistas/VistasCargo/FormActualizarCargo.php");
                break;
            case "MenuTipoCargo":
                header("Location: Principal.php?Contenido=Vistas/VistasTipoCargo/MenuTipoCargo.php");
                break;
            case "FormInsertarTipoCargo":
                //Instanaciamos la clase que vamos a usar
               
                $LlenarCombo = new CargoDAO( SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                //Llamamos la funcion 
                $Resul = $LlenarCombo->SeleccionarTodos();
                //Iniciamos sesiones
                session_start();
                $_SESSION['Resul'] = $Resul;
                //Limpiamos
                $Resul = null;

                header("Location: Principal.php?Contenido=Vistas/VistasTipoCargo/FormInsertarTipoCargo.php");
                break;
            case "FormActualizarTipoCargo":
                header("Location: Principal.php?Contenido=Vistas/VistasTipoCargo/FormActualizarTipoCargo.php");
                break;
        }
    }


}
