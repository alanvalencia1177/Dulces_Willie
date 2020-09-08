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
                    $patronDocumento = "//";
                    if (!preg_match($patronDocumento, $value)) {
                        $mensajesError['NombreProveedor']="*2-Formato/Dato incorrecto";
                    }
                    break;
                case 'NitProveedor':
//                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronDocumento = "//";
                    if (!preg_match($patronDocumento, $value)) {
                        $mensajesError['NitProveedor']="*3-Formato/Dato incorrecto";
                    }
                    break;
                case 'DescripcionProveedor':
                    $patronDocumento = "/^[[:digit:]]+$/";
                    if (!preg_match($patronDocumento, $value)) {
                        $mensajesError['DescripcionProveedor']="*1-Formato/Dato incorrecto";
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
