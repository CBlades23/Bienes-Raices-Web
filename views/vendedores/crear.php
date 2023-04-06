<main class="contenedor">
    <h1>Registrar vendedor(a)</h1>

    <a href="/admin" class="boton boton-naranja">Volver</a>

    <form class="formulario formulario-crear" method="POST" action="/vendedores/crear">

        <?php
            include 'formulario.php';
        ?>

        <input type="submit" value="Registrar Vendedor(a)" class="boton boton-verde">

    </form>

</main>