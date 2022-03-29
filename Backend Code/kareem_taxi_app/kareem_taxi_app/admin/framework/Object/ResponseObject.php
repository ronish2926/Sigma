<?php


  
 class ResponseObject {

     public $code="";
     public $message="";
     public $id="";
     public $totalItems="";
     public $pagination;
     public $listOfData=[];
     public $htmlData = "";




     public function getCode(){
	   return $this->code;
	  }

	  public function setCode($code){
	    $this->code = $code;
	  }


	  public function getMessage(){
	   return $this->code;
	  }

	  public function setMessage($message){
	    $this->message = $message;
	  }


	  public function getId(){
	   return $this->id;
	  }

	  public function setId($id){
	    $this->id = $id;
	  }


	  public function getListOfData(){
	   return $this->listOfData;
	  }

	  public function setListOfData($listOfData){
	    $this->listOfData = $listOfData ;
	  }

	  public function getTotalCount(){
		return $this->totalItems;
	   }
 
	   public function setTotalCount($totalItems){
		 $this->totalItems = $totalItems;
	   }

     /**
      * @return string
      */
     public function getTotalItems()
     {
         return $this->totalItems;
     }

     /**
      * @param string $totalItems
      */
     public function setTotalItems($totalItems)
     {
         $this->totalItems = $totalItems;
     }

     /**
      * @return mixed
      */
     public function getPagination()
     {
         return $this->pagination;
     }

     /**
      * @param mixed $pagination
      */
     public function setPagination($pagination)
     {
         $this->pagination = $pagination;
     }





 }






?>