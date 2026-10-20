<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 2");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 2");
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
     * 2.- Función generarCadena(). A esta función se le pasa un parámetro con valor por defecto 10 y se
     * encarga de devolver una cadena de longitud la indicada cuyos caracteres son generados de forma
     * aleatoria (caracteres válidos: letras mayúsculas, minúsculas y números). Devolverá false si se ha
     * indicado un número negativo o igual a 0.
     */

    echo generarCadena();
}

function generarCadena(int $defecto = 10): false|string
{
    if($defecto > 10) return false;
    $cadena = "";

    // Desde el 48 al 57 (números)
    // Desde el 65 hasta el 90 ambos incluidos (letras mayúsculas)
    //Desde el 97 al 122 ambos incluidos (letras minúsculas)
    for ($i = 0; $i < $defecto; $i++) {
        $random = rand(1, 3);
        $letraRandom = 0;
        switch ($random) {
            case 1:
                $letraRandom = rand(48, 57);
                break;
            case 2:
                $letraRandom = rand(65, 90);
                break;
            case 3:
                $letraRandom = rand(97, 122);
                break;
        }
        $cadena = $cadena . chr($letraRandom);
    }

    return $cadena;
}
