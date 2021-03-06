<?php
//include PATH . 'Modelos/MyCon.php';
include_once PATH . 'Modelos/MyCon.php';
//Definimosla clase 
//Esta clase heredara los datos de l clase padre
class FacturaVentaDAO extends MyCon
{
   //Declaramos el constructor como metodo el cual recibira los parametros 
    //de la conexion
    function __construct($Servidor,$Base,$Login,$PasswordBD)
    {
        //Atraves de Parent::__construct se le pasa alconstructor
        //dela 'Clase padres' (MyCon) los parametros de la conexion
        //que ha recibido la calse DAO
        parent::__construct($Servidor,$Base,$Login,$PasswordBD);
    }

    //Hacemos una funcion la cual seleccionara todos los registros
    public function SeleccionarTodos()
    { 
        //Definimos una variable la cual tendra la sentencia MySQL
        $FacturaVenta ="Select * From FacturaVenta";
        //Declaramos una variable la cual Contendra la 
        //la informacion que que tiene la variable "$DetFacturaCompra"
        //Funcion prepare nos dara integridad segura de los datos que se estan enviando 
        $RegFacturaVenta = $this->Conexion->prepare($FacturaVenta);
        //Ejecutamos la la variable 
        $RegFacturaVenta->execute();
        //Definimos un array vacio el cual nos guadara los datos que se le envien
        $ListarFacturaVenta = array();
        //Hacemos un ciclo para que nos cargue el array
        while ($Registro = $RegFacturaVenta->fetch(PDO::FETCH_OBJ))
        {
            //Le damos los datos al array que creamos anteriormente
            $ListarFacturaVenta[]=$Registro;
        }
        //Cerramos la conexion 
        $this->CierreConexion();
        //Retornamos el array
        return $ListarFacturaVenta;

    }
    
    
}