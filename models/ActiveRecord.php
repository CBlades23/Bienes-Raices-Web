<?php

namespace Model;

class ActiveRecord {
    
    //BASE DE DATOS
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    //ERRORES
    protected static $errores = []; 
    protected static $errores2 = [];
    protected static $errores3 = [];

    //DEFINIR LA CONEXIÓN A AL BD
    public static function setDB($database) {
        self::$db = $database;
    }

    public function guardar() {
        if (!is_null($this->id)) {
            //actualizar
            $this->actualizar();
        } else {
            //creando nuevo registro
            $this->crear();
        }
    }

    public function crear() {

        //SANITIZAR LA ENTRADA DE DATOS A LA BD
        $datos = $this->sanitizarDatos();

        //INSERTAR DATOS A LA BD
        $query = " INSERT INTO " .  static::$tabla . " (";
        $query .= join(', ', array_keys($datos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($datos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        if($resultado) {
            //REDIRECCIONAR AL USUARIO
            header('Location: /admin?resultado=1');
        }
    }

    public function actualizar () {
        //Sanitizar la entrada de datos a la BD
        $datos = $this->sanitizarDatos();

        $valores = [];
        foreach($datos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        
        $query = " UPDATE " .  static::$tabla . " SET ";
        $query .= join(',', $valores);
        $query .= " WHERE id = ' " . self::$db->escape_string($this->id) . " ' ";
        $query .= " LIMIT 1 ";
        
        $resultado = self::$db->query($query);

        if($resultado) {
            //REDIRECCIONAR AL USUARIO
            header('Location: /admin?resultado=2');
        }
    }

    //Eliminar un registro
    public function eliminar() {
        $query = "DELETE FROM " .  static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->eliminarImagen();
            header('Location: /admin?resultado=3');
        }
    }

    //IDENTIFICAR Y UNIR LOS DATOS DE LA BD
    public function datos() {
        $datos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;
            $datos[$columna] = $this->$columna;
        }
        return $datos;
    }
    
    public function sanitizarDatos() {
        $datos = $this->datos(); 
        $sanitizado = [];

        foreach($datos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //SUBIDAS DE ARCHIVOS
    public function setImagen($imagen) {
        //Eliminando la imagen previa
        
        if (!is_null($this->id)) {
            //Eliminar imagen previa
            $this->eliminarImagen();     
        }
        
        //Asignar al atributo imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function eliminarImagen() {
        $existeArchivo = file_exists(CARPETAS_IMAGENES . $this->imagen);

        if ($existeArchivo) {
            unlink(CARPETAS_IMAGENES . $this->imagen);
        }
    }

    //VALIDACIÓN
    public static function getErrores() {
        return static::$errores;
    }
    public static function getErrores2() {
        return static::$errores2;
    }
    public static function getErrores3() {
        return static::$errores3;
    }

    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    public function validar2() {
        static::$errores2 = [];
        return static::$errores2;
    }

    public function validar3() {
        static::$errores3 = [];
        return static::$errores3;
    }

    //LISTA TODAS LOR REGISTROS

    public static function all() {
        
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarDB($query);

        return $resultado;
    }

    // Obtener determinado número de registros
    public static function get($cantidad) {
        
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

        $resultado = self::consultarDB($query);

        return $resultado;
    }

    //BUSCAR REGISTRO POR SU ID

    public static function find($id) {
        $query = "SELECT * FROM " .  static::$tabla . " WHERE id = $id";

        $resultado = self::consultarDB($query);

        return array_shift($resultado);
    }

    public static function consultarDB($query) {
        //Consultar BD
        $resultado = self::$db->query($query);

        //Iterar los resultadosa
        $array = [];

        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }

        //Liberar memoria
        $resultado->free();

        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        
        return $objeto;

    }

    //Sincorniza el objeto en memoria con los cambios realizados por el usuario - ACTUALIZAR DATOS

    public function sincronizar($args = []) {
        foreach($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}

?>