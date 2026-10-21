<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
// Definición del enumerado para tipar las operaciones matemáticas permitidas
enum TipoOperacion: string
{
    case SUMA = 'SUMA';
    case RESTA = 'RESTA';
    case MULTIPLICACION = 'MULTIPLICACION';
}
//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 5");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 5");
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
     * 5.- Se tienen las funciones suma, resta y multiplicacion que reciben cada una dos parámetros
     * numéricos (entero) y que devuelven el resultado de la operación que indica su nombre sobre los
     * parámetros.
     * Tenemos la Función hacerOperacion que recibe tres parámetros. El primero es una cadena
     * que puede ser suma, resta o multiplicacion. Los otros dos son los operandos. Esta función se
     * encargará de devolver el resultado de ejecutar la “cadena” con los operandos usando una variablefunción para llamar a la operación. Hay que comprobar indicando una operación correcta (devuelve
     * false si la operación no es válida)
     */
    ?>

    <h2>MULTIPLICACION</h2>
    <?php
    // Llama a la función principal para calcular y mostrar la multiplicación
    echo hacerOperacion(TipoOperacion::MULTIPLICACION, 2, 6) . "<br>";
    ?>

    <h2>RESTA</h2>
    <?php
    // Llama a la función principal para calcular y mostrar la resta
    echo hacerOperacion(TipoOperacion::RESTA, 5, 1) . "<br>";
    ?>

    <h2>SUMA</h2>
<?php
    // Llama a la función principal para calcular y mostrar la suma
    echo hacerOperacion(TipoOperacion::SUMA, 6, 4) . "<br>";
}

// Función encargada de validar el tipo de operación y delegar el cálculo
function hacerOperacion(TipoOperacion $operacion, int $num1, int $num2): int
{
    // Validación por si el parámetro de operación es nulo
    if ($operacion === null) return throw new Error("El tipo de operación no es válido.");
    $resultado = 0;
    // Estructura de control para ejecutar la función adecuada según el tipo recibido
    switch ($operacion) {
        case TipoOperacion::SUMA: {
                $resultado = suma($num1, $num2);
                break;
            }
        case TipoOperacion::RESTA: {
                $resultado = resta($num1, $num2);
                break;
            }
        case TipoOperacion::MULTIPLICACION: {
                $resultado = multiplicacion($num1, $num2);
                break;
            }
    }
    return $resultado;
}

// Función que calcula la suma de dos enteros
function suma(int $num1, int $num2): int
{
    return $num1 + $num2;
}

// Función que calcula la resta de dos enteros
function resta(int $num1, int $num2): int
{
    return $num1 - $num2;
}

// Función que calcula la multiplicación de dos enteros
function multiplicacion(int $num1, int $num2): int
{
    return $num1 * $num2;
}
