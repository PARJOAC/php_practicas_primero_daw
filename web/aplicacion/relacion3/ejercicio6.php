<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 6");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 6");
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
     * 6.- Crear la función llamadaAFuncion que recibe tres operandos (entero, entero y callable) y que
     * devuelve un entero que es el resultado de llamar al parámetro callback con los otros parámetros.
     * Llamar a la función llamadaAFuncion 3 veces pasando como parámetro de callback funciones de
     * flecha distintas que tu definas
     * llamadaAFuncion(1,2,fn($a,$b)=>$a+$b)
     * Repetir las llamadas, definiendo las 3 funciones como anónimas (se asignan a variables)
     */
}
