<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$flautaDulce = Flauta::CrearDesdeArray(['material' => 'plástico para clase', 'edad' => 2]);

//dibuja la plantilla de la vista
inicioCabecera("CLASES - EJERCICIO 1");
cabecera();
finCabecera();
inicioCuerpo("CLASES - EJERCICIO 1");
cuerpo($flautaDulce); //llamo a la vista
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
function cuerpo($flautaDulce)
{
?>
    <br>

<?php

    echo $flautaDulce . "<br>";
}
