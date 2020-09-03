<?php

class Validaciones
{
    //Hacenmos una funcion
    public function ValidarTipoCargo($Datos)
    {
        //Variables que vamosa usar
        $MensajeError = NULL;
        $DatosViejos = NULL;
        $MarcaCampo = NULL;

        /*----------------------------------------*/

        
        /*----------------------------------------*/
        //Hacemos una condicion para preguntar que me traen
        if (is_null($MensajeError)) {
            return array('DatosViejos' => $DatosViejos, '$MensajeError' => $MensajeError, 'MarcaCampo' => $MarcaCampo);
        } else {
            $DatosViejos = NULL;
            return FALSE;
        }
    }
}
