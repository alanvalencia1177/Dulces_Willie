<?php

include_once PATH . 'modelos/MyCon.php';

class CargoDAO extends MyCon {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {

        $planConsulta = "SELECT c.IdCargo,c.NombreCargo,c.DescripcionCargo";
        $planConsulta .= " FROM cargo c";
        $planConsulta .= " ORDER BY c.IdCargo ASC ";

        $registrosCargo = $this->Conexion->prepare($planConsulta);
        $registrosCargo->execute(); //Ejecución de la consulta 

        $listadoRegistrosCargo = array();

        while ($registro = $registrosCargo->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosCargo[] = $registro;
        }

        $this->cierreConexion();

        return $listadoRegistrosCargo;
    }

    public function seleccionarId($sId) {

        $planConsulta = "select * from cargo c ";
        $planConsulta .= " where c.IdCargo= ? ;";

        $listar = $this->Conexion->prepare($planConsulta);
        $listar->execute(array($sId));

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

    public function insertar($registro) {
        try {
            $query = "INSERT INTO cargo ";
            $query .= " (IdCargo, NombreCargo, DescripcionCargo) ";
            $query .= " VALUES";
            $query .= "(:IdCargo , :NombreCargo , :DescripcionCargo ); ";

            $inserta = $this->Conexion->prepare($query);

            $inserta->bindParam(":IdCargo", $registro['IdCargo']);
            $inserta->bindParam(":NombreCargo", $registro['NombreCargo']);
            $inserta->bindParam(":DescripcionCargo", $registro['DescripcionCargo']);
            
            $insercion = $inserta->execute();

            $clavePrimariaConQueInserto = $this->Conexion->lastInsertId();



            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (PDOException $pdoExc) {
            return ['inserto' => 0, 'resultado' => $pdoExc->errorInfo[2]];
        }
    }

    public function actualizar($registro) {


        try {
            $NombreCargo = $registro[0]['NombreCargo'];
            $DescripcionCargo = $registro[0]['DescripcionCargo'];
            $IdCargo = $registro[0]['IdCargo'];

            if (isset($IdCargo)) {
                $actualizar = "UPDATE cargo SET NombreCargo= ? , DescripcionCargo = ?  WHERE IdCargo= ? ;";
                $actualizacion = $this->Conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($NombreCargo, $DescripcionCargo, $IdCargo));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Actualización realizada."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function eliminar($sId = array()) {//Recibe llave primaria a eliminar
        
        $planConsulta = "delete from cargo ";
        $planConsulta .= " where IdCargo= :IdCargo ;";
        $eliminar = $this->Conexion->prepare($planConsulta);
        $eliminar->bindParam(':IdCargo', $sId[0], PDO::PARAM_INT);
        $resultado = $eliminar->execute();

        $this->cierreConexion();

        if (!empty($resultado)) {
            return ['eliminar' => TRUE, 'registroEliminado' => array($sId[0])];
        } else {
            return ['eliminar' => FALSE, 'registroEliminado' => array($sId[0])];
        }
    }
//////
    public function eliminarLogico($sId = array()) {// Se deshabilita un registro cambiando su estado a 0
        try {

            $cambiarEstado = 0;

            if (isset($sId[0])) {
                $actualizar = "UPDATE cargo SET estado = ? WHERE IdCargo= ? ;";
                $actualizacion = $this->Conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Inactivado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function habilitar($sId = array()) {// Se habilita un registro cambiando su estado a 1
        try {

            $cambiarEstado = 1;

            if (isset($sId[0])) {
                $actualizar = "UPDATE cargo SET estado = ? WHERE IdCargo= ? ;";
                $actualizacion = $this->Conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Activado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }    
    
}
