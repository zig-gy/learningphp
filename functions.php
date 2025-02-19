<?php

declare(strict_types=1);
require_once('globals.php');

function get_data(string $url): array
{
  $result = file_get_contents($url);
  $data = json_decode($result, true);
  return $data;
}

function generate_days_message(int $days): string
{
  return match (true) {
    $days == 0 => "Se estrena hoy",
    $days == 1 => "Se estrena mañana",
    $days < 7  => "Se estrena esta semana",
    $days < 30 => "Se estrena este mes",
    default    => "Se estrena en $days dias"
  };
}
$data = get_data(API_URL);
$message = generate_days_message($data['days_until']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
  <link rel="stylesheet" href="styles.css">
  <title>Document</title>
</head>

<body>
  <h1>holi</h1>
  <p><?= $message ?></p>
</body>

</html>