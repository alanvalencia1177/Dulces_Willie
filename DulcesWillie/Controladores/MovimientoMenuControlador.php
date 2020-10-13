<?php
//Incluimos las clases pertinentes

class MovimientoMenuControlador
{
    //Definimos lavariablesque se usaran 
    private $datos;
    //    Definimos el constructor de la clase
    public function __construct($datos)
    {
        $this->datos = $datos;
        $this->MovimientoMenuControlador();
    }
    //Hacemos una funcion la cual nospermitira el paso asi la vista
    public function MovimientoMenuControlador()
    {
        //Hacemos un switch case para definir el comportamiento
        //y le damos el valor que viene por la peticion de la vista
        switch ($this->datos['ruta']) {
            case "Movimiento":
                header("Location: Principal.php?contenido=Vistas/VistasMovimiento/MovimientoMenu.php");
                break;
           
          }
}
}
