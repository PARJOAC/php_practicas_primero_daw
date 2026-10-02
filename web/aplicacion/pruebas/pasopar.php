<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

// Datos básicos
$nombre = "Pablo";
$edad = 21;

$basicos = [
    "nombre" => $nombre,
    "edad" => $edad
];

// Relleno otras
$otras = rellenarOtras();

//dibuja la plantilla de la vista
inicioCabecera("Mi Aplicación");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS");
cuerpo($basicos, $otras); //llamo a la vista
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
function cuerpo($bas, $otr)
{
?>
    <br><br>

<?php
//PHP_EOL ES PARA UN SALTO DE LINEA
echo "Mi nombre es {$bas["nombre"]} y tengo {$bas["edad"]} años, estoy estudiando en {$otr}".PHP_EOL;
}

function rellenarOtras()
{
    return "2º DAW";
}
