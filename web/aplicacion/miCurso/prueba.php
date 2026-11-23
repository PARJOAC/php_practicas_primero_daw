<?php

declare(strict_types=1);

$name = "Pablo";
$isDev = true;
$age = 21;
$output = "Mi primera app, $name, tengo $age años";

// Constante global
define("LOGO_URL", "https://thumb.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1280px-PHP-logo.svg.png?utm_source=es.wikipedia.org&utm_campaign=index&utm_content=thumbnail");

// Constante local
const NOMBRE = "Pablo";

// Match moderno (equivalente limpio a switch)
$outputAge = match (true) {
    $age <= 2 => "Eres un bebé, $name",
    $age <= 12 => "Eres un niño, $name",
    $age < 18 => "Eres un adolescente, $name",
    $age == 18 => "Eres mayor de edad, $name",
    $age <= 30 => "Tienes menos de 30 años, $name",
    $age <= 65 => "Eres un adulto mayor, $name",
    default => "Eres un anciano, $name",
};

// Array indexado y añadido al final
$bestLanguage = ["PHP", "JavaScript", "Java", "Python"];
$bestLanguage[] = "TypeScript";

// Array asociativo
$person = [
    "name" => "Pablo",
    "age" => 21,
    "isDev" => true,
    "languages" => ["PHP", "JavaScript", "TypeScript"],
];

/**
 * Formatea un array en una cadena legible separada por comas y terminada en punto.
 */
function visualizarArray(array $array): string
{
    if (empty($array)) {
        return "<em>(array vacío)</em>";
    }

    // Reindexamos para evitar errores de clave si el array viene de array_diff o filtros
    $valores = array_values($array);
    $ultimoIndice = count($valores) - 1;
    $texto = "";

    for ($i = 0; $i <= $ultimoIndice; $i++) {
        $separador = ($i === $ultimoIndice) ? "." : ", ";
        $texto .= htmlspecialchars((string) $valores[$i], ENT_QUOTES, 'UTF-8') . $separador;
    }

    return $texto;
}

// --- Pruebas con arrays numéricos ---
$array1 = [3, 1];
$array2 = [1, 2, 40, 20];

// Diferencia dos arrays: devuelve los valores del primero que no estén en el resto
$diferencias = array_diff($array1, $array2);

// Unir arrays
$unidos = array_merge($array1, $array2);

// Ordenar (modifica el array original por referencia)
$ordenadoAsc = $array2;
sort($ordenadoAsc);

$ordenadoDesc = $array2;
rsort($ordenadoDesc);

$ordenadoAsort = $array2;
asort($ordenadoAsort);

$ordenadoKsort = $array2;
ksort($ordenadoKsort);

$mezclado = $array2;
shuffle($mezclado);

// --- Pruebas con arrays de frutas ---
$frutas = ["naranja", "sandías", "melones"];
$eliminado = array_shift($frutas); // Elimina el primero [0]
array_unshift($frutas, "pera");     // Añade al principio
array_push($frutas, "manzana", "frambuesa"); // Añade al final
$ultimoEliminado = array_pop($frutas); // Elimina el último

$elementosTotales = count($frutas);
$actualInicio = current($frutas);
end($frutas);
$actualFinal = current($frutas);

reset($frutas); // Volver al inicio

$claveFruta = array_search("pera", $frutas);
$claveEncontrada = $claveFruta !== false ? "Ubicación de \'$frutas[$claveFruta]\' en el índice: " . $claveFruta : "No encontrada la clave";

$fechaActual = date("d/m/y h:i:s");
date_default_timezone_set('Europe/Madrid');

$dias = [
    1 => 'lunes',
    2 => 'martes',
    3 => 'miércoles',
    4 => 'jueves',
    5 => 'viernes',
    6 => 'sábado',
    7 => 'domingo',
];

$meses = [
    1  => 'enero',
    2  => 'febrero',
    3  => 'marzo',
    4  => 'abril',
    5  => 'mayo',
    6  => 'junio',
    7  => 'julio',
    8  => 'agosto',
    9  => 'septiembre',
    10 => 'octubre',
    11 => 'noviembre',
    12 => 'diciembre',
];

$ahora = new DateTimeImmutable();
$diaSemana = $dias[(int) $ahora->format('N')];
$diaMes = $ahora->format('j');
$mes = $meses[(int) $ahora->format('n')];
$anio = $ahora->format('Y');

