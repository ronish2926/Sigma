<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(OBJECT.'/OverviewObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);

class OverView extends Constant implements Queries
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

            /*$country_name = $this->postData['country_name'];
            $country_percentage = $this->postData['country_percentage'];
            $currency_name = $this->postData['currency_name'];
            $currency_symbol = $this->postData['currency_symbol'];

            $queryDecorator = new QueryDecorator("INSERT into Country (name,percentage) VALUES ('" . $country_name . "','" . $country_percentage . "')", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

            $country_id = findLastInsertId();
            $queryDecorator = new QueryDecorator("INSERT into Configuration (country_id,currency_name,currency_symbol) VALUES ('" . $country_id . "','" . $currency_name . "','" . $currency_symbol . "')", new CustomQuery("0", " "));

            $run = queryRunner($queryDecorator->getQuery());*/

        }


    }

    public function retrieve()
    {
        $listOfData = [];
        $yearlyEarningStats = [];
        $yearCompleteEarningStats = [];
        $yearCancelEarningStats = [];
        $yearlyPaymentMethodStats = [];
        $yearlyRideCategoriesStats = [];
        $yearlyMonthlyEarningStats = [];
        $yearlyWeeklyEarningStats = [];
        $yearlyCountryEarningStats = [];
        $yearTopRegionEarningStats = [];
        $yearRidesEarningstats = [];
        $yearEarning = [];
        $yearEarningpast = [];
        $yearnoRides = [];
        $yearnoRidespast = [];
        $yearNoOfCaptain = [];
        $yearNoOfCaptainpast = [];
        $yearNoOfUsers = [];
        $yearNoOfUserspast = [];

//


        $postdata = $this->postData;
        $overviewObject = new OverviewObject();

        if ($this->functionalityType == "retrieve_all_overvew_data") {

           $year = $postdata['year'];
            $country = $postdata['country'];
            $city = $postdata['city'];
            $pastyear = $postdata['pastyear'];

//            Earning this year code

              $queryDecorator = new QueryDecorator("  SELECT ride_order.price as price FROM RideOrder as ride_order
                WHERE YEAR(ride_order.date_created) = '$year' AND status='4'", new CustomQuery("0", " "));



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " GROUP BY MONTH(ride_order.date_created) "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearEarning, [
                    'total_revenue' => $this->getTotalRevenue($row['price']),
                    'currency_symbol' => $this->getCurrencySymbol($row['price'])

                ]);

            }
//            Earning past year code

              $queryDecorator = new QueryDecorator("  SELECT ride_order.price as price FROM RideOrder as ride_order
                WHERE YEAR(ride_order.date_created) = '$pastyear' AND status='4'", new CustomQuery("0", " "));



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " GROUP BY MONTH(ride_order.date_created) "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearEarningpast, [
                    'total_revenue' => $this->getTotalRevenue($row['price']),
                    'currency_symbol' => $this->getCurrencySymbol($row['price'])

                ]);

            }

            //            all ride this year code

            $queryDecorator = new QueryDecorator("SELECT  count(*) as total_rides FROM RideOrder  as ride_order
                WHERE YEAR(ride_order.date_created) = '$year' AND status='4'", new CustomQuery("0", " "));



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", ""));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearnoRides, [
                    'total_rides' => $row['total_rides'],


                ]);

            }
//            all rides past year code

            $queryDecorator = new QueryDecorator("SELECT count(*) as total_rides FROM RideOrder as ride_order
                WHERE YEAR(ride_order.date_created) = '$pastyear' AND status='4'", new CustomQuery("0", " "));



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearnoRidespast, [
                    'total_ridespast' => $row['total_rides'],

                ]);

            }

//            all captain of the year record



            $queryDecorator = new QueryDecorator(" SELECT  count(*) as total_captain FROM Captain  as captain
                WHERE YEAR(captain.date_created) = '$year' AND enable='0'", new CustomQuery("0", " "));



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", ""));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearNoOfCaptain, [
                    'total_captain' => $row['total_captain'],


                ]);

            }
