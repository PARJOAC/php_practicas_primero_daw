<?php

/**
 * Ejercicio 1: Librería de validación usando FILTER.
 * Espacio de nombres: VALFILTER
 */

namespace VALFILTER;

function validaEntero(int &$var, int $min, int $max, int $defecto): bool
{
    $opciones = ['options' => ['min_range' => $min, 'max_range' => $max]];
    $filtrado = filter_var($var, FILTER_VALIDATE_INT, $opciones);
    if ($filtrado !== false) {
        $var = (int)$filtrado;
        return true;
    }
    $var = $defecto;
    return false;
}

function validaReal(float &$var, float $min, float $max, float $defecto): bool
{
    $opciones = ['options' => ['min_range' => $min, 'max_range' => $max]];
    $filtrado = filter_var($var, FILTER_VALIDATE_FLOAT, $opciones);
    if ($filtrado !== false) {
        $var = (float)$filtrado;
        return true;
    }
    $var = $defecto;
    return false;
}

function validaFecha(string &$var, string $defecto): bool
{
    $var = trim($var);
    if (!preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/', $var, $matches)) {
        $var = $defecto;
        return false;
    }
    $dia = (int)$matches[1];
    $mes = (int)$matches[2];
    $anio = (int)$matches[3];
    if (checkdate($mes, $dia, $anio)) {
        $var = sprintf('%02d/%02d/%04d', $dia, $mes, $anio);
        return true;
    }
    $var = $defecto;
    return false;
}

function validaHora(string &$var, string $defecto): bool
{
    $var = trim($var);
    if (!preg_match('/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/', $var, $matches)) {
        $var = $defecto;
        return false;
    }
    $h = (int)$matches[1];
    $m = (int)$matches[2];
    $s = (int)$matches[3];
    if ($h >= 0 && $h <= 23 && $m >= 0 && $m <= 59 && $s >= 0 && $s <= 59) {
        $var = sprintf('%02d:%02d:%02d', $h, $m, $s);
        return true;
    }
    $var = $defecto;
    return false;
}

function validaEmail(string &$var, string $defecto): bool
{
    $filtrado = filter_var($var, FILTER_VALIDATE_EMAIL);
    if ($filtrado !== false) {
        $var = mb_strtolower($filtrado, 'UTF-8');
        return true;
    }
    $var = $defecto;
    return false;
}

function validaCadena(string &$var, int $longitud, string $defecto): bool
{
    $var = trim($var);
    $var = filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
    if (mb_strlen($var, 'UTF-8') <= $longitud) {
        return true;
    }
    $var = $defecto;
    return false;
}

function validaExpresion(string &$var, string $expresion, string $defecto): bool
{
    $opciones = ['options' => ['regexp' => $expresion]];
    $filtrado = filter_var($var, FILTER_VALIDATE_REGEXP, $opciones);
    if ($filtrado !== false && $filtrado !== null) {
        return true;
    }
    $var = $defecto;
    return false;
}

function validaRango(mixed $var, array $posibles, int $tipo = 1): bool
{
    if ($tipo === 1) {
        return in_array($var, $posibles, true);
    } elseif ($tipo === 2) {
        return array_key_exists($var, $posibles);
    }
    return false;
}
