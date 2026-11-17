<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// ==========================================
// CONTROLADOR (EJERCICIO 1 y 2)
// ==========================================
require_once dirname(__FILE__) . "/funciones/val_normal.php";

use function VALNORMAL\validaEntero;
use function VALNORMAL\validaReal;
use function VALNORMAL\validaFecha;
use function VALNORMAL\validaHora;
use function VALNORMAL\validaCadena;
use function VALNORMAL\validaExpresion;
use function VALNORMAL\validaRango;

$datos = [
    'nombre' => '',
    'password' => '',
    'fecha_nacimiento' => '',
    'dia_carnet' => '',
    'mes_carnet' => '',
    'anio_carnet' => '',
    'hora_levantarse' => '',
    'estado' => '',
    'estudios' => [],
    'hermanos' => 0,
    'sueldo' => 1100.0
];

$errores = [];
$enviado = false;
$valido = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enviado = true;

    // 1. Nombre: cadena máx 25 carac., no vacío, no empieza por H, se pasa a mayúsculas[cite: 2]
    $datos['nombre'] = $_POST['nombre'] ?? '';
    if (!validaCadena($datos['nombre'], 25, '') || empty(trim($datos['nombre']))) {
        $errores['nombre'] = 'El nombre no puede estar vacío y debe tener un máximo de 25 caracteres.';
    } else {
        $datos['nombre'] = mb_strtoupper(trim($datos['nombre']), 'UTF-8');
        if (mb_strpos($datos['nombre'], 'H') === 0) {
            $errores['nombre'] = 'El nombre no puede empezar por la letra H.';
        }
    }

    // 2. Contraseña: máx 15 carac., mín 8, incluye mayús, minús, cifra y carácter especial[cite: 2]
    $datos['password'] = $_POST['password'] ?? '';
    $regexPass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$_\-;<>\@\\\\]).{8,15}$/';
    $tmpPass = $datos['password'];
    if (!validaExpresion($tmpPass, $regexPass, '')) {
        $errores['password'] = 'La contraseña debe tener de 8 a 15 caracteres, una mayúscula, una minúscula, un número y un carácter especial ($_ - ; < > @ \).';
    }

    // 3. Fecha de nacimiento: una única cadena válida (formato dd/mm/aaaa)[cite: 2]
    $datos['fecha_nacimiento'] = $_POST['fecha_nacimiento'] ?? '';
    $tmpFnac = $datos['fecha_nacimiento'];
    if (!validaFecha($tmpFnac, '')) {
        $errores['fecha_nacimiento'] = 'La fecha de nacimiento no es válida (formato dd/mm/aaaa).';
    } else {
        $datos['fecha_nacimiento'] = $tmpFnac;
    }

    // 4. Fecha de carnet: tres elementos independientes (día, mes, año) + mayor de edad (fecha nacimiento + 18 años usando DateTime)[cite: 2]
    $datos['dia_carnet'] = $_POST['dia_carnet'] ?? '';
    $datos['mes_carnet'] = $_POST['mes_carnet'] ?? '';
    $datos['anio_carnet'] = $_POST['anio_carnet'] ?? '';

    $diaC = (int)$datos['dia_carnet'];
    $mesC = (int)$datos['mes_carnet'];
    $anioC = (int)$datos['anio_carnet'];

    if (!checkdate($mesC, $diaC, $anioC)) {
        $errores['fecha_carnet'] = 'La fecha de expedición del carnet introducida no es válida.';
    } else {
        $fechaCarnetStr = sprintf('%02d/%02d/%04d', $diaC, $mesC, $anioC);
        if (empty($errores['fecha_nacimiento'])) {
            try {
                $dtNac = \DateTime::createFromFormat('d/m/Y', $datos['fecha_nacimiento']);
                $dtCarnet = \DateTime::createFromFormat('d/m/Y', $fechaCarnetStr);

                $dtMinimo = clone $dtNac;
                $dtMinimo->modify('+18 years');

                if ($dtCarnet < $dtMinimo) {
                    $errores['fecha_carnet'] = 'La fecha del carnet indica que la persona no es mayor de edad (+18 años respecto a su nacimiento).';
                }
            } catch (\Exception $e) {
                $errores['fecha_carnet'] = 'Error al calcular la mayoría de edad con DateTime.';
            }
        }
    }

    // 5. Hora de levantarse: cadena con hora válida[cite: 2]
    $datos['hora_levantarse'] = $_POST['hora_levantarse'] ?? '';
    $tmpHora = $datos['hora_levantarse'];
    if (!validaHora($tmpHora, '')) {
        $errores['hora_levantarse'] = 'La hora de levantarse no es válida (formato hh:mm:ss).';
    } else {
        $datos['hora_levantarse'] = $tmpHora;
    }

    // 6. Estado: radiobuttons (1-estudiante, 2-en paro, 3-trabajando, 4-jubilado, 5-incorrecto de prueba)[cite: 2]
    $estadoInput = $_POST['estado'] ?? '';
    $estadosPosibles = [1 => 'Estudiante', 2 => 'En paro', 3 => 'Trabajando', 4 => 'Jubilado', 5 => 'Incorrecto'];
    if ($estadoInput === '' || !validaRango((int)$estadoInput, $estadosPosibles, 2) || (int)$estadoInput === 5) {
        $errores['estado'] = 'Debe indicar obligatoriamente un estado correcto.';
    } else {
        $datos['estado'] = (int)$estadoInput;
    }

    // 7. Estudios: checkboxes múltiples (0 a 5, con 6 incorrecto de prueba). Si marca 0 (sin estudios), se desmarca el resto[cite: 2]
    $estudiosInput = $_POST['estudios'] ?? [];
    $estudiosPosibles = [0 => 'Sin estudios', 1 => 'Primaria', 2 => 'Secundaria', 3 => 'Bachillerato', 4 => 'Ciclo formativo', 5 => 'Universitarios', 6 => 'Incorrecto'];

    if (empty($estudiosInput)) {
        $errores['estudios'] = 'Debe seleccionar al menos una opción de estudios.';
    } else {
        $selValidos = [];
        foreach ($estudiosInput as $est) {
            if (validaRango((int)$est, $estudiosPosibles, 2) && (int)$est !== 6) {
                $selValidos[] = (int)$est;
            } else {
                $errores['estudios'] = 'Se ha seleccionado una opción de estudios no válida.';
                break;
            }
        }
        if (in_array(0, $selValidos, true) && count($selValidos) > 1) {
            $selValidos = [0]; // Si marca sin estudios, se desmarca el resto
        }
        $datos['estudios'] = $selValidos;
    }

    // 8. Hermanos: entero entre 0 y 20, por defecto 0[cite: 3]
    $hermanosInput = $_POST['hermanos'] ?? 0;
    $tmpHermanos = (int)$hermanosInput;
    if (!validaEntero($tmpHermanos, 0, 20, 0)) {
        $errores['hermanos'] = 'El número de hermanos debe estar comprendido entre 0 y 20.';
    }
    $datos['hermanos'] = $tmpHermanos;

    // 9. Sueldo: real entre 1000 y 150000 €, por defecto 1100 €[cite: 3]
    $sueldoInput = $_POST['sueldo'] ?? 1100;
    $tmpSueldo = (float)$sueldoInput;
    if (!validaReal($tmpSueldo, 1000.0, 150000.0, 1100.0)) {
        $errores['sueldo'] = 'El sueldo debe ser un valor real entre 1000€ y 150000€.';
    }
    $datos['sueldo'] = $tmpSueldo;

    if (empty($errores)) {
        $valido = true;
    }
}

