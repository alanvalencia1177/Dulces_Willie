<?php

include_once PATH . 'modelos/MyCon.php';

class ProveedorDAO extends MyCon {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {

        $planConsulta = "SELECT p.IdProveedor,p.NombreProveedor,p.NitProveedor,p.DescripcionProveedor";
        $planConsulta .= " FROM proveedor p";
        $planConsulta .= " ORDER BY p.IdProveedor ASC ";

        $registrosProveedor = $this->Conexion->prepare($planConsulta);
        $registrosProveedor->execute(); //Ejecución de la consulta 

        $listadoRegistroProveedor = array();

        while ($registro = $registrosProveedor->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosProveedor[] = $registro;
        }

        $this->cierreConexion();

        return $listadoRegistrosProveedor;
    }

    public function seleccionarId($sId) {

        $planConsulta = "select * from proveedor p ";
        $planConsulta .= " where p.IdProveedor= ? ;";

        $listar = $this->conexion->prepare($planConsulta);
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
            $query = "INSERT INTO proveedor ";
            $query .= " (p.IdProveedor,p.NombreProveedor,p.NitProveedor,p.DescripcionProveedor) ";
            $query .= " VALUES";
            $query .= "(:IdProveedor , :NombreProveedor , :NitProveedor , :DescripcionProveedor ); ";

            $inserta = $this->conexion->prepare($query);

            $inserta->bindParam(":IdProveedor", $registro['IdProveedor']);
            $inserta->bindParam(":NombreProveedor", $registro['NombreProveedor']);
            $inserta->bindParam(":NitProveedor", $registro['NitProveedor']);
            $inserta->bindParam(":DescripcionProveedor", $registro['DescripcionProveedor']);
           
            $insercion = $inserta->execute();

            $clavePrimariaConQueInserto = $this->conexion->lastInsertId();



            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (PDOException $pdoExc) {
            return ['inserto' => 0, 'resultado' => $pdoExc->errorInfo[2]];
        }
    }

    public function actualizar($registro) {


        try {
            $NombreProveedor = $registro[0]['NombreProveedor'];
            $NitProveedor = $registro[0]['NitProveedor'];
            $DescripcionProveedor = $registro[0]['DescripcionProveedor'];
            $IdProveedor = $registro[0]['IdProveedor'];

            if (isset($IdProveedor)) {
                $actualizar = "UPDATE proveedor SET NombreProveedor= ? , NitProveedor = ? , DescripcionProveedor = ?  WHERE IdProveedor= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($NombreProveedor, $NitProveedor, $DescripcionProveedor,  $IdProveedor));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Actualización realizada."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function eliminar($sId = array()) {//Recibe llave primaria a eliminar
        
        $planConsulta = "delete from proveedor ";
        $planConsulta .= " where IdProveedor= :IdProveedor ;";
        $eliminar = $this->conexion->prepare($planConsulta);
        $eliminar->bindParam(':IdProveedor', $sId[0], PDO::PARAM_INT);
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
                $actualizar = "UPDATE proveedor SET estado = ? WHERE IdProveedor= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
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
                $actualizar = "UPDATE proveedor SET estado = ? WHERE IdProveedor= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Activado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }    
    
}
