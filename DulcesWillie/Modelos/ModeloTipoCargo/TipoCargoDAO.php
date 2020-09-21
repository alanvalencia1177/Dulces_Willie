<?php
//include PATH . 'Modelos/MyCon.php';
include_once PATH . 'Modelos/MyCon.php';
//Definimosla clase 
//Esta clase heredara los datos de l clase padre
class TipoCargoDAO extends MyCon
{
    //Declaramos el constructor como metodo el cual recibira los parametros 
    //de la conexion
    function __construct($Servidor, $Base, $Login, $PasswordBD)
    {
        //Atraves de Parent::__construct se le pasa alconstructor
        //dela 'Clase padres' (MyCon) los parametros de la conexion
        //que ha recibido la calse DAO
        parent::__construct($Servidor, $Base, $Login, $PasswordBD);
    }

    //Hacemos una funcion la cual seleccionara todos los registros
    public function CargarComboCargo()
    {
        //Definimos una variable la cual tendra la sentencia MySQL
        $Cargo = "Select * From Cargo";
        //Declaramos una variable la cual Contendra la 
        //la informacion que que tiene la variable "$DetFacturaCompra"
        //Funcion prepare nos dara integridad segura de los datos que se estan enviando 
        $RegCargo = $this->Conexion->prepare($Cargo);
        //Ejecutamos la la variable 
        $RegCargo->execute();
        //Definimos un array vacio el cual nos guadara los datos que se le envien
        $ListarCargo = array();
        //Hacemos un ciclo para que nos cargue el array
        while ($Registro = $RegCargo->fetch(PDO::FETCH_OBJ)) {
            //Le damos los datos al array que creamos anteriormente
            $ListarCargo[] = $Registro;
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
        $TipoCargo = "Select * From TipoCargo";
        //Declaramos una variable la cual Contendra la 
        //la informacion que que tiene la variable "$DetFacturaCompra"
        //Funcion prepare nos dara integridad segura de los datos que se estan enviando 
        $RegTipoCargo = $this->Conexion->prepare($TipoCargo);
        //Ejecutamos la la variable 
        $RegTipoCargo->execute();
        //Definimos un array vacio el cual nos guadara los datos que se le envien
        $ListarTipoCargo = array();
        //Hacemos un ciclo para que nos cargue el array
        while ($Registro = $RegTipoCargo->fetch(PDO::FETCH_OBJ)) {
            //Le damos los datos al array que creamos anteriormente
            $ListarTipoCargo[] = $Registro;
        }
        //Cerramos la conexion 
        $this->CierreConexion();
        //Retornamos el array
        return $ListarTipoCargo;
    }
    public function seleccionarNombreTipoCargo($NombreTipoCargo)
    {

        $planConsulta = "select * from tipocargo ";
        $planConsulta .= " where NombreTipoCargo = ? ;";

        $listar = $this->Conexion->prepare($planConsulta);
        $listar->execute(array($NombreTipoCargo));
        
        $registroEncontrado = array();

        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }
        $this->cierreConexion();
        if (!empty($registroEncontrado)) {
            return ['exitoSeleccionId' => TRUE, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => FALSE, 'registroEncontrado' => $registroEncontrado];
        }
    }

    public function insertarTipoCargo($registro)
    {
        try {
            
            $query = "INSERT INTO tipocargo ";
            $query .= " (NombreTipoCargo, Cargo_IdCargo) ";
            $query .= " VALUES";
            $query .= "(:NombreTipoCargo , :Cargo_IdCargo); ";

            $inserta = $this->Conexion->prepare($query);

            $inserta->bindParam(":NombreTipoCargo", $registro['NombreTipoCargo']);
            $inserta->bindParam(":Cargo_IdCargo", $registro['Cargo_IdCargo']);

            $insercion = $inserta->execute();

            $clavePrimariaConQueInserto = $this->Conexion->lastInsertId();

            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (PDOException $pdoExc) {
            return ['inserto' => 0, 'resultado' => $pdoExc->errorInfo[2]];
        }
    }
    public function seleccionarId($sId) {

        $planConsulta = "select TC.IdTipoCargo,TC.NombreTipoCargo,C.IdCargo,C.NombreCargo from ";
        $planConsulta .= " TipoCargo as TC ";
        $planConsulta .= " INNER JOIN Cargo as C ";
        $planConsulta .= " ON TC.Cargo_IdCargo = C.IdCargo ";
        $planConsulta .= " WHERE TC.IdTipoCargo= ? ;";
        
        
        

        $listar = $this->Conexion->prepare($planConsulta);
        $listar->execute(array($sId));

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

    public function actualizar($registro) {


        try {
            $NombreTipoCargo = $registro[0]['NombreTipoCargo'];
            //$DescripcionCargo = $registro[0]['DescripcionCargo'];
            $IdTipoCargo = $registro[0]['IdTipoCargo'];

            if (isset($IdTipoCargo)) {
                $actualizar = "UPDATE TipoCargo SET NombreTipoCargo= ?  WHERE IdTipoCargo= ? ;";
                $actualizacion = $this->Conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($NombreTipoCargo,$IdTipoCargo));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Actualización realizada."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

}
