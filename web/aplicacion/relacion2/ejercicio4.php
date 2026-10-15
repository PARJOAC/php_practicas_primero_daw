<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("STRINGS - EJERCICIO 4");
cabecera();
finCabecera();
inicioCuerpo("STRINGS - EJERCICIO 4");
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
     * 4.- Tengo unas variables con valores 17.5 (float), 379987.24 (float)
     * Mostrarlas de forma que resulte "el primer valor -0000000000017,5-, el segundo valor -
     * 379.987,24-" (usar number format para obtener el formateo de los números, los números se
     * muestran con 15 caracteres en total, el primero relleno con 0 y el segundo con espacios-debe
     * aparecer el espacio))
     */
    $float1 = 17.5;
    $float2 = 379987.24;
    $formateado1 = number_format($float1, 1, ",");
    $formateado2 = number_format($float2, 2, ",", ".");
    $final1 = str_pad($formateado1, 15, "0", STR_PAD_LEFT);
    $final2 = str_pad($formateado2, 15, " ", STR_PAD_LEFT);

    echo "El primer valor -$final1-, el segundo valor -$final2-";
}
