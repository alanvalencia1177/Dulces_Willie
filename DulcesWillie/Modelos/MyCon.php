<?php

abstract class MyCon {
    //Definimos las que vamos a usar
    private $Servidor;
    private $Base;
    protected $Conexion;
    //Definimos el constructor de la clase y la cargamos con los parametros a usar
    public function __construct($Servidor,$Base,$Login,$PasswordBD) {
        //capturamos los parametros con la fincion "$this"
        //De los atributos de la clase 
        $this->Servidor=$Servidor;
        $this->Base=$Base;
        //Usamos un "try casht" para la execcion de errores
        try
        {
            //Definimos un array 
            //Con la funcion "SET NAMES \'UTF8\'" se establecera un formato de codificacion de caracteres con 
            //el que trabajara la BD
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'');
            
            //Se prepararan los parametros del gestor la base de datos, el servidor y
            //La base de datos a la que debe conectarse el driver 
            //PDO(PHP DATA OBJECTS)
            //Definimos una variable dsn(data source name) Nombre de la fuente de datos
            $dsn = "mysql:dbname=" . $this->Base . ";host=" . $this->Servidor;
            
            //Se Crea la conexion
            $this->Conexion = new PDO($dsn,$Login,$PasswordBD,$options);
            
            //Se estable los atributos para la caprtura de errores
            $this->Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        //Captura de excepciones
        catch (Exception $ex)
        {
            echo "Error de Conexion " . $ex->getMessage();
        }
    }
    
    //Funcion paracerrar la conexion
    public function CierreConexion() 
    {
        $this->Conexion = null;
    }
}
