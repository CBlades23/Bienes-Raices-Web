<main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad->titulo; ?></h1>

            <img loading="lazy" class="imagen-propiedad" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Texto entrada blog">

        <div class="resumen-propiedad">

            <div class="bloque">
                <div class="precio-bloque">
                    <p class="precio precio-anuncio">$<?php echo $propiedad->precio; ?></p>
                </div>
                <ul class="iconos-caracteristicas iconos-anuncios">
                    <li>
                        <img class="icono-anuncio" loading="lazy" src="build/img/icono_toilet2.svg" alt="icono wc">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img class="icono-anuncio" loading="lazy" src="build/img/icono_estacionamiento2.svg" alt="icono wc">
                        <p><?php echo $propiedad->estacionamientos; ?></p>
                    </li>
                    <li>
                        <img class="icono-anuncio" loading="lazy" src="build/img/icono_dormitorio2.svg" alt="icono wc">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>
            </div>

            <p class="descripcion"><?php echo $propiedad->descripcion ?></p>

        </div>
    </main>