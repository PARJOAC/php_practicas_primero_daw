<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
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
    echo hacerOperacion(TipoOperacion::MULTIPLICACION, 2, 6) . "<br>";
    ?>

    <h2>RESTA</h2>
    <?php
    echo hacerOperacion(TipoOperacion::RESTA, 5, 1) . "<br>";
    ?>

    <h2>SUMA</h2>
<?php
    echo hacerOperacion(TipoOperacion::SUMA, 6, 4) . "<br>";
}

function hacerOperacion(TipoOperacion $operacion, int $num1, int $num2): int
{
    if ($operacion === null) return throw new Error("El tipo de operación no es válido.");
    $resultado = 0;
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

function suma(int $num1, int $num2): int
{
    return $num1 + $num2;
}


function resta(int $num1, int $num2): int
{
    return $num1 - $num2;
}


function multiplicacion(int $num1, int $num2): int
{
    return $num1 * $num2;
}
