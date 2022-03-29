<?php


class CustomQuery implements QueryBuilderInterface
{
    private $type;
    private $custom_query;
    private $custom_query_replacement;

    public function __construct($type, $custom_query, $custom_query_replacement=null)
    {

        $this->custom_query = $custom_query;
        $this->type = $type;
        $this->custom_query_replacement = $custom_query_replacement;
    }


    function getQuery()
    {
        return $this->custom_query;
    }

    function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getCustomQueryReplacement()
    {
        return $this->custom_query_replacement;
    }




}


?>