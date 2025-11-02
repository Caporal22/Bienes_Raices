<?php include 'includes/templates/header.php';?>
<main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen de contacto"
    </picture>
    <h2>Llene el Formulario de Contacto</h2>
    <form class="formulario">
        <fieldset>
            <legend>Información Personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu nombre" required id="nombre">

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu e-mail" required id="email">

            <label for="telefono">Telefono</label>
            <input type="tel" placeholder="Tu número" required id="telefono">

            <label for="mensaje">Mensaje: </label>
            <textarea id="mensaje"></textarea>

        </fieldset>
        <fieldset>
            <legend>Informacion Sobre la propiedad</legend>

            <label for="opciones">Vende o compra</label>
            <select id="opciones">
                <option class="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupueso</label>
            <input type="number" id="presupuesto" step="0.01" placeholder="$0.0" required>

        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input placeholder="contacto" type="radio" value="telefono" id="contactar-telefono">

                <label for="contactar-email">E-mail</label>
                <input placeholder="contacto" type="radio" value="email" id="contactar-email">
            </div>

            <p>Si eligió teléfono, elija la fecha y la hora</p>

            <label for="fecha">Fecha</label>
            <input type="date" required id="fecha">

            <label for="hora">Hora</label>
            <input type="time" required id="hora" min="09:00:00" max="22:00:00">

        </fieldset>

    <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>
<?php include 'includes/templates/footer.php';?>
