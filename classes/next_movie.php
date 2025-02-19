<?php

declare(strict_types=1);

class NextMovie
{
  public function __construct(
    private int $days_until,
    private string $title,
    private string $release_date,
    private string $type,
    private string $poster_url
  ) {}

  public function generate_days_message(): string
  {
    $days = $this->days_until;
    return match (true) {
      $days == 0 => "Se estrena hoy",
      $days == 1 => "Se estrena mañana",
      $days < 7  => "Se estrena esta semana",
      $days < 30 => "Se estrena este mes",
      default    => "Se estrena en $days dias"
    };
  }

  public static function fetch_and_create_movie(string $url): NextMovie
  {
    $result = file_get_contents($url);
    $data = json_decode($result, true);

    $movie = new self($data['days_until'], $data['title'], $data['release_date'], $data['type'], $data['poster_url']);
    return $movie;
  }

  public function get_data()
  {
    return get_object_vars($this);
  }
}
