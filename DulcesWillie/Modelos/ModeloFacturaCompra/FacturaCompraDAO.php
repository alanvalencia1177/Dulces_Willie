<?php
//include PATH . 'Modelos/MyCon.php';
include_once PATH . 'Modelos/MyCon.php';
//Definimosla clase 
//Esta clase heredara los datos de l clase padre
class FacturaCompraDAO extends MyCon
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
        $FacturaCompra ="Select * From Producto";
        //Declaramos una variable la cual Contendra la 
        //la informacion que que tiene la variable "$DetFacturaCompra"
        //Funcion prepare nos dara integridad segura de los datos que se estan enviando 
        $RegFacturaCompra = $this->Conexion->prepare($FacturaCompra);
        //Ejecutamos la la variable 
        $RegFacturaCompra->execute();
        //Definimos un array vacio el cual nos guadara los datos que se le envien
        $ListarFacturaCompra = array();
        //Hacemos un ciclo para que nos cargue el array
        while ($Registro = $RegFacturaCompra->fetch(PDO::FETCH_OBJ))
        {
            //Le damos los datos al array que creamos anteriormente
            $ListarFacturaCompra[]=$Registro;
        }
        //Cerramos la conexion 
        $this->CierreConexion();
        //Retornamos el array
        return $ListarFacturaCompra;

    }
    public function insertar($registro) {
        try {
           $query = " insert into facturacompra (";
           $query .= "FechaFacturaCompra,EstadoFacturaCompra,IdProveedor,IdEmpleado)";
           $query .= " values(:FechaFacturaCompra,:EstadoFacturaCompra,:IdProveedor,:IdEmpleado);";

            $inserta = $this->Conexion->prepare($query);

            $inserta->bindParam(":FechaFacturaCompra", $registro['FechaFacturaCompra']);
            $inserta->bindParam(":EstadoFacturaCompra", $registro['EstadoFacturaCompra']);
            $inserta->bindParam(":IdProveedor", $registro['IdProveedor']);
            $inserta->bindParam(":IdEmpleado", $registro['IdEmpleado']);
            $insercion = $inserta->execute();

            $clavePrimariaConQueInserto = $this->Conexion->lastInsertId();



            return ['inserto1' => 1, 'resultado1' => $clavePrimariaConQueInserto];
        } catch (PDOException $pdoExc) {
            return ['inserto1' => 0, 'resultado1' => $pdoExc->errorInfo[2]];
        }
    }
    
    public function InsertarDetFacturaCompra($registro) {
        try {
            session_start();
            $IdFacturaCompra = $_SESSION['CodigoBarrasProducto1'];
            $IdProducto = $_SESSION['CodigoBarrasProducto2'];
           $query = " insert into detfacturacompra (";
           $query .= "IdFacturaCompra,IdProducto)";
           $query .= " values(IdFacturaCompra,IdProducto);";

            $inserta = $this->Conexion->prepare($query);
            

            
            $inserta->bindParam('IdFacturaCompra', $registro['IdFacturaCompra']);
            $inserta->bindParam('IdProducto' , $registro['IdProducto']);

            $insercion = $inserta->execute();

            $clavePrimariaConQueInserto = $this->Conexion->lastInsertId();



            return ['inserto1' => 1, 'resultado1' => $clavePrimariaConQueInserto];
        } catch (PDOException $pdoExc) {
            return ['inserto1' => 0, 'resultado1' => $pdoExc->errorInfo[2]];
        }
    }
    
}