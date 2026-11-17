<?php

/**
 * 6.- Crear la clase SerieFibonacci que implementa la serie de Fibonacci. Esta serie se basa en la
 * fórmula F(x)=F(x-1)+F(x-2) siendo F(0)=0 y F(1)=1. Para obtener el valor F(n) se puede usar la
 * fórmula alternativa
 * Para implementar esta clase podéis usar la interfaz Iterator y tener dos propiedades privadas
 * $_limite y $_claveActual. $limite indica hasta qué valor se generaría la serie. $_claveActual indica
 * cual es el elemento actual para el que se calcula la serie.
 * El funcionamiento tendría que ser algo así:
 * foreach(new SerieFibonacci(10) as $valor)
 * {
 * echo “$valor &nbsp;”;
 * }
 * /* Generaria 10 valores
 * 0 1 1 2 3 5 8 13 21 34 55
 * Crear la función fFibonacci($ultimo) como función estática dentro de la clase
 * SerieFibonacci, que debe implementar la serie de Fibonacci usando para ello un generador.
 */
class SerieFibonacci implements Iterator
{
    private int $_limite;
    private int $_claveActual;

    public function __construct(int $limite)
    {
        $this->_limite = $limite;
        $this->_claveActual = 0;
    }

    public function current(): int
    {
        $sqrt5 = sqrt(5);
        $phi1 = (1 + $sqrt5) / 2;
        $phi2 = (1 - $sqrt5) / 2;

        $valor = (1 / $sqrt5) * (pow($phi1, $this->_claveActual) - pow($phi2, $this->_claveActual));
        
        return (int) round($valor);
    }

    public function key(): int
    {
        return $this->_claveActual;
    }

    public function next(): void
    {
        $this->_claveActual++;
    }

    public function rewind(): void
    {
        $this->_claveActual = 0;
    }

    public function valid(): bool
    {
        return $this->_claveActual <= $this->_limite;
    }

    public static function fFibonacci(int $ultimo)
    {
        $sqrt5 = sqrt(5);
        $phi1 = (1 + $sqrt5) / 2;
        $phi2 = (1 - $sqrt5) / 2;

        for ($i = 0; $i <= $ultimo; $i++) {
            $valor = (1 / $sqrt5) * (pow($phi1, $i) - pow($phi2, $i));
            yield (int) round($valor);
        }
    }
}