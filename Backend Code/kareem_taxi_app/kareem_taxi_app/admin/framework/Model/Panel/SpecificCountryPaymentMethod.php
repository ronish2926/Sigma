<?php


class SpecificCountryPaymentMethod extends Constant implements Queries
{
    private $dtObject;
    private $actionType = "";
    private $functionalityType = "";
    private $postData = [];
    private $fileData;

    function __construct(DataObject $dtObject)
    {

        parent::__construct();
        $this->dtObject = $dtObject;
        $this->actionType = $dtObject->getActionType();
        $this->functionalityType = $dtObject->getFunctionalityType();
        $this->postData = $dtObject->getPostData();
        $this->fileData = $dtObject->getFileData();


    }

    public function create()
    {

        if ($this->functionalityType == "insert_payment_method") {

            $country_id = $this->postData['country_id'];
            $payment_id = $this->postData['payment_id'];


            $queryDecorator = new QueryDecorator("INSERT into PaymentType (country_id,payment_method_id) VALUES ('".$country_id."','".$payment_id."')", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());


        }

    }

    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "retrieve_all_payment_method") {

            $country_id = $postdata['country_id'];
            $search = $postdata['search'];

            //payment_type.country_id = '".$country_id."' AND

            $queryDecorator = new QueryDecorator("SELECT payment_type.id ,payment_method.name , payment_method.enable  
FROM PaymentType as payment_type
INNER JOIN PaymentMethod as payment_method ON payment_method.id = payment_type.payment_method_id
WHERE payment_type.enable = '0'
 
    ", new CustomQuery("0", " "));


            if (isset($country_id)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " AND payment_type.country_id = '".$country_id."' "));

            }


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  order by payment_type.id ASC "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'enable' => $row['enable']
                ]);

            }

            $rowCount = countRow($result);
            if ($rowCount > 10) {
                $rowCount = $rowCount / 10;
            }


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));


        }
        else if ($this->functionalityType == "pagination") {

            $country_id = $postdata['country_id'];
            $search = $postdata['search'];
            $offset = $postdata['offset'];

            $queryDecorator = new QueryDecorator("SELECT payment_type.id ,payment_method.name , payment_method.enable  
FROM PaymentType as payment_type
INNER JOIN PaymentMethod as payment_method ON payment_method.id = payment_type.payment_method_id
WHERE payment_type.enable = '0'"
                , new CustomQuery("0", ""));

            if (isset($country_id)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " AND payment_type.country_id = '".$country_id."' "));

            }

           /* if (isset($search)) {

                $and_condition = "";

                if (isset($country_id)) {
                    $and_condition = " AND ";
                }

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", $and_condition . " search_column_name = '$search' "));

            }*/

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " OFFSET = '$offset' "));
            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " order by id DESC "));

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


    }

    public function update()
    {

        if ($this->functionalityType == "update_payment_method") {

            $payment_id = $this->postData['payment_id'];
            $country_id = $this->postData['country_id'];
            $id = $_GET['id'];

            $queryDecorator = new QueryDecorator("UPDATE PaymentType set payment_method_id = '".$payment_id."' where id = '".$id."'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

        }


    }

    public function delete()
    {

        if ($this->functionalityType == "delete_payment_method") {

            $id = $_GET['id'];

            $queryDecorator = new QueryDecorator("DELETE FROM PaymentType where id = '".$id."'", new CustomQuery("0", " "));
            $res = queryRunner($queryDecorator->getQuery());

        }


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