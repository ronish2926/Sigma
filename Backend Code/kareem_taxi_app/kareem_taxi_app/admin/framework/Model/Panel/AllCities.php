<?php


require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);

class AllCities extends Constant implements Queries
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
        if ($this->functionalityType == "insert_city") {

            $country_id = $this->postData['country_id'];
            $city_name = $this->postData['city_name'];
//            $city_latitude = $this->postData['city_latitude'];
//            $city_longitude = $this->postData['city_longitude'];

            $queryDecorator = new QueryDecorator("INSERT into Location (country_id,name) VALUES ('".$country_id."','".$city_name."')", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());
            return $this->getResponseObject($this->getSuccess_code(), "Data Insert Successfully", "0", "0", $listOfData, "");

        }

    }

    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "retrieve_all_cities") {

            $country_id = $postdata['country_id'];
            $search = $postdata['search'];

            //order by id DESC

            $queryDecorator = new QueryDecorator("SELECT cou.*,cou.name as cou_name,loc.*,loc.id as ids,loc.name as name , loc.enable as enable FROM Location as loc INNER JOIN  Country as cou ON cou.id = loc.country_id", new CustomQuery("0", " "));

            if (!empty($country_id) || !empty($search)) {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " WHERE "));
            }

            if (!empty($country_id)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  loc.country_id = '$country_id' "));

            }

            if (!empty($search)) {

                $and_condition="";

                if (!empty($category_id)){
                    $and_condition=" AND ";
                }

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", $and_condition." loc.name LIKE '$search%' "));

            }

            //<editor-fold desc="Total Data Counting functionality">

            $queryDecoratorCount = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("1", "SELECT count(*) as total_count ,"));
            $result = queryRunner($queryDecoratorCount->getQuery());
//            Utility::Logger("pagination ".$queryDecoratorCount->getQuery());
            $rowObject = rowRetrieverObject($result);
            $rowCount = $rowObject->total_count;
            if ($rowCount > 10) {
                $rowCount = ceil($rowCount / 10);
            }
            else{
                $rowCount = 1;
            }


            //</editor-fold>

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " order by ids DESC LIMIT 10 "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['ids'],
                    'name' => $row['name'],
                    'cou_name' => $row['cou_name'],

                    'enable' => $row['enable']
                ]);

            }



            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));


        }
        else if ($this->functionalityType == "pagination") {

            $country_id = $postdata['country_id'];
            $search = $postdata['search'];
            $offset = $postdata['offset'];



            //order by id DESC

            $queryDecorator = new QueryDecorator("SELECT cou.*,cou.name as cou_name,loc.*,loc.id as ids,loc.name as name , loc.enable as enable FROM Location as loc INNER JOIN  Country as cou ON cou.id = loc.country_id", new CustomQuery("0", " "));

            if (!empty($country_id) || !empty($search)) {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " WHERE "));
            }

            if (!empty($country_id)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  loc.country_id = '$country_id' "));

            }

            if (!empty($search)) {

                $and_condition="";

                if (!empty($category_id)){
                    $and_condition=" AND ";
                }

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", $and_condition." loc.name LIKE '$search%' "));

            }


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " order by ids DESC  "));
            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "LIMIT 10 OFFSET ".$offset));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['ids'],
                    'name' => $row['name'],
                    'cou_name' => $row['cou_name'],

                    'enable' => $row['enable']
                ]);

            }



            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }
        else if ($this->functionalityType == "retrieve_edit_all_cities") {


            $id = $postdata['id'];

            //order by id DESC

            $queryDecorator = new QueryDecorator("SELECT cou.*,cou.id as cou_id,cou.name as cou_name,loc.*,loc.id as ids,loc.name as name , loc.enable as enable FROM Location as loc INNER JOIN  Country as cou ON cou.id = loc.country_id WHERE loc.id = '$id'", new CustomQuery("0", " "));


            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['ids'],
                    'name' => $row['name'],
                    'cou_name' => $row['cou_name'],
                    'cou_id' => $row['cou_id'],

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
        if ($this->functionalityType == "update_city") {

            $city_name = $this->postData['city_name'];
//            $city_latitude = $this->postData['city_latitude'];
//            $city_longitude = $this->postData['city_longitude'];
            $country_id = $this->postData['country_id'];
            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator("UPDATE Location set name = '".$city_name."' , country_id = '".$country_id."'  where id = '".$id."'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData, "");


        }
        else if ($this->functionalityType=="enable_city"){

            $enable = $this->postData['enable'];
            $id =$this->postData['id'];

            $queryDecorator = new QueryDecorator( "UPDATE Location set enable = '".$enable."'  where id = '".$id."'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

        }

    }

    public function delete()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "delete_city") {

            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator( "DELETE FROM Location where id = '".$id."'", new CustomQuery("0", " "));
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