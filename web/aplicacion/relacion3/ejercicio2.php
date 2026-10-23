<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
include_once("./funciones/rel3Funciones.php");

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 2");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 2");
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
     * 2.- Función generarCadena(). A esta función se le pasa un parámetro con valor por defecto 10 y se
     * encarga de devolver una cadena de longitud la indicada cuyos caracteres son generados de forma
     * aleatoria (caracteres válidos: letras mayúsculas, minúsculas y números). Devolverá false si se ha
     * indicado un número negativo o igual a 0.
     */

    echo generarCadena();
}

