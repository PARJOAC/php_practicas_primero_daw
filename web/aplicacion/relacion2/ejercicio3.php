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

    $cadena = "";

    // Desde el 48 al 57 (números)
    // Desde el 65 hasta el 90 ambos incluidos (letras mayúsculas)
    //Desde el 97 al 122 ambos incluidos (letras minúsculas)
    for ($i = 0; $i < 20; $i++) {
    $random = rand(1, 3);
    $letraRandom = 0;
    switch($random) {
        case 1: $letraRandom = rand(48,57);
        break;
        case 2: $letraRandom = rand(65,90);
        break;
        case 3: $letraRandom = rand(97,122);
        break;
    }
    $cadena = $cadena . chr($letraRandom);
    }

    echo $cadena;
}
