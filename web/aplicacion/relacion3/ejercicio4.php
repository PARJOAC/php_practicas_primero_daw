<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 4");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 4");
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
     * 4.- Función devuelve(). Esta función recibe como parámetros tres números (enteros) y devuelve la
     * suma de los tres valores en el primer parámetro y como resultado de la función el producto de los
     * tres valores. Los dos últimos parámetros tendrán definidos valor por defecto (el que queráis).
     * Hacer varias llamadas a la función indicando:
     *      - Los tres parámetros
     *      - El primer parámetro únicamente
     *      - El primer y el segundo parámetro
     *      - El primer y el tercer parámetro (ojo, el segundo parámetro no se indica)
     */
    $n1 = 5;
    $prod1 = devuelve($n1, 3, 2);
    echo "<p>1. Tres parámetros (5, 3, 2) -> Total: <b>$prod1</b></p>";

    // CASO 2
    $n2 = 5;
    $prod2 = devuelve($n2);
    echo "<p>2. Solo el primer parámetro (5) -> Total: <b>$prod2</b></p>";

    // CASO 3
    $n3 = 5;
    $prod3 = devuelve($n3, 3);
    echo "<p>3. Primero y segundo (5, 3) -> Total: <b>$prod3</b></p>";

    // CASO 4
    $n4 = 5;
    $prod4 = devuelve(valor1: $n4, valor3: 2);
    echo "<p>4. Primero y tercero (5, -, 2) -> Total: <b>$prod4</b></p>";
}

function devuelve(int $valor1, int $valor2 = 4, int $valor3 = 10): int
{
    return $valor1 * $valor2 * $valor3;
}
