<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("STRINGS - EJERCICIO 3");
cabecera();
finCabecera();
inicioCuerpo("STRINGS - EJERCICIO 3");
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
     * 3.- Genera una cadena aleatoria de 20 caracteres (los caracteres permitidos son letras
     * minúsculas, letras mayúsculas y números)
     * a) A partir de un array en el que están todos los caracteres posibles que cumplen la
     * condición. (tienes que rellenar el array con todos los caracteres validos)
     * b) A partir del código ASCII (se puede indicar un rango mayor y eliminar aquellos
     * caracteres que no lo cumplan).
     */
}
