<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);



class AllCaptains extends Constant implements Queries
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



    }

    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "retrieve_all_captains") {

            $country_id = $postdata['country_id'];
            $city_id = $postdata['city_id'];
//            $status = $postdata['status'];
            $status = $postdata['status'];
            $search = $postdata['search'];
            $where_con="";


            $queryDecorator = new QueryDecorator("SELECT captain.*,captain.picture as cap_pic , ride_type.name as ride_type_name , orders.total_revenue , rating.avg_rating
            FROM Captain as captain 
            INNER JOIN RideType as ride_type ON ride_type.id = captain.ride_type_id
            LEFT JOIN (
            
             SELECT captain_id ,  GROUP_CONCAT(price) as total_revenue FROM RideOrder GROUP BY captain_id 
                        
            ) orders ON orders.captain_id = captain.id
            LEFT JOIN (
            
             SELECT captain_id ,  AVG(rating) as avg_rating FROM Rating 
                        
            ) rating ON rating.captain_id = captain.id
            ",
                new CustomQuery("0", " "));



            if (!empty($city_id)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " INNER JOIN Location as location ON location.id = captain.place_id AND location.id = '$city_id' "));
//                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("1", " SELECT location.name as city_name , "));

            }

            if (!empty($country_id)) {



                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " INNER JOIN Country as country ON country.id = '$country_id' "));
//                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("1", " SELECT country.name as country_name , "));

            }

            if (!empty($search)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  " WHERE captain.name LIKE  '$search%' AND"));

            }

            if (empty($search)) {

                $where_con="WHERE";

            }


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", $where_con." captain.status = '$status' ORDER BY captain.id ASC  "));

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

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " LIMIT 10 "));
//Utility::Logger($queryDecorator->getQuery());
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'cap_pic' => $this->captainpic.$row['cap_pic'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'ride_type_name' => $row['ride_type_name'],
                    'total_revenue' => $this->getTotalRevenue($row['total_revenue']),
                    'total_trips' => $this->getTotalTrips($row['total_revenue']),
                    'avg_rating' => $row['avg_rating'],
                    'status' => $row['status'],

                    'live' => $row['live'],
                    'enable' => $row['enable']
                ]);

            }



            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));


        }
        else if ($this->functionalityType == "pagination") {

            $country_id = $postdata['country_id'];
            $city_id = $postdata['city_id'];
            $status = $postdata['status'];
            $search = $postdata['search'];
            $offset = $postdata['offset'];


            $queryDecorator = new QueryDecorator("SELECT captain.*,captain.picture as cap_pic , ride_type.name as ride_type_name , orders.total_revenue , rating.avg_rating
            FROM Captain as captain 
            INNER JOIN RideType as ride_type ON ride_type.id = captain.ride_type_id
            LEFT JOIN (
            
             SELECT captain_id ,  GROUP_CONCAT(price) as total_revenue FROM RideOrder GROUP BY captain_id 
                        
            ) orders ON orders.captain_id = captain.id
            LEFT JOIN (
            
             SELECT captain_id ,  AVG(rating) as avg_rating FROM Rating 
                        
            ) rating ON rating.captain_id = captain.id
            ",
                new CustomQuery("0", " "));



            if (!empty($city_id)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " INNER JOIN Location as location ON location.id = captain.place_id AND location.id = '$city_id' "));
//                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("1", " SELECT location.name as city_name , "));

            }

            if (!empty($country_id)) {



                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " INNER JOIN Country as country ON country.id = '$country_id' "));
//                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("1", " SELECT country.name as country_name , "));

            }

            if (!empty($search)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  " WHERE captain.name LIKE  '$search%' AND"));

            }

            if (empty($search)) {

                $where_con="WHERE";

            }


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", $where_con." captain.status = '$status' ORDER BY captain.id ASC  "));



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " LIMIT 10 OFFSET ".$offset));
//Utility::Logger($queryDecorator->getQuery());
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'cap_pic' => $this->captainpic.$row['cap_pic'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'ride_type_name' => $row['ride_type_name'],
                    'total_revenue' => $this->getTotalRevenue($row['total_revenue']),
                    'total_trips' => $this->getTotalTrips($row['total_revenue']),
                    'avg_rating' => $row['avg_rating'],
                    'status' => $row['status'],

                    'live' => $row['live'],
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

        if ($this->functionalityType=="enable_captain"){

            $enable = $this->postData['enable'];
            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator( "UPDATE Captain set enable = '" . $enable . "'   where id = '" . $id . "'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

        }
        else if ($this->functionalityType=="live_captain"){

            $enable = $this->postData['enable'];
            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator( "UPDATE Captain set live = '" . $enable . "'   where id = '" . $id . "'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

        }


    }

    public function delete()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "delete_captain") {

            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator(  "DELETE FROM Captain", new CustomQuery("0", "  WHERE id = '$id'"));
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

    public function getTotalRevenue($revenue){

        if (empty($revenue)){
            return 0;
        }
        $arr = explode (",", $revenue);
        $totalRevenue=0;
        for ($i = 0 ; $i<count($arr) ; $i++){
            $totalRevenue+=Utility::extractNumericFromString($arr[$i]);
        }

        return $totalRevenue;

    }

    public function getTotalTrips($revenue){

        if (!isset($revenue)){
            return 0;
        }
        $arr = explode (",", $revenue);
        return count($arr);
    }


    public function okay(){

        "
         SELECT YEAR(ride_order.date_created) as year , MONTH(ride_order.date_created) as month , GROUP_CONCAT(ride_order.price) as total_earning FROM RideOrder as ride_order
         WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
         GROUP BY MONTH(ride_order.date_created)
         
         SELECT count(*) , payment_method.name FROM RideOrder as ride_order
        INNER JOIN PaymentMethod as payment_method ON payment_method.id = ride_order.payment
        WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
        GROUP BY ride_order.payment
        
        SELECT MONTH(ride_order.date_created) as month ,count(*) , ride_category.name FROM RideOrder as ride_order
        INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id
        INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category
        WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
        GROUP BY ride_category.id 
        
        ";

    }


}


?>