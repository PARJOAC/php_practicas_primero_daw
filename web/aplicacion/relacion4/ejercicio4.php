<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// controlador corregido usando el método estático
$flautaDulce = Flauta::CrearDesdeArray(['material' => 'plástico para clase', 'edad' => 2]);
$flautaClonada = clone $flautaDulce;

// dibuja la plantilla de la vista
inicioCabecera("CLASES - EJERCICIO 4");
cabecera();
finCabecera();
inicioCuerpo("CLASES - EJERCICIO 4");
cuerpo($flautaDulce, $flautaClonada); // llamo a la vista
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
function cuerpo($flautaDulce, $flautaClonada)
{
?>
    <br>
<?php
    echo "Original: " . $flautaDulce . "<br>";
    echo "Clonada: " . $flautaClonada . "<br>";
}