//            all captain past of the year record

            $queryDecorator = new QueryDecorator(" SELECT  count(*) as total_captain FROM Captain  as captain
                WHERE YEAR(captain.date_created) = '$pastyear' AND enable='0'", new CustomQuery("0", " "));



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearNoOfCaptainpast, [
                    'total_captainpast' => $row['total_captain'],

                ]);

            }

//            all user of the year record




            $queryDecorator = new QueryDecorator("SELECT  count(*) as total_user FROM User  as user
                WHERE YEAR(user.date_created) = '$year' AND enable='0'", new CustomQuery("0", " "));



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", ""));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearNoOfUsers, [
                    'total_user' => $row['total_user'],


                ]);

            }
//              all user  past of the year record

            $queryDecorator = new QueryDecorator("SELECT  count(*) as total_user FROM User  as user
                WHERE YEAR(user.date_created) = '$pastyear' AND enable='0'", new CustomQuery("0", " "));



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearNoOfUserspast, [
                    'total_userpast' => $row['total_user'],

                ]);

            }




            // all order year earning
            $queryDecorator = new QueryDecorator(" SELECT YEAR(ride_order.date_created) as year , MONTH(ride_order.date_created) as month , GROUP_CONCAT(ride_order.price) as total_earning FROM RideOrder as ride_order", new CustomQuery("0", " "));
            if (empty($year)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) "));
            }
            else {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE YEAR(ride_order.date_created) = '$year'  "));
            }



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " GROUP BY MONTH(ride_order.date_created) "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearlyEarningStats, [
                    'rev_year' => $row['year'],
                    'rev_month' => $row['month'],
                    'total_revenue' => $this->getTotalRevenue($row['total_earning']),
                    'currency_symbol' => $this->getCurrencySymbol($row['total_earning'])

                ]);

            }
//            WEKKLY GRAPH EARNGIN

                  $queryDecorator = new QueryDecorator("SELECT YEAR(ride_order.date_created) as year , MONTH(ride_order.date_created) as month , GROUP_CONCAT(ride_order.price) as total_earning FROM RideOrder as ride_order
         WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 5 WEEK) 
         GROUP BY WEEK(ride_order.date_created)",
                      new CustomQuery("0", " "));


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearlyWeeklyEarningStats, [
                    'rev_year' => $row['year'],
                    'rev_month' => $row['month'],
                    'total_revenue' => $this->getTotalRevenue($row['total_earning']),
                    'currency_symbol' => $this->getCurrencySymbol($row['total_earning'])

                ]);

            }

//            complete Oreder year Earning
            $queryDecorator = new QueryDecorator(" SELECT YEAR(ride_order.date_created) as year , MONTH(ride_order.date_created) as month , GROUP_CONCAT(ride_order.price) as total_earning FROM RideOrder as ride_order
         
        ",
                new CustomQuery("0", ""));

            if (empty($year)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND ride_order.status = '4' "));
            }
            else {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE YEAR(ride_order.date_created) = '$year' AND ride_order.status = '4'  "));
            }



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  GROUP BY MONTH(ride_order.date_created) "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearCompleteEarningStats, [
                    'rev_year' => $row['year'],
                    'rev_month' => $row['month'],
                    'Complete_revenue' => $this->getTotalRevenue($row['total_earning']),
                    'currency_symbol' => $this->getCurrencySymbol($row['total_earning'])

                ]);

            }

            //            cancel Oreder year Earning
            $queryDecorator = new QueryDecorator(" SELECT YEAR(ride_order.date_created) as year , MONTH(ride_order.date_created) as month , GROUP_CONCAT(ride_order.price) as total_earning FROM RideOrder as ride_order
         ",
                new CustomQuery("0", " "));
            if (empty($year)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND ride_order.status = '3' "));
            }
            else {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE YEAR(ride_order.date_created) = '$year' AND ride_order.status = '3'  "));
            }


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " GROUP BY MONTH(ride_order.date_created)"));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearCancelEarningStats, [
                    'rev_year' => $row['year'],
                    'rev_month' => $row['month'],
                    'Cancel_revenue' => $this->getTotalRevenue($row['total_earning']),
                    'currency_symbol' => $this->getCurrencySymbol($row['total_earning'])

                ]);

            }



