<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Conoce Sobre Nosotros</h1>
    <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="Imagen Nosotros">
            </picture>
        </div>
        <div class="texto-nosotros">
            <blockquote>
                25 Años de Experiencia
            </blockquote>
            <p>
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
            </p>
            <p>
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
                lorem ipsum dolor sit amet, consetetur sadipscin
            </p>

        </div>
    </div>
</main>
<section class="contenedor seccion">
    <h1>Más Sobre Nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum
                et Malorum" by Cicero are also reproduced in their exact original form,
                accompanied by English versions from the 1914 translation by H. Rackham.
            </p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
            <h3>Precio</h3>
            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum
                et Malorum" by Cicero are also reproduced in their exact original form,
                accompanied by English versions from the 1914 translation by H. Rackham.
            </p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
            <h3>A Tiempo</h3>
            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum
                et Malorum" by Cicero are also reproduced in their exact original form,
                accompanied by English versions from the 1914 translation by H. Rackham.
            </p>
        </div>
    </div>
</section>

<?php incluirTemplate('footer');?>
