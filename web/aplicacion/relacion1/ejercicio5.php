<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("PASO PARAMETROS - EJERCICIO 5");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS - EJERCICIO 5");
cuerpo(); //llamo a la vista
finCuerpo();
// 

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
    $vector = array();
    $vector[1] = "esto es una cadena";
    $vector["posi1"] = 25.67;
    $vector[] = false;
    $vector["ultima"] = array(2, 5, 96);
    $vector[56] = 23;

    foreach ($vector as $clave => $val) {
        $tipo = gettype($val);
        echo "- Posición: [\"$clave\"] | Tipo: [\"$tipo\"] <br>";

        // Cambiamos a switch(true) para evaluar las condiciones correctamente
        switch (true) {
            case is_array($val):
                foreach ($val as $subVal) {
                    echo "&nbsp;&nbsp; - Sub-valor: $subVal <br>";
                }
                break;

            case is_integer($val):
                echo "&nbsp;&nbsp; - Entero con valor \"$val\", en binario \"" . decbin($val) . "\"<br>";
                break;

            case is_float($val):
                // Añadido el operador de multiplicación (*)
                echo "&nbsp;&nbsp; - Real \"$val\" que al cuadrado es \"" . ($val * $val) . "\"<br>";
                break;

            case is_string($val):
                echo "&nbsp;&nbsp; - \"$val\"<br>";
                break;

            case is_bool($val):
                $txt = $val ? "true" : "false";
                $opuesto = !$val ? "true" : "false";
                echo "&nbsp;&nbsp; - Booleano \"$txt\" y su opuesto \"$opuesto\"<br>";
                break;
        }

        echo "<br>";
    }
}
