<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$array = [45, 234, 12, 3, 4975, 0, 2374, 4589, 12934545, 78, 34, 21];

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
    global $array;
?>
    <br>

<?php
    /**
     * 7.- Función ordenar(): A esta función se le pasa un array y lo ordena mediante una llamada a usort,
     * al que se indicará como función callback una función anónima que ordenará en orden descendente
     * según el número de caracteres de cada elemento.
     */
    //Se llama a la funcion para ordenar el array
    ordenar($array);

    //Comprobamos el tamaño del array
    $tamaño = count($array);

    // hacemos un for para mostrar los elementos del array ya ordenado
    for ($i = 0; $i < $tamaño; $i++) {
        // Si la vuelta actual es menor al tamaño maximo del array, ponemos una coma para mostrar el siguiente numero separado
        if ($i < $tamaño - 1) {
            echo $array[$i] . ", ";
        } else {
            // Solo si es el último del array se pone el punto.
            echo $array[$i] . ".";
        }
    }
}

function ordenar(array &$array)
{
    //Se ordena el array para que se vea de mayor a menor según el numero de caracteres
    usort($array, fn($a, $b) => strlen((string)$b) <=> strlen((string)$a));

    // Devolvemos el array
    return $array;
}
