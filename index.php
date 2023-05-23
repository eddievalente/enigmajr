<?php

ob_start();
session_start();
date_default_timezone_set("America/Toronto");
header("Content-Type: text/html; charset=UTF-8", true);

require "core/_Error.php";
require "lib/Pagina.php";
require "lib/Site.php";

$errorHandler = new \EnigmaJr\Core\_Error;

try {
  $pagina = new \EnigmaJr\Core\Pagina;
  echo $pagina->start();
} catch (Throwable $t) {
  echo $errorHandler->getErrorMessage($t);
  exit;
} catch (Exception $e) {
  echo $errorHandler->getErrorMessage($e);
  exit;
}
