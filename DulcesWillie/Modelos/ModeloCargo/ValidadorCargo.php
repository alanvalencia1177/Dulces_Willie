<?php

class ValidadorCargo {

    public function validarFormularioCargo($datos) {
        $mensajesError = NULL;
        $datosViejos = NULL;
        $marcaCampo = NULL;

        /*         * ****Validar datos ingresados************************ */
        foreach ($datos as $key => $value) {
            $datosViejos[$key]=$value;

            switch ($key) {
                case 'IdCargo':
                    $patronIdCargo = "/^[[:digit:]]+$/";
                    if (!preg_match($patronIdCargo, $value)) {
                        $mensajesError['IdCargo']="*1-Formato/Dato incorrecto";                        
                    }
                    break;
                case 'NombreCargo':
//                    $patronDocumento = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/";
//                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronNombreCargo = "//";
                    if (!preg_match($patronNombreCargo, $value)) {
                        $mensajesError['NombreCargo']="*2-Formato/Dato incorrecto";
                    }
                    break;
                   
    
                case 'DescripcionCargo':
//                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronDescripcionCargo = "//";
                    if (!preg_match($patronDescripcionCargo, $value)) {
                        $mensajesError['DescripcionCargo']="*4-Formato/Dato incorrecto";
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