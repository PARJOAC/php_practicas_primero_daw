<?php

/**
 * Clase normal sin ningún control en la sobrecarga
 */
class ClaseNormal
{
    public int $numero = 10;
}


//SobreCarga
$clase1 = new ClaseNormal();
$clase2 = new ClaseNormal();
$clase3 = new ClaseNormal();

$clase1 -> cadena = "hola mundo";

$cad;
if(isset($clase1 -> cadena)) $cad = $clase1 -> cadena;
if(isset($clase2 -> cadena)) $cad = $clase2 -> cadena;