// ==========================================
// DIBUJA LA PLANTILLA DE LA VISTA
// ==========================================
inicioCabecera("RELACIÓN 5 - FORMULARIO DE VALIDACIÓN");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 5 - FORMULARIO DE VALIDACIÓN");
cuerpo(); // llamo a la vista
finCuerpo();
// **********************************************************

// ==========================================
// VISTA: CABECERA
// ==========================================
function cabecera()
{
?>
    <style>
        .campo {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .error {
            color: #d9534f;
            font-size: 0.85em;
            margin-top: 4px;
        }

        .error-input {
            border-color: #d9534f !important;
        }

        fieldset {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 15px;
        }

        legend {
            font-weight: bold;
        }

        button {
            background: #0275d8;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #025aa5;
        }

        .resumen {
            background: #fff;
            padding: 20px;
            border-radius: 6px;
        }

        .resumen h2 {
            color: #5cb85c;
        }
    </style>
<?
}

// ==========================================
// VISTA: CUERPO
// ==========================================
function cuerpo()
{
    global $datos, $errores, $enviado, $valido;

    if ($enviado && $valido) {
        mostrarResumen($datos);
    } else {
        mostrarFormulario($datos, $errores);
    }
}

/**
 * Función separada de la vista para mostrar el formulario[cite: 3].
 */
function mostrarFormulario(array $datos, array $errores): void
{
?>
    <br>
    <form action="" method="POST">

        <!-- Nombre -->
        <div class="campo">
            <label for="nombre">Nombre (máx 25 caracteres, no empieza por H):</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($datos['nombre'], ENT_QUOTES, 'UTF-8') ?>" class="<?= isset($errores['nombre']) ? 'error-input' : '' ?>">
            <?php if (isset($errores['nombre'])): ?><div class="error"><?= $errores['nombre'] ?></div><?php endif; ?>
        </div>

        <!-- Contraseña -->
        <div class="campo">
            <label for="password">Contraseña (8-15 carac., mayús, minús, número, especial):</label>
            <input type="password" id="password" name="password" value="<?= htmlspecialchars($datos['password'], ENT_QUOTES, 'UTF-8') ?>" class="<?= isset($errores['password']) ? 'error-input' : '' ?>">
            <?php if (isset($errores['password'])): ?><div class="error"><?= $errores['password'] ?></div><?php endif; ?>
        </div>

        <!-- Fecha de nacimiento -->
        <div class="campo">
            <label for="fecha_nacimiento">Fecha de Nacimiento (dd/mm/aaaa):</label>
            <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="dd/mm/aaaa" value="<?= htmlspecialchars($datos['fecha_nacimiento'], ENT_QUOTES, 'UTF-8') ?>" class="<?= isset($errores['fecha_nacimiento']) ? 'error-input' : '' ?>">
            <?php if (isset($errores['fecha_nacimiento'])): ?><div class="error"><?= $errores['fecha_nacimiento'] ?></div><?php endif; ?>
        </div>

        <!-- Fecha de carnet -->
        <fieldset>
            <legend>Fecha de Carnet (Mayoría de edad >= Nacimiento + 18 años)</legend>
            <div style="display: flex; gap: 10px;">
                <div style="flex: 1;"><label>Día:</label><input type="number" name="dia_carnet" min="1" max="31" value="<?= htmlspecialchars($datos['dia_carnet'], ENT_QUOTES, 'UTF-8') ?>"></div>
                <div style="flex: 1;"><label>Mes:</label><input type="number" name="mes_carnet" min="1" max="12" value="<?= htmlspecialchars($datos['mes_carnet'], ENT_QUOTES, 'UTF-8') ?>"></div>
                <div style="flex: 1;"><label>Año:</label><input type="number" name="anio_carnet" min="1900" max="2100" value="<?= htmlspecialchars($datos['anio_carnet'], ENT_QUOTES, 'UTF-8') ?>"></div>
            </div>
            <?php if (isset($errores['fecha_carnet'])): ?><div class="error"><?= $errores['fecha_carnet'] ?></div><?php endif; ?>
        </fieldset>

        <!-- Hora de levantarse -->
        <div class="campo">
            <label for="hora_levantarse">Hora de levantarse (hh:mm:ss):</label>
            <input type="text" id="hora_levantarse" name="hora_levantarse" placeholder="07:30:00" value="<?= htmlspecialchars($datos['hora_levantarse'], ENT_QUOTES, 'UTF-8') ?>" class="<?= isset($errores['hora_levantarse']) ? 'error-input' : '' ?>">
            <?php if (isset($errores['hora_levantarse'])): ?><div class="error"><?= $errores['hora_levantarse'] ?></div><?php endif; ?>
        </div>

        <!-- Estado -->
        <fieldset>
            <legend>Estado:</legend>
            <label><input type="radio" name="estado" value="1" <?= (isset($datos['estado']) && $datos['estado'] === 1) ? 'checked' : '' ?>> 1 - Estudiante</label>
            <label><input type="radio" name="estado" value="2" <?= (isset($datos['estado']) && $datos['estado'] === 2) ? 'checked' : '' ?>> 2 - En paro</label>
            <label><input type="radio" name="estado" value="3" <?= (isset($datos['estado']) && $datos['estado'] === 3) ? 'checked' : '' ?>> 3 - Trabajando</label>
            <label><input type="radio" name="estado" value="4" <?= (isset($datos['estado']) && $datos['estado'] === 4) ? 'checked' : '' ?>> 4 - Jubilado</label>
            <label><input type="radio" name="estado" value="5" <?= (isset($datos['estado']) && $datos['estado'] === 5) ? 'checked' : '' ?>> 5 - Incorrecto (Prueba)</label>
            <?php if (isset($errores['estado'])): ?><div class="error"><?= $errores['estado'] ?></div><?php endif; ?>
        </fieldset>

        <!-- Estudios -->
        <fieldset>
            <legend>Estudios:</legend>
            <?php
            $opcs = [0 => 'Sin estudios', 1 => 'Primaria', 2 => 'Secundaria', 3 => 'Bachillerato', 4 => 'Ciclo formativo', 5 => 'Universitarios', 6 => 'Incorrecto (Prueba)'];
            foreach ($opcs as $cod => $txt):
                $chk = is_array($datos['estudios']) && in_array($cod, $datos['estudios'], true);
            ?>
                <label><input type="checkbox" name="estudios[]" value="<?= $cod ?>" <?= $chk ? 'checked' : '' ?>> <?= $cod ?> - <?= $txt ?></label>
            <?php endforeach; ?>
            <?php if (isset($errores['estudios'])): ?><div class="error"><?= $errores['estudios'] ?></div><?php endif; ?>
        </fieldset>

        <!-- Hermanos -->
        <div class="campo">
            <label for="hermanos">Número de Hermanos (0 a 20):</label>
            <input type="number" id="hermanos" name="hermanos" min="0" max="20" value="<?= htmlspecialchars((string)$datos['hermanos'], ENT_QUOTES, 'UTF-8') ?>">
            <?php if (isset($errores['hermanos'])): ?><div class="error"><?= $errores['hermanos'] ?></div><?php endif; ?>
        </div>

        <!-- Sueldo -->
        <div class="campo">
            <label for="sueldo">Sueldo (€):</label>
            <input type="number" step="0.01" id="sueldo" name="sueldo" min="1000" max="150000" value="<?= htmlspecialchars((string)$datos['sueldo'], ENT_QUOTES, 'UTF-8') ?>">
            <?php if (isset($errores['sueldo'])): ?><div class="error"><?= $errores['sueldo'] ?></div><?php endif; ?>
        </div>

        <button type="submit">Enviar datos</button>
    </form>
<?php
}

/**
 * Función para mostrar el resumen cuando todo es correcto[cite: 3].
 */
function mostrarResumen(array $datos): void
{
    $textosEstado = [1 => 'Estudiante', 2 => 'En paro', 3 => 'Trabajando', 4 => 'Jubilado'];
    $textosEstudios = [0 => 'Sin estudios', 1 => 'Primaria', 2 => 'Secundaria', 3 => 'Bachillerato', 4 => 'Ciclo formativo', 5 => 'Universitarios'];
?>
    <div class="resumen">
        <h2>¡Datos validados correctamente!</h2>
        <ul>
            <li><strong>Nombre:</strong> <?= htmlspecialchars($datos['nombre'], ENT_QUOTES, 'UTF-8') ?></li>
            <li><strong>Contraseña:</strong> <em>******** (Oculta)</em></li>
            <li><strong>Fecha de Nacimiento:</strong> <?= htmlspecialchars($datos['fecha_nacimiento'], ENT_QUOTES, 'UTF-8') ?></li>
            <li><strong>Fecha de Carnet:</strong> <?= sprintf('%02d/%02d/%04d', $datos['dia_carnet'], $datos['mes_carnet'], $datos['anio_carnet']) ?></li>
            <li><strong>Hora de levantarse:</strong> <?= htmlspecialchars($datos['hora_levantarse'], ENT_QUOTES, 'UTF-8') ?></li>
            <li><strong>Estado:</strong> <?= $textosEstado[$datos['estado']] ?? '' ?></li>
            <li><strong>Estudios:</strong>
                <ul>
                    <?php foreach ($datos['estudios'] as $est): ?>
                        <li><?= $textosEstudios[$est] ?? '' ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><strong>Hermanos:</strong> <?= (int)$datos['hermanos'] ?></li>
            <li><strong>Sueldo:</strong> <?= number_format($datos['sueldo'], 2, ',', '.') ?> €</li>
        </ul>
        <p><a href="">Volver al formulario</a></p>
    </div>
<?php
}
