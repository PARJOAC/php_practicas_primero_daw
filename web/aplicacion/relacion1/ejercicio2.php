<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("PASO PARAMETROS - EJERCICIO 2");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS - EJERCICIO 2");
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
    /**
     * 2.- Simular el lanzamiento de un dado (6 veces) (usar un bucle for, mt_rand con parametros).
     * Además contar el número de veces que aparece cada lado si se hicieran N lanzamientos al estilo
     * (N lo definiremos como constante) (usar un bucle while, mt_rand sin parametros).
     * Se deben usar arrays para almacenar los datos de las tiradas. Los arrays deben obtenerse en la
     * parte del controlador y visualizarse los resultados en la vista. Los arrays se pasarán como
     * parámetros a la vista (nunca como variables globales)
     */
    //tiradas pequeñas
    for ($i = 1; $i < 7; $i++) {
        $random = rand(1, 6);
        echo "Lanzamiendo {$i} del dado: {$random}";
        echo "<br>";
    }

    ?>
<?php
    $contadores = [
        1 => 0,
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0,
        6 => 0,
    ];

    $tiradasTotales = 1000;

    for ($i = 0; $i < $tiradasTotales; $i++) {
        $random = rand(1, 6);
        $contadores[$random]++;
    }
    echo "<h2>Tiradas totales {$tiradasTotales}</h2>";
    echo "Porcentaje de 1: " . ($contadores[1] * 100 / $tiradasTotales) . "%";
    echo "<br>";
    echo "Porcentaje de 2: " . ($contadores[2] * 100 / $tiradasTotales) . "%";
    echo "<br>";
    echo "Porcentaje de 3: " . ($contadores[3] * 100 / $tiradasTotales) . "%";
    echo "<br>";
    echo "Porcentaje de 4: " . ($contadores[4] * 100 / $tiradasTotales) . "%";
    echo "<br>";
    echo "Porcentaje de 5: " . ($contadores[5] * 100 / $tiradasTotales) . "%";
    echo "<br>";
    echo "Porcentaje de 6: " . ($contadores[6] * 100 / $tiradasTotales) . "%";
}
