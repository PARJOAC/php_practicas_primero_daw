<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$flautaDulce = new Flauta("Flauta de plástico para clase");
$guitarraAcustica = new Guitarra("Yamaha C40 con 6 cuerdas");

//dibuja la plantilla de la vista
inicioCabecera("CLASES - EJERCICIO 1");
cabecera();
finCabecera();
inicioCuerpo("CLASES - EJERCICIO 1");
cuerpo($flautaDulce, $guitarraAcustica); //llamo a la vista
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
function cuerpo($flautaDulce, $guitarraAcustica)
{
?>
    <br>

<?php

    echo $flautaDulce . "<br>";
    echo $guitarraAcustica . "<br>";
}
