<?php
require ("./vendor/autoload.php");
session_start();
$plantilla = new Smarty();

$plantilla->template_dir = "./plantillas";
$plantilla->compile_dir = "./plantillas_c";

$userLogin = unserialize($_SESSION['usuario']);
$datosProfesor = Clases1\BD::ejecutaConsulta2("SELECT * FROM profesor WHERE NombreProfesor=?", array($userLogin));
$profesor = new Clases1\Profesor($datosProfesor);
var_dump($profesor->getListadoAlumnos());
?>