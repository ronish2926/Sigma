<?php

require_once('Model/Queries.php');
require_once('Utility/Utility.php');
require_once('Object/DataObject.php');
require_once('Object/ResponseObject.php');
require_once('QueryBuilder/QueryDecorator.php');
require_once('QueryBuilder/CustomQuery.php');

 class General implements Queries {
   private $dtObject;
   private $actionType="";
   private $functionalityType="";
   private $postData = []; 
  

 	function __construct(DataObject $dtObject){

		Utility::Logger("Brand File Constructor Running");

 		$this->dtObject = $dtObject;
 		$this->actionType = $dtObject->getActionType();
 		$this->functionalityType = $dtObject->getFunctionalityType();
 		$this->postData = $dtObject->getPostData();
 		
 		
 	

 	}




 	public function create(){


 	}

	public function retrieve(){
		$listOfData = [];
		$queryDecorator = new QueryDecorator("SELECT * FROM Brand",new CustomQuery("0",""));
		// $queryDecorator = new QueryDecorator("SELECT * FROM Brand",new CustomQuery("1","{select Count(*) from brand where id = '1'} as itemCount, "));
		// $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0"," WHERE id = '1' "));
		
		Utility::Logger($queryDecorator->getQuery());
		return $this->getResponseObject("202","Data Retrieve Successfully","1","0",$listOfData);
	}

	public function update(){



	}

	public function delete(){



	}


	public function getResponseObject($code,$message,$setId,$itemCount,$data){

		$responseObject = new ResponseObject();
		$responseObject->setCode($code);
		$responseObject->setMessage($message);
		$responseObject->setId($setId);
		$responseObject->setListOfData($data);
		$responseObject->setTotalCount($itemCount);

		return $responseObject;

	}






 }



?>