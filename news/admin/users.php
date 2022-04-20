<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

define('ALLOW_API','CLIQUE$#%');
require_once('../api/includes.php');

$api = new API();
$isEditMode = false;
$isAddMode = false;
$isListMode = false;

if(isset($_GET['action']) && $_GET['action']!=''){

    switch($_GET['action']){
        case 'add':
            $isAddMode = true;
        break;

        case 'edit':
            $dataArray = $api->processAPI_GET('getNews',['id'=>$_GET['id']],'array');
            $isEditMode = true;
        break;

        case 'filter':
            $dataArray = $api->processAPI_GET('searchNews',['searchFrom'=>$_GET['searchFrom'],'searchTo'=>$_GET['searchTo']],'array');
            $isListMode = true;
        break;

        default:
            $isListMode = true;
        break;
    }
    
}else{
    $isListMode = true;
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
            <div class="content-header-highlight">
                <h3><a href="users.php">Manage Users</a></h3>
            </div>

            <!-- form -->
            <?php if($isEditMode || $isAddMode): ?>
            <div>
                <?php include_once('./templates/users.form.php'); ?>
            </div>
            <?php endif; ?>

            <!-- tables -->
            <?php if($isListMode): ?>
            <div>
                <?php include_once('./templates/articles.table.php'); ?>
            </div>
            <?php endif; ?>

        </div>

    </div>

    <script src="js/article.js"></script>

    <?php include_once('./templates/admin.footer.php'); ?>