
<?php
/**
 * 3.- Definir la clase InstrumentoViento que hereda de InstrumentoBase con el siguiente
 * comportamiento:
 * - La descripción es "instrumento de viento".
 * - Tiene el atributo material con valor por defecto madera. Este atributo no es accesible
 * directamente desde el exterior aunque si desde las clases derivadas. No se tienen métodos
 * set/get para esta propiedad.
 * - Al constructor se le pasa como parámetro el material y la edad (valor por defecto 15).
 * - El método afinar no debe ser redefinible en las clases derivadas de esta.
 * - Cuando se muestre en un echo aparecerá, junto a todo lo indicado por la clase base, el texto
 * "Instrumento de material XXXX"
*/
class InstrumentoViento extends InstrumentoBase implements IFabricable
{
    protected string $material;

    public function __construct(string $material = "madera", int $edad = 15)
    {
        parent::__construct("instrumento de viento", $edad);
        $this->material = $material;
    }

    final public function afinar(): string
    {
        return "Pasos para afinar el instrumento de viento: calentar el cuerpo, comprobar fugas de aire y afinar.";
    }

    public function sonido(): string
    {
        return "Sopla aire a través del tubo";
    }

    public function metodoFabricacion($pasos): string
    {
        return "Fabricación del instrumento de viento con material {$this->material}. Pasos: " . $pasos;
    }

    public function metodoReciclado(): string
    {
        return "Método de reciclado: separación de componentes de {$this->material} y elementos metálicos o sintéticos.";
    }

    public function __toString(): string
    {
        return parent::__toString() . " Instrumento de material {$this->material}";
    }
}