<!DOCTYPE html>
<html lang="es">
<head>
    <!-- -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Imagen con 3 efectos CSS</title>
    <style> <!-- Iniciamos nuestro estilo de css -->
    :root{--accent: #7c4dff} <!-- Nuestras variables -->
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
    <!-- Agregando Media query -->
    @media (max-width:520px){ <!-- Para un teléfono -->
        .imagen{border-radius:8px}
    }
    </style>
</head>
<body>
<div class="wrap">
    <img src="src/img/anuncio1.jpg" alt="Ejemplo" class="imagen" tabindex="0">
</div>
</body>
</html>
