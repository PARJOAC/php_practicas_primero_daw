<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once __DIR__ . '/funciones/puntos.php';

$datos = [
    'x' => '',
    'y' => '',
    'color' => 'red',
    'grosor' => '1',
];
$errores = [];
$puntos = [];
$rutas = [];

try {
    $directorio = directorioPuntos();
    $rutas = [
        'datos' => $directorio . '/puntos_' . $ipPuntos . '.dat',
        'imagen' => $directorio . '/imagen_' . $ipPuntos . '.jpg',
        'url' => '/imagenes/puntos/imagen_' . $ipPuntos . '.jpg',
    ];
    $existiaFichero = file_exists($rutas['datos']);
    $puntos = cargarPuntos($rutas['datos']);

    if (!$existiaFichero || !is_file($rutas['imagen'])) {
        guardarImagenPuntos([], $rutas['imagen']);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['guardar'])) {
            foreach (['x', 'y'] as $campo) {
                $valor = $_POST[$campo] ?? '';
                $datos[$campo] = is_scalar($valor) ? trim((string) $valor) : '';
                if (!preg_match('/^\d+$/D', $datos[$campo]) || (int) $datos[$campo] > 500) {
                    $errores[$campo] = 'Introduce un entero entre 0 y 500.';
                }
            }

            $color = $_POST['color'] ?? '';
            $datos['color'] = is_string($color) ? $color : '';
            if (!array_key_exists($datos['color'], Punto::COLORES)) {
                $errores['color'] = 'Selecciona un color válido.';
            }

            $grosor = $_POST['grosor'] ?? '';
            $datos['grosor'] = is_string($grosor) ? $grosor : '';
            if (!preg_match('/^[123]$/D', $datos['grosor'])) {
                $errores['grosor'] = 'Selecciona un grosor válido.';
            }

            if (!$errores) {
                $puntos[] = new Punto($datos['x'], $datos['y'], $datos['color'], $datos['grosor']);
                guardarPuntos($rutas['datos'], $puntos);
                guardarImagenPuntos($puntos, $rutas['imagen']);
                header('Location: index.php?accion=guardado');
                exit;
            }
        } elseif (isset($_POST['borrar'])) {
            $indice = $_POST['indice'] ?? '';
            if (is_string($indice) && preg_match('/^\d+$/D', $indice) && isset($puntos[(int) $indice])) {
                array_splice($puntos, (int) $indice, 1);
                guardarPuntos($rutas['datos'], $puntos);
                guardarImagenPuntos($puntos, $rutas['imagen']);
                header('Location: index.php?accion=borrado');
                exit;
            }
            $errores['borrar'] = 'Selecciona un punto válido para borrar.';
        } elseif (isset($_POST['subir'])) {
            $archivo = $_FILES['archivo'] ?? null;
            if (!is_array($archivo) || !isset($archivo['error'], $archivo['name'], $archivo['tmp_name'])) {
                $errores['archivo'] = 'Selecciona un fichero TXT.';
            } elseif ($archivo['error'] !== UPLOAD_ERR_OK) {
                $errores['archivo'] = 'No se ha podido subir el fichero indicado.';
            } elseif (strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION)) !== 'txt') {
                $errores['archivo'] = 'Solo se permiten ficheros TXT.';
            } elseif (!is_uploaded_file($archivo['tmp_name'])) {
                $errores['archivo'] = 'El fichero subido no es válido.';
            } else {
                $tamano = filesize($archivo['tmp_name']);
                if ($tamano === false || $tamano > 1000000) {
                    $errores['archivo'] = 'El fichero no puede superar 1 MB.';
                } else {
                    $contenido = file_get_contents($archivo['tmp_name']);
                    if ($contenido === false) {
                        throw new RuntimeException('No se ha podido leer el fichero subido.');
                    }

                    $nuevos = [];
                    $omitidos = 0;
                    foreach (preg_split('/\r\n|\r|\n/', $contenido) as $linea) {
                        if (trim($linea) === '') {
                            continue;
                        }
                        $punto = puntoDesdeLinea($linea);
                        if ($punto === null) {
                            $omitidos++;
                        } else {
                            $nuevos[] = $punto;
                        }
                    }

                    if (!$nuevos) {
                        $errores['archivo'] = 'El fichero no contiene puntos válidos.';
                    } else {
                        $puntos = array_merge($puntos, $nuevos);
                        guardarPuntos($rutas['datos'], $puntos);
                        guardarImagenPuntos($puntos, $rutas['imagen']);
                        header('Location: index.php?' . http_build_query([
                            'accion' => 'importado',
                            'agregados' => count($nuevos),
                            'omitidos' => $omitidos,
                        ]));
                        exit;
                    }
                }
            }
        }
    }
} catch (RuntimeException $e) {
    $errores['general'] = $e->getMessage();
}

