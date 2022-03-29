<?php

require_once('QueryBuilderInterface.php');

abstract class QueryBuilderAbstract implements QueryBuilderInterface
{
    protected $query;
    protected $type;
    protected $customQueryReplacement;

    public function __construct(QueryBuilderInterface $query)
    {
        $this->query = $query;
    }


    function getQuery()
    {
        return $this->query->getQuery();
    }

    function getType()
    {
        return $this->query->getType();
    }

    public function getCustomQueryReplacement()
    {
        return $this->query->getCustomQueryReplacement();
    }


}


?>