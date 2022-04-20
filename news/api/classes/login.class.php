<?php

class Login extends Database{

    function doLogin($username,$password){

        if(empty($username)){
            return false;
        }

        if(empty($password)){
            return false;
        }

        $SQL = "SELECT * FROM users WHERE username='".$this->clean($username)."' AND userpass='".md5($password)."'";
        $res = $this->result($SQL);
        
        if(is_array($res)){
            $_SESSION['logged'] = true;
            return $res;
        }else{
            return false;
        }                
    }

    function isLoggedIn(){
        if(isset($_SESSION['logged']) && $_SESSION['logged']!=false){
            echo 'logged';
            return true;
        }
        echo 'NOT logged';
        return false;
    }

}

?>