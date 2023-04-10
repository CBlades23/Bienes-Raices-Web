<main class="contenedor">
        <h1>Más sobre nosotros</h1>

        <?php
            include 'iconosNosotros.php';
        ?>
    </main>

    <!--SECCIÓN DE ANUNCIOS-->

    <section class="seccion contenedor">
        <h1>Casa y departamentos en venta</h1>
        
        <?php
            include 'listado.php'
        ?>  

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde"> Ver todas</a>
        </div>
    </section>

    <!--FIN SECCIÓN DE ANUNCIOS-->

    <!--IMAGEN DE BOTON CONTACTO-->

    <section class="imagen-contacto"> 
        <h2>Obten la casas de tu sueños</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit, Pariatur quidem.</p>
        <a href="/contacto" class="boton-naranja">Contáctanos</a>
    </section>

    <!--FIN DE IMAGEN DE BOTON CONTACTO-->

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h1>Nuestro Blog</h1>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>25/11/2022</span> por: <span>Admin</span></p>

                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>25/11/2022</span> por: <span>Admin</span></p>

                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section>
    </div>