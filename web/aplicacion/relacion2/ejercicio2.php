<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("STRINGS - EJERCICIO 2");
cabecera();
finCabecera();
inicioCuerpo("STRINGS - EJERCICIO 2");
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
     * 2.- Dada la cadena "Está la niña en casa" se pide:
     * - Mostrar cada carácter en una línea separada y con tantos espacios en blanco como me
     * indica la posición del carácter mostrado. (quedaría algo así)
     * NOTA: prueba si puedes hacerlo con [] para obtener los caracteres correctos. Prueba si
     * puedes hacerlo con substr para obtener los caracteres correctos. Prueba si puedes
     * hacerlo con mb_substr para obtener los caracteres correctos. Comenta las formas no
     * válidas para que pueda comprobar que lo has hecho.
     * 
     * - Mostrar la cadena en orden inverso, (usar índices negativos, no invertir la cadena)
     * con cada carácter en una línea distinta y con los espacios en blanco
     * correspondientes (desde 0 hasta n espacios en blanco), los caracteres pares en
     * mayúscula (0, 2, …) y los impares en minúscula (1, 3, 5, …), y extrayendo los
     * caracteres con mb_substr.
     * 
     * - Separa la cadena en partes usando el carácter a, y mostrar cada parte en una línea distinta
     * - Localiza en la cadena la palabra niña y cambia el siguiente carácter a niña (el
     * espacio en blanco) por "/mujer "
     */

    $cadena = "Está la niña en casa";

    ?>
    <h1>Formato substr($cadena, $contador, 1)</h1>
    <?php
    for ($i = 0; $i < strlen($cadena); $i++) {
        echo str_repeat("&nbsp;", $i) . substr($cadena, $i, 1) . "<br>";
    }

    ?>
    <h1>Formato $cadena[]</h1>
    <?php
    for ($i = 0; $i < strlen($cadena); $i++) {
        echo str_repeat("&nbsp;", $i) . $cadena[$i] . "<br>";
    }

    ?>
    <h1>Formato mb_substr($cadena, $contador, 1)</h1>
    <?php
    for ($i = 0; $i < strlen($cadena); $i++) {
        echo str_repeat("&nbsp;", $i) . mb_substr($cadena, $i, 1) . "<br>";
    }

    ?>

    <h1>Formato invertido Pares / Impares</h1>
    <?php
    for ($i = strlen($cadena); $i >= 0; $i--) {
        $letra = mb_substr($cadena, $i, 1);
        echo str_repeat("&nbsp;", $i) . ($i % 2 == 0 ? mb_strtoupper($letra) : mb_strtolower($letra)) . "<br>";
    }

    ?>

    <h1>Separar por la a</h1>
<?php
    $array = explode("a", $cadena);
    foreach($array as $arr) {
        echo $arr . "a<br>";
    }

    ?>

    <h1>Cambio a /mujer</h1>
<?php
    $localizacion = mb_strpos($cadena, "niña");

    echo substr_replace($cadena, "/mujer ", $localizacion + 6, 1);
}
