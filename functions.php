<?php

declare(strict_types=1);
require_once('globals.php');


function render(string $template, array $data): void
{
  extract($data);
  require "templates/$template.php";
}
