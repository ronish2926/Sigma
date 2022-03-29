<?php

require_once('Utility/Utility.php');
require_once('AbstractFactory.php');
require_once('Object/DataObject.php');
require_once('Controller/PanelActionFactory.php');
require_once('Controller/WebActionFactory.php');
require_once('Controller/AppActionFactory.php');


class FactoryProducer
{


    /**
     *
     * <p>Used to manage all factories including app , panel & web</p>
     *
     * @param DataObject $dataObject
     * @return AppActionFactory|PanelActionFactory|WebActionFactory
     */
    public static function getFactory(DataObject $dataObject)
    {


        $factoryType = $dataObject->getFactoryType();

        if ($factoryType == "Panel" || $factoryType == "driver_panel") {

            $factory = new PanelActionFactory($dataObject);

        } else if ($factoryType == "Web") {

            $factory = new WebActionFactory($dataObject);

        } else if ($factoryType == "App") {

            $factory = new AppActionFactory($dataObject);

        }

        return $factory;

    }


}


?>