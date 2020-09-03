<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0,minimum-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/Estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <title>Dulces Willi'e</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!----Hacemos la cabeza de la pagina----->
            <div class="col-12 col-sm-12 col-md-12" id="Encabezado">

                <center>
                    <marquee scrollamount="10" BEHAVIOR=ALTERNATE> <img src="../Recursos/Willie.jpg" id="ImagenEncabezado"></marquee>
                </center>


            </div>
        </div>
        <div class="row">
            <!------Hacemos menu de la pagina----------->
            <div class="col-2 col-sm-2 col-md-2" id="Menu_Derecho">

                <!----Incluimos el formulario---->

                <?php
                include("Menu.php");

                ?>
            </div>
            <div class="col-10 col-sm-10 col-md-10 col-lg-10">
                </br></br>
                <div class="container" id="Fondo_Panel">

                        <div >
                                <center>
                                    <img src="../Recursos/Producto1.png" id='InicioImagen'>
                        </center>
                             
                        </div>
                   

                </div>

            </div>

        </div>

        <!-------------------------------------------->
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</body>

</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>