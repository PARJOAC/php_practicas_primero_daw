<?php

$ipPuntos = $_SERVER['REMOTE_ADDR'] ?? '';
if (!filter_var($ipPuntos, FILTER_VALIDATE_IP)) {
    $ipPuntos = 'desconocida';
}
$ipPuntos = trim((string) preg_replace('/[^a-zA-Z0-9_-]/', '_', $ipPuntos), '_-');
if ($ipPuntos === '') {
    $ipPuntos = 'desconocida';
}

function directorioPuntos(): string
{
    $directorio = RUTABASE . '/imagenes/puntos';
    if (!is_dir($directorio) && !mkdir($directorio, 0775, true) && !is_dir($directorio)) {
        throw new RuntimeException('No se ha podido crear el directorio de puntos.');
    }

    return $directorio;
}

function cargarPuntos(string $ruta): array
{
    $existia = file_exists($ruta);
    $fichero = fopen($ruta, 'c+');
    if ($fichero === false) {
        throw new RuntimeException('No se ha podido abrir el fichero de puntos.');
    }
    if (!flock($fichero, LOCK_EX)) {
        fclose($fichero);
        throw new RuntimeException('No se ha podido bloquear el fichero de puntos.');
    }

    try {
        rewind($fichero);
        $contenido = stream_get_contents($fichero);
        if ($contenido === false) {
            throw new RuntimeException('No se ha podido leer el fichero de puntos.');
        }

        if (!$existia && $contenido === '') {
            $puntos = [
                new Punto(50, 50, 'red', 1),
                new Punto(250, 250, 'blue', 2),
                new Punto(450, 450, 'green', 3),
            ];
            escribirPuntosBloqueados($fichero, $puntos);
            return $puntos;
        }

        $puntos = [];
        foreach (preg_split('/\r\n|\r|\n/', $contenido) as $indice => $linea) {
            if (trim($linea) === '') {
                continue;
            }

            $punto = puntoDesdeLinea($linea);
            if ($punto === null) {
                throw new RuntimeException('El fichero de puntos contiene datos no válidos en la línea ' . ($indice + 1) . '.');
            }
            $puntos[] = $punto;
        }

        return $puntos;
    } finally {
        flock($fichero, LOCK_UN);
        fclose($fichero);
    }
}

function guardarPuntos(string $ruta, array $puntos): void
{
    $fichero = fopen($ruta, 'c+');
    if ($fichero === false) {
        throw new RuntimeException('No se ha podido abrir el fichero de puntos para guardar.');
    }
    if (!flock($fichero, LOCK_EX)) {
        fclose($fichero);
        throw new RuntimeException('No se ha podido bloquear el fichero de puntos.');
    }

    try {
        escribirPuntosBloqueados($fichero, $puntos);
    } finally {
        flock($fichero, LOCK_UN);
        fclose($fichero);
    }
}

function escribirPuntosBloqueados($fichero, array $puntos): void
{
    $lineas = [];
    foreach ($puntos as $punto) {
        if (!$punto instanceof Punto) {
            throw new InvalidArgumentException('La lista solo puede contener puntos válidos.');
        }
        $lineas[] = lineaPunto($punto);
    }
    $contenido = $lineas ? implode(PHP_EOL, $lineas) . PHP_EOL : '';

    if (!ftruncate($fichero, 0) || rewind($fichero) === false) {
        throw new RuntimeException('No se ha podido preparar el fichero de puntos.');
    }
    if ($contenido !== '' && fwrite($fichero, $contenido) !== strlen($contenido)) {
        throw new RuntimeException('No se han podido guardar todos los puntos.');
    }
    if (!fflush($fichero)) {
        throw new RuntimeException('No se han podido guardar todos los puntos.');
    }
}

function puntoDesdeLinea(string $linea): ?Punto
{
    $campos = array_map('trim', str_getcsv(trim($linea), ',', '"', ''));
    if (count($campos) !== 4) {
        return null;
    }

    try {
        return new Punto($campos[0], $campos[1], $campos[2], $campos[3]);
    } catch (InvalidArgumentException $e) {
        return null;
    }
}

function guardarImagenPuntos(array $puntos, ?string $destino = null): void
{

    $imagen = imagecreatetruecolor(502, 502);
    if ($imagen === false) {
        throw new RuntimeException('No se ha podido crear la imagen de puntos.');
    }

    try {
        $blanco = imagecolorallocate($imagen, 255, 255, 255);
        $negro = imagecolorallocate($imagen, 0, 0, 0);
        imagefill($imagen, 0, 0, $blanco);
        imagerectangle($imagen, 0, 0, 501, 501, $negro);

        foreach ($puntos as $punto) {
            if (!$punto instanceof Punto) {
                throw new InvalidArgumentException('La lista solo puede contener puntos válidos.');
            }

            $datosColor = Punto::COLORES[$punto->getColor()->value];
            $color = imagecolorallocate($imagen, $datosColor[1], $datosColor[2], $datosColor[3]);
            $diametro = match ($punto->getGrosor()) {
                GrosorPunto::FINO => 5,
                GrosorPunto::MEDIO => 11,
                GrosorPunto::GORDO => 19,
            };
            imagefilledellipse($imagen, $punto->getX() + 1, $punto->getY() + 1, $diametro, $diametro, $color);
        }

        if ($destino === null) {
            header('Content-Type: image/jpeg');
            if (!imagejpeg($imagen, null, 90)) {
                throw new RuntimeException('No se ha podido generar la imagen descargable.');
            }
        } elseif (!imagejpeg($imagen, $destino, 90)) {
            throw new RuntimeException('No se ha podido guardar la imagen de puntos.');
        }
    } finally {
        imagedestroy($imagen);
    }
}

function lineaPunto(Punto $punto): string
{
    return implode(',', [
        $punto->getX(),
        $punto->getY(),
        $punto->getColor()->value,
        $punto->getGrosor()->value,
    ]);
}
