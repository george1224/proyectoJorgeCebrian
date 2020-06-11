<?php
require ("./vendor/autoload.php");
session_start();
$plantilla = new Smarty();
$plantilla->template_dir = "./plantillas";
$plantilla->compile_dir = "./plantillas_c";

$fraseTextArea = Clases1\BD::escapa(strtolower(filter_input(INPUT_POST, "textoTraducir", FILTER_SANITIZE_STRING)));
$userLogin = unserialize($_SESSION['usuario']);
$arrayCamposFrase = Clases1\BD::obtenerCampos("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='oracion';");
if (isset($_POST['submitPictotraductor'])) {
    switch ($_POST['submitPictotraductor']) {
        case 'Cerrar sesion':
            header("Location:index.php");
            break;
        case 'Traducir':
            $arrayPalabrasFrases = explode(" ", $fraseTextArea);
            $arrayPictogramas = Clases1\BD::crearArrayPalabrasFrase($arrayPalabrasFrases);
            Clases1\BD::cerrar();
            $plantilla->assign("usuarioBD", $userLogin);
            $plantilla->assign("fraseUser", filter_input(INPUT_POST, "textoTraducir", FILTER_SANITIZE_STRING));
            $plantilla->assign("pictogramas", $arrayPictogramas);
            $plantilla->display("pictotraductor.tpl");
            break;
        case 'Añadir a Frases Favoritas':
            if (($fraseTextArea === null) || ($fraseTextArea === "")) {
                $msj = "No se ha introducido ninguna frase, por favor escriba una.";
            } else {
                if (Clases1\BD::ejecutaConsulta2("SELECT * FROM oracion WHERE OracionUsuario=?;", array($fraseTextArea)) === true) {
                    $msj = "La frase ya existe en la base de datos, pruebe con otra.";
                } else {
                    $sentenciaInsert = Clases1\BD::insert_parametrizada($arrayCamposFrase, "oracion");
                    if (Clases1\BD::ejecutaConsulta2($sentenciaInsert, array($fraseTextArea, $userLogin->getNombreUsuario())) === true) {
                        $msj = "La frase se ha añadido con exito a la base de datos.";
                    }
                }
            }
            Clases1\BD::cerrar();
            $plantilla->assign("usuarioBD", $userLogin);
            $plantilla->assign("msjInfo", $msj);
            $plantilla->display("pictotraductor.tpl");
            break;
        case 'Ir a Frases Favoritas':
            header("Location:frases.php");
            break;
        case 'Cerrar':
            header("Location:index.php");
            break;
        default :
            break;
    }
} else if (isset($_POST['submitVolver'])) {
    $plantilla->assign("usuarioBD", $userLogin);
    $plantilla->assign("msjInfo", $msj);
    $plantilla->display("pictotraductor.tpl");
}
?>