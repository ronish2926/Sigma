<?php

require_once ('Object/DataObject.php');

abstract class AbstractFactory
{
    protected $dtObject;
    protected $type = "";

    /**
     * AbstractFactory constructor.
     * @param $dtObject
     */
    public function __construct(DataObject $dtObject)
    {
        $this->dtObject = $dtObject;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->dtObject->getRequestType();
    }

    /**
     * @return mixed
     */
    public function getDtObject()
    {
        return $this->dtObject;
    }



    abstract public function getFactoryObject();
}


?>