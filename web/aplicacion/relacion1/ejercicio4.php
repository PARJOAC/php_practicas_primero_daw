<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("PASO PARAMETROS - EJERCICIO 4");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS - EJERCICIO 4");
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
     * 4- Generar un array con los siguientes valores mostrándolos posteriormente con foreach. El array se
     * debe generar usando bucles for.
     * 1
     * 2 2
     * 3 3 3
     * 4 4 4 4
     * 5 5 5 5 5
     */
    // 1. Inicializamos el array vacío
    $array = [];

    // 2. Generamos el array con bucles for anidados
    for ($i = 1; $i <= 5; $i++) {
        $linea = "";

        for ($j = 1; $j <= $i; $j++) {
            $linea .= $i . " ";
        }

        $array[] = trim($linea);
    }

    foreach ($array as $valor) {
        echo $valor . "<br>";
    }
}
