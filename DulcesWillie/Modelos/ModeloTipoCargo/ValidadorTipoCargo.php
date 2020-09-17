<?php
class ValidadorTipoCargo {

public function validarFormularioProveedor($datos) {
    $mensajesError = NULL;
    $datosViejos = NULL;
    $marcaCampo = NULL;

    /*         * ****Validar datos ingresados************************ */
    foreach ($datos as $key => $value) {
        $datosViejos[$key]=$value;

        switch ($key) {
            
            case 'NombreTipoCargo':
//                    $patronDocumento = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/";
//                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                $patronNombreTipoCargo = "//";
                if (!preg_match($patronNombreTipoCargo, $value)) {
                    $mensajesError['NombreTipoCargo']="*2-Formato/Dato incorrecto";
                }
                break;
    

            case 'DescripcionProveedor':
//                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                $patronDescripcionProveedor = "//";
                if (!preg_match($patronDescripcionProveedor, $value)) {
                    $mensajesError['DescripcionProveedor']="*4-Formato/Dato incorrecto";
                }
                break;
          
        }
    }
    /*         * *********************************************** */

    if (!is_null($mensajesError)) {
        return array('datosViejos' => $datosViejos, 'mensajesError' => $mensajesError, 'marcaCampo' => $marcaCampo);
    } else {
        $datosViejos = NULL;
        return FALSE;
    }
}
}
