<?php

class Validaciones
{
    //Hacenmos una funcion
    public function ValidarTipoCargo($datos)
    {
        //Variables que vamosa usar
        $MensajeError = NULL;
        $datosViejos = NULL;
        $MarcaCampo = NULL;

        /*----------------------------------------*/

        
        /*----------------------------------------*/
        //Hacemos una condicion para preguntar que me traen
        if (is_null($MensajeError)) {
            return array('datosViejos' => $datosViejos, '$MensajeError' => $MensajeError, 'MarcaCampo' => $MarcaCampo);
        } else {
            $datosViejos = NULL;
            return FALSE;
        }
    }
}
