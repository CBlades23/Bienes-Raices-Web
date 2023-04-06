<?php

if (!isset($_SESSION)) {
    session_start();
}

$autenticar = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aliancy</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <div class="menu-responsive">
                    <a href="/index.php" class="titulo">
                        <img src="/build/img/logoC.svg" alt="Logotipo de Bienes raices">
                    </a>

                    <div class="mobile-menu">
                        <img src="/build/img/barras.svg" alt="Icono menu responsive">
                    </div>
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($autenticar) : ?>
                            <a href="/logout" class="boton-rojo">Cerrar sesión</a>
                        <?php else : ?>
                            <a href="/login" class="boton-naranja-sesion">Iniciar sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>

            </div> <!--CIERRE DE BARRA-->

            <?php if ($inicio) { ?>
                <h1> Venta de casas y departamentos <span>exclusivos</span> de <span>lujo</span> </h1>
            <?php } ?>
        </div>
    </header>

    <?php
    echo $contenido;
    ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">

            <nav class="navegacion-footer-abajo">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados <?php echo $fecha = date('Y'); ?> &copy;</p>
    </footer>

    <!--FIN FOOTER-->

    <script src="../build/js/bundle.min.js"></script>
</body>

</html>