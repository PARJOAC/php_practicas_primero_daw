<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 4");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 4");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera()
{
?>
    <!-- esto va en el head -->
<?php

}
//vista
function cuerpo()
{
?>
    <br>

<?php
/**
 * 4.- Función devuelve(). Esta función recibe como parámetros tres números (enteros) y devuelve la
 * suma de los tres valores en el primer parámetro y como resultado de la función el producto de los
 * tres valores. Los dos últimos parámetros tendrán definidos valor por defecto (el que queráis).
 * Hacer varias llamadas a la función indicando:
 *      - Los tres parámetros
 *      - El primer parámetro únicamente
 *      - El primer y el segundo parámetro
 *      - El primer y el tercer parámetro (ojo, el segundo parámetro no se indica)
 */
$valor=7;
devuelve($valor,4); //$valor valdrá 7+4+10 y se devuelve 7*4*10 (10 es el valor por defecto que le he puesto al tercer parámetro.

}
