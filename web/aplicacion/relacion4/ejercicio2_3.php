<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// controlador
$instrumentoViento = new InstrumentoViento("metal", 12);

// dibuja la plantilla de la vista
inicioCabecera("CLASES - EJERCICIO 2-3");
cabecera();
finCabecera();
inicioCuerpo("CLASES - EJERCICIO 2-3");
cuerpo($instrumentoViento); // llamo a la vista
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
function cuerpo($instrumentoViento)
{
?>
    <br>
<?php
    echo $instrumentoViento . "<br>";
    echo "Sonido: " . $instrumentoViento->sonido() . "<br>";
    echo "Afinar: " . $instrumentoViento->afinar() . "<br>";
    echo "Fabricación: " . $instrumentoViento->metodoFabricacion("Corte y soldadura") . "<br>";
    echo "Reciclado: " . $instrumentoViento->metodoReciclado() . "<br>";
}