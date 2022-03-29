<?php


  
 class DataObject {

 	  private $factoryType="";	
	  private $actionType="";
	  private $requestType="";
	  private $functionalityType="";
	  private $randomId = "";
	  private $panelType = "";
        private $postData;
        private $fileData;

     /**
      * @return string
      */
     public function getPanelType()
     {
         return $this->panelType;
     }

     /**
      * @param string $panelType
      */
     public function setPanelType($panelType)
     {
         $this->panelType = $panelType;
     }



	  public function getFactoryType(){
	   return $this->factoryType;
	  }

	  public function setFactoryType($factoryType){
	    $this->factoryType = $factoryType;
	  }

     public function getRandomId()
     {
         return $this->randomId;
     }


     public function setRandomId($randomId)
     {
         $this->randomId = $randomId;
     }

	  public function getActionType(){
	   return $this->actionType;
	  }

	  public function setActionType($type){
	    $this->actionType = $type;
	  }

	  public function getRequestType(){
	   return $this->requestType;
	  }

	  public function setRequestType($type){
	    $this->requestType = $type;
	  }

	  public function getFunctionalityType(){
	   return $this->functionalityType;
	  }

	  public function setFunctionalityType($type){
	    $this->functionalityType = $type ;
	  }

	  public function getPostData(){
	   return $this->postData;
	  }

	  public function setPostData($postData){
	    $this->postData = $postData;
	  }

     /**
      * @return mixed
      */
     public function getFileData()
     {
         return $this->fileData;
     }

     /**
      * @param mixed $fileData
      */
     public function setFileData($fileData)
     {
         $this->fileData = $fileData;
     }

 }






?>