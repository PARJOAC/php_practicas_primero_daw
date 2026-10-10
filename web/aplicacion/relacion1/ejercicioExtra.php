<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("PASO PARAMETROS - EJERCICIO 8 EXTRA");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS - EJERCICIO 8 EXTRA");
cuerpo(); //llamo a la vista
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
function cuerpo()
{
?>
    <br><br>

<?php
    $barra = [
        [
            "TEXTO" => "inicio",
            "ENLACE" => "/index.php",
            "ADICIONAL" => ">>"
        ],
        [
            "TEXTO" => "otro"
        ],
        [
            "TEXTO" => "index",
            "ADICIONAL" => "&copy;&copy;"
        ]
    ];

    foreach ($barra as $item) {
        $enlace = isset($item["ENLACE"]) ? "href='" . $item["ENLACE"] . "'" : "";
        $texto = $item["TEXTO"] ?? "";
        $adicional = $item["ADICIONAL"] ?? "";

        echo !empty($enlace) ? "<a {$enlace}>{$texto} {$adicional}</a>" :
            "<p>{$texto} {$adicional}</p>";
    }
}
