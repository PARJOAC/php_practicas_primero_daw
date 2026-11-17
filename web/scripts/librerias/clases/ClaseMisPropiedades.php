<?php

/**
 * 7.- Crear la clase ClaseMisPropiedades. En esta clase se define una propiedad privada llamada
 * $_propiedades. Se debe permitir añadir en tiempo de ejecución cualquier nueva propiedad
 * (propiedades dinámicas) a una instancia. Además tenemos las propiedades de instancia
 * $propPublica (publica, mixed) y $_propPrivada (privada, mixed, inicializada a 25). Se debe
 * garantizar que no se pueda asignar un valor a una propiedad que llamemos _propPrivada (creada de
 * forma dinámica). Por ejemplo, este código debería ser válido.
 * $Objeto= new ClaseMisPropiedades ();
 * $Objeto->propPublica=”publica”;
 * //$Objeto->_propPrivada=”privada”; //no es valida al ser privada
 * $Objeto->propiedad1=25;
 * $Objeto->propiedad2=”cadena de texto”;
 * echo “la propiedad 1 vale “.$Objeto->propiedad1.”<br>”.
 * // echo $Objeto->propiedad3; // esto debería dar un error al no haber asignado previamente la propiedad
 * Además la clase deber ser iterable. Así cuando se haga un foreach ($Objeto as
 * $clave=>$valor) se deben devolver como claves las propiedades con el prefijo oi_ delante
 * (ejemplo para la propiedad propiedad1, se devolverá como clave oi_propiedad1), incluyendo
 * propPublica y _propPrivada como últimos elementos a devolver en el foreach.
*/
class ClaseMisPropiedades implements Iterator
{
    private array $_propiedades = [];
    public mixed $propPublica;
    private mixed $_propPrivada = 25;

    private int $position = 0;
    private array $keysCache = [];
    private array $valuesCache = [];

    public function __set(string $nombre, mixed $valor): void
    {
        if ($nombre === '_propPrivada') {
            throw new Exception("No se puede modificar la propiedad privada _propPrivada de forma dinámica.");
        }

        $this->_propiedades[$nombre] = $valor;
    }

    public function __get(string $nombre): mixed
    {
        if (array_key_exists($nombre, $this->_propiedades)) {
            return $this->_propiedades[$nombre];
        }

        throw new Exception("La propiedad dinámica '$nombre' no ha sido asignada previamente.");
    }

    public function __isset(string $nombre): bool
    {
        return array_key_exists($nombre, $this->_propiedades);
    }

    private function construirCacherIteracion(): void
    {
        $this->keysCache = [];
        $this->valuesCache = [];

        foreach ($this->_propiedades as $clave => $valor) {
            $this->keysCache[] = "oi_" . $clave;
            $this->valuesCache[] = $valor;
        }

        if (property_exists($this, 'propPublica') && isset($this->propPublica)) {
            $this->keysCache[] = "oi_propPublica";
            $this->valuesCache[] = $this->propPublica;
        }

        $this->keysCache[] = "oi__propPrivada";
        $this->valuesCache[] = $this->_propPrivada;
    }

    public function rewind(): void
    {
        $this->position = 0;
        $this->construirCacherIteracion();
    }

    public function current(): mixed
    {
        return $this->valuesCache[$this->position] ?? null;
    }

    public function key(): mixed
    {
        return $this->keysCache[$this->position] ?? null;
    }

    public function next(): void
    {
        $this->position++;
    }

    public function valid(): bool
    {
        return isset($this->keysCache[$this->position]);
    }
}