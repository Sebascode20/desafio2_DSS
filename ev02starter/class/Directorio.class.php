<?php

class Directorio {

    private $directorioRaiz;

    public function __construct($directorio) {
        // Si es ruta relativa, la completamos desde el DOCUMENT_ROOT
        if (!is_dir($directorio)) {
            $directorioAbsoluto = $_SERVER['DOCUMENT_ROOT'] . "/desafio2_DSS/ev02starter/" . $directorio;
            if (!is_dir($directorioAbsoluto)) {
                throw new Exception("La ruta proporcionada no es un directorio válido: " . $directorio);
            }
            $directorio = $directorioAbsoluto;
        }

        $this->directorioRaiz = $directorio;
    }

    public function arbolTransversal() {
        return $this->escanearDirectorio($this->directorioRaiz);
    }

    private function escanearDirectorio($directorio) {
        $contenidos = [];
        $elementos = scandir($directorio);

        foreach ($elementos as $elemento) {
            if ($elemento === '.' || $elemento === '..') continue;

            $ruta = $directorio . DIRECTORY_SEPARATOR . $elemento;

            if (is_dir($ruta)) {
                $contenidos[$elemento] = $this->escanearDirectorio($ruta);
            } else {
                $contenidos[] = $elemento;
            }
        }
        return $contenidos;
    }

    public function imprimirArbol($arbol = null, $prefijo = "", $rutaBase = "") {
        if ($arbol === null) {
            $arbol = $this->arbolTransversal();
            $rutaBase = $this->directorioRaiz;
        }

        foreach ($arbol as $llave => $valor) {
            if (is_array($valor)) {
                $rutaDirectorio = $rutaBase . "/" . $llave;
                echo $prefijo . "<u><img style='margin-left: 20px; margin-right: 10px;' src='imgs/folder.jpg' border=0> " . $llave . "</u><br>\n";
                $this->imprimirArbol($valor, $prefijo . "&nbsp;&nbsp;&nbsp;&nbsp;", $rutaDirectorio);
            } else {
                $rutaArchivo = $rutaBase . "/" . $valor;
                $rutaArchivoRelativa = str_replace($_SERVER["DOCUMENT_ROOT"], "", $rutaArchivo);
                $rutaArchivoAbsoluta = "http://" . $_SERVER["HTTP_HOST"] . $rutaArchivoRelativa;
                $tamanoArchivo = filesize($rutaArchivo);
                $tamanoArchivoFormateado = $this->formatearTamanoArchivo($tamanoArchivo);

                echo $prefijo . "<a target='_blank' href='" . $rutaArchivoAbsoluta . "'> " . $valor . "</a> (" . $tamanoArchivoFormateado . ")<br>\n";
            }
        }
    }

    private function formatearTamanoArchivo($bytes) {
        if ($bytes >= 1073741824) return number_format($bytes / 1073741824, 2) . ' GB';
        if ($bytes >= 1048576) return number_format($bytes / 1048576, 2) . ' MB';
        if ($bytes >= 1024) return number_format($bytes / 1024, 2) . ' KB';
        return $bytes . ' bytes';
    }
}
