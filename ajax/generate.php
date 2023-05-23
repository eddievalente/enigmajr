<?php

require_once('AjaxHandler.php');
$ajaxHandler = new AjaxHandler();
$ret = $ajaxHandler->generateKey(); 
echo $ret; 
