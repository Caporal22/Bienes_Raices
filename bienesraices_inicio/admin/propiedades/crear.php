<?php
    // Base de datos
    require __DIR__ . '/../../includes/config/database.php';
    require '../../includes/funciones.php';
    incluirTemplate('header');
//    echo __DIR__;
    $db = conectarDB();
//    var_dump($db);

//    echo "<pre>";
//    var_dump($_POST);
//    echo "</pre>";

    // Arreglo con mensajes de errores
    $errores = [];

    // Variables con valores iniciales (para mostrar en el formulario)
    $titulo = $titulo ?? '';
    $precio = $precio ?? '';
    $descripcion = $descripcion ?? '';
    $habitaciones = $habitaciones ?? '';
    $wc = $wc ?? '';
    $estacionamiento = $estacionamiento ?? '';
    $vendedores_id = $vendedores_id ?? '';


    // Consultar para obtener los vendedores
    $consulta = " SELECT * FROM vendedores ";
    $resultado = mysqli_query($db, $consulta);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Sanitizar y validar
        $titulo = htmlspecialchars(trim($_POST['titulo']));
        $precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_INT);
        $descripcion = htmlspecialchars(trim($_POST['descripcion']));
        $habitaciones = filter_input(INPUT_POST, 'habitaciones', FILTER_VALIDATE_INT);
        $wc = filter_input(INPUT_POST, 'wc', FILTER_VALIDATE_INT);
        $estacionamiento = filter_input(INPUT_POST, 'estacionamiento', FILTER_VALIDATE_INT);
        $vendedores_id = filter_input(INPUT_POST, 'vendedor', FILTER_VALIDATE_INT);

        // Validaciones
        if(!$titulo) $errores[] = "El título es obligatorio";
        if(!$precio) $errores[] = "El precio debe ser un número válido";
        if(!$descripcion) $errores[] = "La descripción es obligatoria";
        if(!$habitaciones) $errores[] = "Habitaciones debe ser un número válido";
        if(!$wc) $errores[] = "WC debe ser un número válido";
        if(!$estacionamiento) $errores[] = "Estacionamientos debe ser un número válido";
//        if(!$vendedores_id) $errores[] = "Debes seleccionar un vendedor válido";

        // Si no hay errores, insertar en la BD
        if(empty($errores)) {
            $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id) 
                      VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedores_id')";

            $resultado = mysqli_query($db, $query);

            if($resultado){
                echo "Insertado Correctamente";
            }
        }
    }




?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>
    <?php foreach ($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
        <fieldset>
            <legend>Información General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpg, image/png">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
            <label for="wc">Baños:</label>
            <input type="number" name="wc" id="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo $wc; ?>">
            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor">
                <option value="" >-- Seleccione --</option>
                <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                <option value="vendedor"><?php echo $vendedores_id['nombre'] . " " . $vendedores_id['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>


</main>

<?php  incluirTemplate('footer'); ?>
