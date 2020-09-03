<?php
//Incluimos la clase

include_once PATH . 'Controladores\DetFacturaCompraControlador.php';
include_once PATH . 'Controladores\CargoControlador.php';
include_once PATH . 'Modelos\Validaciones.php';

class ControladorPrincipal {
     //Declaramos las variables que vamos a usar
    private $Datos = array();
    //Declaramos el constructor
    public function __construct()
    {
        
//        echo "<pre>";
//        print_r($_GET);
//        echo "</pre>";
        //Hacemos una condicion para verificar 
        //el metodo en el que lo esta enviando 
        if(!empty($_POST) && isset($_POST['Ruta']))
        {
            //Lo cargamos en el erray
            $this->Datos = $_POST;
        }
        if(!empty($_GET) && isset($_GET['Ruta']))
        {
            //Lo cargamos en el erray
            $this->Datos = $_GET;
        }
        //le damos los datos al control
        $this->Control();
    }
    //Hacemos una funcion la cual no spermitira el manejo de las repuesats
    public function Control()
    {
        //Hacemos un switch case el cual 
        //Tendra el control dependiendo la peticion de la variable
        switch($this->Datos['Ruta'])
        {
            case "MostrarDfc":
                 $Dfc = new DetFacturaCompraControlador ($this->Datos);
            break;
            case "MenuCargo":
                $Cargo = new CargoControlador($this->Datos);    
                break;
            case "FormInsertarCargo":
                
                $Cargo = new CargoControlador($this->Datos);    
                break;
            case "FormConsultarCargo":
                $Cargo = new CargoControlador($this->Datos);    
                break;
            case "FormActualizarCargo":
                $Cargo = new CargoControlador($this->Datos);    
                break;
            case "MenuTipoCargo":
                $Cargo = new CargoControlador($this->Datos);    
                break;
            
            case "FormInsertarTipoCargo":
            case "InsertarTipoCargo":  
                //Hacemos una condicion praverificar que es loque me traerlavaribale
                //del comportamiento
                if($this->Datos['Ruta'] == "InsertarTipoCargo")
                {
                    //Insrancioms la clase de validaciones
                    $Validar = new Validaciones();
                    $ErrorValidar = $Validar->ValidarTipoCargo($this->Datos);
                }
                //Hacemos una condicion pra saber si el validarnos arroja algun 
                //Dato
                if(isset($ErrorValidar) && $ErrorValidar != FALSE)
                {
                    //Abrumos sesion 
                    session_start();
                    $_SESSION['ErrorValidar'] = $ErrorValidar;
                    //Lo enviamos a la vista se sale error
                    header("Location: Principal.php?Contenido=Vistas/VistasTipoCargo/FormInsertarTipoCargo.php"); 
                }
                else
                {
                   $Cargo = new CargoControlador($this->Datos);  
                }
                break;
            case "FormActualizarTipoCargo":
                $Cargo = new CargoControlador($this->Datos);    
                break;
        
            
        }
        
    }
    
}
