<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('ALLOW_API','CLIQUE$#%');
require_once('./includes.php');

$api = new API();
$api->processAPI();



?>