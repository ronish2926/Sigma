<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);


class AllCountries extends Constant implements Queries
{
    private $dtObject;
    private $actionType = "";
    private $functionalityType = "";
    private $postData = [];

    function __construct(DataObject $dtObject)
    {

        parent::__construct();
        $this->dtObject = $dtObject;
        $this->actionType = $dtObject->getActionType();
        $this->functionalityType = $dtObject->getFunctionalityType();
        $this->postData = $dtObject->getPostData();


    }

    public function create()
    {
        $listOfData = [];
        $postdata = $this->postData;


        if ($this->functionalityType == "insert_country") {

            $country_name = $this->postData['country_name'];
            $country_percentage = $this->postData['country_percentage'];
            $currency_name = $this->postData['currency_name'];
            $currency_symbol = $this->postData['currency_symbol'];
            $payMethod = $this->postData['pay_method'];
//            UTILITY::LoggerArray($payMethod);

            $queryDecorator = new QueryDecorator("INSERT into Country (name,percentage) VALUES ('" . $country_name . "','" . $country_percentage . "')", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

            $country_id = findLastInsertId();
            $queryDecorator = new QueryDecorator("INSERT into Configuration (country_id,currency_name,currency_symbol) VALUES ('" . $country_id . "','" . $currency_name . "','" . $currency_symbol . "')", new CustomQuery("0", " "));

            $run = queryRunner($queryDecorator->getQuery());
            if(is_array($payMethod)){
                foreach ($payMethod as $value) {
                    $queryDecorator = new QueryDecorator("INSERT into PaymentType (country_id,payment_method_id) VALUES ('$country_id','$value')", new CustomQuery("0", " "));
                    $run = queryRunner($queryDecorator->getQuery());
                }

            }

            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");

        }


    }

    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "retrieve_all_countries") {

//            $category_id = $postdata['category_id'];
            $search = $postdata['search'];

            //order by country.id DESC

            $queryDecorator = new QueryDecorator("SELECT country.*,country.name as cou_name,configuration.currency_name , configuration.currency_symbol
              FROM Country as country 
              INNER JOIN Configuration as configuration ON configuration.country_id = country.id
              ", new CustomQuery("0", " "));


            if (!empty($search)){

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " AND country.name LIKE '$search%'"));

            }

            //<editor-fold desc="Total Data Counting functionality">

            $queryDecoratorCount = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("1", "SELECT count(*) as total_count ,"));
            $result = queryRunner($queryDecoratorCount->getQuery());
            $rowObject = rowRetrieverObject($result);
            $rowCount = $rowObject->total_count;
            if ($rowCount > 10) {
                $rowCount = ceil($rowCount / 10);
            }
            else{
                $rowCount = 1;
            }


            //</editor-fold>



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0", " LIMIT 10  "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['cou_name'],
                    'percentage' => $row['percentage'],
                    'currency_name' => $row['currency_name'],
                    'currency_symbol' => $row['currency_symbol'],
                    'enable' => $row['enable']
                ]);

            }

//            $rowCount = countRow($result);
//            if ($rowCount > 10) {
//                $rowCount = $rowCount / 10;
//            }


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));


        }
        else if ($this->functionalityType == "pagination") {

//            $category_id = $postdata['category_id'];
            $search = $postdata['search'];
            $offset = $postdata['offset'];

            $queryDecorator = new QueryDecorator("SELECT country.*,configuration.currency_name , configuration.currency_symbol
              FROM Country as country 
              INNER JOIN Configuration as configuration ON configuration.country_id = country.id", new CustomQuery("0", ""));

            if (!empty($search)){

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " AND country.name LIKE '$search%'"));

            }

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0", " LIMIT 10 OFFSET  ".$offset));
            $result = queryRunner($queryDecorator->getQuery());

            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'percentage' => $row['percentage'],
                    'currency_name' => $row['currency_name'],
                    'currency_symbol' => $row['currency_symbol'],
                    'enable' => $row['enable']
                ]);

            }


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }
        else if ($this->functionalityType == "retrieve_edit_countries") {

//            $category_id = $postdata['category_id'];
            $id = $postdata['id'];

            //order by country.id DESC

            $queryDecorator = new QueryDecorator("SELECT country.*,country.name as cou_name,configuration.currency_name , configuration.currency_symbol
              FROM Country as country 
              INNER JOIN Configuration as configuration ON configuration.country_id = country.id
              WHERE country.id ='$id'
              ", new CustomQuery("0", " "));








            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0", ""));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['cou_name'],
                    'percentage' => $row['percentage'],
                    'currency_name' => $row['currency_name'],
                    'currency_symbol' => $row['currency_symbol'],
                    'payment_type' => self::getPaymentMethodType($row['id']),
                    'enable' => $row['enable']
                ]);

            }

//            $rowCount = countRow($result);
//            if ($rowCount > 10) {
//                $rowCount = $rowCount / 10;
//            }


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }


    }

    public function update()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "update_country") {

            $country_name = $this->postData['country_name'];
            $country_percentage = $this->postData['country_percentage'];
            $currency_name = $this->postData['currency_name'];
            $currency_symbol = $this->postData['currency_symbol'];
            $id = $this->postData['id'];
            $paymentMethod = $this->postData['payment_method'];
//            Utility::LoggerArray($paymentMethod);

            $queryDecorator = new QueryDecorator(  "DELETE FROM PaymentType where country_id = '".$id."'", new CustomQuery("0", " "));
            $res = queryRunner($queryDecorator->getQuery());

            if(is_array($paymentMethod)){
                foreach ($paymentMethod as $value) {
                    $queryDecorator = new QueryDecorator("INSERT into PaymentType (country_id,payment_method_id) VALUES ('$id','$value')", new CustomQuery("0", " "));
                    $run = queryRunner($queryDecorator->getQuery());
                }

            }

            $queryDecorator = new QueryDecorator( "UPDATE Country set name = '" . $country_name . "' , percentage = '" . $country_percentage . "'   where id = '" . $id . "'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

            $queryDecorator = new QueryDecorator( "UPDATE Configuration set currency_name = '" . $currency_name . "' , currency_symbol = '" . $currency_symbol . "'   where country_id = '" . $id . "'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());
            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");
        }
        else if ($this->functionalityType=="enable_country"){

            $enable = $this->postData['enable'];
            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator( "UPDATE Country set enable = '" . $enable . "'   where id = '" . $id . "'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

        }


    }

    public function delete()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "delete_country") {

            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator(  "DELETE FROM Country where id = '".$id."'", new CustomQuery("0", " "));
            $res = queryRunner($queryDecorator->getQuery());

            return $this->getResponseObject($this->getSuccess_code(), "Data delete Successfully", "0", "0", $listOfData, "");

        }

    }

    public function getPaymentMethodType($id){
        $listOfData = [];
        $queryDecorator = new QueryDecorator("SELECT * FROM PaymentType WHERE country_id ='$id'
              ", new CustomQuery("0", " "));

        $result = queryRunner($queryDecorator->getQuery());
        while ($row = rowRetriever($result)) {

            array_push($listOfData, [
                'id' => $row['id'],
                'payment_method_id' => $row['payment_method_id'],

            ]);

        }
        return $listOfData;
    }

    public function getResponseObject($code, $message, $setId, $itemCount, $data, $pagination)
    {

        $responseObject = new ResponseObject();
        $responseObject->setCode($code);
        $responseObject->setMessage($message);
        $responseObject->setId($setId);
        $responseObject->setListOfData($data);
        $responseObject->setTotalCount($itemCount);
        $responseObject->setPagination($pagination);

        return $responseObject;

    }


}


?>