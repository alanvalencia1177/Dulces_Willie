<?php

class ValidadorEmpleado
{

    public function validarFormularioEmpleado($datos)
    {
        $mensajesError = NULL;
        $datosViejos = NULL;
        $marcaCampo = NULL;

        /*         * ****Validar datos ingresados************************ */
        foreach ($datos as $key => $value) {
            $datosViejos[$key] = $value;

            switch ($key) {
                case 'IdEmpleado':
                    $patronIdEmpleado = "/^[[:digit:]]+$/";
                    if (!preg_match($patronIdEmpleado, $value)) {
                        $mensajesError['IdEmpleado'] = "*1-Formato/Dato incorrecto";
                    }
                    break;
                case 'DocumentoEmpleado':
                    $patronDocumentoEmpleado = "/^[[:digit:]]+$/";
                    if (!preg_match($patronDocumentoEmpleado, $value)) {
                        $mensajesError['DocumentoEmpleado'] = "*2-Formato/Dato incorrecto";
                    }
                    break;
                case 'NombreEmpleado':
                    //                    $patronDocumento = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/";
                    //                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronNombreEmpleado = "//";
                    if (!preg_match($patronNombreEmpleado, $value)) {
                        $mensajesError['NombreEmpleado'] = "*3-Formato/Dato incorrecto";
                    }
                    break;
                case 'ApellidoEmpleado':
                    //                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronApellidoEmpleado = "//";
                    if (!preg_match($patronApellidoEmpleado, $value)) {
                        $mensajesError['ApellidoEmpleado'] = "*4-Formato/Dato incorrecto";
                    }
                    break;
                case 'DireccionEmpleado':
                    //                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronDireccionEmpleado = "//";
                    if (!preg_match($patronDireccionEmpleado, $value)) {
                        $mensajesError['DireccionEmpleado'] = "*5-Formato/Dato incorrecto";
                    }
                    break;

                case 'TelefonoEmpleado':
                    $patronTelefonoEmpleado = "/^[[:digit:]]+$/";
                    if (!preg_match($patronTelefonoEmpleado, $value)) {
                        $mensajesError['TelefonoEmpleado'] = "*6-Formato/Dato incorrecto";
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
