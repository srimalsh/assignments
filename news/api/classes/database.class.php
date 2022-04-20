<?php

if(!defined('ALLOW_API') || ALLOW_API!='CLIQUE$#%') {
    die('Direct access not permitted');
}

class Database{
    private $connection = null;

    function __construct(){        
        $this->openConnection();        
    }

    private function openConnection(){
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWD,DB_DATABASE);
        if($conn->connect_error){
            die("failed to connect : ".$conn->connect_error);
        }
        $this->connection = $conn;
    }

    function result($SQL){
        $result =  $this->connection->query($SQL);
        $count = 0;
        $return = array();

        if ($result->num_rows > 0) {        
            while($row = $result->fetch_assoc()) {                
                $return[$count] = $row;
                $count++;
            }

            return $return;

        } else {
            return false;
        }       
    }

    function result_raw($SQL){
        return $this->connection->query($SQL);
    }

    function save($SQL){
        if($result=$this->connection->query($SQL)){
           return $result;
        }else{
            return false;
        }
    }

    function clean($SQL){
        return $this->connection->real_escape_string($SQL);
    }

    function __destruct(){       
        if($this->connection!=null){
            $this->connection->close();
        }
    }

    // function str_validate_required($paraName,$str){
    //     if(!isset($data['title']) || $data['title']==''){
    //         $isValid = false;
    //         $message .= "Title is required";
    //     }
    // }
}

?>