<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

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
    $numero1 = 6;
    $numero2 = 4;
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
    $resultado = 0;
    switch ($tipoOperacion) {
        case 1: {
                $resultado = $primerNumero + $segundoNumero;
                break;
            }
        case 2: {
                $resultado = $primerNumero - $segundoNumero;
                break;
            }
        case 3: {
                $resultado = $primerNumero * $segundoNumero;
                break;
            }
        default: {
                $resultado = $primerNumero + $segundoNumero;
                break;
            }
    }
    return $resultado;
}
