<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("PASO PARAMETROS - EJERCICIO 6");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS - EJERCICIO 6");
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
 * 6.- Con el array $vector=array("primera" =>12.56, 24=>true, 67 =>23.76);
 * - Simular el funcionamiento de foreach ($array as $indice => $valor) usando las funciones de
 *      recorrido para mostrar tanto los índices como los valores del array anterior.
 * - Simular el funcionamiento de foreach usando las funciones array_keys y array_values para
 *      mostrar tanto los índices como los valores del array anterior.
 * 
 * El array se definirá en el controlador y se realizarán las operaciones en la vista.
 */
}
