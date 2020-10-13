<?php

include_once PATH . 'modelos/MyCon.php';

class EmpleadoDAO extends MyCon {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {

        $planConsulta = "SELECT p.IdEmpleado,p.DocumentoEmpleado,p.NombreEmpleado,p.ApellidoEmpleado,p.DireccionEmpleado,p.TelefonoEmpleado";
        $planConsulta .= " FROM Empleado p";
        $planConsulta .= " ORDER BY p.IdEmpleado ASC ";

        $registrosEmpleado = $this->Conexion->prepare($planConsulta);
        $registrosEmpleado->execute(); //Ejecución de la consulta 

        $listadoRegistroEmpleado = array();

        while ($registro = $registrosEmpleado->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosEmpleado[] = $registro;
        }

        $this->cierreConexion();

        return $listadoRegistrosEmpleado;
    }

    public function seleccionarId($sId) {

        $planConsulta = "SELECT *";
        $planConsulta .= " FROM Empleado p";
        $planConsulta .= " WHERE p.IdEmpleado = ? ";

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
  

            $query = "INSERT INTO Empleado  ";
            $query .= " (IdEmpleado,DocumentoEmpleado,NombreEmpleado,ApellidoEmpleado,DireccionEmpleado,TelefonoEmpleado) ";
            $query .= " VALUES";
            $query .= "( :IdEmpleado , :DocumentoEmpleado , :NombreEmpleado , :ApellidoEmpleado , :DireccionEmpleado , :TelefonoEmpleado ); ";
            $inserta = $this->Conexion->prepare($query);

            //$inserta->bindParam(":IdEmpleado", NULL);
            $inserta->bindParam(":DocumentoEmpleado", $registro['DocumentoEmpleado']);
            $inserta->bindParam(":NombreEmpleado", $registro['NombreEmpleado']);
            $inserta->bindParam(":ApellidoEmpleado", $registro['ApellidoEmpleado']);
            $inserta->bindParam(":DireccionEmpleado", $registro['DireccionEmpleado']);
            $inserta->bindParam(":TelefonoEmpleado", $registro['TelefonoEmpleado']);
           
            $insercion = $inserta->execute();

            $clavePrimariaConQueInserto = $this->Conexion->lastInsertId();



            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (PDOException $pdoExc) {
            return ['inserto' => 0, 'resultado' => $pdoExc->errorInfo[2]];
        }
    }

    public function actualizar($registro) {


        try {
            $DocumentoEmpleado = $registro[0]['DocumentoEmpleado'];
            $NombreEmpleado = $registro[0]['NombreEmpleado'];
            $ApellidoEmpleado = $registro[0]['ApellidoEmpleado'];
            $DireccionEmpleado = $registro[0]['DireccionEmpleado'];
            $TelefonoEmpleado = $registro[0]['TelefonoEmpleado'];
            $IdEmpleado = $registro[0]['IdEmpleado'];

            if (isset($IdEmpleado)) {
                $actualizar = "UPDATE Empleado SET DocumentoEmpleado= ? , NombreEmpleado = ? , ApellidoEmpleado = ?  , DireccionEmpleado = ?, TelefonoEmpleado = ? WHERE IdEmpleado= ? ;";
                $actualizacion = $this->Conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($DocumentoEmpleado, $NombreEmpleado, $ApellidoEmpleado,  $DireccionEmpleado, $TelefonoEmpleado, $IdEmpleado));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Actualización realizada."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function eliminar($sId = array()) {//Recibe llave primaria a eliminar
        
        $planConsulta = "delete from Empleado ";
        $planConsulta .= " where IdEmpleado = :IdEmpleado ;";
        $eliminar = $this->Conexion->prepare($planConsulta);
        $eliminar->bindParam(':IdEmpleado', $sId[0], PDO::PARAM_INT);
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
                $actualizar = "UPDATE Empleado SET EstadoEmpleado = ? WHERE IdEmpleado= ? ;";
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
                $actualizar = "UPDATE Empleado SET EstadoEmpleado = ? WHERE IdEmpleado= ? ;";
                $actualizacion = $this->Conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Activado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }    
    
}
