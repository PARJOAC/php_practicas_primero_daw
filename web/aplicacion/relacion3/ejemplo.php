<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJEMPLO");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJEMPLO");
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
    echo doble(22);
}

/**
 * Función para sacar el doble de un número entero.
 *
 * @param integer $num Número entero
 * @return integer|false Devuelve el doble o false
 */
function doble(int $num): int|false
{
    if ($num < 10) return false;

    return 2 * $num;
}
