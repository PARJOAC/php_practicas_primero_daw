<?php

enum ColorPunto: string
{
    case ROJO = 'red';
    case VERDE = 'green';
    case AZUL = 'blue';
    case NEGRO = 'black';
    case NARANJA = 'orange';

    public function descripcion(): string
    {
        return match ($this) {
            self::ROJO => 'Rojo',
            self::VERDE => 'Verde',
            self::AZUL => 'Azul',
            self::NEGRO => 'Negro',
            self::NARANJA => 'Naranja',
        };
    }

    public function rgb(): array
    {
        return match ($this) {
            self::ROJO => [255, 0, 0],
            self::VERDE => [0, 128, 0],
            self::AZUL => [0, 0, 255],
            self::NEGRO => [0, 0, 0],
            self::NARANJA => [255, 165, 0],
        };
    }
}

enum GrosorPunto: int
{
    case FINO = 1;
    case MEDIO = 2;
    case GORDO = 3;

    public function descripcion(): string
    {
        return match ($this) {
            self::FINO => 'Fino',
            self::MEDIO => 'Medio',
            self::GORDO => 'Gordo',
        };
    }
}

final class Punto
{
    public const COLORES = [
        'red' => ['Rojo', 255, 0, 0],
        'green' => ['Verde', 0, 128, 0],
        'blue' => ['Azul', 0, 0, 255],
        'black' => ['Negro', 0, 0, 0],
        'orange' => ['Naranja', 255, 165, 0],
    ];

    public const GROSORES = [
        1 => 'Fino',
        2 => 'Medio',
        3 => 'Gordo',
    ];

    private int $x;
    private int $y;
    private ColorPunto $color;
    private GrosorPunto $grosor;

    public function __construct(mixed $x, mixed $y, mixed $color, mixed $grosor)
    {
        if (!$this->setX($x) || !$this->setY($y) || !$this->setColor($color) || !$this->setGrosor($grosor)) {
            throw new InvalidArgumentException('Los datos del punto no son válidos.');
        }
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function setX(mixed $x): bool
    {
        $valor = $this->entero($x);
        if ($valor === null || $valor > 20000) {
            return false;
        }

        $this->x = $valor;
        return true;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(mixed $y): bool
    {
        $valor = $this->entero($y);
        if ($valor === null || $valor > 20000) {
            return false;
        }

        $this->y = $valor;
        return true;
    }

    public function getColor(): ColorPunto
    {
        return $this->color;
    }

    public function setColor(mixed $color): bool
    {
        if (is_string($color)) {
            $color = ColorPunto::tryFrom($color);
        }
        if (!$color instanceof ColorPunto) {
            return false;
        }

        $this->color = $color;
        return true;
    }

    public function getGrosor(): GrosorPunto
    {
        return $this->grosor;
    }

    public function setGrosor(mixed $grosor): bool
    {
        if (is_string($grosor) && preg_match('/^\d+$/D', $grosor)) {
            $grosor = (int) $grosor;
        }
        if (is_int($grosor)) {
            $grosor = GrosorPunto::tryFrom($grosor);
        }
        if (!$grosor instanceof GrosorPunto) {
            return false;
        }

        $this->grosor = $grosor;
        return true;
    }

    public function __set(string $nombre, mixed $valor): void
    {
        throw new LogicException('No se permiten propiedades dinámicas en Punto.');
    }

    private function entero(mixed $valor): ?int
    {
        if (is_int($valor)) {
            return $valor >= 0 ? $valor : null;
        }
        if (!is_string($valor) || !preg_match('/^\d+$/D', $valor)) {
            return null;
        }

        $entero = (int) $valor;
        return $entero >= 0 ? $entero : null;
    }
}
