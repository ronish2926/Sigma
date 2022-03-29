<?php


define("PROJECT_ROOT",dirname(dirname(dirname(__FILE__))));

define("CONFIG",PROJECT_ROOT."/config.php");
define("FRAME_WORK",PROJECT_ROOT."/admin/framework");
define("PUB",PROJECT_ROOT."/public");
define("UPLOADS",PUB."/uploads");

define("CONTROLLER",FRAME_WORK."/Controller");
define("MODEL",FRAME_WORK."/Model");
define("WEB",MODEL."/Web");
define("PANEL",MODEL."/Panel");
define("DRIVER",PANEL."/DriverPanel");

define("UTILITY",FRAME_WORK."/Utility");
define("QUERY_BUILDER",FRAME_WORK."/QueryBuilder");
define("OBJECT",FRAME_WORK."/Object");

require_once(CONTROLLER.'/PanelActionFactory.php');
require_once(CONTROLLER.'/FactoryProducer.php');
require_once(CONTROLLER.'/AbstractFactory.php');
require_once(OBJECT.'/DataObject.php');
require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');


$action_type="";
$request_type="";
$functionality_type="";
$panel_type="";


if (!empty($_GET['action_type'])){
    $action_type = $_GET['action_type'];
}

if (!empty($_GET['request_type'])){
    $request_type = Utility::replaceEmpty($_GET['request_type']);
}

if (!empty($_GET['functionality_type'])){
    $functionality_type = Utility::replaceEmpty($_GET['functionality_type']);

}


if ( empty($_GET['action_type']) || empty($_GET['request_type']) || empty($_GET['functionality_type']) ){
    return;
}
if (!empty($_GET['panel_type'])){
    $panel_type = Utility::replaceEmpty($_GET['panel_type']);
}

if (isset($_GET['id']))
    $random_id = Utility::replaceEmpty($_GET['id']);
else {
    $random_id = "0";
}

$dataObject = new DataObject();
//$dataObject->setFactoryType("Panel");
if(empty($panel_type)){
    $dataObject->setFactoryType("Panel");
}else {
    $dataObject->setFactoryType($panel_type);
}


//$dataObject->setFactoryType($panel_type);
$dataObject->setActionType($action_type);
$dataObject->setRequestType($request_type);
$dataObject->setFunctionalityType($functionality_type);
$dataObject->setPanelType($panel_type);
$dataObject->setRandomId($random_id);
$dataObject->setPostData($_POST);
$dataObject->setFileData($_FILES);

$abstractFactory=FactoryProducer::getFactory($dataObject);
$actionFactory=$abstractFactory->getFactoryObject();
$responceObject = null;

if ($dataObject->getActionType() == "retrieve") {
    $responceObject = $actionFactory->retrieve();
	
}

else if ($dataObject->getActionType() == "create") {

    $responceObject = $actionFactory->create();
	
}

else if ($dataObject->getActionType() == "update") {
    $responceObject = $actionFactory->update();
}

else if ($dataObject->getActionType() == "delete") {
    $responceObject = $actionFactory->delete();
	
}

if ($responceObject != null) {
    echo json_encode($responceObject);
}




?>