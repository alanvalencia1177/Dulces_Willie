<?php
//Incluimos la clase

include_once PATH . 'Controladores/ProveedorControlador.php';
include_once PATH . 'Controladores/CargoControlador.php';
include_once PATH . 'Controladores/TipoCargoControlador.php';
include_once PATH . 'Modelos/Validaciones.php';
include_once PATH . 'Modelos/ModeloProveedor/ValidadorProveedor.php';
include_once PATH . 'Modelos/ModeloCargo/ValidadorCargo.php';
include_once PATH . 'Modelos/ModeloTipoCargo/ValidadorTipoCargo.php';
include_once PATH . 'Controladores/PersonaControlador.php';
include_once PATH . 'Modelos/ModeloPersona/ValidadorPersona.php';

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
            //-----------------------------------------------
            //--------------Tabla TipoCago------------------
            //-----------------------------------------------
            case "MenuTipoCargo":
                $MenuTipoCargo = new TipoCargoControlador($this->datos);    
                break;
            case "listarTipoCargo":
                $TipoCargo = new TipoCargoControlador($this->datos);
            break;
            case "actualizarTipoCargo":  
                $TipoCargo = new TipoCargoControlador($this->datos);    
                break;
            case "confirmaActualizarTipoCargo":
                if ($this->datos['ruta'] == "confirmaActualizarTipoCargo") {
                    $validarRegistro = new ValidadorTipoCargo();
                    $erroresValidacion = $validarRegistro->validarFormularioTipoCargo($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    header("location:principal.php?contenido=Vistas/VistasTipoCargo/VistaActualizarTipoCargo.php");
                } else {
                    $TipoCargo = new TipoCargoControlador($this->datos);  
                }   
                    break;
            case "mostrarInsertarTipoCargo":
            case "insertarTipoCargo":
                
                if ($this->datos['ruta'] == "insertarTipoCargo") {
                    $validarRegistro = new ValidadorTipoCargo();
                    $erroresValidacion = $validarRegistro->validarFormularioTipoCargo($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    header("location:principal.php?contenido=Vistas/VistasTipoCargo/VistaInsertarTipoCargo.php");
                } else {
                    $TipoCargo = new TipoCargoControlador($this->datos);  
                }

                
            break;    
            
                
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
                        header("location:principal.php?contenido=Vistas/vistasCargo/vistaActualizarCargo.php");
                    } else {
                        $CargoControlador = new CargoControlador($this->datos);
                    }              
                    break;
                case "eliminarCargo":
                    $CargoControlador = new CargoControlador($this->datos);
                    break;


     ///*****GESTIONANDO LA TABLA Empleado********///     
                    case "MenuEmpleado":
                        header("location:principal.php?contenido=vistas/vistasEmpledo/MenuEmpleado.php");
                        break;

                   ///*****GESTIONANDO LA TABLA Persona********///     
                    
                   case "MenuPersona":
                    header("location:principal.php?contenido=Vistas/VistasPersona/MenuPersona.php");
                    break;

        case "mostrarInsertarPersona":
            case "insertarPersona":
                if ($this->datos['ruta'] == "insertarPersona") {
                    $validarRegistro = new ValidadorPersona();
                    $erroresValidacion = $validarRegistro->validarFormularioPersona($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    header("location:principal.php?contenido=vistas/vistasPersona/vistaInsertarPersona.php");
                } else {
                    $PersonaControlador = new PersonaControlador($this->datos);
                }
                break;
            case "listarPersona":
                $PersonaControlador = new PersonaControlador($this->datos);

                break;
            case "actualizarPersona":
                
                $PersonaControlador=new PersonaControlador($this->datos);
                
                break;
            case "confirmaActualizarPersona":               
                if ($this->datos['ruta'] == "confirmaActualizarPersona") {
                    $validarRegistro = new ValidadorPersona();
                    $erroresValidacion = $validarRegistro->validarFormularioPersona($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    header("location:principal.php?contenido=Vistas/VistasPersona/VistaActualizarPersona.php");
                } else {
                    $PersonaControlador = new PersonaControlador($this->datos);
                }              
                break;
            case "eliminarPersona":
                $PersonaControlador = new PersonaControlador($this->datos);
                break;   
        }
        
    }
    
}
