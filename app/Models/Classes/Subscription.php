<?php

namespace App\Models\Classes;

use App\Models\Classes\SubscriptionException;
use App\Models\Classes\Core;

class Subscription extends core{
    var $server;
    var $applicationId;
    var $password;
    
    
     

			

    public function __construct($server,$applicationId,$password){
        $this->server = $server;
        $this->applicationId = $applicationId;
        $this->password = $password;
    }
	
    
      public function getStatus($address){
		 
		 $this->server = 'https://developer.bdapps.com/subscription/getstatus';

        $arrayField = array("applicationId" => $this->applicationId,
            "password" => $this->password,
            "subscriberId" => $address
            );

        $jsonObjectFields = json_encode($arrayField);
        return $this->handleResponse2(json_decode($this->sendRequest($jsonObjectFields,$this->server)));
    }
    public function subscribe($subscriberId){
        $arrayField = array(
				        	"applicationId" => $this->applicationId, 
				            "password" => $this->password,
				            "version" => "1.0",
				            "subscriberId" => $subscriberId,
				            "action" => "1"
				        );
        $jsonObjectFields = json_encode($arrayField); 
       file_put_contents('test2.txt',json_decode($this->sendRequest($jsonObjectFields,$this->server)));
       
        return $this->handleResponse(json_decode($this->sendRequest($jsonObjectFields,$this->server)));
    }
	
	public function unsubscribe($subscriberId){
        $arrayField = array(
				        	"applicationId" => $this->applicationId, 
				            "password" => $this->password,
				            "version" => "1.0",
				            "subscriberId" => $subscriberId,
				            "action" => "0"
				        );
        $jsonObjectFields = json_encode($arrayField); 
        return $this->handleResponse(json_decode($this->sendRequest($jsonObjectFields,$this->server)));
    }
    
    	private function handleResponse2($jsonResponse){
	    //file_put_contents('test2.txt',$jsonResponse); 
    
        if(empty($jsonResponse))
       // file_put_contents('error.txt','Invalid Server')
           throw new CassException('Invalid server URL', '500');
        
        $statusCode = $jsonResponse->statusCode;
        $statusDetail = $jsonResponse->statusDetail;
        //$requestId = $jsonResponse->requestId;
        // $subscriptionStatus = $jsonResponse->requestId;
        
        if(!(empty($jsonResponse->subscriptionStatus)))
            return $jsonResponse->subscriptionStatus;
        
        if(strcmp($statusCode, 'S1000')==0)
            return 'ok';
        else
         $myfile = fopen("error.txt", "a+") or die("Unable to open file!");
     fwrite($myfile,$statusCode." ".$statusDetail."\n");
     fclose($myfile);
        //file_put_contents('error.txt',$statusCode);
            //throw new CassException($statusDetail, $statusCode);
    }
	
	private function handleResponse($jsonResponse){
	    //file_put_contents('test2.txt',$jsonResponse); 
    
        if(empty($jsonResponse))
            throw new CassException('Invalid server URL', '500');
        
        $statusCode = $jsonResponse->statusCode;
        $statusDetail = $jsonResponse->statusDetail;
        //$requestId = $jsonResponse->requestId;
        // $subscriptionStatus = $jsonResponse->requestId;
        
        if(!(empty($jsonResponse->subscriptionStatus)))
            return $jsonResponse->statusCode;
        
        if(strcmp($statusCode, 'S1000')==0)
            return $statusCode;
        else
            throw new CassException($statusDetail, $statusCode);
    }
}