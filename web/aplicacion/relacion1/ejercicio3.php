<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("PASO PARAMETROS - EJERCICIO 3");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS - EJERCICIO 3");
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
    <br><br>

<?php
    /*3.- Se quiere:
        a) Crear una variable de tipo array.
        b) Rellenar las posiciones 1, 16, 54 con valores cualquiera.
        c) Añadir el valor 34 al final
        d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
        e) Rellenar la posición “ultima” con el array (1,34,”nueva”);
        - Hacer lo anterior creando y rellenando el array usando varias sentencias.
        - Hacer lo anterior usando una sola sentencia con array;
        - Hacer lo anterior usando una sola sentencia con []
        - Recorrer los tres arrays usando foreach mostrando todos los valores de los arrays creados
        Los arrays se definirán en el controlador y se visualizarán en la vista
*/
    $array1 = [];
    $array1[1] = "Hola";
    $array1[16] = 99;
    $array1[54] = "Mundo";
    $array1[] = 34;
    $array1["uno"] = "cadena";
    $array1["dos"] = true;
    $array1["tres"] = 1.345;
    $array1["ultima"] = [1, 34, "nueva"];

    $array2 = array(
        1 => "Hola",
        16 => 99,
        54 => "Mundo",
        55 => 34,
        "uno" => "cadena",
        "dos" => true,
        "tres" => 1.345,
        "ultima" => array(1, 34, "nueva")
    );

    $array3 = [
        1 => "Hola",
        16 => 99,
        54 => "Mundo",
        55 => 34,
        "uno" => "cadena",
        "dos" => true,
        "tres" => 1.345,
        "ultima" => [1, 34, "nueva"]
    ];

    $todosLosArrays = [$array1, $array2, $array3];

    foreach ($todosLosArrays as $num => $lista) {
        echo "<h3>Arrays " . ($num + 1) . ":</h3>";
        echo "<ul>";

        foreach ($lista as $clave => $valor) {
            echo "<li><strong>Clave [$clave]:</strong> ";

            if (is_array($valor)) {
                echo "Es un array -> [" . implode(", ", $valor) . "]";
            }
            elseif (is_bool($valor)) {
                echo $valor ? "true" : "false";
            } else {
                echo $valor;
            }

            echo "</li>";
        }

        echo "</ul><hr>";
    }
}
