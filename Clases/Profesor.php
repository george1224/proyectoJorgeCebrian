<?php

namespace Clases1;

class Profesor {

    //put your code here
    private $nombreUsuario;
    private $passUsuario;
    private $listadoAlumnos;

    public function __construct($arrayProfesor) {
        $this->nombreUsuario = $arrayProfesor['NombreProfesor'];
        $this->passUsuario = $arrayProfesor['PassProfesor'];
        $this->listadoAlumnos = \Clases1\BD::ejecutaConsulta("SELECT NombreUsuario FROM "
                        . "personadiscapacitada;");
    }

    public static function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public static function getPassUsuario() {
        return $this->passUsuario;
    }

    public static function getListadoAlumnos() {
        return $this->listadoAlumnos;
    }

    public static function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public static function setPassUsuario($passUsuario) {
        $this->passUsuario = $passUsuario;
    }

    public static function setListadoAlumnos($listadoAlumnos) {
        $this->listadoAlumnos = $listadoAlumnos;
    }

    public function crea_tabla($nameTabla) {
        $html = "<table border=1>";
        $html .= $this->add_titulos();
        foreach ($this->contenido as $fila) {
            $html .= $this->add_fila($fila, $nameTabla);
        }
        $html .= "</table>";
        return $html;
    }

}
