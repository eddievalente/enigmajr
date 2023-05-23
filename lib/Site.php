<?php

namespace EnigmaJr\Core;

class Site {

  function abertura() {
    $ret = '<!doctype html>
      <html lang="en" data-bs-theme="auto">
      <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Eduardo valente">
      <title>Enigma Jr</title>

      <script src="js/color-modes.js"></script>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/dashboard.css" rel="stylesheet">
      </head>
      <body>
      ';
    return $ret;
  }

  function fechamento() {
    $ret = '<script src="js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="js/dashboard.js"></script>
      
      <script>
      
        $(document).ready(function () {
        
          $("#btnGenerate").click(function () {
              var dados = {
                  key: $("#enigmaKey").val()
              };

              $.ajax({
                  url: "ajax/generate.php",
                  type: "post",
                  dataType: "json",
                  data: dados,
                  success: function (result) {
                      console.log(result);
                      $("#enigmaKey").val(result.key);
                  },
                  error: function (result) {
                      console.log(result);
                  }
              });
          });

          $("#btnCopyTheKey").click(function () {
              $("#enigmaKey").select();
              document.execCommand("copy");
          });

          $("#btnEncrypt").click(function () {
              var dados = {
                  key: $("#enigmaKey").val(),
                  message: $("#originalMessage").val()
              };

              $.ajax({
                  url: "ajax/encrypt.php",
                  type: "post",
                  dataType: "json",
                  data: dados,
                  success: function (result) {
                      console.log(result);
                      $("#encryptedMessage").val(result.encrypted);
                  },
                  error: function (result) {
                      console.log(result);
                  }
              });
          });
        
          $("#btnEncryptCopy").click(function () {
              $("#encryptedMessage").select();
              document.execCommand("copy");
          });

          $("#btnDecrypt").click(function () {
              var dados = {
                  key: $("#enigmaKey").val(),
                  message: $("#messageToDecrypt").val()
              };

              $.ajax({
                  url: "ajax/decrypt.php",
                  type: "post",
                  dataType: "json",
                  data: dados,
                  success: function (result) {
                      $("#decryptedMessage").val(result.decrypted);
                  },
                  error: function (result) {
                      console.log(result);
                  }
              });
          });

        });
            
      </script>
      ';
    $ret .= '</body>
      </html>
      ';
    return $ret;
  }

  function getModeGadget() {
    $ret = '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>
    ';
    return $ret;
  }

  function getNav() {
    $ret = '<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Enigma Jr</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </header>
      ';
    return $ret;
  }

  function getSidebar() {
    $ret = '<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="key" class="align-text-bottom"></span>
              Generate Key
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="lock" class="align-text-bottom"></span>
              Encrypt Message
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="unlock" class="align-text-bottom"></span>
              Decrypt Message
            </a>
          </li>
        </ul>
      </div>
      </nav>
      ';
    return $ret;
  }

  function getFormKey() {
    $ret = '<h1 class="h2">Enigma Jr Key</h1>
      <form class="mb-4">
        <div class="row">
          <div class="col-9">
            <input class="form-control form-control-lg" type="text" id="enigmaKey" placeholder="Your Enigma Jr Key">
          </div>
          <div class="col-3">
            <button type="button" class="btn btn-primary" id="btnGenerate">Generate</button>
            <button type="button" class="btn btn-secondary" id="btnCopyTheKey">Copy</button>
          </div>
        </div>
      </form>
      ';
    return $ret;
  }

  function getFormEncrypt() {
    $ret = '<h1 class="h2">Encrypt Message</h1>
      <form class="mb-4">
        <div class="row mb-2">
          <div class="col-9">
            <input class="form-control form-control-lg" type="text" id="originalMessage" placeholder="Your message to encrypt">
          </div>
          <div class="col-3">
            <button type="button" class="btn btn-primary" id="btnEncrypt">Encrypt</button>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-9">
            <input class="form-control form-control-lg" type="text" id="encryptedMessage" placeholder="Your message encrypted">
          </div>
          <div class="col-3">
            <button type="button" class="btn btn-primary" id="btnEncryptCopy">Copy</button>
          </div>
        </div>
      </form>
      ';
    return $ret;
  }

  function getFormDecrypt() {
    $ret = '<h1 class="h2">Decrypt Message</h1>
      <form class="mb-4">
        <div class="row mb-2">
          <div class="col-9">
            <input class="form-control form-control-lg" type="text" id="messageToDecrypt" placeholder="Your message to decrypt">
          </div>
          <div class="col-3">
            <button type="button" class="btn btn-primary" id="btnDecrypt">Decrypt</button>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-9">
            <input class="form-control form-control-lg" type="text" id="decryptedMessage" placeholder="Your message decrypted">
          </div>
          <div class="col-3">
            <button type="button" class="btn btn-primary">Copy</button>
          </div>
        </div>
      </form>
      ';
    return $ret;
  }

  function main() {
    $ret .= $this->getModeGadget();
    $ret .= $this->getNav();
    $ret .= '<div class="container-fluid"><div class="row">
      ';
    $ret .= $this->getSidebar();
    $ret .= '
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>

        <div class="starter-template">
          <h1>I am Enigma Jr</h1>
          <p>In World War II, a machine called enigma transformed texts into strange sequences that only those who had the key could understand.
          <br>Now it\'s your turn: create a key, share it with your friends and communicate so that only the person with the key knows what you\'re talking about!</p>
        </div>
      ';
    $ret .= $this->getFormKey();
    $ret .= $this->getFormEncrypt();
    $ret .= $this->getFormDecrypt();
    $ret .= '</main>
      </div></div>
      ';

    return $ret;
  }

  function publica() {
    $ret = '';
    $ret .= $this->abertura();
    $ret .= $this->main();
    $ret .= $this->fechamento();
    return $ret;
  }

}
