<?php

require_once('AjaxHandler.php');
$key = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_SPECIAL_CHARS);
$originalMessage = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
$ajaxHandler = new AjaxHandler();
$ret = $ajaxHandler->encrypt($originalMessage, $key); 
echo $ret; 