//            payment methods qeuery

            $queryDecorator = new QueryDecorator("SELECT count(*) as t_payment , payment_method.name FROM RideOrder as ride_order
        INNER JOIN PaymentMethod as payment_method ON payment_method.id = ride_order.payment

       ",
                new CustomQuery("0", " "));

            if (empty($year)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) "));
            }
            else {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE YEAR(ride_order.date_created) = '$year'  "));
            }

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " GROUP BY ride_order.payment"));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearlyPaymentMethodStats, [
                    't_payment' => $row['t_payment'],
                    'payment_name' => $row['name'],

                ]);

            }

//            RideCategory methods qeuery

            $queryDecorator = new QueryDecorator(" SELECT MONTH(ride_order.date_created) as month ,count(*) as total_category , ride_category.name FROM RideOrder as ride_order
        INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id
        INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category
        
        ",
                new CustomQuery("0", " "));
            if (empty($year)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)"));
            }
            else {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE YEAR(ride_order.date_created) = '$year'  "));
            }

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " GROUP BY ride_category.id "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearlyRideCategoriesStats, [
                    'month' => $row['month'],
                    'total_category' => $row['total_category'],
                    'name' => $row['name'],

                ]);

            }

//            country wise earnig

            $queryDecorator = new QueryDecorator(" SELECT count(*) as total_user , country.name FROM RideOrder as ride_order
        INNER JOIN Captain as captain ON captain.id = ride_order.captain_id
        INNER JOIN Location as location ON location.id = captain.place_id
        INNER JOIN Country as country ON country.id = location.country_id
   
         ",
                new CustomQuery("0", " "));

            if (empty($year)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)"));
            }
            else {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE YEAR(ride_order.date_created) = '$year'  "));
            }
            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " GROUP BY country.id"));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearlyCountryEarningStats, [
                    'total_user' => $row['total_user'],
                    'country_name' => $row['name'],


                ]);

            }

//            top 10 country wise region

            $queryDecorator = new QueryDecorator("SELECT  country.name , GROUP_CONCAT(ride_order.price) as total_income  FROM RideOrder as ride_order
        INNER JOIN Captain as captain ON captain.id = ride_order.captain_id
        INNER JOIN Location as location ON location.id = captain.place_id
        INNER JOIN Country as country ON country.id = location.country_id
       
        ",
                new CustomQuery("0", " "));
            if (empty($year)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "   WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)"));
            }
            else {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  WHERE YEAR(ride_order.date_created) = '$year'  "));
            }
            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " GROUP BY country.id LIMIT 10"));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearTopRegionEarningStats, [
                    'name' => $row['name'],
                    'total_income' => $this->getTotalRevenue($row['total_income']),
                    'currency_symbol' => $this->getCurrencySymbol($row['total_income'])


                ]);

            }

