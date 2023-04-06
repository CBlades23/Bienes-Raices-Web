<?php 

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    
    public static function index(Router $router) {

        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        //MOSTRAR MENSAJE CONDICIONAL
        $resultado = $_GET['resultado'] ?? null;
        
        $router->render('/propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router) {

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        //ARREGLO CON MENSAJES DE ERRORES
        $errores = Propiedad::getErrores(); 
        $errores2 = Propiedad::getErrores2();
        $errores3 = Propiedad::getErrores3();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //CREA NUEVA INSTANCIA
            $propiedad = new Propiedad($_POST['propiedad']);
    
            /**********SUBIDA DE ARCHIVOS**********/
    
            //GENERAR NOMBRE ÚNICO
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
            //SETEAR LA IMAGEN
            //realizar resize a la imagen Intervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }   

                //Validación de Errores
                $errores= $propiedad->validar();
                $errores2= $propiedad->validar2();
                $errores3= $propiedad->validar3();
    
                if (empty($errores || $errores2 || $errores3) ) {
    
                    //Crear la carpeta para subir imagenes
    
                    if (!is_dir(CARPETAS_IMAGENES)) {
                        mkdir(CARPETAS_IMAGENES);
                    }
    
                    //Guardar imagen en el servidor
                    $image->save(CARPETAS_IMAGENES . $nombreImagen);
    
                    //Guardar imagen en la BD
                    $resultado = $propiedad->guardar();
    
    
                    //Mensaje de éxito
                    if($resultado) {
                        //Redireccionar al usuario
                        header('Location: /admin?resultado=1');
                    }
                }
        }
        
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores,
            'errores2' => $errores2,
            'errores3' => $errores3
        ]);
    }

    public static function actualizar(Router $router) {
        
        $id = ValidarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();

        $errores = Propiedad::getErrores();
        $errores2 = Propiedad::getErrores2();
        $errores3 = Propiedad::getErrores3();

        //MÉTODO POST PARA ACTUALIZAR

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar los atributos
            $args = $_POST['propiedad'];
    
            $propiedad->sincronizar($args);
    
            //Validación
            $errores = $propiedad->validar();
            $errores2 = $propiedad->validar2();
            $errores3 = $propiedad->validar3();
    
            //Subida de archivos
            //Generar nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
            
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
    
            //REVISAR QUE EL ARREGLO NO TENGA NINGUN ERRROR, QUE EL ARERGLO ERROR ESTÉ VACÍO
            if (empty($errores || $errores2 || $errores3) ) {
    
                if($_FILES['propiedad']['tmp_name']['imagen']){
    
                    //Almacenar imagen
                    $image->save(CARPETAS_IMAGENES . $nombreImagen);    
                }
    
                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores,
            'errores2' => $errores2,
            'errores3' => $errores3
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if ($id) {
    
                $tipo = $_POST['tipo'];
                
                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
    
                $propiedad = Propiedad::find($id);  
                $propiedad->eliminar();
    
            }
        }
    }
}

?>