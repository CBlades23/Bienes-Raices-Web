<?php 

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETAS_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false ){

    include TEMPLATES_URL . "/$nombre.php";
}

function autenticarUsuario() {

    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
    }
}

function debuggear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Sanitizar el HTML
function S($html) :string {
    $s = htmlspecialchars($html);
    return $s;
}

//Validar tipo de contenido
function validarTipoContenido($tipo) {
    $tipos = ['propiedad', 'vendedor'];
    return in_array($tipo, $tipos);
}

//Mostrar las alertas
function mostrarAlertas($codigo) {
    $mensaje = '';

    switch($codigo) {
        case 1:
            $mensaje = "Creada Correctamente";
            break;
        case 2:
            $mensaje = "Actualizada Correctamente";
            break;
        case 3:
            $mensaje = "Eliminada Correctamente";
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function ValidarORedireccionar(string $url) {
    //validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: $url ");
    }

    return $id;
}

?>