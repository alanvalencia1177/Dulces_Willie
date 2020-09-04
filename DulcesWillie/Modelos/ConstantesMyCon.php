<?php

//Variables Constantes
//Defonoremos las variables que usaremos
//Tienden a estar en mayusculas
define("BASE", "willie"); //se define una constante para la base, de ahora en adelante BASE
define("SERVIDOR", "localhost"); //se define una constante para el servidor, de ahora en adelante SERVIDOR
define("USUARIO_BD", "root"); //se define una constante para el usuario de la base, de ahora en adelante USUARIO_BD
define("CONTRASENIA_BD", ""); //se define una constante para la contraseña,de ahora en adelante CONTRASENIA_BD


/*Se definira la ruta en la cual se encuetra el 
index de su proyecto a la ruta 'documentroor'*/

define("PATH",$_SERVER['DOCUMENT_ROOT']."/"."TrabajoRepositorio"."/"."DulcesWillie"."/");
echo PATH;
