<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// controlador
$objeto = new ClaseMisPropiedades();
$objeto->propPublica = "pública";
$objeto->propiedad1 = 25;
$objeto->propiedad2 = "cadena de texto";

// dibuja la plantilla de la vista
inicioCabecera("CLASES - EJERCICIO 7");
cabecera();
finCabecera();
inicioCuerpo("CLASES - EJERCICIO 7");
cuerpo($objeto); // llamo a la vista
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
function cuerpo($objeto)
{
?>
    <br>
    <?php echo "La propiedad 1 vale: " . $objeto->propiedad1 . "<br><br>"; ?>
    <strong>Recorrido iterador (con prefijo 'oi_'):</strong><br>
    <ul>
<?php
    foreach ($objeto as $clave => $valor) {
        echo "<li><strong>$clave</strong> => $valor</li>";
    }
?>
    </ul>
<?php
}