//            country wise top_earning
            $queryDecorator = new QueryDecorator("SELECT country.name as country_name , location.name as city_name , total_order.ride_count as total_trips ,  total_car.car_count as total_cars , total_earning.order_price
        FROM Country as country
        INNER JOIN Location as location ON location.country_id = country.id
        LEFT JOIN (

         SELECT  place_id  , date_created  , count(*) as car_count FROM RideType WHERE enable = '0'
         GROUP BY place_id

        ) total_car ON total_car.place_id = location.id AND YEAR(total_car.date_created) = '$year'

        LEFT JOIN (

         SELECT  ride_type.place_id as place_id  , ride_order.date_created  as date_created, count(*) as ride_count FROM RideOrder as ride_order
         INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id
         WHERE ride_order.enable = '0' AND ride_order.status = '4'
    	 GROUP BY place_id

        ) total_order ON total_order.place_id = location.id AND YEAR(total_car.date_created) = '$year'

        LEFT JOIN (

         SELECT  ride_type.place_id as place_id , ride_order.date_created as date_created , GROUP_CONCAT(ride_order.price) as order_price
         FROM RideOrder as ride_order
         INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id
         WHERE ride_order.enable = '0' AND ride_order.status = '4'
         GROUP BY place_id

        ) total_earning ON total_earning.place_id = location.id AND YEAR(total_car.date_created) = '$year'

        WHERE country.enable = '0'

        ",
                new CustomQuery("0", " "));
            if (!empty($country)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  AND country.id = '$country'"));
            }
            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " ORDER BY total_trips DESC LIMIT 5"));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearlyMonthlyEarningStats, [
                    'city_name' => $row['city_name'],
                    'total_trips' => $row['total_trips'],
                    'total_cars' => $row['total_cars'],
                    'order_price' => $this->getTotalRevenue($row['order_price']),

                    'currency_symbol' => $this->getCurrencySymbol($row['order_price'])


                ]);

            }

            //           year Rides  earning
            $queryDecorator = new QueryDecorator("SELECT  ride_type.name as name , ride_type.picture as picture , ride_category.name as category_name , GROUP_CONCAT(ride_order.price) as price , AVG(rating.avg_rating) as rating
        FROM RideType as ride_type 
        INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category
        INNER JOIN RideOrder as ride_order ON ride_order.ride_type_id = ride_type.id AND ride_order.status = '4'
        LEFT JOIN (
        
            SELECT order_id , AVG(rating) as avg_rating FROM Rating WHERE enable = '0'
        
        ) rating ON rating.order_id = ride_order.id
        INNER JOIN Location as location ON location.id = ride_type.place_id
        INNER JOIN Country as country ON country.id = location.country_id
        WHERE

        ",
//                WHERE country.id = '1' AND location.id = '1'
//        GROUP BY ride_type.id
                new CustomQuery("0", " "));
            if (!empty($country)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "   country.id = '$country' AND"));
            }
            if (!empty($city)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "   location.id = '$city' AND "));
            }