$mensaje = '';
if (($_GET['accion'] ?? '') === 'guardado') {
    $mensaje = 'Punto añadido correctamente.';
} elseif (($_GET['accion'] ?? '') === 'borrado') {
    $mensaje = 'Punto borrado correctamente.';
} elseif (($_GET['accion'] ?? '') === 'importado') {
    $agregados = filter_var($_GET['agregados'] ?? 0, FILTER_VALIDATE_INT);
    $omitidos = filter_var($_GET['omitidos'] ?? 0, FILTER_VALIDATE_INT);
    $mensaje = 'Puntos añadidos: ' . max(0, (int) $agregados) . '. Líneas no válidas omitidas: ' . max(0, (int) $omitidos) . '.';
}

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 7 - FICHEROS");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 7 - FICHEROS");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera()
{
?>
    <style>
        .relacion7 {
            max-width: 760px;
            margin: 0 auto;
        }

        .relacion7 section {
            margin: 24px 0;
            padding: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .relacion7 label {
            display: block;
            margin: 10px 0 4px;
            font-weight: bold;
        }

        .relacion7 input,
        .relacion7 select,
        .relacion7 textarea {
            max-width: 100%;
            padding: 7px;
        }

        .relacion7 textarea {
            width: 100%;
            box-sizing: border-box;
        }

        .relacion7 .error {
            color: #b42318;
            margin-top: 5px;
        }

        .relacion7 .mensaje {
            color: #176b35;
            font-weight: bold;
        }

        .relacion7 .imagen-puntos {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
        }

        .relacion7 fieldset {
            margin: 12px 0;
        }
    </style>
<?php
}
//vista
function cuerpo()
{
    global $datos, $errores, $puntos, $rutas, $mensaje;
?>
    <div class="relacion7">
        <?php if ($mensaje !== '') { ?>
            <p class="mensaje"><?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?></p>
        <?php } ?>
        <?php if (isset($errores['general'])) { ?>
            <p class="error"><?= htmlspecialchars($errores['general'], ENT_QUOTES, 'UTF-8') ?></p>
        <?php } ?>

        <section>
            <h2>Añadir punto</h2>
            <form method="post" action="">
                <label for="x">Coordenada X (0-500)</label>
                <input type="number" id="x" name="x" min="0" max="500" step="1" value="<?= htmlspecialchars($datos['x'], ENT_QUOTES, 'UTF-8') ?>">
                <?php if (isset($errores['x'])) { ?><div class="error"><?= htmlspecialchars($errores['x'], ENT_QUOTES, 'UTF-8') ?></div><?php } ?>

                <label for="y">Coordenada Y (0-500)</label>
                <input type="number" id="y" name="y" min="0" max="500" step="1" value="<?= htmlspecialchars($datos['y'], ENT_QUOTES, 'UTF-8') ?>">
                <?php if (isset($errores['y'])) { ?><div class="error"><?= htmlspecialchars($errores['y'], ENT_QUOTES, 'UTF-8') ?></div><?php } ?>

                <label for="color">Color</label>
                <select id="color" name="color">
                    <?php foreach (Punto::COLORES as $nombre => $color) { ?>
                        <option value="<?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?>" <?= $datos['color'] === $nombre ? 'selected' : '' ?>>
                            <?= htmlspecialchars($color[0], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php } ?>
                </select>
                <?php if (isset($errores['color'])) { ?><div class="error"><?= htmlspecialchars($errores['color'], ENT_QUOTES, 'UTF-8') ?></div><?php } ?>

                <fieldset>
                    <legend>Grosor</legend>
                    <?php foreach (Punto::GROSORES as $valor => $nombre) { ?>
                        <label>
                            <input type="radio" name="grosor" value="<?= $valor ?>" <?= $datos['grosor'] === (string) $valor ? 'checked' : '' ?>>
                            <?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?>
                        </label>
                    <?php } ?>
                </fieldset>
                <?php if (isset($errores['grosor'])) { ?><div class="error"><?= htmlspecialchars($errores['grosor'], ENT_QUOTES, 'UTF-8') ?></div><?php } ?>

                <button type="submit" name="guardar" value="1">Guardar punto</button>
            </form>
        </section>

        <section>
            <h2>Puntos almacenados</h2>
            <label for="lista-puntos">Un punto por línea (x,y,color,grosor)</label>
            <textarea id="lista-puntos" rows="8" readonly><?= htmlspecialchars(implode(PHP_EOL, array_map('lineaPunto', $puntos)), ENT_QUOTES, 'UTF-8') ?></textarea>
            <p>
                <img class="imagen-puntos" src="<?= htmlspecialchars($rutas['url'] ?? '', ENT_QUOTES, 'UTF-8') ?>" alt="Imagen de los puntos" width="502" height="502">
            </p>
            <p><a href="imagen.php">Descargar imagen JPG</a></p>

            <form method="post" action="">
                <label for="indice">Selecciona un punto para borrar</label>
                <select id="indice" name="indice" required>
                    <option value="">Selecciona un punto</option>
                    <?php foreach ($puntos as $indice => $punto) { ?>
                        <option value="<?= $indice ?>">
                            <?= $indice + 1 ?>: (<?= $punto->getX() ?>, <?= $punto->getY() ?>), <?= htmlspecialchars(Punto::COLORES[$punto->getColor()->value][0], ENT_QUOTES, 'UTF-8') ?>, <?= htmlspecialchars(Punto::GROSORES[$punto->getGrosor()->value], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php } ?>
                </select>
                <?php if (isset($errores['borrar'])) { ?><div class="error"><?= htmlspecialchars($errores['borrar'], ENT_QUOTES, 'UTF-8') ?></div><?php } ?>
                <button type="submit" name="borrar" value="1">Borrar punto</button>
            </form>
        </section>

        <section>
            <h2>Añadir puntos desde un fichero</h2>
            <p>Formato: un punto por línea, con los campos x,y,color,grosor.</p>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                <label for="archivo">Fichero TXT (máximo 1 MB)</label>
                <input type="file" id="archivo" name="archivo" accept=".txt,text/plain" required>
                <?php if (isset($errores['archivo'])) { ?><div class="error"><?= htmlspecialchars($errores['archivo'], ENT_QUOTES, 'UTF-8') ?></div><?php } ?>
                <button type="submit" name="subir" value="1">Subir puntos</button>
            </form>
        </section>
    </div>
<?php
}
