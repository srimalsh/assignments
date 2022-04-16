<?php

class Authenticator{

    public $params = null;
    public $returnType = 'json';
    public $serviceName = null;    
    private $request = null;
    private $resultData;

    function __construct(){
        $this->validateRequest();
    }

    public function processAPI($getRequestArray=null,$returnType='json'){

        $this->extractRequest($getRequestArray,$returnType);
        
        try {
            $api = new API();
            
            #$rMethod = new reflectionMethod('API', $this->serviceName);
            $rMethod = new reflectionMethod($api, $this->serviceName);
            if(!method_exists($api, $this->serviceName)) {
                $this->throwError(501, "API does not exist for the requested service");
            }

            if($returnType=='array'){
                $this->resultData = $rMethod->invoke($api);
            }
            
            $rMethod->invoke($api);            

        } catch (Exception $e) {
            $this->throwError(501, $e->getMessage() + "API does not exist.");
        }
        
    }

    public function data(){
        return $this->resultData;
    }

    private function validateRequest(){
            
        if(strtolower($_SERVER['REQUEST_METHOD'])=='post'){                
            
            if($_POST['service']==null || $_POST['service']=='' || !isset($_POST['service'])){
                $this->throwError(403,'Invalid API Service Request');
            }
        }
        
    }

    private function extractRequest($getRequestArray,$returnType){        
        
        if(strtolower($_SERVER['REQUEST_METHOD'])=='post'){

            $this->request = $_POST;
            $this->params = $_POST;
            $this->serviceName = $_POST['service'];            

        }else if(strtolower($_SERVER['REQUEST_METHOD'])=='get'){
            
            if($getRequestArray!=null){
                $this->returnType = $returnType;
                $this->params = $getRequestArray;
                $this->serviceName = $getRequestArray['service'];
            }

        }else{
            $this->throwError(403,'Invalid Request Method');
        }

        //$this->sendResponse(200,$_SERVER['REQUEST_METHOD']);

    }

    function sendResponse($statusCode,$return_array){
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode(['result'=>$return_array]);
        exit();
    }

    function sendArrayResponse($return_array){
        return $return_array;
    }
    
     function throwError($code,$message){
         $error = ['error'=>['status'=>$code,'message'=>$message]];
         $this->sendResponse($code,$error);         
     }
}

?>