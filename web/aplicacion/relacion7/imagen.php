<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once __DIR__ . '/funciones/puntos.php';

try {
    $puntos = cargarPuntos(directorioPuntos() . '/puntos_' . $ipPuntos . '.dat');
    header('Content-Disposition: attachment; filename="puntos.jpg"');
    header('Cache-Control: no-store');
    guardarImagenPuntos($puntos);
} catch (RuntimeException $e) {
    http_response_code(503);
    header('Content-Type: text/plain; charset=utf-8');
    echo $e->getMessage();
}
