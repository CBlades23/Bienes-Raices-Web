<?php 

namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedorController {

    public static function crear(Router $router){
        $vendedor = new Vendedor;
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crear nueva instancia
            $vendedor = new Vendedor($_POST['vendedores']);

            //Validar que no hay acampos vacios
            $errores = $vendedor->validar();

            //Guardar
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('/vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){

        $errores = Vendedor::getErrores();
        $id = ValidarORedireccionar('/admin');

        //Obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar los valores
            $args = $_POST['vendedores'];
        
            //Sincronizar objeto en memoria con lo que el usuario escribió
            $vendedor->sincronizar($args);
        
            //Validación
            $errores = $vendedor->validar();
        
            if (empty($errores)) {
                $vendedor->guardar();
            }
        
        }
        
        $router->render('/vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                //Validar el tipo a eliminar
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }

}

?>