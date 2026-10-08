<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("PASO PARAMETROS - EJERCICIO 5");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS - EJERCICIO 5");
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
    <br><br>

<?php
/**
 * 5.- Rellenar un array con el siguiente contenido.
 * $vector=array();
 * $vector[1]="esto es una cadena";
 * $vector["posi1"]=25.67;
 * $vector[]=false;
 * $vector["ultima"]=array(2,5,96);
 * $vector[56]=23;
 * 
 * Mostrar mediante bucles foreach el contenido del array con la siguiente salida:
 * - posicion XXX contenido (tipo) YYYYY
 * - Según el tipo del contenido
 *      - Si es un array mostrarlo mediante un foreach.
 *      - Si es un entero poner Entero con valor DDD, en binario BBB
 *      - Si es un real DDD que al cuadrado es DDD
 *      - Si es una cadena -CCCCo Si es un booleano BBB y su opuesto XXX
 * 
 * Las palabras en mayúscula representan un valor concreto de lo pedido.
 * El array se definirá en el controlador y se visualizará en la vista.
 */
}
