<?php
require_once('Connections/conn.php');

//IMPLMENTAR MECANISMO DE AUTENTICACION POR SESIONES

$inputCarnet = "";

$recorrerArbol = false;

$ImgSubida = false;

if (isset($_POST['okForm']) && $_POST['okForm'] == 'Continuar') {

    spl_autoload_register(function($class) {
        require_once "class/" . $class . ".class.php";
    });



    $inputCarnet = $_POST['inputCarnet'];

    $inputCarnet = $_POST['inputCarnet'];

    $inputDocumentos = $inputCarnet . "/DOCUMENTOS";

    $inputImgs = $inputDocumentos . "/IMAGENES/";

    $target_path = $inputImgs . basename($_FILES['adjunto']['name']);

    $ImgSubida = false;

    //NO OLVIDE SUBIR LA IMAGEN AL SERVIDOR

    $recorrerArbol = true;

    $Utilidades = new Utilidades();

    //NO OLVIDE LA BITACORA
}


$TituloSeccion = "Procesar Im&aacute;genes";
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
                            Debe crear subir dos im&aacute;genes dentro de la ruta especificada.
                            <br><b>img01.jpg</b>, debe se una imagen de baja resoluci&oacute;n
                            <br><b>img02.jpg</b>, debe se una imagen de alta resoluci&oacute;n
                            <?php if ($ImgSubida) { ?>
                            <div class="alert alert-primary" role="alert">
                                Im&aacute;gen Subida al Servidor!
                            </div>
                        <?php } ?>
                        <br>
                        </p>
                        <form class="form-horizontal form-outline col-sm-9" name="formUsuarios" id="formUsuarios" method="POST" role="form" action="GeneradorImgs.php" autocomplete="off" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <label for="inputCarnet">Carnet:</label>
                                    <input type="text" class="form-control" id="inputCarnet" value="<?php echo $inputCarnet; ?>" name="inputCarnet" aria-describedby="inputCarnet" required autofocus minlength="4"  maxlength="12">
                                    <input type="hidden" name="okForm" value="Continuar">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="max_file_size" value="2500000" />
                                    <label for="adjunto">Archivo a adjuntar:</label>
                                    <input type="file" name="adjunto" id="adjunto" /><br />
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Subir Im&aacute;gen</button><br><br>
                            </div>
                        </form>
                    </center>
                    <div class="text-left border-primary rounded">
                        <?php
                        if ($recorrerArbol) {
                            $nombreDirectorio = $_SERVER["DOCUMENT_ROOT"] . "/desafio2_DSS/ev02starter/" . $inputCarnet;
                            $directorio = new Directorio($nombreDirectorio);
                            $directorio->imprimirArbol();
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