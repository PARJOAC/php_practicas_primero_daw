<?php

/**
 * Clase sin sobrecarga
 */
class ClaseSinSobreCarga
{
    public int $numero = 10;

    // metodos magicos para control de la sobrecarga
    public function __set(string $name, mixed $value): void
    {
        throw new \Exception("La propiedad $name no existe.");
    }

    public function __get(string $name): mixed
    {
        throw new \Exception("La propiedad $name no existe.");
    }

    public function __isset(string $name): bool
    {
        //throw new \Exception('La propiedad $name no existe.');
        return false;
    }

    public function __unset(string $name): void
    {
        //throw new \Exception('La propiedad $name no existe.');
    }
}

//SobreCarga
$clase1 = new ClaseSinSobreCarga();
$clase2 = new ClaseSinSobreCarga();
$clase3 = new ClaseSinSobreCarga();

$clase1->cadena = "hola mundo";

$cad;
if (isset($clase1->cadena)) $cad = $clase1->cadena;
if (isset($clase2->cadena)) $cad = $clase2->cadena;
