<?php

/**
 * Clase con sobrecarga
 * - Si la propiedadempieza por m la doy por buena
 * - Las propiedades sobrecargadas las voy a 
 */
class ClaseSobreCarga
{
    public int $numero = 10;

    // metodos magicos para control de la sobrecarga
    public function __set(string $name, mixed $value): void
    {
        if (mb_substr(mb_strtoupper($name), 0, 1) !== "M")
            throw new \Exception("La propiedad $name no existe.");
    }

    public function __get(string $name): mixed
    {
        if (mb_substr(mb_strtoupper($name), 0, 1) !== "M")
            throw new \Exception("La propiedad $name no existe.");
        return 234;
    }

    public function __isset(string $name): bool
    {
        //throw new \Exception('La propiedad $name no existe.');
        return mb_substr(mb_strtoupper($name), 0, 1) !== "M";
    }

    public function __unset(string $name): void
    {
        //throw new \Exception('La propiedad $name no existe.');
    }
}

//SobreCarga
$clase1 = new ClaseSobreCarga();

$val=$clase1->moreno;
$val=$clase1->marcha;
$val=$clase1->numero;
//$val->$clase1->hora; error

$clase1 -> hora = $val;
$clase1 -> numero = $val+10;
$clase1 -> moreno = $val;
