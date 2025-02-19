<?php
const API_URL = 'https://whenisthenextmcufilm.com/api';

#Inicializar curl handler
$curlHandler = curl_init(API_URL);
//Indicamos que queremos recibir el resultado y no mostrarla en pantalla
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
/*Ejecutamops la peticion y
guardamos el resultado
*/
$result = curl_exec($curlHandler);
$data = json_decode($result, true);
curl_close($curlHandler);

//$result = file_get_contents(API_URL);

//var_dump($result);

$nombre = $data["title"];
$fecha = $data["release_date"];
$poster = $data["poster_url"];
$tipo = $data["type"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Centered viewport -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
  <title>Document</title>
</head>

<body>
  <main>
    <h1><?= "$nombre" ?></h1>
    <h3><?= "Fecha de salida: $fecha" ?></h3>
    <p><?= "Tipo: $tipo" ?></p>
    <img src=<?= $poster ?> alt="Poster de la pelicula" width="300" style="border-radius: 16px;">
  </main>
</body>


</html>

<style>
  :root {
    color-scheme: dark;
    text-align: center;
  }

  body {
    display: grid;
    place-content: center;
  }
</style>