<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 5");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 5");
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
 * 5.- Se tienen las funciones suma, resta y multiplicacion que reciben cada una dos parámetros
 * numéricos (entero) y que devuelven el resultado de la operación que indica su nombre sobre los
 * parámetros.
 * Tenemos la Función hacerOperacion que recibe tres parámetros. El primero es una cadena
 * que puede ser suma, resta o multiplicacion. Los otros dos son los operandos. Esta función se
 * encargará de devolver el resultado de ejecutar la “cadena” con los operandos usando una variablefunción para llamar a la operación. Hay que comprobar indicando una operación correcta (devuelve
 * false si la operación no es válida)
 */
}
