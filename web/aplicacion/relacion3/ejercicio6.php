<?php
// Incluye la cabecera general
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

// Definición de función anónima para la suma
$funcionSuma = function (int $a, int $b): int {
    return $a + $b;
};

// Definición de función anónima para la resta
$funcionResta = function (int $a, int $b): int {
    return $a - $b;
};

// Definición de función anónima para la multiplicación
$funcionMultiplicacion = function (int $a, int $b): int {
    return $a * $b;
};

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 6");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 6");
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
    // Hacemos globales las funciones anónimas del controlador
    global $funcionMultiplicacion, $funcionSuma, $funcionResta;
?>
    <br>

    <?php
    /**
     * 6.- Crear la función llamadaAFuncion que recibe tres operandos (entero, entero y callable) y que
     * devuelve un entero que es el resultado de llamar al parámetro callback con los otros parámetros.
     * Llamar a la función llamadaAFuncion 3 veces pasando como parámetro de callback funciones de
     * flecha distintas que tu definas
     * llamadaAFuncion(1,2,fn($a,$b)=>$a+$b)
     * Repetir las llamadas, definiendo las 3 funciones como anónimas (se asignan a variables)
     */
    ?>

    <h2>MULTIPLICACION 1 x 5</h2>
    <?php
    // Llamada con función de flecha
    echo llamadaAFuncion(1, 5, fn($a, $b) => $a * $b) . "<br>";
    ?>

    <h2>RESTA 1 - 5</h2>
    <?php
    // Llamada con función de flecha
    echo llamadaAFuncion(1, 5, fn($a, $b) => $a - $b) . "<br>";
    ?>

    <h2>SUMA 2 + 5</h2>
    <?php
    // Llamada con función de flecha para sumar
    echo llamadaAFuncion(2, 5, fn($a, $b) => $a + $b) . "<br>";
    ?>

    <h2>MULTIPLICACION ANONIMA 1 x 5</h2>
    <?php
    // Ejecución de la variable anónima
    echo $funcionMultiplicacion(1, 5) . "<br>";
    ?>

    <h2>RESTA 1 - 5</h2>
    <?php
    // Ejecución de la variable anónima
    echo $funcionResta(1, 5) . "<br>";
    ?>

    <h2>SUMA 2 + 5</h2>
<?php
    // Ejecución de la variable anónima
    echo $funcionSuma(2, 5) . "<br>";
}

// Función que recibe el callable y lo ejecuta
function llamadaAFuncion(int $a, int $b, callable $call)
{
    return $call($a, $b);
}
