<?php

require ("./vendor/autoload.php");
//error_reporting(0);
session_start();
$plantilla = new Smarty();
$plantilla->template_dir = "./plantillas";
$plantilla->compile_dir = "./plantillas_c";

if (isset($_GET['msg'])) {
    $msjInfo = "La frase se ha añadido correctamente";
}
$userName = unserialize($_SESSION['usuario']);
$frase = Clases1\BD::escapa(strtolower(filter_input(INPUT_POST, "textoFrase", FILTER_SANITIZE_STRING)));
$fraseRadio = $_POST['frasesLista'];
$arrayCamposFrase = Clases1\BD::obtenerCampos("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='oracion';");
if (isset($_POST['submitFrases'])) {
    switch ($_POST['submitFrases']) {
        case "Borrar":
            if ($fraseRadio === null) {
                $msjInfo = "No ha seleccionado una frase para borrar, por favor escoja una.";
            } else {
                $primaryKey = Clases1\BD::saberPrimaryKey("oracion");
                $sentenciaBorrar = Clases1\BD::delete_parametrizada($primaryKey['COLUMN_NAME'], "oracion");
                foreach ($fraseRadio as $indices => $contenido) {
                    if (Clases1\BD::ejecutaConsulta2($sentenciaBorrar, array($contenido)) === true) {
                        $msjInfo = "Eliminacion completada.";
                    }
                }
            }
            break;
        case "Modificar":
            if (($frase === null) || ($frase === "")) {
                $msjInfo = "No se ha introducido ninguna frase para modificar, por favor escriba una.";
            } else if (count($fraseRadio) > 1) {
                $msjInfo = "Solo se puede elegir una frase para modificar.";
            } else if ($fraseRadio === null) {
                $msjInfo = "No se ha seleccionado ninguna frase para modificar, por favor escoga una.";
            } else {
                $primaryKey = Clases1\BD::saberPrimaryKey("oracion");
                $sentenciaUpdate = Clases1\BD::update_parametrizada($arrayCamposFrase, "oracion", $primaryKey['COLUMN_NAME']);
                foreach ($fraseRadio as $indices => $contenido) {
                    if (Clases1\BD::ejecutaConsulta2($sentenciaUpdate, array($frase, $userName->getNombreUsuario(), $contenido)) === true) {
                        $msjInfo = "La frase se ha modificado correctamente.";
                    }
                }
            }
            break;
        case 'Exportar PDF':
            $dompdf = new \Dompdf\Dompdf();
            $html = $plantilla->fetch('frases.tpl');
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream("Listado de frases de ". $userName->getNombreUsuario() .".pdf");
        default :
            break;
    }
}
$arrayFrasesUser = Clases1\BD::ejecutaConsulta("SELECT * FROM oracion WHERE Usuario=?;", array($userName->getNombreUsuario()));
if ($arrayFrasesUser !== null) {
    foreach ($arrayFrasesUser as $array => $contenido) {
        $arrayPictogramas = explode(" ", $contenido['OracionUsuario']);
        $listadoFrases[] = new \Clases1\Frase($contenido, $arrayPictogramas);
    }
    Clases1\BD::cerrar();
    $plantilla->assign("user", $userName);
    $plantilla->assign("msj", $msjInfo);
    $plantilla->assign("frasesUser", $listadoFrases);
    $plantilla->display("frases.tpl");
} else {
    Clases1\BD::cerrar();
    $plantilla->assign("user", $userName);
    $plantilla->assign("msj", $msjInfo);
    $plantilla->display("frases.tpl");
}
?>
