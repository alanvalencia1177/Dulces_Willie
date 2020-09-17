<?php

class ValidadorPersona
{

    public function validarFormularioPersona($datos)
    {
        $mensajesError = NULL;
        $datosViejos = NULL;
        $marcaCampo = NULL;

        /*         * ****Validar datos ingresados************************ */
        foreach ($datos as $key => $value) {
            $datosViejos[$key] = $value;

            switch ($key) {
                case 'IdPersona':
                    $patronIdPersona = "/^[[:digit:]]+$/";
                    if (!preg_match($patronIdPersona, $value)) {
                        $mensajesError['IdPersona'] = "*1-Formato/Dato incorrecto";
                    }
                    break;
                case 'DocumentoIdentificacionPersona':
                    $patronDocumentoIdentificacionPersona = "/^[[:digit:]]+$/";
                    if (!preg_match($patronDocumentoIdentificacionPersona, $value)) {
                        $mensajesError['DocumentoIdentificacionPersona'] = "*2-Formato/Dato incorrecto";
                    }
                    break;
                case 'NombrePersona':
                    //                    $patronDocumento = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/";
                    //                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronNombrePersona = "//";
                    if (!preg_match($patronNombrePersona, $value)) {
                        $mensajesError['NombrePersona'] = "*3-Formato/Dato incorrecto";
                    }
                    break;
                case 'ApellidoPersona':
                    //                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronApellidoPersona = "//";
                    if (!preg_match($patronApellidoPersona, $value)) {
                        $mensajesError['ApellidoPersona'] = "*4-Formato/Dato incorrecto";
                    }
                    break;
                case 'DireccionPersona':
                    //                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronDireccionPersona = "//";
                    if (!preg_match($patronDireccionPersona, $value)) {
                        $mensajesError['DireccionPersona'] = "*5-Formato/Dato incorrecto";
                    }
                    break;

                case 'TelefonoPersona':
                    $patronTelefonoPersona = "/^[[:digit:]]+$/";
                    if (!preg_match($patronTelefonoPersona, $value)) {
                        $mensajesError['TelefonoPersona'] = "*6-Formato/Dato incorrecto";
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
