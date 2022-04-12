<?php

class Authenticator{

    protected $params = null;
    protected $serviceName = null;
    private $request = null;

    function __construct(){        
        $this->validateRequest($_SERVER['CONTENT_TYPE'],$_SERVER['REQUEST_METHOD']);
    }

    public function processAPI(){
        try {
            $api = new API();
            
            $rMethod = new reflectionMethod('API', $this->serviceName);
            if(!method_exists($api, $this->serviceName)) {
                $this->throwError(501, "API does not exist for the requested service");
            }
            $rMethod->invoke($api);

        } catch (Exception $e) {
            $this->throwError(501, $e->getMessage() + "API does not exist.");
        }   
    }

    private function validateRequest($contentType='',$reqMethod=''){
        $this->sendResponse(200,$_SERVER);

        /*if($_SERVER['CONTENT_TYPE']!='application/json'):
            $this->throwError(403,'Invalid Content Type,Only JSON is accepted');
        endif;
        
        //$content = file_get_contents('php://input');
        //$requestData = json_decode($content,true);
        */

        if((strtolower($_SERVER['REQUEST_METHOD'])=='post') || strtolower($_SERVER['REQUEST_METHOD'])=='get'){            

            $requestData = $_REQUEST;            

            if($requestData['service']==null || $requestData['service']=='' || !isset($requestData['service'])){
                $this->throwError(403,'Invalid API Service Request');
            }
            
            if(strtolower($_SERVER['REQUEST_METHOD'])=='post'){
                if(!is_array($requestData['data']) || !isset($requestData['data'])){
                    $this->throwError(403,'No data provided to process the request');
                }
            }

            $this->request = $requestData;
            $this->extractRequest();
            
        }else{
            $this->throwError(403,'Invalid Request Method');
        }
        
    }

    private function extractRequest(){
        $this->params = $this->request['data'];
        $this->serviceName = $this->request['service'];
        //$this->sendResponse($this->request);
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