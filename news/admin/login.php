<?php
session_start();
define('ALLOW_API','CLIQUE$#%');
require_once('../api/includes.php');

$login = new Login();

print_r($_SESSION);

if($login->isLoggedIn()){
    header('location:index.php');
}


if(isset($_POST['service']) && $_POST['service']=='login'){     
     $valid = $login->doLogin($_POST['username'],$_POST['password']);     
     if($valid){         
         header('location:index.php');
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News BackEnd</title>

    <link href="./css/styles.css" rel="stylesheet" />
</head>

<body>

    <div class="container-full">

        <div class="login-wrapper">

            <div class="content-box">
                <div class="form-wrapper-generic">

                    <form action="<?= $_SERVER['PHP_SELF']; ?>" id="testForm" method="post">
                        <input type="hidden" name="service" value="login">
                        
                        <label for="username">User Name:</label><br>
                        <input type="text" id="username" name="username"><br>
                        
                        <label for="password">Password:</label><br>
                        <input type="text" id="password" name="password"><br>

                        <input type="submit" value="Submit">

                    </form>

                </div>
            </div>

        </div>

    </div>

</body>

</html>