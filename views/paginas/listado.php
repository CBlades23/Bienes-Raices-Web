<div class="contenedor-anuncios">

    <!--ANUNCIO N°1-->

    <?php
    foreach ($propiedades as $propiedad) : {
        }
    ?>

        <div class="anuncio">

            <img class="imagen-anuncio" loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p class="descripcion"> <?php echo $propiedad->descripcion ?></p>
                <p class="precio">$<?php echo $propiedad->precio; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono-propiedades" loading="lazy" src="build/img/icono_toilet.svg" alt="icono wc">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img class="icono-propiedades" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono wc">
                        <p><?php echo $propiedad->estacionamientos; ?></p>
                    </li>
                    <li>
                        <img class="icono-propiedades" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono wc">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>
                <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-naranja-block">
                    Ver propiedad
                </a>
            </div> <!--CONTENIDO ANUNCIO FIN-->
        </div> <!--ANUNCIO FIN-->

    <?php
    endforeach;
    ?>

</div> <!--CONTENDOR ANUNCIO FIN-->