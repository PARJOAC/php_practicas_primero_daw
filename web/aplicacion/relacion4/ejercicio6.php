<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// controlador
$fibonacciIterator = new SerieFibonacci(10);

// dibuja la plantilla de la vista
inicioCabecera("CLASES - EJERCICIO 6");
cabecera();
finCabecera();
inicioCuerpo("CLASES - EJERCICIO 6");
cuerpo($fibonacciIterator); // llamo a la vista
finCuerpo();
// **********************************************************

// vista
function cabecera()
{
?>
    <!-- esto va en el head -->
<?php
}

// vista
function cuerpo($fibonacciIterator)
{
?>
    <br>
    <strong>Usando un Iterator:</strong><br>
<?php
    foreach ($fibonacciIterator as $clave => $valor) {
        echo "F($clave) = $valor &nbsp;|&nbsp; ";
    }
?>
    <br><br>
    <strong>Usando un Generador estático:</strong><br>
<?php
    foreach (SerieFibonacci::fFibonacci(10) as $valor) {
        echo "$valor &nbsp;";
    }
}