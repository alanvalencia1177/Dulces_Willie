<?php
//include PATH . 'Modelos/MyCon.php';
include_once PATH . 'Modelos/MyCon.php';
//Definimosla clase 
//Esta clase heredara los datos de l clase padre
class DetFactCompraDAO extends MyCon
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
        $DetFacturaCompra ="Select * From Cargo";
        //Declaramos una variable la cual Contendra la 
        //la informacion que que tiene la variable "$DetFacturaCompra"
        //Funcion prepare nos dara integridad segura de los datos que se estan enviando 
        $RegDetFactCompra = $this->Conexion->prepare($DetFacturaCompra);
        //Ejecutamos la la variable 
        $RegDetFactCompra->execute();
        //Definimos un array vacio el cual nos guadara los datos que se le envien
        $ListarDetFactCompra = array();
        //Hacemos un ciclo para que nos cargue el array
        while ($Registro = $RegDetFactCompra->fetch(PDO::FETCH_OBJ))
        {
            //Le damos los datos al array que creamos anteriormente
            $ListarDetFactCompra[]=$Registro;
        }
        //Cerramos la conexion 
    
        $this->CierreConexion();
        //Retornamos el array
        return $ListarDetFactCompra;

    }
    
    
}
