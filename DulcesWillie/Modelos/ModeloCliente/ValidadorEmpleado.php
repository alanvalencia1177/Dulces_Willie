<?php

class ValidadorCliente
{

    public function validarFormularioCliente($datos)
    {
        $mensajesError = NULL;
        $datosViejos = NULL;
        $marcaCampo = NULL;

        /*         * ****Validar datos ingresados************************ */
        foreach ($datos as $key => $value) {
            $datosViejos[$key] = $value;

            switch ($key) {
                case 'IdCliente':
                    $patronIdCliente = "/^[[:digit:]]+$/";
                    if (!preg_match($patronIdCliente, $value)) {
                        $mensajesError['IdCliente'] = "*1-Formato/Dato incorrecto";
                    }
                    break;
                case 'DocumentoCliente':
                    $patronDocumentoCliente = "/^[[:digit:]]+$/";
                    if (!preg_match($patronDocumentoCliente, $value)) {
                        $mensajesError['DocumentoCliente'] = "*2-Formato/Dato incorrecto";
                    }
                    break;
                case 'NombreCliente':
                    //                    $patronDocumento = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/";
                    //                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronNombreCliente = "//";
                    if (!preg_match($patronNombreCliente, $value)) {
                        $mensajesError['NombreCliente'] = "*3-Formato/Dato incorrecto";
                    }
                    break;
                case 'ApellidoCliente':
                    //                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronApellidoCliente = "//";
                    if (!preg_match($patronApellidoCliente, $value)) {
                        $mensajesError['ApellidoCliente'] = "*4-Formato/Dato incorrecto";
                    }
                    break;
                case 'DireccionCliente':
                    //                    $patronDocumento = "/^[^ ][0-9a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ- ]*$/";
                    $patronDireccionCliente = "//";
                    if (!preg_match($patronDireccionCliente, $value)) {
                        $mensajesError['DireccionCliente'] = "*5-Formato/Dato incorrecto";
                    }
                    break;

                case 'TelefonoCliente':
                    $patronTelefonoCliente = "/^[[:digit:]]+$/";
                    if (!preg_match($patronTelefonoCliente, $value)) {
                        $mensajesError['TelefonoCliente'] = "*6-Formato/Dato incorrecto";
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
