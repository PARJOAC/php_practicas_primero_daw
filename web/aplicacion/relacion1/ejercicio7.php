<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

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
}
