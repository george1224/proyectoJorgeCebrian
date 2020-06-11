<?php

namespace Clases1;

use PDO;

class BD {

    static private $con = null;

    public static function conectar($bd = null) {
        $datos = parse_ini_file("./configuracion/conexion.ini");
        $host = $datos['host'];
        $user = $datos['user'];
        $pass = $datos['pass'];

        $opciones = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $dsn = "mysql:host=$host;dbname=$bd";
        try {
            self::$con = new PDO($dsn, $user, $pass, $opciones);
        } catch (PDOException $ex) {
            die("Error conectando");
        }
    }

    public static function crearBaseDatos() {
        if (is_null(self::$con)) {
            self::conectar();
        }
        try {
            $sql = "CREATE DATABASE IF NOT EXISTS `pictotraductor` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;"
                    . "USE `pictotraductor`;"
                    . "CREATE TABLE IF NOT EXISTS `pictotraductor`.`personadiscapacitada` ("
                    . "`NombreUsuario` VARCHAR(50) NOT NULL ,`PassUsuario` VARCHAR(50) NOT NULL ,"
                    . "`NombreTutor` VARCHAR(50) NOT NULL ,`Direccion` VARCHAR(50) NOT NULL ,"
                    . "`Telefono` VARCHAR(50) NOT NULL ,`Email` VARCHAR(50) NOT NULL ,"
                    . "`TipoDiscapacidad` VARCHAR(50) NOT NULL ,`GradoDiscapacidad` VARCHAR(50) NOT NULL ,"
                    . "PRIMARY KEY (`NombreUsuario`)) ENGINE = INNODB;"
                    . "CREATE TABLE IF NOT EXISTS `pictotraductor`.`profesor` ("
                    . "`NombreProfesor` VARCHAR(50) NOT NULL ,`PassProfesor` VARCHAR(50) NOT NULL ,"
                    . "PRIMARY KEY (`NombreProfesor`)) ENGINE = INNODB;"
                    . "CREATE TABLE IF NOT EXISTS `pictotraductor`.`oracion` ("
                    . "`OracionUsuario` VARCHAR(250) NOT NULL ,`Usuario` VARCHAR(50) NOT NULL ,"
                    . "PRIMARY KEY (`OracionUsuario`)) ENGINE = INNODB;";
            $rtdo = self::$con->query($sql);
        } catch (PDOException $ex) {
            $rtdo = null;
        }
    }

    public static function verificaUsuario(string $nom, string $pass) {
        $array = [$nom, $pass];
        $consulta = "SELECT * FROM personadiscapacitada WHERE NombreUsuario=? AND PassUsuario =?;";
        if (self::ejecutaConsulta($consulta, $array) === NULL) {
            return null;
        } else {
            $arrayUser = self::ejecutaConsulta($consulta, $array);
            return $arrayUser;
        }
    }

    public static function obtenerCampos($sql) {
        $array = self::ejecutaConsulta($sql);
        foreach ($array as $arrayIndices => $contenido) {
            $listaCamposTabla[] = $contenido['COLUMN_NAME'];
        }
        return $listaCamposTabla;
    }

    public function saberPrimaryKey($tabla) {
        if (is_null(self::$con)) {
            self::conectar("pictotraductor");
        }
        try {
            $sentencia = "select * from INFORMATION_SCHEMA.KEY_COLUMN_USAGE where TABLE_NAME= '" . $tabla . "'";
            $rtdo = self::$con->query($sentencia);
            $fila = $rtdo->fetch(PDO::FETCH_ASSOC);
            $contenido = $fila;
            return $contenido;
        } catch (PDOException $ex) {
            $rtdo = null;
        }
    }

    public function insert_parametrizada($campos, $tabla) {
        $nombre_campos = implode(',', array_values($campos));
        $parametros = array_fill(0, count($campos), '?'); //Genero un array con tantos ? como campos
        $lista_parametros = implode(',', array_values($parametros));
        $sentencia = "insert into $tabla ($nombre_campos) values ($lista_parametros)";
        return $sentencia;
    }

    public static function delete_parametrizada($key, $tabla) {
        $sentencia = "delete from $tabla where $key = ?";
        return $sentencia;
    }

    public static function update_parametrizada($campos, $tabla, $primaryKey) {
        $sentencia = "UPDATE $tabla SET ";
        foreach ($campos as $numPos => $contenido) {
            if ($numPos === (sizeof($campos) - 1)) {
                $sentencia .= "$contenido=?";
            } else {
                $sentencia .= "$contenido=?, ";
            }
        }
        $sentencia .= " WHERE $primaryKey = ?";
        return $sentencia;
    }

    public static function crearArrayPalabrasFrase($arrayPalabrasFrases) {
        $arrayPictogramas = [];
        foreach ($arrayPalabrasFrases as $indices => $contenido) {
            if (strlen($contenido) < 3) {
                if (!empty(glob("./Pictogramas_Color_completo/{$contenido}.png")[0])) {
                    $arrayPictogramas[] = glob("./Pictogramas_Color_completo/{$contenido}.png")[0];
                }
            } else {
                if (!empty(glob("./Pictogramas_Color_completo/{$contenido}.png")[0])) {
                    $arrayPictogramas[] = glob("./Pictogramas_Color_completo/{$contenido}.png")[0];
                } else if (!empty(glob("./Pictogramas_Color_completo/{$contenido}*")[0])) {
                    $arrayPictogramas[] = glob("./Pictogramas_Color_completo/{$contenido}*")[0];
                } else if (!empty(glob("./Pictogramas_Color_completo/" . substr($contenido, 0, 5) . "*")[0])) {
                    $arrayPictogramas[] = glob("./Pictogramas_Color_completo/" . substr($contenido, 0, 5) . "*")[0];
                } else if (!empty(glob("./Pictogramas_Color_completo/" . substr($contenido, 0, 4) . "*")[0])) {
                    $arrayPictogramas[] = glob("./Pictogramas_Color_completo/" . substr($contenido, 0, 4) . "*")[0];
                } else if (!empty(glob("./Pictogramas_Color_completo/" . substr($contenido, 0, 3) . "*")[0])) {
                    $arrayPictogramas[] = glob("./Pictogramas_Color_completo/" . substr($contenido, 0, 3) . "*")[0];
                }
            }
        }
        return $arrayPictogramas;
    }

    public function ejecutaConsulta(string $sql, $valores = null) {
//Verifico conexión y ejecuta consulta 
        if (is_null(self::$con)) {
            self::conectar("pictotraductor");
        }
        try {
            $rtdo = self::$con->prepare($sql);
            $rtdo->execute($valores);
        } catch (PDOException $ex) {
            $rtdo = null;
        }
        if ($rtdo->rowCount() == 0) {
            return null;
        } else {
            while ($f = $rtdo->fetch(PDO::FETCH_ASSOC)) {
                $array[] = $f;
            }
            return $array;
        }
    }

    public static function ejecutaConsulta2(string $sql, $valores = null) {
//Verifico conexión y ejecuta consulta 
        if (is_null(self::$con)) {
            self::conectar("pictotraductor");
        }
        try {
            $rtdo = self::$con->prepare($sql);
            $rtdo->execute($valores);
        } catch (PDOException $ex) {
            $rtdo = null;
        }
        if ($rtdo->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function cerrar() {
        self::$con = null;
    }

    public static function escapa($string) {
        return $string;
    }

}

?>