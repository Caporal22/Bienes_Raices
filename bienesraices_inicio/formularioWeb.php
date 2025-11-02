<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <style>
    :root{--accent: #7c4dff}
    body{display:flex;min-height:100vh;align-items:center;justify-content:center;background:#f3f4f6;margin:0;font-family:Arial,Helvetica,sans-serif}
    .wrap{max-width:820px;padding:20px}
    .imagen{
        display:block;
        width:100%;
        max-width:800px;
        height:auto;
        border-radius:12px;
        transition:transform .45s cubic-bezier(.2,.9,.2,1),filter .45s ease,box-shadow .35s ease;
        filter:grayscale(100%) contrast(.95) saturate(.9);
        box-shadow:0 6px 18px rgba(15,15,20,0.08);
        will-change:transform,filter,box-shadow;
        outline:none;
    }
    .imagen:hover,
    .imagen:focus{
        filter:grayscale(0) saturate(1.05) brightness(1.03);
        transform:scale(1.04) rotate(1.6deg);
        box-shadow:0 20px 40px rgba(124,77,255,0.18),0 6px 18px rgba(0,0,0,0.12);
    }
    .imagen:active{
        transform:translateY(3px) scale(.99) rotate(.5deg);
        box-shadow:0 8px 20px rgba(0,0,0,0.12);
    }
    @media (max-width:520px){
        .imagen{border-radius:8px}
    }
    </style>


    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
        #contador {
            font-size: 0.8em;
            color: gray;
        }
    </style>
</head>
<body>

<main>
    <h2>Llene el Formulario de Contacto</h2>
    <form class="formulario" id="formulario">
        <fieldset>
            <legend>Información Personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu nombre" required id="nombre">

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu e-mail" required id="email">

            <label for="telefono">Teléfono</label>
            <input type="tel" placeholder="Tu número" required id="telefono">
            <span id="error-telefono" class="error"></span>

            <label for="mensaje">Mensaje: </label>
            <textarea id="mensaje" maxlength="200"></textarea>
            <p id="contador">0 / 200 caracteres</p>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>¿Cómo desea ser contactado?</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="formaContacto" type="radio" value="Teléfono" id="contactar-telefono">

                <label for="contactar-email">E-mail</label>
                <input name="formaContacto" type="radio" value="E-mail" id="contactar-email">
            </div>

            <div id="opciones-telefono" style="display:none;">
                <p>Si eligió teléfono, elija la fecha y la hora</p>
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="22:00">
            </div>
        </fieldset>

        <button type="submit">Enviar</button>
    </form>

    <p id="resultado"></p>
</main>

<script>
    const formulario = document.getElementById("formulario");
    const email = document.getElementById("email");
    const nombre = document.getElementById("nombre");
    const telefono = document.getElementById("telefono");
    const mensaje = document.getElementById("mensaje");
    const resultado = document.getElementById("resultado");
    const contador = document.getElementById("contador");
    const errorTelefono = document.getElementById("error-telefono");
    const opcionesTelefono = document.getElementById("opciones-telefono");


    document.querySelectorAll("input[name='formaContacto']").forEach(radio => {
        radio.addEventListener("change", () => {
            if (radio.value === "Teléfono") {
                opcionesTelefono.style.display = "block";
            } else {
                opcionesTelefono.style.display = "none";
            }
        });
    });

    telefono.addEventListener("input", () => {
        if (!/^[0-9]*$/.test(telefono.value)) {
            errorTelefono.textContent = "Solo se permiten números.";
        } else {
            errorTelefono.textContent = "";
        }
    });


    mensaje.addEventListener("input", () => {
        contador.textContent = `${mensaje.value.length} / 200 caracteres`;
        if (mensaje.value.length > 10) {
            mensaje.style.backgroundColor = "#d1ffd6";
        } else {
            mensaje.style.backgroundColor = "#ffd6d6";
        }
    });

    formulario.addEventListener("submit", function(event) {
        event.preventDefault();

        if (!email.value.includes("@")) {
            alert("El correo no es válido");
            return;
        }

        if (!/^[0-9]+$/.test(telefono.value)) {
            alert("El teléfono debe contener solo números");
            return;
        }

        let contacto = document.querySelector("input[name='formaContacto']:checked");
        if (!contacto) {
            alert("Debe elegir una forma de contacto");
            return;
        }

        if (contacto.value === "Teléfono") {
            if (!fecha.value || !hora.value) {
                alert("Debe elegir una fecha y hora para la llamada");
                return;
            }
        }

        resultado.innerText = `Gracias ${nombre.value}, te contactaremos por: ${contacto.value}`;
        formulario.reset();
        contador.textContent = "0 / 200 caracteres";
        opcionesTelefono.style.display = "none";
    });
</script>
</body>
 <img class="imagen" loading="lazy" src="src/img/chester.png" alt="Imagen de chester">
</html>
