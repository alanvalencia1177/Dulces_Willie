<?php

include_once PATH . 'modelos/MyCon.php';

class ClienteDAO extends MyCon {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {

        $planConsulta = "SELECT p.IdCliente,p.DocumentoCliente,p.NombreCliente,p.ApellidoCliente,p.DireccionCliente,p.TelefonoCliente";
        $planConsulta .= " FROM cliente p";
        $planConsulta .= " ORDER BY p.IdCliente ASC ";

        $registrosCliente = $this->Conexion->prepare($planConsulta);
        $registrosCliente->execute(); //Ejecución de la consulta 

        $listadoRegistroCliente = array();

        while ($registro = $registrosCliente->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosCliente[] = $registro;
        }

        $this->cierreConexion();

        return $listadoRegistrosCliente;
    }

    public function seleccionarId($sId) {

        $planConsulta = "SELECT *";
        $planConsulta .= " FROM cliente p";
        $planConsulta .= " WHERE p.IdCliente = ? ";

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
  

            $query = "INSERT INTO cliente  ";
            $query .= " (IdCliente,DocumentoCliente,NombreCliente,ApellidoCliente,DireccionCliente,TelefonoCliente) ";
            $query .= " VALUES";
            $query .= "( :IdCliente , :DocumentoCliente , :NombreCliente , :ApellidoCliente , :DireccionCliente , :TelefonoCliente ); ";
            $inserta = $this->Conexion->prepare($query);

            //$inserta->bindParam(":IdCliente", NULL);
            $inserta->bindParam(":DocumentoCliente", $registro['DocumentoCliente']);
            $inserta->bindParam(":NombreCliente", $registro['NombreCliente']);
            $inserta->bindParam(":ApellidoCliente", $registro['ApellidoCliente']);
            $inserta->bindParam(":DireccionCliente", $registro['DireccionCliente']);
            $inserta->bindParam(":TelefonoCliente", $registro['TelefonoCliente']);
           
            $insercion = $inserta->execute();

            $clavePrimariaConQueInserto = $this->Conexion->lastInsertId();



            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (PDOException $pdoExc) {
            return ['inserto' => 0, 'resultado' => $pdoExc->errorInfo[2]];
        }
    }

    public function actualizar($registro) {


        try {
            $DocumentoCliente = $registro[0]['DocumentoCliente'];
            $NombreCliente = $registro[0]['NombreCliente'];
            $ApellidoCliente = $registro[0]['ApellidoCliente'];
            $DireccionCliente = $registro[0]['DireccionCliente'];
            $TelefonoCliente = $registro[0]['TelefonoCliente'];
            $IdCliente = $registro[0]['IdCliente'];

            if (isset($IdCliente)) {
                $actualizar = "UPDATE cliente SET DocumentoCliente= ? , NombreCliente = ? , ApellidoCliente = ?  , DireccionCliente = ?, TelefonoCliente = ? WHERE IdCliente= ? ;";
                $actualizacion = $this->Conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($DocumentoCliente, $NombreCliente, $ApellidoCliente,  $DireccionCliente, $TelefonoCliente, $IdCliente));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Actualización realizada."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function eliminar($sId = array()) {//Recibe llave primaria a eliminar
        
        $planConsulta = "delete from cliente ";
        $planConsulta .= " where IdCliente = :IdCliente ;";
        $eliminar = $this->Conexion->prepare($planConsulta);
        $eliminar->bindParam(':IdCliente', $sId[0], PDO::PARAM_INT);
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
                $actualizar = "UPDATE cliente SET EstadoCliente = ? WHERE IdCliente= ? ;";
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
                $actualizar = "UPDATE cliente SET EstadoCliente = ? WHERE IdCliente= ? ;";
                $actualizacion = $this->Conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Activado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }    
    
}
