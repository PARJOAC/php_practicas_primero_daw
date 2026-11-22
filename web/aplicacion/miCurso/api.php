<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
// Inicializar una nueva sesión de curl
$ch = curl_init(API_URL);

// Indicar que queremos recibir el resultado de la petición y no mostrarla por pantallaç
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Ejecutar la petición y guardar el resultado
$result = curl_exec($ch);
$data = json_decode($result, true);
?>

<head>
    <title>Próxima película de Marvel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<main>
    <section>
        <h2>PROXIMO ESTRENO DE MARVEL</h2>
        <img src="<?php echo $data["poster_url"] ?? ""; ?>" alt="Poster de la próxima película de Marvel">
        <p>Titulo: <?php echo $data["title"] ?? "No se pudo obtener la información"; ?></p>
        <p>Días restantes: <?php echo $data["days_until"] ?? "No se pudo obtener la información"; ?></p>
        <p>Fecha de estreno: <?php echo $data["release_date"] ?? "No se pudo obtener la información"; ?></p>
        <p>Sinopsis: <?php echo $data["overview"] ?? "No se pudo obtener la información"; ?></p>
    </section>
    <section>
        <h2>PELÍCULA SIGUIENTE:</h2>
        <p>Titulo: <?php echo $data["following_production"]["title"] ?? "No se pudo obtener la información"; ?></p>
        <img src="<?php echo $data["following_production"]["poster_url"] ?? ""; ?>" alt="Poster de la próxima película
        de Marvel">

        <p>Días restantes:
            <?php echo $data["following_production"]["days_until"] ?? "No se pudo obtener la información"; ?>
        </p>
        <p>Fecha de estreno:
            <?php echo $data["following_production"]["release_date"] ?? "No se pudo obtener la información"; ?>
        </p>
        <p>Sinopsis: <?php echo $data["following_production"]["overview"] ?? "No se pudo obtener la información"; ?></p>
        </h2>
    </section>
</main>
<style>
    html {
        text-align: center;
    }
    img {
        border-radius: 50px;
    }
</style>