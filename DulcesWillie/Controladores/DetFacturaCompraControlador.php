<?php
//Incluimos clases 
include_once PATH . 'Modelos/ModeloDetFacturaCompra/FuncionesDetFactCompraDAO.php';

class DetFacturaCompraControlador {
    //Variables que vamos a usar
    private $Datos;
    //Declaramos un constructor
    public function __construct($Datos) {
        //Le asiganamos los valores
        $this->Datos = $Datos;
        $this->DetFacturaCompraControlador();
    }
    
    //Hacemos una funcion la cual nos permitira  
    //el paso de datos asi la la base 
    public function DetFacturaCompraControlador() {
        
        //Hacemos un switch case 
        switch ($this->Datos['Ruta'])
        {
            case "MostrarDfc":
                header("Location: Principal.php?Contenido=Vistas/VistasCargo/FormConsultarCargo.php");
                
            break;
        }
    }
}
