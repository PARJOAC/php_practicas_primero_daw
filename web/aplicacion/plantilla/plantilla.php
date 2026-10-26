<?php

/**
 * Muestra una página de error con un diseño limpio utilizando las clases CSS.
 */
function paginaError($mensaje)
{
    header("HTTP/1.0 404 Not Found");
    inicioCabecera("Error - Aplicación");
    finCabecera();
    inicioCuerpo("¡Atención!");

    // Usamos la clase .error y un botón moderno para volver
    echo "<div class='error'>" . htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') . "</div>";
    echo "<br />";
    echo "<a href='/index.php' class='boton'>Ir a la página principal</a>";

    finCuerpo();
    exit;
}

/**
 * Inicia la cabecera HTML y los meta tags.
 */
function inicioCabecera($titulo)
{
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?></title>
        <meta name="description" content="Prácticas de desarrollo web">
        <meta name="author" content="Administrador">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="stylesheet" type="text/css" href="/estilos/base.css">
    <?php
}

/**
 * Cierra la etiqueta head.
 */
function finCabecera()
{
    ?>
    </head>
<?php
}

/**
 * Genera la barra de navegación y migas de pan según la ruta actual.
 */
function barraNavegacion()
{
    $ruta = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    $paginaActual = 'Página actual';
    $enlaceVolver = '/index.php';
    $migas = [];

    if (preg_match('~/(relacion[123])/(ejercicioExtra|ejercicio[1-7])\.php$~', $ruta, $coincidencias)) {
        $numeroRelacion = substr($coincidencias[1], strlen('relacion'));
        $relacion = 'Relación ' . $numeroRelacion;
        $enlaceRelacion = '/aplicacion/' . $coincidencias[1] . '/ejercicio1.php';

        if ($coincidencias[2] === 'ejercicioExtra') {
            $paginaActual = 'Ejercicio EXTRA';
        } else {
            $numeroEjercicio = substr($coincidencias[2], strlen('ejercicio'));
            $paginaActual = 'Ejercicio ' . $numeroEjercicio;
        }

        $enlaceVolver = $enlaceRelacion;
        $migas[] = ['texto' => $relacion, 'enlace' => $enlaceRelacion];
    } else {
        $nombreArchivo = pathinfo($ruta, PATHINFO_FILENAME);
        $paginaActual = ucfirst(str_replace(['_', '-'], ' ', $nombreArchivo));
    }
?>
    <nav class="barraNavegacion" aria-label="Navegación de la página">
        <a
            class="botonVolver"
            href="<?php echo htmlspecialchars($enlaceVolver, ENT_QUOTES, 'UTF-8'); ?>"
            onclick="if (window.history.length > 1) { window.history.back(); return false; }">&#8592; Volver</a>

        <div class="migas">
            <a href="/index.php">Inicio</a>

            <?php foreach ($migas as $miga) { ?>
                <span aria-hidden="true">&rsaquo;</span>
                <a href="<?php echo htmlspecialchars($miga['enlace'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($miga['texto'], ENT_QUOTES, 'UTF-8'); ?>
                </a>
            <?php } ?>

            <span aria-hidden="true">&rsaquo;</span>
            <span aria-current="page">
                <?php echo htmlspecialchars($paginaActual, ENT_QUOTES, 'UTF-8'); ?>
            </span>
        </div>
    </nav>
<?php
}

/**
 * Abre el cuerpo de la página, la estructura principal y el menú de navegación.
 */
function inicioCuerpo($cabecera)
{
    global $acceso;
?>

    <body>
        <div id="documento">

            <header style="display: flex; align-items: center; gap: 15px;">
                <a href="/index.php">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAATgzWAT0XycykMnFTneSVTs_WcAK3-rf_GcY0_XEOLoWUQGALTSOxUIa&s=10" width="52px" height="52px" alt="Logo">
                </a>
                <h1 id="titulo" style="margin: 0;"><?php echo htmlspecialchars($cabecera, ENT_QUOTES, 'UTF-8'); ?></h1>
            </header>

            <nav id="barraMenu">
                <ul>
                    <li><a href="/index.php">Inicio</a></li>
                    <li><a href="/aplicacion/pruebas/basicas.php">Ejemplos Básicos</a></li>

                    <li>
                        <a href="#">Relación 1 ▾</a>
                        <ul>
                            <li><a href="/aplicacion/relacion1/ejercicio1.php">Ejercicio 1</a></li>
                            <li><a href="/aplicacion/relacion1/ejercicio2.php">Ejercicio 2</a></li>
                            <li><a href="/aplicacion/relacion1/ejercicio3.php">Ejercicio 3</a></li>
                            <li><a href="/aplicacion/relacion1/ejercicio4.php">Ejercicio 4</a></li>
                            <li><a href="/aplicacion/relacion1/ejercicio5.php">Ejercicio 5</a></li>
                            <li><a href="/aplicacion/relacion1/ejercicio6.php">Ejercicio 6</a></li>
                            <li><a href="/aplicacion/relacion1/ejercicio7.php">Ejercicio 7</a></li>
                            <li><a href="/aplicacion/relacion1/ejercicioExtra.php">Ejercicio EXTRA</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">Relación 2 ▾</a>
                        <ul>
                            <li><a href="/aplicacion/relacion2/ejercicio1.php">Ejercicio 1</a></li>
                            <li><a href="/aplicacion/relacion2/ejercicio2.php">Ejercicio 2</a></li>
                            <li><a href="/aplicacion/relacion2/ejercicio3.php">Ejercicio 3</a></li>
                            <li><a href="/aplicacion/relacion2/ejercicio4.php">Ejercicio 4</a></li>
                            <li><a href="/aplicacion/relacion2/ejercicio5.php">Ejercicio 5</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">Relación 3 ▾</a>
                        <ul>
                            <li><a href="/aplicacion/relacion3/ejercicio1.php">Ejercicio 1</a></li>
                            <li><a href="/aplicacion/relacion3/ejercicio2.php">Ejercicio 2</a></li>
                            <li><a href="/aplicacion/relacion3/ejercicio3.php">Ejercicio 3</a></li>
                            <li><a href="/aplicacion/relacion3/ejercicio4.php">Ejercicio 4</a></li>
                            <li><a href="/aplicacion/relacion3/ejercicio5.php">Ejercicio 5</a></li>
                            <li><a href="/aplicacion/relacion3/ejercicio6.php">Ejercicio 6</a></li>
                            <li><a href="/aplicacion/relacion3/ejercicio7.php">Ejercicio 7</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>

            <?php barraNavegacion(); ?>

            <main style="padding: 32px;">
            <?php
        }

        /**
         * Cierra el contenido, el documento y las etiquetas HTML.
         */
        function finCuerpo()
        {
            ?>
            </main>

            <footer>
                <div>
                    &copy; <?php echo date('Y'); ?> Pablo Arjonilla
                </div>
            </footer>

        </div>
    </body>

    </html>
<?php
        }
