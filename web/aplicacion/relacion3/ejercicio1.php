<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 1");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 1");
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
 * 1.- Función cuentaVeces(). A esta función se le pasan cuatro parámetros: un array, una cadena y dos
 * números. La función se encargará de añadir en el array el primer número a la posición asociativa
 * indicada por la cadena. Hay que tener en cuenta que el array debe quedar actualizado cuando se
 * salga de la función. Además, cada vez que se llama a la función, se devuelve en el segundo número
 * un valor que corresponde con el número de llamada actual (1 para la primera, 2 para la segunda
 * llamada, etc). Se devolverá true si todo ha ido bien y false si se ha detectado algún error. (se debe
 * dar error si se indica como posición“2daw”o “primera”)
 */
}
