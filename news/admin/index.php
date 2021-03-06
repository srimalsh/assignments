<?php
session_start();
// session_unset();
// session_destroy();


error_reporting(E_ERROR | E_WARNING | E_PARSE);

define('ALLOW_API','CLIQUE$#%');
require_once('../api/includes.php');

$api = new API();
$tableData = $api->processAPI_GET('getAllNews',['a','b'],'array');

echo '<pre>';
    print_r($tableData);
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News BackEnd | PHP</title>

    <link href="./css/styles.css" rel="stylesheet" />
</head>

<body>

    <div class="container-full">

        <?php include_once('./templates/admin.sidemenu.php'); ?>

        <div class="wrapper-content-area">
      
            <!-- tables -->
            <div class="content-box">
                <?php include_once('./templates/articles.table.php'); ?>
            </div>

        </div>

    </div>

</body>

</html>