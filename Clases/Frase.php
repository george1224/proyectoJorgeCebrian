<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Clases1;

/**
 * Description of Frase
 *
 * @author Jorge
 */
class Frase {

    //put your code here

    static private $nombreUsuario;
    static private $fraseUsuario;
    static private $palabrasFrases;

    public function __construct($arrayFrases, $arrayPicto) {
        self::$nombreUsuario = $arrayFrases['Usuario'];
        self::$fraseUsuario = $arrayFrases['OracionUsuario'];
        self::$palabrasFrases = \Clases1\BD::crearArrayPalabrasFrase($arrayPicto);
    }

    public static function getNombreUsuario() {
        return self::$nombreUsuario;
    }

    public static function getFraseUsuario() {
        return self::$fraseUsuario;
    }

    public static function getPalabrasFrases() {
        return self::$palabrasFrases;
    }

    public static function setNombreUsuario($nombreUsuario) {
        self::$nombreUsuario = $nombreUsuario;
    }

    public static function setPalabrasFrases($palabrasFrases) {
        self::$palabrasFrases = $palabrasFrases;
    }

    public static function setFraseUsuario($fraseUsuario) {
        self::$fraseUsuario = $fraseUsuario;
    }

}
