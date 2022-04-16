<?php

class Authenticator{

    public $params = null;
    protected $serviceName = null;
    private $request = null;

    function __construct(){                
        //$this->validateRequest($_SERVER['CONTENT_TYPE'],$_SERVER['REQUEST_METHOD']);
        $this->validateRequest();
    }

    public function processAPI($getRequestArray=null,$returnType='json'){
        
        try {
            $api = new API();
            
            $rMethod = new reflectionMethod('API', $this->serviceName);
            //$rMethod = new reflectionMethod('$api', $this->serviceName);
            if(!method_exists($api, $this->serviceName)) {
                $this->throwError(501, "API does not exist for the requested service");
            }

            if($returnType=='array'){
                $this->resultData = $rMethod->invoke($api);
            }
            
            //$rMethod->invoke($api,$getRequestArray);
            $rMethod->invoke($api);

        } catch (Exception $e) {
            $this->throwError(501, $e->getMessage() + "API does not exist.");
        }

    }

    private function validateRequest($contentType='',$reqMethod=''){
            
            if(strtolower($_SERVER['REQUEST_METHOD'])=='post'){
                
                if($_POST['service']==null || $_POST['service']=='' || !isset($_POST['service'])){
                    $this->throwError(403,'Invalid API Service Request');
                }
            }

            $this->extractRequest();
    }

    private function extractRequest(){
        if(strtolower($_SERVER['REQUEST_METHOD'])=='post'){

            $this->request = $_POST;
            $this->params = $_POST;
            $this->serviceName = $_POST['service'];

        }else if(strtolower($_SERVER['REQUEST_METHOD'])=='get'){

            $this->params = $_GET;
            $this->serviceName = $_GET['service'];

        }else{
            $this->throwError(403,'Invalid Request Method');
        }
    }

    function sendResponse($statusCode,$return_array){
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode(['result'=>$return_array]);
        exit();
    }
    
     function throwError($code,$message){
         $error = ['error'=>['status'=>$code,'message'=>$message]];
         $this->sendResponse($code,$error);         
     }
}

?>