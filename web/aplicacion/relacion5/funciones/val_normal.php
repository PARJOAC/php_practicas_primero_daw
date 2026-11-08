<?php

/**
 * Ejercicio 1: Librería de validación sin FILTER.
 * Espacio de nombres: VALNORMAL
 */

namespace VALNORMAL;

function validaEntero(int &$var, int $min, int $max, int $defecto): bool
{
    if (!is_numeric($var)) {
        $var = $defecto;
        return false;
    }
    $val = (int)$var;
    if ($val >= $min && $val <= $max) {
        $var = $val;
        return true;
    }
    $var = $defecto;
    return false;
}

function validaReal(float &$var, float $min, float $max, float $defecto): bool
{
    if (!is_numeric($var)) {
        $var = $defecto;
        return false;
    }
    $val = (float)$var;
    if ($val >= $min && $val <= $max) {
        $var = $val;
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
    $var = trim($var);
    $regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    if (preg_match($regex, $var)) {
        $var = mb_strtolower($var, 'UTF-8');
        return true;
    }
    $var = $defecto;
    return false;
}

function validaCadena(string &$var, int $longitud, string $defecto): bool
{
    $var = trim($var);
    if (mb_strlen($var, 'UTF-8') <= $longitud) {
        return true;
    }
    $var = $defecto;
    return false;
}

function validaExpresion(string &$var, string $expresion, string $defecto): bool
{
    if (preg_match($expresion, $var)) {
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
