<!DOCTYPE html>
<meta charset="utf-8">

<html>
    <head>
        <link rel="stylesheet" href="css.css">
        <style type="text/css">
            #menu ul li {
    background-color:#2e518b;
}

#menu ul {
    list-style:none;
    margin:0;
    padding:0;
}

#menu ul a {
    display:block;
    color:#fff;
    text-decoration:none;
    font-weight:400;
    font-size:15px;
    padding:10px;
    font-family:"HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
  text-transform:uppercase;
  letter-spacing:1px;
}

#menu ul li {
    position:relative;
    float:left;
    margin:0;
    padding:0;
}

#menu ul li:hover {
    background:#5b78a7;
}

#menu ul ul {
    display:none;
    position:absolute;
    top:100%;
    left:0;
    padding:0;
}

#menu ul ul li {
    float:none;
    width:150px
}

#menu ul ul a {
    line-height:120%;
    padding:10px 15px;
}

#menu ul li:hover > ul {
    display:block;
}
        </style>
            <title>Dulces Willi'e</title>
        </head>
        <body>
        <center>
            <br><br><br><br>
            <table  id="tabla" border="1" >
                <tr>
                    <th colspan="5"><center><label> Menu principal</label></center></th>
                </tr>
            <tr>
                <td>
        <nav id="menu">
        <ul>
          <li><a href="#">Cargo</a>
            <ul>
              <li><a href="Controlador.php?ruta=mostrarInsertarCargo">Gestor Cargo</a></li>
              <li><a href="Controlador.php?ruta=listarCargo">
                  Listado de los cargos
              </a></li>
              <li><a href="#">Enlace 2.3</a></li>
            </ul>
          </li>
          <li><a href="#">Tipo Cargo</a>
            <ul>
              <li><a href="Controlador.php?ruta=mostrarInsertarTipoCargo">Insertar tipos de cargos</a></li>
              <li><a href="Controlador.php?ruta=listarTipoCargo">Mostar todos los cargos</a></li>
              
            </ul>
          </li>
          <li><a href="#">Empleado</a>
        <ul>
              
              <li><a href="Controlador.php?ruta=mostrarInsertarPersona">Gestor empleado</a></li>
              <li><a href="Controlador.php?ruta=listarPersona">Listado de los empleados </a></li>
              
            </ul>
          </li>
          <li><a href="#">Provedor</a>
        <ul>
              <li><a href="Controlador.php?ruta=mostrarInsertarProveedor">Insertar provedores</a></li>
              <li><a href="Controlador.php?ruta=listarProveedor">Mostar todos los proveedores</a></li>
              
            </ul>
          </li>
        </ul>
        </nav>
  </td>                
            </tr>
          
            </table>
            
</center>




    </body>
</html>

