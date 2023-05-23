<?php

session_start();
date_default_timezone_set('America/Toronto');

class AjaxHandler {

  private $enigmaJr;

  function __construct() {
    require "../core/EnigmaJr.php";
    $this->enigmaJr = new \EnigmaJr\Core\EnigmaJr;
  }

  function generateKey() {
    $status = 200;
    $key = $this->enigmaJr->generateKey();
    $ret = [
        'key'    => $key,
        'status' => $status
    ];
    return json_encode($ret);
  }

  function encrypt($originalMessage, $key) {
    $status = 200;
    $encryptedMessage = $this->enigmaJr->encrypt($originalMessage, $key);

    $ret = [
        'original'  => $originalMessage,
        'encrypted' => $encryptedMessage,
        'key'       => $key,
        'status'    => $status
    ];
    return json_encode($ret);
  }

  function decrypt($encryptedMessage, $key) {
    $status = 200;
    $decryptedMessage = $this->enigmaJr->decrypt($encryptedMessage, $key);

    $ret = [
        'encrypted' => $encryptedMessage,
        'decrypted' => $decryptedMessage,
        'key'       => $key,
        'status'    => $status
    ];
    //
    return json_encode($ret);
  }

}
