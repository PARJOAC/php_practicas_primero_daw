<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

/**
 * 1.- Función cuentaVeces(). A esta función se le pasan cuatro parámetros: un array, una cadena y dos
 * números. La función se encargará de añadir en el array el primer número a la posición asociativa
 * indicada por la cadena. Hay que tener en cuenta que el array debe quedar actualizado cuando se
 * salga de la función. Además, cada vez que se llama a la función, se devuelve en el segundo número
 * un valor que corresponde con el número de llamada actual (1 para la primera, 2 para la segunda
 * llamada, etc). Se devolverá true si todo ha ido bien y false si se ha detectado algún error. (se debe
 * dar error si se indica como posición"2daw" o "primera")
 */

/**
 * $vector=array();//el vector vacio
 * $numero=0;
 * cuentaVeces($vector,"1osición",7,$numero);
 * //$vector (“1osición”=>7). En numero se de vuelve 1 porque es la primera llamada...
 * cuentaVeces($vector,"otra",2,$numero);
 * //$vector(“otra”=>9).En numero se devuelve 2 porque es la segunda llamada...
 */

$contador = 0;
$array = array();


//dibuja la plantilla de la vista
inicioCabecera("FUNCIONES - EJERCICIO 1");
cabecera();
finCabecera();
inicioCuerpo("FUNCIONES - EJERCICIO 1");
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
    global $array, $contador;
?>
    <br>

<?php

    for ($i = 0; $i < 20; $i++) {
        $mensaje = "";
        $mensaje = cuentaVeces($array, "{$i}daw", $i, $contador) ?
            "Llamada $i exitosa. Contador: $contador <br>" :
            "Error en la llamada $i <br>";
        echo $mensaje;
    }
}


/**
 * Funcion para contar
 *
 * @param array $array
 * @param string $posicion
 * @param integer $valor
 * @param integer $contador
 * @return boolean
 */
function cuentaVeces(array &$array, string $posicion, int $valor, int &$contador): bool
{
    if ($posicion === "2daw" || $posicion === "primera") return false;
    //Se suma al contador
    $contador++;

    // Añadir al array
    $array[$posicion] = $valor;

    return true;
}
