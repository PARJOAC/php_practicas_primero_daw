<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$numero1 = 6;
$numero2 = 4;

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 3");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 3");
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
    global $numero1, $numero2;
?>
    <br>

    <?php
    /**
     * 3.- Función operaciones(). Esta función recibe al menos tres parámetros. El primero (entero) es el
     * tipo de operación. Los demás son valores numéricos (los operandos). El tipo de operación puede ser
     *      - 1, suma todos los operandos
     *      - 2, al primer operando se restan el resto
     *      - 3, multiplicación de todos los operandos.
     * En cualquier otro caso se suman los operandos que ocupan las posiciones pares y se restan
     * los de las posiciones impares (el primer operando es 1).
     */

    echo "<h2>Números: " . $numero1 . " y " . $numero2 . "</h2>";
    ?>
    <h3>Suma</h1>
        <?php
        echo operaciones(1, $numero1, $numero2);
        ?>

        <h3>Resta</h3>
        <?php
        echo operaciones(2, $numero1, $numero2);
        ?>

        <h3>Multiplicación</h3>
    <?php
    echo operaciones(3, $numero1, $numero2);
}

/**
 * Operaciones con numeros
 *
 * @param integer $tipoOperacion
 * @param float $primerNumero
 * @param float $segundoNumero
 * @return float
 */
function operaciones(int $tipoOperacion, float $primerNumero, float $segundoNumero): float
{
    // Inicializamos la variable que contendrá el resultado de la operación
    $resultado = 0;

    // Evaluamos el tipo de operación mediante un selector numérico
    switch ($tipoOperacion) {
        case 1: {
                // Operación de suma
                $resultado = $primerNumero + $segundoNumero;
                break;
            }
        case 2: {
                // Operación de resta
                $resultado = $primerNumero - $segundoNumero;
                break;
            }
        case 3: {
                // Operación de multiplicación
                $resultado = $primerNumero * $segundoNumero;
                break;
            }
        default: {
                // Caso por defecto (si el código de operación no es 1, 2 o 3)
                $resultado = $primerNumero + $segundoNumero;
                break;
            }
    }

    // Retornamos el valor resultante
    return $resultado;
}
