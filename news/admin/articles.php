<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

define('ALLOW_API','CLIQUE$#%');
require_once('../api/includes.php');

$api = new API();
$isEditMode = false;

if(isset($_GET['action']) && $_GET['action']=='edit' ){
    $dataArray = $api->processAPI_GET('getNews',['id'=>$_GET['id']],'array');
    $isEditMode = true;
}else{
    $dataArray = $api->processAPI_GET('getAllNews',[],'array');
}

//$dataArray = $api->processAPI_GET('getAllNews',[],'obj');
// echo '<pre>';
//     print_r($dataArray);
// echo '</pre>';

?>

<?php include_once('./templates/admin.topheader.php'); ?>

<body>

    <div class="container-full">

        <?php include_once('./templates/admin.sidemenu.php'); ?>

        <div class="wrapper-content-area">
            <!-- form -->
            <div>

                <?php include_once('./templates/articles.form.php'); ?>

            </div>

            <!-- tables -->
            <div class="content-box">
                <?php include_once('./templates/articles.table.php'); ?>
            </div>

        </div>

    </div>

    <script src="js/article.js"></script>

    <?php include_once('./templates/admin.footer.php'); ?>