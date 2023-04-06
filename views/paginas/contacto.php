<main class="contenedor">
    <h1>Contacto</h1>

    <?php
    
    if ($mensaje) { ?>
        <p class='alerta exito'> <?php echo $mensaje; ?> </p>;
    <?php } ?>

    <picture class="imagen-formulario">
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.webp" alt="Imagen de Contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset class="informacion informacion-personal">
            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" >

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]" ></textarea>
        </fieldset>

        <fieldset class="informacion informacion-propiedad">
            <legend>Información de la propiedad</legend>

            <label for="opciones">Venta o Compra</label>
            <select id="opciones" name="contacto[tipo]" >
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>

            <label for="presupuesto">Precio o presupuesto</label>
            <input type="number" placeholder="Tu presupuesto" id="presupuesto" name="contacto[precio]" >
        </fieldset>

        <fieldset class="informacion informacion-contacto">
            <legend>Información de contacto</legend>

            <p>¿Cómo desea ser contactado?</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" >

                <label for="contactar-email">E-mail</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" >
            </div>

            <div id="contacto">

            </div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-naranja">
    </form>
</main>