<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

date_default_timezone_set('Europe/Madrid');

//dibuja la plantilla de la vista
inicioCabecera("PASO PARAMETROS - EJERCICIO 7");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS - EJERCICIO 7");
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
     * 7.- Mostrar el funcionamiento de las fechas. Se harán todos los apartados usando la serie
     * de funciones para gestión de fecha. Se repetirán todos los ejercicios usando la clase DateTime.
     * - Mostrar la fecha actual en el formato “d/m/Y”
     * - Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.
     * - Mostrar la hora actual en el formato “hh:mm:ss”
     * - Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
     * - Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
     * 
     * Se definirán las fechas y se visualizarán directamente en la vista. ( no se definirán en el controlador)
     */

    ?>
    <h1>CON DATE</h1>
    <?php
    // Mostrar la fecha actual en el formato “d/m/Y”
    $fechaActual = date("d/m/Y");
    echo "Fecha actual: " . $fechaActual . "<br>";

    // Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.
    $fechaActualLarga = date("l j, F Y, l d");
    echo "Fecha actual larga: " . $fechaActualLarga . "<br>";
    // Mostrar la hora actual en el formato “hh:mm:ss”
    $horaActual = date("H:i:s");
    echo "Hora actual: " . $horaActual . "<br>";

    // Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
    $fechaEsp = date("d/m/Y", mktime(12, 45, 0, 3, 29, 2024));
    echo "Fecha especial: " . $fechaEsp . "<br>";
    $fechaEspLarga = date("l j, F Y, l d", mktime(12, 45, 0, 3, 29, 2024));
    echo "Fecha especial larga: " . $fechaEspLarga . "<br>";
    $horaEsp = date("H:i:s", mktime(12, 45, 0, 3, 29, 2024));
    echo "Hora especial: " . $horaEsp . "<br>";

    // Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
    $fechaMod = date("d/m/Y", strtotime("-12 days -4 hours"));
    echo "Fecha modificada: " . $fechaMod . "<br>";
    $fechaModLarga = date("l j, F Y, l d", strtotime("-12 days -4 hours"));
    echo "Fecha modificada larga: " . $fechaModLarga . "<br>";
    $horaMod = date("H:i:s", strtotime("-12 days -4 hours"));
    echo "Hora modificada: " . $horaMod . "<br>";

    ?>
    <h1>CON DATETIME</h1>
    <?php
    // CON DATETIME
    // Mostrar la fecha actual en el formato “d/m/Y”
    $fechaActual = new DateTime();
    echo "Fecha actual: " . $fechaActual->format("d/m/Y") . "<br>";

    // Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.
    $fechaActualLarga = $fechaActual->format("l j, F Y, l d");
    echo "Fecha actual larga: " . $fechaActualLarga . "<br>";

    // Mostrar la hora actual en el formato “hh:mm:ss”
    $horaActual = $fechaActual->format("H:i:s");
    echo "Hora actual: " . $horaActual . "<br>";

    // Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
    $fechaEsp = new DateTime("2024-03-29 12:45");
    echo "Fecha especial: " . $fechaEsp->format("d/m/Y") . "<br>";
    $fechaEspLarga = $fechaEsp->format("l j, F Y, l d");
    echo "Fecha especial larga: " . $fechaEspLarga . "<br>";
    $horaEsp = $fechaEsp->format("H:i:s");
    echo "Hora especial: " . $horaEsp . "<br>";

    // Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
    $fechaMod = new DateTime("now -12 days -4 hours");
    echo "Fecha modificada: " . $fechaMod->format("d/m/Y") . "<br>";
    $fechaModLarga = $fechaMod->format("l j, F Y, l d");
    echo "Fecha modificada larga: " . $fechaModLarga . "<br>";
    $horaMod = $fechaMod->format("H:i:s");
    echo "Hora modificada: " . $horaMod . "<br>";
}
