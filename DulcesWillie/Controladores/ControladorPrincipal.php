<?php
//Incluimos la clase

include_once PATH . 'Controladores/ProveedorControlador.php';
include_once PATH . 'Controladores/CargoControlador.php';
include_once PATH . 'Modelos/Validaciones.php';
include_once PATH . 'Modelos/ModeloProveedor/ValidadorProveedor.php';
include_once PATH . 'Modelos/ModeloCargo/ValidadorCargo.php';

class ControladorPrincipal {
     //Declaramos las variables que vamos a usar
    private $datos = array();
    //Declaramos el constructor
    public function __construct()
    {
        
//        echo "<pre>";
//        print_r($_GET);
//        echo "</pre>";
        //Hacemos una condicion para verificar 
        //el metodo en el que lo esta enviando 
        if(!empty($_POST) && isset($_POST["ruta"]))
        {
            //Lo cargamos en el erray
            $this->datos = $_POST;
        }
        if(!empty($_GET) && isset($_GET["ruta"]))
        {
            //Lo cargamos en el erray
            $this->datos = $_GET;
        }
        //le damos los datos al control
        $this->control();
    }
    //Hacemos una funcion la cual no spermitira el manejo de las repuesats
    public function control()
    {
       
        
                //Hacemos un switch case el cual 
        //Tendra el control dependiendo la peticion de la variable
        switch($this->datos['ruta'])
        {
           /*  case "MostrarDfc":
                 $Dfc = new DetFacturaCompraControlador ($this->datos);
            break;
            case "MenuCargo":
                $Cargo = new CargoControlador($this->datos);    
                break;
            case "FormInsertarCargo":
                
                $Cargo = new CargoControlador($this->datos);    
                break;
            case "FormConsultarCargo":
                $Cargo = new CargoControlador($this->datos);    
                break;
            case "FormActualizarCargo":
                $Cargo = new CargoControlador($this->datos);    
                break;
            case "MenuTipoCargo":
                $Cargo = new CargoControlador($this->datos);    
                break;
            
            case "FormInsertarTipoCargo":
            case "InsertarTipoCargo":  
                //Hacemos una condicion praverificar que es loque me traerlavaribale
                //del comportamiento
                if($this->datos['ruta'] == "InsertarTipoCargo")
                {
                    //Insrancioms la clase de validaciones
                    $Validar = new Validaciones();
                    $ErrorValidar = $Validar->ValidarTipoCargo($this->datos);
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
                   $Cargo = new CargoControlador($this->datos);  
                }
                break;
            case "FormActualizarTipoCargo":
                $Cargo = new CargoControlador($this->datos);    
                break;
        
 */
                
            ///*****GESTIONANDO LA TABLA Proveedor********///            
         
            case "mostrarInsertarProveedor":
                case "insertarProveedor":
                    if ($this->datos['ruta'] == "insertarProveedor") {
                        $validarRegistro = new ValidadorProveedor();
                        $erroresValidacion = $validarRegistro->validarFormularioProveedor($this->datos);
                    }
                    if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                        session_start();
                        $_SESSION['erroresValidacion'] = $erroresValidacion;
                        header("location:principal.php?contenido=Vistas/VistasProveedor/VistaInsertarProveedor.php");
                    } else {
                        $ProveedorControlador = new ProveedorControlador($this->datos);
                    }
                    break;
                case "listarProveedor":
                    $ProveedorControlador = new ProveedorControlador($this->datos);
    
                    break;
                case "actualizarProveedor":
                    
                    $ProveedorControlador = new ProveedorControlador($this->datos);
                    
                    break;
                case "confirmaActualizarProveedor":               
                    if ($this->datos['ruta'] == "confirmaActualizarProveedor") {
                        $validarRegistro = new ValidadorProveedor();
                        $erroresValidacion = $validarRegistro->validarFormularioProveedor($this->datos);
                    }
                    if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                        session_start();
                        $_SESSION['erroresValidacion'] = $erroresValidacion;
                        header("location:principal.php?contenido=Vistas/VistasProveedor/vistaActualizarProveedor.php");
                    } else {
                        $ProveedorControlador = new ProveedorControlador($this->datos);
                    }              
                    break;
                case "eliminarProveedor":
                    $ProveedorControlador = new ProveedorControlador($this->datos);
                    break;



                    ///*****GESTIONANDO LA TABLA Cargo********///     
                    
                    case "MenuCargo":
                        header("location:principal.php?contenido=vistas/vistasCargo/MenuCargo.php");
                        break;

            case "mostrarInsertarCargo":
                case "insertarCargo":
                    if ($this->datos['ruta'] == "insertarCargo") {
                        $validarRegistro = new ValidadorCargo();
                        $erroresValidacion = $validarRegistro->validarFormularioCargo($this->datos);
                    }
                    if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                        session_start();
                        $_SESSION['erroresValidacion'] = $erroresValidacion;
                        header("location:principal.php?contenido=vistas/vistasCargo/vistaInsertarCargo.php");
                    } else {
                        $CargoControlador = new CargoControlador($this->datos);
                    }
                    break;
                case "listarCargo":
                    $CargoControlador = new CargoControlador($this->datos);
    
                    break;
                case "actualizarCargo":
                    
                    $CargoControlador=new CargoControlador($this->datos);
                    
                    break;
                case "confirmaActualizarCargo":               
                    if ($this->datos['ruta'] == "confirmaActualizarCargo") {
                        $validarRegistro = new ValidadorCargo();
                        $erroresValidacion = $validarRegistro->validarFormularioCargo($this->datos);
                    }
                    if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                        session_start();
                        $_SESSION['erroresValidacion'] = $erroresValidacion;
                        header("location:principal.php?contenido=vistas/vistasCargo/vistaActualizarCargo.php");
                    } else {
                        $CargoControlador = new CargoControlador($this->datos);
                    }              
                    break;
                case "eliminarCargo":
                    $CargoControlador = new CargoControlador($this->datos);
                    break;
        }
        
    }
    
}
?>
