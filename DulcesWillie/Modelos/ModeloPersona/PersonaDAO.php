<?php

include_once PATH . 'modelos/MyCon.php';

class PersonaDAO extends MyCon {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {

        $planConsulta = "SELECT p.IdPersona,p.DocumentoIdentificacionPersona,p.NombrePersona,p.ApellidoPersona,p.DireccionPersona,p.TelefonoPersona";
        $planConsulta .= " FROM persona p";
        $planConsulta .= " ORDER BY p.IdPersona ASC ";

        $registrosPersona = $this->Conexion->prepare($planConsulta);
        $registrosPersona->execute(); //Ejecución de la consulta 

        $listadoRegistroPersona = array();

        while ($registro = $registrosPersona->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosPersona[] = $registro;
        }

        $this->cierreConexion();

        return $listadoRegistrosPersona;
    }

    public function seleccionarId($sId) {

        $planConsulta = "SELECT *";
        $planConsulta .= " FROM persona p";
        $planConsulta .= " WHERE p.IdPersona = ? ";

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
       // echo "<pre>";
       // print_r($registro);
       // echo "</pre>";
       // exit();

            $query = "INSERT INTO persona  ";
            $query .= " (IdPersona,DocumentoIdentificacionPersona,NombrePersona,ApellidoPersona,DireccionPersona,TelefonoPersona) ";
            $query .= " VALUES";
            $query .= "( :IdPersona , :DocumentoIdentificacionPersona , :NombrePersona , :ApellidoPersona , :DireccionPersona , :TelefonoPersona ); ";
            $inserta = $this->Conexion->prepare($query);

            //$inserta->bindParam(":IdPersona", NULL);
            $inserta->bindParam(":DocumentoIdentificacionPersona", $registro['DocumentoIdentificacionPersona']);
            $inserta->bindParam(":NombrePersona", $registro['NombrePersona']);
            $inserta->bindParam(":ApellidoPersona", $registro['ApellidoPersona']);
            $inserta->bindParam(":DireccionPersona", $registro['DireccionPersona']);
            $inserta->bindParam(":TelefonoPersona", $registro['TelefonoPersona']);
           
            $insercion = $inserta->execute();

            $clavePrimariaConQueInserto = $this->Conexion->lastInsertId();



            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (PDOException $pdoExc) {
            return ['inserto' => 0, 'resultado' => $pdoExc->errorInfo[2]];
        }
    }

    public function actualizar($registro) {


        try {
            $DocumentoIdentificacionPersona = $registro[0]['DocumentoIdentificacionPersona'];
            $NombrePersona = $registro[0]['NombrePersona'];
            $ApellidoPersona = $registro[0]['ApellidoPersona'];
            $DireccionPersona = $registro[0]['DireccionPersona'];
            $TelefonoPersona = $registro[0]['TelefonoPersona'];
            $IdPersona = $registro[0]['IdPersona'];

            if (isset($IdPersona)) {
                $actualizar = "UPDATE persona SET DocumentoIdentificacionPersona= ? , NombrePersona = ? , ApellidoPersona = ?  , DireccionPersona = ?, TelefonoPersona = ? WHERE IdPersona= ? ;";
                $actualizacion = $this->Conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($DocumentoIdentificacionPersona, $NombrePersona, $ApellidoPersona,  $DireccionPersona, $TelefonoPersona, $IdPersona));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Actualización realizada."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function eliminar($sId = array()) {//Recibe llave primaria a eliminar
        
        $planConsulta = "delete from persona ";
        $planConsulta .= " where IdPersona = :IdPersona ;";
        $eliminar = $this->Conexion->prepare($planConsulta);
        $eliminar->bindParam(':IdPersona', $sId[0], PDO::PARAM_INT);
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
                $actualizar = "UPDATE persona SET estado = ? WHERE IdPersona= ? ;";
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
                $actualizar = "UPDATE persona SET estado = ? WHERE IdPersona= ? ;";
                $actualizacion = $this->Conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Activado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }    
    
}
