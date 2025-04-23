<?php
require_once('Connections/conn.php');

$inputCarnet = "";
$recorrerArbol = false;

if (isset($_POST['okForm']) && $_POST['okForm'] == 'Continuar') {

    spl_autoload_register(function($class) {
        require_once "class/" . $class . ".class.php";
    });

    $Utilidades = new Utilidades();
    $inputCarnet = $Utilidades->limpiar_campos($_POST['inputCarnet']);

    // Obtener ruta absoluta para trabajar
    $basePath = $_SERVER["DOCUMENT_ROOT"] . "/desafio2_DSS/ev02starter/";
    $inputCarnetPath = $basePath . $inputCarnet;
    $inputDocumentos = $inputCarnetPath . "/DOCUMENTOS";
    $inputImagenes = $inputDocumentos . "/IMAGENES";

    // Crear las carpetas si no existen
    if (!is_dir($inputCarnetPath)) mkdir($inputCarnetPath, 0777, true);
    if (!is_dir($inputDocumentos)) mkdir($inputDocumentos, 0777, true);
    if (!is_dir($inputImagenes)) mkdir($inputImagenes, 0777, true);

    // Activar árbol
    $recorrerArbol = true;

    // Bitácora
    $TABLA_LOG = "'generarimgs'";
    $TIPO_CONSULTA_LOG = "'INSERT'";
    include 'inc_bitacora.php';
}

$TituloSeccion = "Crear Estructura de Imágenes";
?>
<!doctype html>
<html lang="es">
<head>
    <?php require_once('head.php'); ?>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center">
        <div class="col-sm-7">
            <div class="text-center border border-primary rounded">
                <?php require_once('menu.php'); ?>
                <center>
                    <p class="lead">
                        Formulario para crear la estructura con comandos de archivos y directorios de PHP
                    </p>
                    <form class="form-horizontal form-outline col-sm-5" name="formUsuarios" method="POST" action="EstructuraImgs.php" autocomplete="off">
                        <div class="row">
                            <div class="col">
                                <label for="inputCarnet">Carnet:</label>
                                <input type="text" class="form-control" id="inputCarnet" name="inputCarnet" value="<?php echo $inputCarnet; ?>" required minlength="4" maxlength="12">
                                <input type="hidden" name="okForm" value="Continuar">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Crear Estructura</button><br><br>
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
</body>
</html>
