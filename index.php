<?php
require ("./vendor/autoload.php");
//error_reporting(0);
session_destroy();
session_start();
$plantilla = new Smarty();
$plantilla->template_dir = "./plantillas";
$plantilla->compile_dir = "./plantillas_c";

Clases1\BD::crearBaseDatos();
if (Clases1\BD::ejecutaConsulta("SELECT * FROM personadiscapacitada;") === null) {
    $arrayCamposPersona = Clases1\BD::obtenerCampos("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='personadiscapacitada';");
    $sqlPersona = Clases1\BD::insert_parametrizada($arrayCamposPersona, "personadiscapacitada");
    Clases1\BD::ejecutaConsulta2($sqlPersona, array("tester", "tester", "tester", "C/ Jarque del Moncayo n10",
        "976 300 804", "secretaria@cpilosenlaces.com", "fisica", "moderado"));
}
if (Clases1\BD::ejecutaConsulta("SELECT * FROM profesor;") === null) {
    $arrayCamposProfesor = Clases1\BD::obtenerCampos("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='profesor';");
    $sqlProfesor = Clases1\BD::insert_parametrizada($arrayCamposProfesor, "profesor");
    Clases1\BD::ejecutaConsulta2($sqlProfesor, array("admin", "admin"));
}
if (isset($_POST['login'])) {
    $userName = Clases1\BD::escapa(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
    $passUser = Clases1\BD::escapa(filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING));
    $arrayUser = Clases1\BD::verificaUsuario($userName, $passUser);
    if ($arrayUser === null) {
        $arrayProfesor = Clases1\BD::ejecutaConsulta2("SELECT * FROM profesor WHERE NombreProfesor=? AND PassProfesor =?;", array($userName, $passUser));
        if ($arrayProfesor === null) {
            Clases1\BD::cerrar();
            $error = "El usuario no existe en la base de datos";
            $plantilla->assign("errorInicioSesion", $error);
            $plantilla->display("index.tpl");
        } else {
            Clases1\BD::cerrar();
            foreach ($arrayProfesor as $contenidoArrayProfesor) {
                $profesor = new Clases1\Profesor($contenidoArrayProfesor);
            }
            $plantilla->assign("usuarioBD", $profesor);
            header("Location:profesorSesion.php");
        }
    } else {
        Clases1\BD::cerrar();
        foreach ($arrayUser as $contenidoArray) {
            $user = new \Clases1\PersonaDiscapacitada($contenidoArray);
        }
        $_SESSION['usuario'] = serialize($user);
        $plantilla->assign("usuarioBD", unserialize($_SESSION['usuario']));
        $plantilla->display("pictotraductor.tpl");
    }
} else if (isset($_POST['create'])) {
    $plantilla->display("usuarios.tpl");
} else {
    $plantilla->display("index.tpl");
}
?>