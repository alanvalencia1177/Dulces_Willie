<?php

class ValidadorProducto {

    public function validarFormularioProducto($datos) {
        $mensajesError = NULL;
        $datosViejos = NULL;
        $marcaCampo = NULL;

        /*         * ****Validar datos ingresados************************ */
        foreach ($datos as $key => $value) {
            $datosViejos[$key]=$value;

            switch ($key) {
                case 'CodigoBarrasProducto':
                    $patronCodigoBarrasProducto = "/^[[:digit:]]+$/";
                    if (!preg_match($patronCodigoBarrasProducto, $value)) {
                        $mensajesError['CodigoBarrasProducto']="*1-Formato/Dato incorrecto";                        
                    }
                    break;
                case 'NombreProducto':
//                    $patronDocumento = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/";
//                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronNombreProducto = "//";
                    if (!preg_match($patronNombreProducto, $value)) {
                        $mensajesError['NombreProducto']="*2-Formato/Dato incorrecto";
                    }
                    break;
                    case 'Stock':
                        $patronStock = "/^[[:digit:]]+$/";
                        if (!preg_match($patronStock, $value)) {
                            $mensajesError['Stock']="*3-Formato/Dato incorrecto";
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
