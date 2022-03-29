<?php

require_once('AbstractFactory.php');
require_once('Object/DataObject.php');
require_once('Model/Panel/General.php');


class AppActionFactory extends AbstractFactory
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



        return $queryAction;

    }



}






?>