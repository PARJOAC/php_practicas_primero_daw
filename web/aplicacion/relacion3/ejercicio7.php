<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 7");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 7");
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
     * 7.- Función ordenar(): A esta función se le pasa un array y lo ordena mediante una llamada a usort,
     * al que se indicará como función callback una función anónima que ordenará en orden descendente
     * según el número de caracteres de cada elemento.
     */
}
