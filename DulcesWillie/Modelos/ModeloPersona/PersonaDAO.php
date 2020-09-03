<?php
//Definimos la clase Persona
class Persona
{
    //Definimos los atributos de la clase
    protected $IdPersona;
    protected $NombrePersona;
    protected $ApellidoPersona;
    protected $DireccionPersona;
    
    //Definimos un constructor y lo sobrecargamos con parametros
    public function __construct($IdPersona,$NombrePersona,$ApellidoPersona,$DireccionPersona)
    {
        //Usamos la funcion $this para igualar 
        //las varibales con los parametros del constructor
        $this->IdPersona = $IdPersona;
        $this->NombrePersona = $NombrePersona;
        $this->ApellidoPersona = $ApellidoPersona;
        $this->DireccionPersona = $DireccionPersona;
    }

    //Establecemos los metodos de captura y retorno 
    //Metods GET
    protected function getIdPersona()
    {
        return $this->IdPersona;
    }
    protected function getNombrePersona()
    {
        return $this->NombrePersona;
    }
    protected function getApellidoPersona()
    {
        return $this->ApellidoPersona;
    }
    protected function getDireccionPersona()
    {
        return $this->DireccionPersona;
    }

    //Metodos SET
    protected function setIdPersona()
    {
        $this->IdPersona;
    }
    protected function setNombrePersona()
    {
        $this->NombrePersona;
    }
    protected function setApellidoPersona()
    {
        $this->ApellidoPersona;
    }
    protected function setDireccionPersona()
    {
        $this->DireccionPersona;
    }
}
