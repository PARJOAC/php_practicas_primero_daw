<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("pruebas basicas");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>esto es html
    <?php 
        echo "klñfffdj"; 

        $var1 = 25;
        $cad1 = "Cadena";
        $var1 += 12;

        echo $var1;

        if(isset($cad1))
            echo $cad1;

        $real=1234.5678939847349;
        echo "<br>";
        echo "el número es $var1<br>";

        echo "el numero es \$real es {$real}<br>".PHP_EOL;
        echo "el numero es $real<br>".PHP_EOL;
        
        $real = null;

        $var = 125;
        $tipo = gettype($var);
        $tipo = gettype($var);
        $var = settype($var, "float");
        $tipo = gettype($var);
        $var = intval($var);
        $tipo = gettype($var);

        $var="0";
        if($var)
            $cadena = "var no vale false";
    ?>
  
<?php
}
