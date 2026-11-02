<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// controlador
$persona1 = Persona::registrarPersona(
    "Pablo Arjonilla", 
    "26/01/2005", 
    "Calle APblo Iglesias 26", 
    "Mollina", 
    EstadoCivil::casado
);

// dibuja la plantilla de la vista
inicioCabecera("CLASES - EJERCICIO 5");
cabecera();
finCabecera();
inicioCuerpo("CLASES - EJERCICIO 5");
cuerpo($persona1); // llamo a la vista
finCuerpo();
// **********************************************************

// vista
function cabecera()
{
?>
    <!-- esto va en el head -->
<?php
}

// vista
function cuerpo($persona1)
{
?>
    <br>
<?php
    echo $persona1 . "<br>";
    echo "Estado (Descripción): " . $persona1->getEstado()->descripcion() . "<br>";
    echo "Estado (Valor): " . $persona1->getEstado()->valor() . "<br>";
}