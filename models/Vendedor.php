<?php

namespace Model;

class Vendedor extends ActiveRecord {
    
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar() {
        if (!$this->nombre) {
            self::$errores[] = "Debes colocar un nombre";
        }
        
        if (!$this->apellido) {
            self::$errores[] = "Debes colocar un apellido";
        }

        if (!$this->telefono) {
            self::$errores[] = "Debes colocar un telefono de contacto";
        }

        if (!preg_match('/[0-9]{8}/', $this->telefono)) {
            self::$errores[] = "Formato de telefono no válido";
        }

        return self::$errores;
    }
}

?>