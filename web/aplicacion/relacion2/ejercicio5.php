<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("STRINGS - EJERCICIO 5");
cabecera();
finCabecera();
inicioCuerpo("STRINGS - EJERCICIO 5");
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
     * 5.- Crea una cadena que ocupe varias líneas (usa nowdoc o heredoc). En líneas distintas debe
     * aparecer: varias etiquetas html (<>), varios números (de 1 o varias cifras) y varias direcciones
     * de correo electrónico (formato aaaa@aaaa.aa).
     * Define expresiones regulares apropiadas para localizar los distintos elementos creados
     * (etiqueta, numero y dirección de email) en la cadena.
     * Muestra la posición/elemento encontrado usando las expresiones regulares definidas y la
     * función preg_match.
     */

    $string = <<<NOWDOC
    Texto de <strong>ejemplo</strong> con un <h1>H1</h1>
    Números: 1,2,3,4,5,6,7,8,9,0
    Correo: ejemplo@ejemplo.com
    NOWDOC;

    echo "<h3>Texto:</h3>";
    echo "<pre>" . htmlspecialchars($string) . "</pre>";

}
