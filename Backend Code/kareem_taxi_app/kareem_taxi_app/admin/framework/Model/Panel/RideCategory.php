<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);

class RideCategory extends Constant implements Queries
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
        if ($this->functionalityType == "insert_ride_category") {

            $category_name = $this->postData['category_name'];

            $queryDecorator = new QueryDecorator("INSERT into RideCategory (name) VALUES ('".$category_name."')", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());
            return $this->getResponseObject($this->getSuccess_code(), "Data Insert Successfully", "0", "0", $listOfData, "");

        }

    }

    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "retrieve_all_ride_categories") {

//            $category_id = $postdata['category_id'];
            $search = $postdata['search'];

            //order by country.id DESC

            $queryDecorator = new QueryDecorator("SELECT ride_category.*,ride_category.name as name, ride_category.enable as enable FROM RideCategory as ride_category", new CustomQuery("0", " "));

            if (!empty($search)){

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "Where name LIKE '$search%'"));

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

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0", "order by id DESC LIMIT 10  "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'enable' => $row['enable']
                ]);

            }




            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));


        }
        else if ($this->functionalityType == "pagination") {

//            $category_id = $postdata['category_id'];
            $search = $postdata['search'];
            $offset = $postdata['offset'];

            $queryDecorator = new QueryDecorator("SELECT ride_category.*,ride_category.name as name, ride_category.enable as enable FROM RideCategory as ride_category", new CustomQuery("0", " "));

            if (!empty($search)){

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "Where name LIKE '$search%'"));

            }



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0", "order by id DESC LIMIT 10 OFFSET ".$offset));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'enable' => $row['enable']
                ]);

            }




            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }
        else if ($this->functionalityType == "retrieve_edit_ride_categories") {


            $id = $postdata['id'];



            $queryDecorator = new QueryDecorator("SELECT ride_category.*,ride_category.name as name, ride_category.enable as enable FROM RideCategory as ride_category", new CustomQuery("0", " WHERE id= '$id' "));


            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'enable' => $row['enable']
                ]);

            }




            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }


    }

    public function update()
    {
        $listOfData = [];
        $postdata = $this->postData;
        if ($this->functionalityType == "update_ride_category") {

            $category_name = $this->postData['category_name'];
            $id = $postdata['id'];

            $queryDecorator = new QueryDecorator("UPDATE RideCategory set name = '".$category_name."'  where id = '".$id."'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());
            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData, "");


        }
        else if ($this->functionalityType=="enable_ride_category"){

            $enable = $this->postData['enable'];
            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator( "UPDATE RideCategory set enable = '".$enable."'  where id = '".$id."'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());
            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData,"");
        }

    }

    public function delete()
    {
        $listOfData = [];
        $postdata = $this->postData;
        if ($this->functionalityType == "delete_ride_category") {

            $id = $postdata['id'];

            $queryDecorator = new QueryDecorator( "DELETE FROM RideCategory where id = '".$id."'", new CustomQuery("0", " "));
            $res = queryRunner($queryDecorator->getQuery());

            return $this->getResponseObject($this->getSuccess_code(), "Data Delete Successfully", "0", "0", $listOfData, "");

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