$fechaActualLarga = "$diaSemana, $diaMes de $mes de $anio";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($output, ENT_QUOTES, 'UTF-8') ?></title>
    <style>
        :root {
            color-scheme: dark;
            --bg-1: #0b1020;
            --bg-2: #171f38;
            --card-bg: rgba(255, 255, 255, 0.05);
            --card-border: rgba(255, 255, 255, 0.12);
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --accent: #818cf8;
            --accent-soft: rgba(129, 140, 248, 0.15);
            --success: #34d399;
            --success-soft: rgba(52, 211, 153, 0.15);
            --warning: #fbbf24;
            --warning-soft: rgba(251, 191, 36, 0.15);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            padding: 2.5rem 1rem;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: var(--text-main);
            background: radial-gradient(circle at top left, var(--bg-2), var(--bg-1) 70%);
            display: grid;
            place-items: center;
        }

        .container {
            width: 100%;
            max-width: 720px;
            background: var(--card-bg);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.45);
        }

        .header {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--card-border);
        }

        .header img {
            width: 76px;
            height: auto;
            flex-shrink: 0;
        }

        .header h1 {
            font-size: 1.45rem;
            line-height: 1.25;
        }

        .header .subtitle {
            color: var(--text-muted);
            font-size: 0.92rem;
            margin-top: 0.3rem;
        }

        .section {
            margin-top: 1.5rem;
        }

        .section h2 {
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--accent);
            margin-bottom: 0.85rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge--dev {
            background: var(--success-soft);
            color: var(--success);
            border: 1px solid rgba(52, 211, 153, 0.3);
        }

        .badge--off {
            background: var(--warning-soft);
            color: var(--warning);
            border: 1px solid rgba(251, 191, 36, 0.3);
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            list-style: none;
        }

        .tags li {
            background: var(--accent-soft);
            border: 1px solid rgba(129, 140, 248, 0.28);
            color: #e0e7ff;
            padding: 0.35rem 0.75rem;
            border-radius: 10px;
            font-size: 0.88rem;
            font-weight: 500;
        }

        .log-list {
            list-style: none;
            display: grid;
            gap: 0.55rem;
            font-size: 0.92rem;
        }

        .log-list li {
            background: rgba(15, 23, 42, 0.55);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 10px;
            padding: 0.65rem 0.85rem;
            display: flex;
            justify-content: space-between;
            gap: 1rem;
        }

        .log-list span:first-child {
            color: var(--text-muted);
        }

        .log-list span:last-child {
            text-align: right;
            font-family: ui-monospace, SFMono-Regular, Menlo, monospace;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>
    <main class="container">
        <header class="header">
            <img src="<?= LOGO_URL ?>" alt="PHP Logo">
            <div>
                <!-- Forma simplificada del echo -->
                <h1><?= htmlspecialchars($output, ENT_QUOTES, 'UTF-8') ?></h1>
                <p class="subtitle">
                    Constante <code>NOMBRE</code>: <strong><?= NOMBRE ?></strong> · <?= htmlspecialchars($outputAge, ENT_QUOTES, 'UTF-8') ?>
                </p>
            </div>
        </header>

        <section class="section">
            <h2>Estado y lenguajes</h2>
            <?php if ($isDev): ?>
                <p class="badge badge--dev">Modo desarrollador activado</p>
            <?php // Nunca ponerlo separado el elseif
            elseif (!$isDev): ?>
                <p class="badge badge--off">Modo desarrollador desactivado</p>
            <?php endif; ?>

            <ul class="tags" style="margin-top: 0.85rem;">
                <?php foreach ($bestLanguage as $key => $language): ?>
                    <li id="lang-<?= $key ?>"><?= htmlspecialchars($language, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="section">
            <h2>Operaciones con arrays numéricos</h2>
            <ul class="log-list">
                <li><span>Diferencia ($array1 - $array2)</span><span><?= visualizarArray($diferencias) ?></span></li>
                <li><span>Unión (array_merge)</span><span><?= visualizarArray($unidos) ?></span></li>
                <li><span>sort()</span><span><?= visualizarArray($ordenadoAsc) ?></span></li>
                <li><span>rsort()</span><span><?= visualizarArray($ordenadoDesc) ?></span></li>
                <li><span>asort()</span><span><?= visualizarArray($ordenadoAsort) ?></span></li>
                <li><span>ksort()</span><span><?= visualizarArray($ordenadoKsort) ?></span></li>
                <li><span>shuffle()</span><span><?= visualizarArray($mezclado) ?></span></li>
            </ul>
        </section>

        <section class="section">
            <h2>Operaciones con frutas</h2>
            <ul class="log-list">
                <li><span>Eliminado con array_shift()</span><span><?= htmlspecialchars($eliminado, ENT_QUOTES, 'UTF-8') ?></span></li>
                <li><span>Eliminado con array_pop()</span><span><?= htmlspecialchars($ultimoEliminado, ENT_QUOTES, 'UTF-8') ?></span></li>
                <li><span>Estado final de $frutas</span><span><?= visualizarArray($frutas) ?></span></li>
                <li><span>Total elementos (count)</span><span><?= $elementosTotales ?></span></li>
                <li><span>Puntero inicial / final</span><span><?= htmlspecialchars("$actualInicio / $actualFinal", ENT_QUOTES, 'UTF-8') ?></span></li>
                <li><span>Búsqueda por clave</span><span><?= htmlspecialchars("$claveEncontrada", ENT_QUOTES, 'UTF-8') ?></span></li>
            </ul>
        </section>

        <section class="section">
            <h2>Fechas</h2>
            <ul class="log-list">
                <li><span>Fecha actual</span><span><?= htmlspecialchars($fechaActual, ENT_QUOTES, 'UTF-8') ?></span></li>
                <li><span>Fecha actual larga</span><span><?= htmlspecialchars($fechaActualLarga, ENT_QUOTES, 'UTF-8') ?></span></li>
            </ul>
        </section>
    </main>
</body>

</html>