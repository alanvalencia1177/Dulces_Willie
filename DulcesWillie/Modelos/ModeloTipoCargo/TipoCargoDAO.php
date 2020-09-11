<?php
//include PATH . 'Modelos/MyCon.php';
include_once PATH . 'Modelos/MyCon.php';
//Definimosla clase 
//Esta clase heredara los datos de l clase padre
class CargoDAO extends MyCon
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
        $Cargo ="Select * From Cargo";
        //Declaramos una variable la cual Contendra la 
        //la informacion que que tiene la variable "$DetFacturaCompra"
        //Funcion prepare nos dara integridad segura de los datos que se estan enviando 
        $RegCargo = $this->Conexion->prepare($Cargo);
        //Ejecutamos la la variable 
        $RegCargo->execute();
        //Definimos un array vacio el cual nos guadara los datos que se le envien
        $ListarCargo = array();
        //Hacemos un ciclo para que nos cargue el array
        while ($Registro = $RegCargo->fetch(PDO::FETCH_OBJ))
        {
            //Le damos los datos al array que creamos anteriormente
            $ListarCargo[]=$Registro;
        }
        //Cerramos la conexion 
        $this->CierreConexion();
        //Retornamos el array
        return $ListarCargo;

    }
    //Seleccionar todos Tabla
    //Hacemos una funcion la cual seleccionara todos los registros
    public function SeleccionarTodosTipoCargo()
    { 
        //Definimos una variable la cual tendra la sentencia MySQL
        $TipoCargo ="Select * From TipoCargo";
        //Declaramos una variable la cual Contendra la 
        //la informacion que que tiene la variable "$DetFacturaCompra"
        //Funcion prepare nos dara integridad segura de los datos que se estan enviando 
        $RegTipoCargo = $this->Conexion->prepare($TipoCargo);
        //Ejecutamos la la variable 
        $RegTipoCargo->execute();
        //Definimos un array vacio el cual nos guadara los datos que se le envien
        $ListarTipoCargo = array();
        //Hacemos un ciclo para que nos cargue el array
        while ($Registro = $RegTipoCargo->fetch(PDO::FETCH_OBJ))
        {
            //Le damos los datos al array que creamos anteriormente
            $ListarTipoCargo[]=$Registro;
        }
        //Cerramos la conexion 
        $this->CierreConexion();
        //Retornamos el array
        return $ListarTipoCargo;

    }







    public function seleccionarNombreCargo($NombreCargo = array()) {

        $planConsulta = "select * from Cargo c ";
        $planConsulta .= " where c.NombreCargo = ? ;";

        $listar = $this->Conexion->prepare($planConsulta);
        $listar->execute(array($NombreCargo[0]));

        $registroEncontrado = array();

        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }
        $this->CierreConexion();
        if (!empty($registroEncontrado)) {
            return ['exitoSeleccionId' => TRUE, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => FALSE, 'registroEncontrado' => $registroEncontrado];
        }
    }

    public function insertarTipoCargo($registro) {
        try {
            $query = "INSERT INTO tipocargo ";
            $query .= " (IdTipoCargo, NombreTipoCargo, Cargo_IdCargo) ";
            $query .= " VALUES";
            $query .= "(:IdTipoCargo , :NombreTipoCargo , :Cargo_IdCargo); ";

            $inserta = $this->conexion->prepare($query);

            $inserta->bindParam(":IdTipoCargo", $registro['IdTipoCargo']);
            $inserta->bindParam(":NombreTipoCargo", $registro['NombreTipoCargo']);
            $inserta->bindParam(":Cargo_IdCargo", $registro['Cargo_IdCargo']);
           
            $insercion = $inserta->execute();

            $clavePrimariaConQueInserto = $this->conexion->lastInsertId();

            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (PDOException $pdoExc) {
            return ['inserto' => 0, 'resultado' => $pdoExc->errorInfo[2]];
        }
    }
 
    
}