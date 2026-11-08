<?php

/**
 * 4.- Definir la clase Flauta que es un instrumento de viento que es fabricable y de la que no se puede
 * heredar ninguna otra subclase.
 * - El constructor se hará privado
 * - Se tiene el método estático CrearDesdeArray (constructor estatico) con parámetro un Array
 * con posiciones asociativas “material” y “edad” (pueden no aparecer por lo que se tienen en
 * cuenta valores por defecto) y que devuelve una instancia de Flauta con los valores
 * indicados.
 * - Definir el método de clonación para la clase flauta de forma que el nuevo objeto tenga los
 * mismos valores, salvo la edad que será 0 y el número de instancia (propiedad) /número de
 * instancias (propiedad de clase), ya que realmente he creado una nueva instancia.
 */
final class Flauta extends InstrumentoViento
{
    private function __construct(string $material = "madera", int $edad = 15)
    {
        parent::__construct($material, $edad);
    }

    public static function CrearDesdeArray(array $datos): self
    {
        $material = $datos['material'] ?? 'madera';
        $edad = $datos['edad'] ?? 15;

        return new self($material, $edad);
    }

    public function __clone()
    {
        $this->edad = 0;

        self::$instrumentosCreados++;

        $this->idInstrumento = self::$instrumentosCreados;
    }
}