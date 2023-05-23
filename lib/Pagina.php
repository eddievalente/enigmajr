<?php

namespace EnigmaJr\Core;

class Pagina {

  function start() {
    $site = new \EnigmaJr\Core\Site;
    return $site->publica();
  }

}