//            if (!empty($year)) {
//
//                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "   "));
//            }
            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  YEAR(ride_order.date_created) = '$year'  GROUP BY ride_type.id ORDER by ride_order.id DESC LIMIT 5"));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearRidesEarningstats, [
                    'name' => $row['name'],
                    'picture' => $this->ridetype.$row['picture'],
                    'category_name' => $row['category_name'],
                    'rating' => $row['rating'],

                    'price' => $this->getTotalRevenue($row['price']),

                    'sale' => $this->getarrylength($row['price']),
                    'currency_symbol' => $this->getCurrencySymbol($row['price'])


                ]);

            }



            $overviewObject->setYearlyEarningStats($yearlyEarningStats);
            $overviewObject->setYearlyPaymentMethodStats($yearlyPaymentMethodStats);
            $overviewObject->setYearlyRideCategoriesStats($yearlyRideCategoriesStats);
            $overviewObject->setYearlyCountryEarningStats($yearlyCountryEarningStats);
            $overviewObject->setYearTopRegionEarningStats($yearTopRegionEarningStats);
            $overviewObject->setYearCompleteEarningStats($yearCompleteEarningStats);
            $overviewObject->setYearCancelEarningStats($yearCancelEarningStats);
            $overviewObject->setYearlyWeeklyEarningStats($yearlyWeeklyEarningStats);
            $overviewObject->setYearlyMonthlyEarningStats($yearlyMonthlyEarningStats);
            $overviewObject->setYearRidesEarningstats($yearRidesEarningstats);
            $overviewObject->setYearEarning($yearEarning);
            $overviewObject->setYearEarningpast($yearEarningpast);
            $overviewObject->setYearnoRides($yearnoRides);
            $overviewObject->setYearnoRidespast($yearnoRidespast);
            $overviewObject->setYearNoOfCaptain($yearNoOfCaptain);
            $overviewObject->setYearNoOfCaptainpast($yearNoOfCaptainpast);
            $overviewObject->setYearNoOfUsers($yearNoOfUsers);
            $overviewObject->setYearNoOfUserspast($yearNoOfUserspast);




            array_push($listOfData,$overviewObject);


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData /*,JSON.json_encode($overviewObject)*/);


        }



    }

    public function update()
    {



    }

    public function delete()
    {


    }

    public function getResponseObject($code, $message, $setId, $itemCount, $data, $pagination = null)
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

    public function getCurrencySymbol($revenue){

        if (empty($revenue)){
            return 0;
        }
        $arr = explode (",", $revenue);
        $totalRevenue=0;
        $currencySymbol="";
        for ($i = 0 ; $i<count($arr) ; $i++){
            $currencySymbol = Utility::extractCharactersFromString($arr[$i]);
        }

        return $currencySymbol;

    }

    public function getarrylength($revenue){

        if (empty($revenue)){
            return 0;
        }
        $arr = explode (",", $revenue);



        return  sizeof($arr);

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
        
//        county year in overview
        
//        SELECT YEAR(ride_order.date_created) as year
//        FROM RideOrder as ride_order 
//        GROUP BY YEAR(ride_order.date_created) 
//        ORDER BY YEAR(ride_order.date_created) DESC 
        
        SELECT count(*) , country.name FROM RideOrder as ride_order
        INNER JOIN Captain as captain ON captain.id = ride_order.captain_id
        INNER JOIN Location as location ON location.id = captain.place_id
        INNER JOIN Country as country ON country.id = location.country_id
        WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
        GROUP BY country.id 
        
        SELECT  country.name , GROUP_CONCAT(ride_order.price) as total_income  FROM RideOrder as ride_order
        INNER JOIN Captain as captain ON captain.id = ride_order.captain_id
        INNER JOIN Location as location ON location.id = captain.place_id
        INNER JOIN Country as country ON country.id = location.country_id
        WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
        GROUP BY country.id LIMIT 10
         
        
        WHERE YEAR(ride_order.date_created) = '2020' 
        
        
        SELECT country.name as country_name , location.name as city_name , total_order.ride_count as total_trips ,  total_car.car_count as total_cars , total_earning.order_price
        FROM Country as country 
        INNER JOIN Location as location ON location.country_id = country.id
        LEFT JOIN (
        
         SELECT  place_id  , date_created  , count(*) as car_count FROM RideType WHERE enable = '0'
         GROUP BY place_id
        
        ) total_car ON total_car.place_id = location.id AND YEAR(total_car.date_created) = '2020' 
        
        LEFT JOIN (
        
         SELECT  ride_type.place_id as place_id  , ride_order.date_created  as date_created, count(*) as ride_count FROM RideOrder as ride_order
         INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id
         WHERE ride_order.enable = '0' AND ride_order.status = '4'
    	 GROUP BY place_id
        
        ) total_order ON total_order.place_id = location.id AND YEAR(total_car.date_created) = '2020' 
        
        LEFT JOIN (
        
         SELECT  ride_type.place_id as place_id , ride_order.date_created as date_created , GROUP_CONCAT(ride_order.price) as order_price 
         FROM RideOrder as ride_order
         INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id
         WHERE ride_order.enable = '0' AND ride_order.status = '4'
         GROUP BY place_id
        
        ) total_earning ON total_earning.place_id = location.id AND YEAR(total_car.date_created) = '2020' 
        
        WHERE country.enable = '0'  AND country.id = '1' ORDER BY total_trips DESC LIMIT 5
        
        
        
        SELECT  ride_type.name , ride_type.picture , ride_category.name as category_name , GROUP_CONCAT(ride_order.price) as price , AVG(rating.avg_rating) as rating
        FROM RideType as ride_type 
        INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category
        INNER JOIN RideOrder as ride_order ON ride_order.ride_type_id = ride_type.id AND ride_order.status = '4'
        LEFT JOIN (
        
            SELECT order_id , AVG(rating) as avg_rating FROM Rating WHERE enable = '0'
        
        ) rating ON rating.order_id = ride_order.id
        INNER JOIN Location as location ON location.id = ride_type.place_id
        INNER JOIN Country as country ON country.id = location.country_id
        WHERE country.id = '1' AND location.id = '1' 
        GROUP BY ride_type.id
    
        
        SELECT ride_order.price FROM RideOrder as ride_order

     WHERE YEAR(ride_order.date_created) = '2020' AND status='4'
        
        ";

    }

//SELECT * FROM paymentrequest  as request
//INNER join Captain as captain on captain.id = request.captain_id
//INNER JOIN CaptainBankDetail as detail on detail.captain_id = captain.id




}

