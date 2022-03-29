<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);

class AllReports extends Constant implements Queries
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

        if ($this->functionalityType == "insert_captain") {



        }


    }

    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "retrieve_all_rides") {

            $country_id = $postdata['country_id'];
            $city_id = $postdata['city_id'];
//            $status = $postdata['status'];
            $search = $postdata['search'];


            $queryDecorator = new QueryDecorator("SELECT report.id as id ,ride_order.id as order_id,
            captain.name as captain_name , captain.phone as captain_phone , captain.email as captain_email ,
concat(user.first_name,'',user.last_name) as customer_name , user.phone as customer_phone , user.email as customer_email ,
ride_order.from_address as from_address , ride_order.to_address as to_address , ride_order.distance as distance , ride_order.trip_time as trip_time , ride_order.price as fare ,
ride_order.date_created as date_time , ride_type.name as ride_type_name , ride_category.name as ride_category_name ,
payment_method.name as payment_method_name  ,
ride_order.status , ride_order.enable , rating.rating as ride_rating

            FROM Report as report 
            INNER JOIN RideOrder as ride_order ON ride_order.id = report.order_id 
            INNER JOIN Captain as captain ON captain.id = ride_order.captain_id
            INNER JOIN User as user ON user.id = ride_order.user_id
            INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id
            INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category
            INNER JOIN PaymentMethod as payment_method ON payment_method.id = ride_order.payment
            LEFT JOIN Rating as rating ON rating.order_id = ride_order.id ", new CustomQuery("0", " "));



            if (!empty($city_id)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " INNER JOIN Location as location ON location.id = '$city_id'"));
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("1", " SELECT location.name as city_name , "));

            }

            if (!empty($country_id)) {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " INNER JOIN Country as country ON country.id = '$country_id'"));
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("1", " SELECT country.name as country_name , "));

            }

            if (!empty($search)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  " WHERE  captain.name LIKE  '$search%' "));

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

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " order by id DESC LIMIT 10 "));

            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['id'],

                    'captain_name' => $row['captain_name'],
                    'captain_phone' => $row['captain_phone'],
                    'captain_email' => $row['captain_email'],

                    'customer_name' => $row['customer_name'],
                    'customer_phone' => $row['customer_phone'],
                    'customer_email' => $row['customer_email'],

                    'from_address' => $row['from_address'],
                    'to_address' => $row['to_address'],
                    'distance' => $row['distance'],
                    'trip_time' => $row['trip_time'],
                    'fare' => $row['fare'],

                    'date_time' => $row['date_time'],
                    'ride_type_name' => $row['ride_type_name'],
                    'ride_category_name' => $row['ride_category_name'],

                    'payment_method_name' => $row['payment_method_name'],
                    'ride_rating' => $row['ride_rating'],
                    'status' => $this->getStatus($row['status']),
                    'enable' => $row['enable']

                ]);

            }



            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));


        }
        else if ($this->functionalityType == "pagination") {

            $country_id = $postdata['country_id'];
            $city_id = $postdata['city_id'];
//            $status = $postdata['status'];
            $search = $postdata['search'];
            $offset = $postdata['offset'];

            $queryDecorator = new QueryDecorator("SELECT report.id as id ,ride_order.id as order_id,
            captain.name as captain_name , captain.phone as captain_phone , captain.email as captain_email ,
concat(user.first_name,'',user.last_name) as customer_name , user.phone as customer_phone , user.email as customer_email ,
ride_order.from_address as from_address , ride_order.to_address as to_address , ride_order.distance as distance , ride_order.trip_time as trip_time , ride_order.price as fare ,
ride_order.date_created as date_time , ride_type.name as ride_type_name , ride_category.name as ride_category_name ,
payment_method.name as payment_method_name  ,
ride_order.status , ride_order.enable , rating.rating as ride_rating

            FROM Report as report 
            INNER JOIN RideOrder as ride_order ON ride_order.id = report.order_id 
            INNER JOIN Captain as captain ON captain.id = ride_order.captain_id
            INNER JOIN User as user ON user.id = ride_order.user_id
            INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id
            INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category
            INNER JOIN PaymentMethod as payment_method ON payment_method.id = ride_order.payment
            LEFT JOIN Rating as rating ON rating.order_id = ride_order.id ", new CustomQuery("0", " "));



            if (!empty($city_id)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " INNER JOIN Location as location ON location.id = '$city_id'"));
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("1", " SELECT location.name as city_name , "));

            }

            if (!empty($country_id)) {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " INNER JOIN Country as country ON country.id = '$country_id'"));
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("1", " SELECT country.name as country_name , "));

            }

            if (!empty($search)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  " WHERE  captain.name LIKE  '$search%' "));

            }



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " order by id DESC LIMIT 10 "));

            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['id'],

                    'captain_name' => $row['captain_name'],
                    'captain_phone' => $row['captain_phone'],
                    'captain_email' => $row['captain_email'],

                    'customer_name' => $row['customer_name'],
                    'customer_phone' => $row['customer_phone'],
                    'customer_email' => $row['customer_email'],

                    'from_address' => $row['from_address'],
                    'to_address' => $row['to_address'],
                    'distance' => $row['distance'],
                    'trip_time' => $row['trip_time'],
                    'fare' => $row['fare'],

                    'date_time' => $row['date_time'],
                    'ride_type_name' => $row['ride_type_name'],
                    'ride_category_name' => $row['ride_category_name'],

                    'payment_method_name' => $row['payment_method_name'],
                    'ride_rating' => $row['ride_rating'],
                    'status' => $this->getStatus($row['status']),
                    'enable' => $row['enable']

                ]);

            }

            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }
        else if ($this->functionalityType == "retrieve_all_cities"){
            $id = $postdata['id'];

            $queryDecorator = new QueryDecorator("SELECT * FROM Location", new CustomQuery("0", " WHERE country_id = '$id'"));
            $result = queryRunner($queryDecorator->getQuery());

            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],

                ]);

            }
            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");
        }




    }

    public function update()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType=="enable_ride"){

            $enable = $this->postData['enable'];
            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator( "UPDATE RideOrder set enable = '" . $enable . "'   where id = '" . $id . "'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData, "");

        }


    }

    public function delete()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "delete_captain") {

            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator(  "DELETE FROM RideOrder where id = '".$id."'", new CustomQuery("0", " "));
            $res = queryRunner($queryDecorator->getQuery());
            return $this->getResponseObject($this->getSuccess_code(), "Data Delete Successfully", "0", "0", $listOfData, "");

        }

    }

    public function getStatus($sts){
        $status="";
        if($sts == "1"){
            $status="Running";
        }
        else if($sts == "2"){
            $status="Scheduled";
        }
       else if($sts == "3"){
            $status="Cancel";
        }
        else {
            $status="Completed";
        }
        return $status;

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

    public function abc(){

/*
        Top 10 Brands / Trending Brand
         
         SELECT  brand.* , sales.total_sales , rating.avg_rating
         FROM OrderMeta as order_meta
         INNER JOIN Brand as brand ON brand.id = order_meta.brand_id
         INNER JOIN ListOfOrders as list_of_orders ON list_of_orders.id = order_meta.term_id
         LEFT JOIN (

            SELECT brand_id  , count(*) as total_sales FROM OrderMeta

         ) sales ON sales.brand_id = order_meta.brand_id
         LEFT JOIN (

            SELECT brand_id  , AVG(rating) as avg_rating FROM Rating

         ) rating ON rating.brand_id = order_meta.brand_id

         WHERE DATE(list_of_orders.date_created) >= DATE_SUB(CURDATE(), INTERVAL 2 MONTH)
         GROUP BY brand.id
         LIMIT 10
         
         
         SELECT  brand.* , sales.total_sales , rating.avg_rating
         FROM OrderMeta as order_meta
         INNER JOIN Brand as brand ON brand.id = order_meta.brand_id
         INNER JOIN ListOfOrders as list_of_orders ON list_of_orders.id = order_meta.term_id
         LEFT JOIN (

            SELECT brand_id  , count(*) as total_sales FROM OrderMeta

         ) sales ON sales.brand_id = order_meta.brand_id
         LEFT JOIN (

            SELECT brand_id  , AVG(rating) as avg_rating FROM Rating

         ) rating ON rating.brand_id = order_meta.brand_id

         WHERE DATE(list_of_orders.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
         GROUP BY brand.id
         LIMIT 10
        
        
        */



        /*
         *
         *SELECT  product.* , sales.total_sales , rating.avg_rating
         FROM OrderMeta as order_meta
         INNER JOIN Product as product ON product.id = order_meta.product_id
         INNER JOIN Brand as brand ON brand.id = order_meta.brand_id
         INNER JOIN ListOfOrders as list_of_orders ON list_of_orders.id = order_meta.term_id
         LEFT JOIN (

            SELECT brand_id  , count(*) as total_sales FROM OrderMeta

         ) sales ON sales.brand_id = order_meta.brand_id
         LEFT JOIN (

            SELECT brand_id  , AVG(rating) as avg_rating FROM Rating

         ) rating ON rating.brand_id = order_meta.brand_id

         WHERE DATE(list_of_orders.date_created) >= DATE_SUB(CURDATE(), INTERVAL 2 MONTH)
         GROUP BY product.id
         LIMIT 10
         
         
         
        SELECT  product.* , sales.total_sales , rating.avg_rating
         FROM OrderMeta as order_meta
         INNER JOIN Product as product ON product.id = order_meta.product_id
         INNER JOIN Brand as brand ON brand.id = order_meta.brand_id
         INNER JOIN ListOfOrders as list_of_orders ON list_of_orders.id = order_meta.term_id
         LEFT JOIN (

            SELECT brand_id  , count(*) as total_sales FROM OrderMeta

         ) sales ON sales.brand_id = order_meta.brand_id
         LEFT JOIN (

            SELECT brand_id  , AVG(rating) as avg_rating FROM Rating

         ) rating ON rating.brand_id = order_meta.brand_id

         WHERE DATE(list_of_orders.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
         GROUP BY product.id
         LIMIT 10
        
        
        */




        
        /*SELECT  user.* , sales.total_sales , rating.avg_rating
         FROM ListOfOrders as list_of_orders 
         INNER JOIN User as user ON user.id = list_of_orders.user_id
         LEFT JOIN (
         
            SELECT user_id  , count(*) as total_sales FROM ListOfOrders
         
         ) sales ON sales.user_id = list_of_orders.user_id
         LEFT JOIN (
         
            SELECT user_id  , AVG(rating) as avg_rating FROM Rating
         
         ) rating ON rating.user_id = list_of_orders.user_id
         
         WHERE DATE(list_of_orders.date_created) >= DATE_SUB(CURDATE(), INTERVAL 2 MONTH) 
         GROUP BY user.id
         LIMIT 10*/
        
        
        




    }


}


?>