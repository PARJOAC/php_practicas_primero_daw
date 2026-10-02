<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("Mi Aplicación");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS");
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
}
