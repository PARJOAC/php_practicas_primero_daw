<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("PASO PARAMETROS - EJERCICIO 3");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS - EJERCICIO 3");
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
     * 3.- Se quiere:
     * a) Crear una variable de tipo array.
     * b) Rellenar las posiciones 1, 16, 54 con valores cualquiera.
     * c) Añadir el valor 34 al final
     * d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
     * e) Rellenar la posición “ultima” con el array (1,34,”nueva”);
     *      - Hacer lo anterior creando y rellenando el array usando varias sentencias.
     *      - Hacer lo anterior usando una sola sentencia con array;
     *      - Hacer lo anterior usando una sola sentencia con []
     *      - Recorrer los tres arrays usando foreach mostrando todos los valores de los arrays creados
     * Los arrays se definirán en el controlador y se visualizarán en la vista.

     */
    $array = [];
    $array[1] = 4;
    $array[16] = 7;
    $array[54] = 475; 
}
