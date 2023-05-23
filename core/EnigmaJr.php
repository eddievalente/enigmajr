<?php

namespace EnigmaJr\Core;

class EnigmaJr {

  private static string $base = ' ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

  function generateKey() {
    $linhas = '123456';
    $colunas = '123456';

    $key = str_shuffle($linhas).str_shuffle($colunas).str_shuffle(self::$base);

    return $key;
  }

  function encrypt($originalMessage, $key) {
    $theMessage = strtoupper($originalMessage);
    $newKey = substr($key, 12);

    $tamanho = strlen($theMessage);
    $encryptedMessage = '';
    for ($i = 0; $i < $tamanho; $i++) {
      $letter = $theMessage[$i];
      $pos = strpos(self::$base, $letter);
      $encryptedMessage .= substr($newKey, $pos, 1);
    }

    return $encryptedMessage;
  }

  function decrypt($encryptedMessage, $key) {
    $newKey = substr($key, 12);

    $tamanho = strlen($encryptedMessage);
    $decryptedMessage = '';
    for ($i = 0; $i < $tamanho; $i++) {
      $letter = $encryptedMessage[$i];
      $pos = strpos($newKey, $letter);
      $decryptedMessage .= substr(self::$base, $pos, 1);
    }

    return $decryptedMessage;
  }

}
