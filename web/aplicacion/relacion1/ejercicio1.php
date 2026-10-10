<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("PASO PARAMETROS - EJERCICIO 1");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS - EJERCICIO 1");
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
    /**
     * 1.- Mostrar el funcionamiento de diversas funciones Matemáticas (round, floor, pow, sqrt,
     * entero a hexadecimal, de base 4 a base 8 y al menos dos funciones mas distintas de las anteriores)
     * (buscar la información sobre las funciones matemáticas en http://php.net/manual/es/book.math.php).
     * Definir variables inicializadas con valores en binario, octal y hexadecimal.
     * Mostrar el valor de esas variables tanto en decimal como en la base en la que se han definido.
     * Hacer este ejercicio directamente en la vista (definiciones de las variables y visualización de las
     * mismas)

     */
    $numero = 1876.89;
    $round = round($numero);
    $floor = floor($numero);
    $pow = pow($numero, 3);
    $sqrt = sqrt($numero);
    $hex = dechex($floor);
    $base4 = base_convert($round, 10, 4);
    $base8 = base_convert($base4, 4, 8);
    $atan = atan($numero);
    $log10 = log10($numero);

    $binario = 0b00010;
    $octal = 239454;
    $hexadecimal = 0x49b05;
?>
    <br>

    <?php
    echo "Número: {$numero}";
    echo "<br>";
    echo "Redondeado: {$round}";
    echo "<br>";
    echo "Floor: {$floor}";
    echo "<br>";
    echo "Pow (3): {$pow}";
    echo "<br>";
    echo "Sqrt: {$sqrt}";
    echo "<br>";
    echo "Abs: {$numero}";
    echo "<br>";
    echo "Hexadecimal: {$hex}";
    echo "<br>";
    echo "Base 8: {$base8}";
    echo "<br>";
    echo "Atan: {$atan}";
    echo "<br>";

    echo "Log10: {$log10}";
    ?>
    <h3>Variables en distintas bases</h3>
<?php
    // Binario
    echo "Binario:  {$binario} | Decimal: {$binario} | En binario: " . decbin($binario) . "<br>";

    // Octal
    echo "Octal:  {$octal} | Decimal: {$octal} | En octal: " . decoct($octal) . "<br>";

    // Hexadecimal
    echo "Hexadecimal: {$hexadecimal} | Decimal: {$hexadecimal} | En hexadecimal: " . dechex($hexadecimal) . "<br>";
}
