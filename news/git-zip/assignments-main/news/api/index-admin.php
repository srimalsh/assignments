<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

define('ALLOW_API','CLIQUE$#%');

require_once('./conf/conf.php');
require_once('./classes/authenticator.class.php');
require_once('./classes/api.php');
require_once('./classes/database.class.php');
require_once('./classes/news.class.php');

//getAllNews
$api = new API();
$api->processAPI();

/*
https://stackoverflow.com/questions/166221/how-can-i-upload-files-asynchronously-with-jquery#:~:text=You%20can%20upload%20files%20with,sent%20with%20XMLHttpRequest%20(Ajax).

*/






?>