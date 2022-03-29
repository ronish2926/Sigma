<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);

class AllRideTypes extends Constant implements Queries
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

        if ($this->functionalityType == "insert_ride_type") {

            $country_id = $this->postData['country_id'];
            $ride_type_name = $this->postData['ride_type_name'];
            $ride_type_tagline = $this->postData['ride_type_tagline'];
            $ride_type_price = $this->postData['ride_type_price'];
            $ride_type_condition = $this->postData['ride_type_condition'];
            $ride_type_category_id = $this->postData['ride_type_category_id'];
            $ride_type_place_id = $this->postData['ride_type_city_id'];
            $watting_time = $this->postData['watting_time'];
            $watting_price = $this->postData['watting_price'];
            $images = $this->postData['images'];

            $image = convert_save_image_from_base64("ic_ride_type" . rand() . ".webp", $images, $this->ridetype);

            $queryDecorator = new QueryDecorator("INSERT into RideType (place_id,ride_category,name,tagline,tag,picture) VALUES ('" . $ride_type_place_id . "','" . $ride_type_category_id . "','" . $ride_type_name . "','" . $ride_type_tagline . "','" . $ride_type_name . "','" . $image . "')", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());
            $insert_id = findLastInsertId();

            $queryDecorator = new QueryDecorator("INSERT into RideTypeMeta (term_id,price,distance_condition) VALUES ('" . $insert_id . "','" . $ride_type_price . "','" . $ride_type_condition . "')", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

            $queryDecorator = new QueryDecorator("INSERT into RideTypeWaitingCharges (term_id,price,time_condition) VALUES ('" . $insert_id . "','" . $watting_price . "','" . $watting_time . "')", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

            return $this->getResponseObject($this->getSuccess_code(), "Data Insert Successfully", "0", "0", $listOfData, "");

        }

    }

    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "retrieve_all_ride_types") {

            $country_id = $postdata['country_id'];
            $city_id = $postdata['city_id'];
            $search = $postdata['search'];


            $queryDecorator = new QueryDecorator("SELECT ride_type.id , ride_type.name as name ,ride_type.picture as picture , ride_type.tagline , ride_type.picture ,ride_category.name as ride_category, 
    location.name as city_name , country.name as country_name , ride_type_meta.price , ride_type_meta.distance_condition, ride_type.enable,
    configuration.currency_symbol , waiting_charges.price as waiting_charges , waiting_charges.time_condition as waiting_time , waiting_charges.initial_charges as int_time
    FROM Country as country
    INNER JOIN Location as location ON location.country_id = country.id  AND location.enable = '0'
    INNER JOIN RideType as ride_type ON ride_type.place_id = location.id 
    INNER JOIN RideTypeWaitingCharges as waiting_charges ON waiting_charges.term_id = ride_type.id 
    INNER JOIN RideTypeMeta as ride_type_meta ON ride_type_meta.term_id = ride_type.id 
    INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category AND ride_category.enable = '0'
    INNER JOIN Configuration as configuration ON configuration.country_id = country.id AND configuration.enable = '0'
    WHERE country.enable = '0'
    ", new CustomQuery("0", " "));


            if (!empty($country_id)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " AND  country.id = '$country_id' "));

            }

            if (!empty($city_id)) {


                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " AND  location.id = '$city_id' "));

            }

            if (!empty($search)) {

                    $and_condition = " AND ";


                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0", $and_condition . " country.name LIKE  '$search%' OR  location.name LIKE  '$search%' OR  ride_type.name  LIKE  '$search%'"));

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


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " ORDER BY ride_type.id ASC LIMIT 10 "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'ride_category' => $row['ride_category'],
                    'tagline' => $row['tagline'],
                    'picture' => $this->ridetype.$row['picture'],
                    'city_name' => $row['city_name'],
                    'country_name' => $row['country_name'],
                    'waiting_charges' => $row['waiting_charges'],
                    'waiting_time' => $row['waiting_time'],
                    'int_time' => $row['int_time'],

                    'currency_symbol' => $row['currency_symbol'],
                    'price' => $row['price'],
                    'distance_condition' => $row['distance_condition'],
                    'enable' => $row['enable']
                ]);

            }




            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));


        }
        else if ($this->functionalityType == "pagination") {

            $country_id = $postdata['country_id'];
            $city_id = $postdata['city_id'];
            $search = $postdata['search'];
            $offset = $postdata['offset'];

            $queryDecorator = new QueryDecorator("SELECT ride_type.id , ride_type.name as name ,ride_type.picture as picture , ride_type.tagline , ride_type.picture ,ride_category.name as ride_category, 
    location.name as city_name , country.name as country_name , ride_type_meta.price , ride_type_meta.distance_condition, ride_type.enable,
    configuration.currency_symbol , waiting_charges.price as waiting_charges , waiting_charges.time_condition as waiting_time , waiting_charges.initial_charges as int_time
    FROM Country as country
    INNER JOIN Location as location ON location.country_id = country.id  AND location.enable = '0'
    INNER JOIN RideType as ride_type ON ride_type.place_id = location.id AND ride_type.enable = '0'
    INNER JOIN RideTypeWaitingCharges as waiting_charges ON waiting_charges.term_id = ride_type.id 
    INNER JOIN RideTypeMeta as ride_type_meta ON ride_type_meta.term_id = ride_type.id 
    INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category AND ride_category.enable = '0'
    INNER JOIN Configuration as configuration ON configuration.country_id = country.id AND configuration.enable = '0'
    WHERE country.enable = '0'
    ", new CustomQuery("0", " "));


            if (!empty($country_id)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " AND  country.id = '$country_id' "));

            }

            if (!empty($city_id)) {


                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " AND  location.id = '$city_id' "));

            }

            if (!empty($search)) {

                $and_condition = " AND ";


                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0", $and_condition . " country.name LIKE  '$search%' OR  location.name LIKE  '$search%' OR  ride_type.name  LIKE  '$search%'"));

            }



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " ORDER BY ride_type.id ASC LIMIT 10 OFFSET ".$offset));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'ride_category' => $row['ride_category'],
                    'tagline' => $row['tagline'],
                    'picture' => $this->ridetype.$row['picture'],
                    'city_name' => $row['city_name'],
                    'country_name' => $row['country_name'],
                    'waiting_charges' => $row['waiting_charges'],
                    'waiting_time' => $row['waiting_time'],
                    'int_time' => $row['int_time'],

                    'currency_symbol' => $row['currency_symbol'],
                    'price' => $row['price'],
                    'distance_condition' => $row['distance_condition'],
                    'enable' => $row['enable']
                ]);

            }



            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }
        else if ($this->functionalityType == "retrieve_all_cities"){
            $id = $postdata['id'];

            $queryDecorator = new QueryDecorator("SELECT * FROM Location", new CustomQuery("0", " WHERE country_id = '$id' AND enable = '0'"));
            $result = queryRunner($queryDecorator->getQuery());

            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],

                ]);

            }
            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");
        }
        else if ($this->functionalityType == "retrieve_edit_all_ride_type") {

//            $country_id = $postdata['country_id'];
//            $city_id = $postdata['city_id'];
            $id = $postdata['id'];


            $queryDecorator = new QueryDecorator("SELECT ride_type.id , ride_type.name as name ,ride_type.picture as picture , ride_type.tagline , ride_type.picture ,ride_category.name as ride_category, ride_category.id as ride_cat_id,
    location.name as city_name,location.id as loc_id , country.name as country_name ,country.id as cou_id, ride_type_meta.price , ride_type_meta.distance_condition, ride_type.enable,
    configuration.currency_symbol , waiting_charges.price as waiting_charges , waiting_charges.time_condition as waiting_time , waiting_charges.initial_charges as int_time
    FROM Country as country
    INNER JOIN Location as location ON location.country_id = country.id  AND location.enable = '0'
    INNER JOIN RideType as ride_type ON ride_type.place_id = location.id AND ride_type.enable = '0'
    INNER JOIN RideTypeWaitingCharges as waiting_charges ON waiting_charges.term_id = ride_type.id 
    INNER JOIN RideTypeMeta as ride_type_meta ON ride_type_meta.term_id = ride_type.id 
    INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category AND ride_category.enable = '0'
    INNER JOIN Configuration as configuration ON configuration.country_id = country.id AND configuration.enable = '0'
    WHERE ride_type.id = '$id'
    ", new CustomQuery("0", " "));



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", ""));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'ride_category' => $row['ride_category'],
                    'tagline' => $row['tagline'],
                    'picture' => $this->ridetype.$row['picture'],
                    'city_name' => $row['city_name'],
                    'country_name' => $row['country_name'],
                    'waiting_charges' => $row['waiting_charges'],
                    'waiting_time' => $row['waiting_time'],
                    'int_time' => $row['int_time'],
                    'ride_cat_id' => $row['ride_cat_id'],
                    'cou_id' => $row['cou_id'],
                    'loc_id' => $row['loc_id'],

                    'currency_symbol' => $row['currency_symbol'],
                    'price' => $row['price'],
                    'distance_condition' => $row['distance_condition'],
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

        if ($this->functionalityType == "update_ride_type") {

            $country_id = $this->postData['country_id'];
            $ride_type_name = $this->postData['ride_type_name'];
            $ride_type_tagline = $this->postData['ride_type_tagline'];
            $ride_type_price = $this->postData['ride_type_price'];
            $ride_type_condition = $this->postData['ride_type_condition'];
            $ride_type_category_id = $this->postData['ride_type_category_id'];
            $ride_type_place_id = $this->postData['ride_type_city_id'];
            $watting_time = $this->postData['watting_time'];
            $watting_price = $this->postData['watting_price'];
            $images = $this->postData['images'];

            $id = $postdata['id'];



            $queryDecorator = new QueryDecorator("UPDATE RideType set place_id = '" . $ride_type_place_id . "' , ride_category = '" . $ride_type_category_id . "' , name = '" . $ride_type_name . "' , 
      tagline = '" . $ride_type_tagline . "' , tag = '" . $ride_type_name . "'",
                new CustomQuery("0", " "));

            if (!isPath($images)) {
                $queryDecoratorpicture = new QueryDecorator("SELECT picture FROM RideType WHERE id='$id'", new CustomQuery("0", " "));
                $runpic = queryRunner($queryDecoratorpicture->getQuery());
                $picrow=rowRetriever($runpic);
                $existimg = $this->ridetype.$picrow['picture'];
//                Utility::Logger($existimg);
                if(isPath($existimg)){
                    unlink($existimg);


                }

                $image = convert_save_image_from_base64("ic_ride_type" . rand() . ".webp", $images, $this->ridetype);
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " , picture ='$image'"));


            }

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  where id = '" . $id . "' "));
            $run = queryRunner($queryDecorator->getQuery());

            $queryDecorator = new QueryDecorator("UPDATE RideTypeMeta set price = '$ride_type_price' , distance_condition = '$ride_type_condition'", new CustomQuery("0", "  where term_id = '" . $id . "' "));
            $run = queryRunner($queryDecorator->getQuery());

            $queryDecorator = new QueryDecorator("UPDATE RideTypeWaitingCharges set price = '".$watting_price."' , time_condition = '".$watting_time."'", new CustomQuery("0", "  where term_id = '" . $id . "' "));
            $run = queryRunner($queryDecorator->getQuery());



            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData, "");


        }
        else if ($this->functionalityType == "enable_ride_type") {

            $enable = $this->postData['enable'];
            $id = $postdata['id'];

            $queryDecorator = new QueryDecorator("UPDATE RideType set enable = '" . $enable . "'  where id = '" . $id . "'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());
            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData, "");

        }

    }

    public function delete()
    {
        $listOfData = [];
        $postdata = $this->postData;
        if ($this->functionalityType == "delete_ride_type") {

            $id = $postdata['id'];

            $queryDecorator = new QueryDecorator("DELETE FROM RideType where id = '" . $id . "'", new CustomQuery("0", " "));
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