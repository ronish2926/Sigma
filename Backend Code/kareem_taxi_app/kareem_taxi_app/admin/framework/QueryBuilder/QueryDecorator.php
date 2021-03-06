<?php

require_once('QueryBuilderAbstract.php');


class QueryDecorator extends QueryBuilderAbstract
{
    public $custom_query;

    public function __construct($custom_query, QueryBuilderInterface $query)
    {
        parent::__construct($query);
        $this->custom_query = $custom_query;
    }

    function getQuery()
    {
        if (parent::getType() != "0") {

            $mainQuery = parent::getQuery();

            return str_replace('SELECT', $mainQuery, $this->custom_query);

        } else {
            return $this->custom_query . parent::getQuery();
        }

    }

    function getType()
    {
        return parent::getType(); // TODO: Change the autogenerated stub
    }


}


?>