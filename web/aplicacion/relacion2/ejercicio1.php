<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("STRINGS - EJERCICIO 1");
cabecera();
finCabecera();
inicioCuerpo("STRINGS - EJERCICIO 1");
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
     * 1.- Escribe distintas cadenas usando “, ‘, HEREDOC y NOWDOC incluyendo variables,
     * etiquetas html y caracteres especiales como ‘, “, á, é, ñ. Muestra las cadenas y comprueba que
     * el código fuente es legible (no se tiene una sola línea con todo seguido). Haz que se muestren
     * las etiquetas html (no se ejecuten)
     */

    $cadenaEspecial = "&atilde;&otilde;&ntilde;";

    $string = <<<HEREDOC
        Ésta es la primera variable que se escribe con "HEREDOC".<br>
        Se hace un salto de línea haciendo &lt;br&gt;. $cadenaEspecial <br><br><br>
    HEREDOC;

    echo $string;

    $string = <<<NOWDOC
        Ésta es la misma variable pero cambiado a 'NOWDOC'.<br>
        Se hace un salto de línea haciendo &lt;br&gt;. $cadenaEspecial <br>
    NOWDOC;
    echo $string;
}
