<?php

require_once(CONTROLLER.'/AbstractFactory.php');
require_once(OBJECT.'/DataObject.php');
require_once(PANEL.'/General.php');
require_once(WEB.'/BecomeCaptain.php');



class WebActionFactory extends AbstractFactory
{


    function __construct(DataObject $dtObject)
    {
        parent::__construct($dtObject);

    }

    /**
     * <p>Used to get specific functionality model for performing function</p>
     * @return AllCountries|string
     */
    public function getFactoryObject()
    {

        $queryAction = "";
        if (parent::getType() == "be_captain") {

            $queryAction = new BecomeCaptain(parent::getDtObject());

        }



        return $queryAction;

    }



}






?>