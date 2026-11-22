<?php
$name = "Pablo";
$isDev = true;
$age = 21;
$output = "Mi primera app, $name, tengo $age años";

// Constante global
define("LOGO_URL", "https://thumb.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1280px-PHP-logo.svg.png?utm_source=es.wikipedia.org&utm_campaign=index&utm_content=thumbnail");
// Constante local
const NOMBRE = "Pablo";

// Switch moderno
$outputAge = match (true) {
    $age <= 2 => "Eres un bebé, $name",
    $age <= 12 => "Eres un niño, $name",
    $age <= 18 => "Eres un adolescente, $name",
    $age <= 65 => "Eres un adulto mayor, $name",
    default => "Eres un anciano, $name",
};

// Crear un array
$bestLanguage = ["PHP", "JavaScript", "Java", "Python"];

// Agregar un nuevo lenguaje al array AL FINAL
$bestLanguage[] = "TypeScript";

$person = [
    "name" => "Pablo",
    "age" => 21,
    "isDev" => true,
    "languages" => ["PHP", "JavaScript", "TypeScript"],
];

?>
<ul>
    <?php foreach ($bestLanguage as $key => $language): ?>
        <li id="<?= $key ?>"><?= $language ?></li>
    <?php endforeach; ?>
</ul>

<?php if ($isDev): ?>
    <p>Modo desarrollador activado</p>
<?php //Nunca ponerlo separado el elseif
elseif (!$isDev): ?>
    <p>Modo desarrollador desactivado</p>
<?php endif; ?>


<img src="<?= LOGO_URL ?>" alt="PHP Logo" width="200">
<h1>
    <!-- Forma simplificada del echo-->
    <?= $output ?>
</h1>
<p><?= NOMBRE ?></p>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>