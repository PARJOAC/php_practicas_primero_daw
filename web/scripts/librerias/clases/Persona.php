<?php

/**
 * 5.- Definir el tipo enumerado EstadoCivil con las siguientes características:
 * - Casos de soltero, casado, pareja y viudo con valores 10, 20, 30 y 40 respectivamente.
 * - Método descripcion que devuelve el nombre del caso concreto.
 * - Método valor que devuelve el valor del caso concreto.
 * - Método estático casos que devuelve un array con todos los casos
 */
enum EstadoCivil: int
{
    case soltero = 10;
    case casado = 20;
    case pareja = 30;
    case viudo = 40;

    public function descripcion(): string
    {
        return $this->name;
    }

    public function valor(): int
    {
        return $this->value;
    }

    public static function casos(): array
    {
        return self::cases();
    }
}

class Persona
{
    private string $nombre;
    private string $fecha_nacimiento;
    private string $domicilio;
    private string $localidad;
    private EstadoCivil $estado;

    private function __construct()
    {
        $this->nombre = "prueba";
        $this->fecha_nacimiento = "01/01/2000";
        $this->domicilio = "carrera 12";
        $this->localidad = "antequera";
        $this->estado = EstadoCivil::soltero;
    }

    public static function registrarPersona(
        string $nombre, 
        string $fecha_nacimiento, 
        string $domicilio, 
        string $localidad, 
        EstadoCivil $estado
    ): self {
        $persona = new self();
        $persona->nombre = $nombre;
        $persona->fecha_nacimiento = $fecha_nacimiento;
        $persona->domicilio = $domicilio;
        $persona->localidad = $localidad;
        $persona->estado = $estado;
        
        return $persona;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getFechaNacimiento(): string
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento(string $fecha_nacimiento): void
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getDomicilio(): string
    {
        return $this->domicilio;
    }

    public function setDomicilio(string $domicilio): void
    {
        $this->domicilio = $domicilio;
    }

    public function getLocalidad(): string
    {
        return $this->localidad;
    }

    public function setLocalidad(string $localidad): void
    {
        $this->localidad = $localidad;
    }

    public function getEstado(): EstadoCivil
    {
        return $this->estado;
    }

    public function setEstado(EstadoCivil $estado): void
    {
        $this->estado = $estado;
    }

    public function __toString(): string
    {
        return "{$this->nombre} es una persona {$this->estado->descripcion()} nacida en {$this->fecha_nacimiento} y que vive en {$this->localidad}";
    }
}