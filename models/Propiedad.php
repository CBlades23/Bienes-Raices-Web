<?php

namespace Model;

class Propiedad extends activeRecord {
    
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamientos', 'creado', 'vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamientos;
    public $creado;
    public $vendedores_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamientos = $args['estacionamientos'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function validar() {

        if (!$this->titulo) {
            self::$errores[] = "Debes colocar un título";
        }

        if (!$this->precio) {
            self::$errores[] = "Debes colocar un precio";
        }

        if (!$this->imagen) {
            self::$errores[]= "La imagen de la propiedad es obligatoria";
        }

        if ( strlen( $this->descripcion ) < 50) {
            self::$errores[] = "La descripción es obligatoria, debe tener al menos 50 carácteres";
        }

        return self::$errores;
    }

    public function validar2() {
        if (!$this->habitaciones) {
            self::$errores2[] = "Es obligatorio ingresar el número de habitaciones";
        }

        if (!$this->wc) {
            self::$errores2[] = "Es obligatorio ingresar el número de baños";
        }

        if (!$this->estacionamientos) {
            self::$errores2[] = "Es obligatorio ingresar el número de estacionamientos";
        }

        return self::$errores2;
    }

    public function validar3() {
        if (!$this->vendedores_id) {
            self::$errores3[] = "Elige un/a vendedor/a";
        }

        return self::$errores3;
    }
}

?>