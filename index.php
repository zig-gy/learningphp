<?php

declare(strict_types=1);
require_once('globals.php');
require_once 'functions.php';
require_once 'classes/next_movie.php';

$movie = NextMovie::fetch_and_create_movie(API_URL);
$data = $movie->get_data();

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
  <link rel="stylesheet" href="styles.css">
  <title>Document</title>
</head>

<body>
  <?php
  render('main', array_merge($data, ['until_message' => $movie->generate_days_message()]));
  ?>
</body>


</html>