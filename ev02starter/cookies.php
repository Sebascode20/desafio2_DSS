<?php
require_once('Connections/conn.php');
//CONSTRUYA COOKIES VARIADAS PARA SER REFLEJADAS EN ESTA PANTALLA
spl_autoload_register(function($class) {
    require_once "class/" . $class . ".class.php";
});

setcookie("usuario", "JohnDoe", time() + 3600, "/"); 
setcookie("tema", "oscuro", time() + 3600, "/"); 
setcookie("idioma", "es", time() + 3600, "/"); 

$Utilidades = new Utilidades();

$TituloSeccion = "Cookies del Sistema";

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
                        <?php
                        //MUESTRE Y FORMATEE LAS COOKIES DEL SISTEMA UTILICE EL METODO nicevar DE LA CLASE UTILIDADES
                        echo $Utilidades->nicevar($_COOKIE);
                        ?>
                    </center>
                </div>  
            </div>
        </div>
        <?php require_once('scripts.php'); ?>
    </body>
</html>