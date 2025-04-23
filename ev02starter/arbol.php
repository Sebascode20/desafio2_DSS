<?php
require_once('Connections/conn.php');


$inputCarnet = "";

$recorrerArbol = false;

if (isset($_POST['okForm']) && $_POST['okForm'] == 'Continuar') {
    
     spl_autoload_register(function($class) {
        require_once "class/" . $class . ".class.php";
    });


    $recorrerArbol = true;

    //mf220973

    $inputCarnet = strval($_POST['inputCarnet']);


    $Utilidades = new Utilidades();
    
    // Inicio Insertar en LOG
    //$row_id = mysql_insert_id();
    $TABLA_LOG = "'arbol'";
    $TIPO_CONSULTA_LOG = "'SELECT'";
    include 'inc_bitacora.php';
}


$TituloSeccion = "Recorrer Arbol";
?>
<!doctype html>
<html lang="es">
    <head>
        <?php require_once('head.php'); ?>
    </head>
    <body>
        <div class="d-flex align-items-center justify-content-center" >
            <div class="col-sm-7">
                <div class="text-center border border-primary rounded">                    
                    <?php require_once('menu.php'); ?>
                    <center>
                        <p class="lead">
                            Recorrer la estructura creada desde el aplicativo
                            <br>
                        </p>
                        <form class="form-horizontal form-outline col-sm-5" name="formUsuarios" id="formUsuarios" method="POST" role="form" action="arbol.php" autocomplete="off">
                            <div class="row">
                                <div class="col">
                                    <label for="inputCarnet">Carnet:</label>
                                    <input type="text" class="form-control" id="inputCarnet" value="" name="inputCarnet" aria-describedby="inputCarnet" required autofocus minlength="4"  maxlength="12">
                                    <input type="hidden" name="okForm" value="Continuar">
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Recorrer Estructura</button><br><br>
                            </div>
                        </form>
                    </center>
                    <div class="text-left border-primary rounded">
                        <?php

                        if ($recorrerArbol) {
                            $nombreDirectorio = $_SERVER["DOCUMENT_ROOT"] . "/desafio2_DSS/ev02starter/" . $inputCarnet;
                            //OBTENGA EL DIRECOTRIO Y CONSTRUYA EL RECORRIDO DEL ARBOL EN BASE A LA CLASE DRECTORIO PROPORCIONADA
                        }
                        ?>
                    </div>  
                </div>  
            </div>
        </div>
        <?php require_once('scripts.php'); ?>
        <br>
    </body>
</html>