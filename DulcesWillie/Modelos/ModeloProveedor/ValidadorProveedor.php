<?php

class ValidadorProveedor {

    public function validarFormularioProveedor($datos) {
        $mensajesError = NULL;
        $datosViejos = NULL;
        $marcaCampo = NULL;

        /*         * ****Validar datos ingresados************************ */
        foreach ($datos as $key => $value) {
            $datosViejos[$key]=$value;

            switch ($key) {
                case 'IdProveedor':
                    $patronDocumento = "/^[[:digit:]]+$/";
                    if (!preg_match($patronDocumento, $value)) {
                        $mensajesError['IdProveedor']="*1-Formato/Dato incorrecto";                        
                    }
                    break;
                case 'NombreProveedor':
//                    $patronDocumento = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/";
//                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronNombreProveedor = "//";
                    if (!preg_match($patronNombreProveedor, $value)) {
                        $mensajesError['NombreProveedor']="*2-Formato/Dato incorrecto";
                    }
                    break;
                    case 'NitProveedor':
                        $patronNitProveedor = "/^[[:digit:]]+$/";
                        if (!preg_match($patronNitProveedor, $value)) {
                            $mensajesError['NitProveedor']="*3-Formato/Dato incorrecto";
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
