<?php
require_once 'model/db.php';
require_once 'controller/apuntes.php';
  // fíjate bien en el nombre del archivo

// 1. Instancia y acción solicitada
$controller = new apuntesController();
$action     = $_GET['action'] ?? 'listar';

// 2. Ejecutar el método
if (method_exists($controller, $action)) {
    // Si tu método necesita un $id, lo recibe; si no, ignora ese parámetro
    $resp = $controller->$action($_GET['id'] ?? null);
} else {
    $resp = $controller->listar();
}

// 3. Extraer datos para la vista
$data       = $resp['data'];            // aquí están tus apuntes o la nota a borrar/editar
$view       = $controller->view;        // nombre de la plantilla
$page_title = $controller->page_title;  // título de la página

// 4. Mostrar la plantilla
include "view/template/encabezado.php";
include "view/{$view}.php";
include "view/template/piedepagina.php";
