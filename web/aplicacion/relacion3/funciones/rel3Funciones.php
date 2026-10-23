<?php
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

/**
 * Generar una cadena aleatoria
 *
 * @param integer $defecto
 * @return false|string
 */
function generarCadena(int $defecto = 10): false|string
{
    if ($defecto > 10) return false;
    $cadena = "";

    // Desde el 48 al 57 (números)
    // Desde el 65 hasta el 90 ambos incluidos (letras mayúsculas)
    // Desde el 97 al 122 ambos incluidos (letras minúsculas)
    for ($i = 0; $i < $defecto; $i++) {
        $random = rand(1, 3);
        $letraRandom = 0;
        switch ($random) {
            case 1:
                $letraRandom = rand(48, 57);
                break;
            case 2:
                $letraRandom = rand(65, 90);
                break;
            case 3:
                $letraRandom = rand(97, 122);
                break;
        }
        $cadena = $cadena . chr($letraRandom);
    }

    return $cadena;
}

/**
 * Undocumented function
 *
 * @param integer $tipoOperacion
 * @param float ...$operandos
 * @return float
 */
function operaciones(int $tipoOperacion, float ...$operandos): float
{
    if (empty($operandos)) return 0;
    // Inicializamos la variable que contendrá el resultado de la operación
    $resultado = 0;

    // Evaluamos el tipo de operación mediante un switch
    switch ($tipoOperacion) {
        case 1:
            // Suma todos los operandos
            $resultado = array_sum($operandos);
            break;

        case 2:
            // Al primer operando se le resta el resto
            $resultado = $operandos[0];
            for ($i = 1; $i < count($operandos); $i++) {
                $resultado -= $operandos[$i];
            }
            break;

        case 3:
            // Multiplicación de todos los operandos
            $resultado = 1;
            foreach ($operandos as $operando) {
                $resultado *= $operando;
            }
            break;

        default:
            // Se suman las posiciones pares y se restan las impares 
            $resultado = 0;
            foreach ($operandos as $index => $valor) {
                $posicionPar = $index + 1;
                if ($posicionPar % 2 == 0) {
                    // Posición par se suma
                    $resultado += $valor;
                } else {
                    // Posición impar se resta
                    $resultado -= $valor;
                }
            }
            break;
    }

    return $resultado;
}

function devuelve(int $valor1, int $valor2 = 4, int $valor3 = 10): int
{
    return $valor1 * $valor2 * $valor3;
}


// Función encargada de validar el tipo de operación y delegar el cálculo
function hacerOperacion(TipoOperacion $operacion, int $num1, int $num2): int
{
    // Validación por si el parámetro de operación es nulo
    if ($operacion === null) return throw new Error("El tipo de operación no es válido.");
    $resultado = 0;
    // Estructura de control para ejecutar la función adecuada según el tipo recibido
    switch ($operacion) {
        case TipoOperacion::SUMA: {
                $resultado = suma($num1, $num2);
                break;
            }
        case TipoOperacion::RESTA: {
                $resultado = resta($num1, $num2);
                break;
            }
        case TipoOperacion::MULTIPLICACION: {
                $resultado = multiplicacion($num1, $num2);
                break;
            }
    }
    return $resultado;
}

// Función que calcula la suma de dos enteros
function suma(int $num1, int $num2): int
{
    return $num1 + $num2;
}

// Función que calcula la resta de dos enteros
function resta(int $num1, int $num2): int
{
    return $num1 - $num2;
}

// Función que calcula la multiplicación de dos enteros
function multiplicacion(int $num1, int $num2): int
{
    return $num1 * $num2;
}


// Función que recibe el callable y lo ejecuta
function llamadaAFuncion(int $a, int $b, callable $call): int
{
    return $call($a, $b);
}


function ordenar(array &$array)
{
    //Se ordena el array para que se vea de mayor a menor según el numero de caracteres
    usort($array, fn($a, $b) => strlen((string)$b) <=> strlen((string)$a));

    // Devolvemos el array
    return $array;
}

?>