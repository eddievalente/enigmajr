<?php

namespace EnigmaJr\Core;

define('PREFIXO_SESSAO','enigmajr_');

class _Error {

  // CATCHABLE ERRORS
  public static function captureNormal($number, $message, $file, $line) {
    $arquivo = basename($file);
    $informa_erro = false;
    switch ($number) {
      case E_NOTICE:
        $tipo = "Notice";
        break;
      case E_USER_NOTICE:
        $tipo = "User Notice";
        break;
      case E_WARNING:
        $tipo = "Warning";
        break;
      case E_USER_WARNING:
        $tipo = "User Warning";
        break;
      case E_ERROR:
        $informa_erro = true;
        $tipo = "Fatal Error";
        break;
      case E_USER_ERROR:
        $informa_erro = true;
        $tipo = "Fatal User Error";
        break;
      default:
        $informa_erro = true;
        $tipo = "Unknown Error";
        break;
    }

    if ($informa_erro) {
      $msg = '<b>'.$tipo.'</b><br>Em '.$arquivo.' &bull; linha '.$line.'<br>'.$message;
      $_SESSION[PREFIXO_SESSAO.'exception_flag'] = 1;
      $vet_msg = $_SESSION[PREFIXO_SESSAO.'msg_vet'];
      if (empty($vet_msg)) $vet_msg = Array();
      $vet_msg[] = 'error|'.$msg.'|1';
      $_SESSION[PREFIXO_SESSAO.'msg_vet'] = $vet_msg;
    }
  }

  // EXTENSIONS
  public static function captureException($exception) {
    $_SESSION[PREFIXO_SESSAO.'exception_flag'] = 1;
    $vet_msg = $_SESSION[PREFIXO_SESSAO.'msg_vet'];
    if (empty($vet_msg)) $vet_msg = Array();
    $vet_msg[] = 'error|<pre>'.$exception.'</pre>.|1';
    $_SESSION[PREFIXO_SESSAO.'msg_vet'] = $vet_msg;
  }

  // UNCATCHABLE ERRORS
  public static function captureShutdown() {
    $error = error_get_last();
    if ($error) {
      ## IF YOU WANT TO CLEAR ALL BUFFER, UNCOMMENT NEXT LINE:
      # ob_end_clean( );
      // Display content $error variable
      //echo '<div id=errorpanel><h2>Uncatchable Error</h2>';
      //echo '<pre>';
      //print_r( $error );
      //echo '</pre></div>';
    } else {
      return true;
    }
  }

  function getErrorMessage($e) {
    $codigo = $e->getCode();
    $arquivo = basename($e->getFile());
    $linha = $e->getLine();
    $mensagem = $e->getMessage();
    $ret = '<html>
      <head><title>Ops! Error found!</title></head>
      <body>
      <div style="float:left; display: block; border:solid 2px red; border-radius:5px; padding: 10px; font-size: 20px;">
        <b>Error Code '.$codigo.'</b>
        <br>At '.$arquivo.' &rarr; line '.$linha.'
        <br>'.$mensagem.'
      </div>
      </body>';
    return $ret;
  }

}

ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE);
