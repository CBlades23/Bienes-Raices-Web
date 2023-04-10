<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{

    public static function index(Router $router)
    {

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {

        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router)
    {

        //Validar que exista el id, sino redirecciona a propieades
        $id = ValidarORedireccionar('/propiedades');

        //buscra propiedad por ID

        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router)
    {

        $router->render('paginas/blog');
    }

    public static function entrada(Router $router)
    {

        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router) {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuesta = $_POST['contacto'];
            //Crear instacia de PHPMailer
            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = '3807639f52e46f';
            $mail->Password = '693f3d6dee00eb';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Configurar contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje </p>'; 
            $contenido .= '<p>Nombre: ' . $respuesta['nombre'] . '</p>'; 
            
            //Enviar de forma condicional algunos campos de email o telefono

            if ($respuesta['contacto'] === 'telefono') {
                $contenido .= '<p>Eligio ser contacto por Telefono</p>';
                $contenido .= '<p>Telefono: ' . $respuesta['telefono'] . '</p>'; 
                $contenido .= '<p>Día a comunicarse: ' . $respuesta['fecha'] . '</p>'; 
                $contenido .= '<p>Hora a comunicarse: ' . $respuesta['hora'] . '</p>'; 
            } else {
                //Si es email, entonces se agregan los campos de email
                $contenido .= '<p>Eligio ser contacto por Email</p>';
                $contenido .= '<p>Email: ' . $respuesta['email'] . '</p>';
            }


            $contenido .= '<p>Mensaje: ' . $respuesta['mensaje'] . '</p>'; 
            $contenido .= '<p>Venta o Compra: ' . $respuesta['tipo'] . '</p>'; 
            $contenido .= '<p>Presupuesto: $' . $respuesta['precio'] . '</p>'; 
            $contenido .= '<p>Modo de contacto: ' . $respuesta['contacto'] . '</p>'; 
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            //Enviar el email
            if (!$mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}
