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

class DriverProfile extends Constant implements Queries
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

        $yearnoRides = [];

        $yearNoOfCaptain = [];
        $yearNoOfCaptainpast = [];
        $yearNoOfUsers = [];
        $yearNoOfUserspast = [];



        $overviewObject = new OverviewObject();

        if ($this->functionalityType == "retrieve_all_overvew_data") {
            $postdata = $this->postData;
            $year = $postdata['year'];
            $pastyear = $postdata['pastyear'];
            $captain_id = $postdata['captain_id'];

            //=======Earning this year code==========

            $queryDecorator = new QueryDecorator("SELECT ride_order.price as price
                    FROM RideOrder as ride_order
                    WHERE ride_order.captain_id = '$captain_id' AND YEAR(ride_order.date_created) = '$year' AND status='4'
                ", new CustomQuery("0", " "));

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " GROUP BY MONTH(ride_order.date_created) "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearEarning, [
                    'total_revenue' => $this->getTotalRevenue($row['price']),
                    'currency_symbol' => $this->getCurrencySymbol($row['price'])

                ]);

            }


            //=======All Rides this year code==========

            $queryDecorator = new QueryDecorator("SELECT  count(*) as total_rides FROM RideOrder  as ride_order
              WHERE ride_order.captain_id = '$captain_id' AND YEAR(ride_order.date_created) = '$year' AND status='4'", new CustomQuery("0", " "));

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", ""));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearnoRides, [
                    'total_rides' => $row['total_rides'],


                ]);

            }

            //=======All Cancel Rides this year code==========

            $queryDecorator = new QueryDecorator("SELECT  count(*) as total_rides FROM RideOrder  as ride_order
              WHERE ride_order.captain_id = '$captain_id' AND YEAR(ride_order.date_created) = '$year' AND status='3'", new CustomQuery("0", " "));

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", ""));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($yearNoOfCaptain, [
                    'total_rides' => $row['total_rides'],


                ]);

            }


            //=======Complete Order earning year code==========
            
            $queryDecorator = new QueryDecorator(" SELECT YEAR(ride_order.date_created) as year , MONTH(ride_order.date_created) as month , GROUP_CONCAT(ride_order.price) as total_earning 
                    FROM RideOrder as ride_order
                    INNER JOIN Captain as captain on captain.id = ride_order.captain_id
                    WHERE captain.id = '$captain_id' ",
                new CustomQuery("0", ""));

            if (empty($year)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " AND  DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND ride_order.status = '4' "));
            }
            else {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  AND YEAR(ride_order.date_created) = '$year' AND ride_order.status = '4'  "));
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

            //=======Cancel Order earning year code==========
            
            $queryDecorator = new QueryDecorator(" SELECT YEAR(ride_order.date_created) as year , MONTH(ride_order.date_created) as month , GROUP_CONCAT(ride_order.price) as total_earning 
                     FROM RideOrder as ride_order
                    INNER JOIN Captain as captain on captain.id = ride_order.captain_id
                    WHERE captain.id = '$captain_id' ",
                new CustomQuery("0", " "));
                
            if (empty($year)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  AND DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND ride_order.status = '3' "));
            }
            else {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "  AND YEAR(ride_order.date_created) = '$year' AND ride_order.status = '3'  "));
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



            //=======Payment Method Query==========

            $queryDecorator = new QueryDecorator("SELECT count(*) as t_payment , payment_method.name FROM RideOrder as ride_order
            INNER JOIN PaymentMethod as payment_method ON payment_method.id = ride_order.payment",
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
            $overviewObject->setYearnoRides($yearnoRides);
            $overviewObject->setYearNoOfCaptain($yearNoOfCaptain);
            $overviewObject->setYearNoOfCaptainpast($yearNoOfCaptainpast);
            $overviewObject->setYearNoOfUsers($yearNoOfUsers);
            $overviewObject->setYearNoOfUserspast($yearNoOfUserspast);




            array_push($listOfData,$overviewObject);


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData);


        }
        else if($this->functionalityType == "retrieve_all_payment_detail"){
            $postdata = $this->postData;
            $captain_id = $postdata['captain_id'];
            $search = $postdata['search'];

            $queryDecorator = new QueryDecorator("SELECT request.*, request.date_created as p_date ,request.id as id ,request.total_rides as total_trip ,request.total_earning as earning, request.status as r_status, 
                                                detail.iban_no as iban
                                                FROM PaymentRequest  as request
                                                INNER JOIN Captain as captain on captain.id = request.captain_id
                                                INNER JOIN CaptainBankDetail as detail on detail.captain_id = captain.id
                                                WHERE captain.id = '$captain_id' AND request.status = '1'
                                                ", new CustomQuery("0", " "));

            if (!empty($search)) {


                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  " AND request.date_created LIKE  '$search%'"));

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



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " LIMIT 10"));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['id'],
                    'p_date' => $row['p_date'],
                    'total_rides' => $row['total_trip'],
                    'total_earning' => $row['earning'],
                    'iban' => $row['iban'],

                ]);

            }


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));

        }
        else if($this->functionalityType == "pagination"){
            $postdata = $this->postData;
            $captain_id = $postdata['captain_id'];
            $search = $postdata['search'];
            $offset = $postdata['offset'];

            $queryDecorator = new QueryDecorator("SELECT request.*, request.date_created as p_date ,request.id as id ,request.total_rides as total_trip ,request.total_earning as earning, request.status as r_status, 
                                                detail.iban_no as iban
                                                FROM PaymentRequest  as request
                                                INNER JOIN Captain as captain on captain.id = request.captain_id
                                                INNER JOIN CaptainBankDetail as detail on detail.captain_id = captain.id
                                                WHERE captain.id = '$captain_id' AND request.status = '1'
                                                ", new CustomQuery("0", " "));

            if (!empty($search)) {


                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  " AND request.date_created LIKE  '$search%'"));

            }




            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " LIMIT 10 OFFSET ".$offset));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['id'],
                    'p_date' => $row['p_date'],
                    'total_rides' => $row['total_trip'],
                    'total_earning' => $row['earning'],
                    'iban' => $row['iban'],

                ]);

            }


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, '');

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




//SELECT * FROM paymentrequest  as request
//INNER join Captain as captain on captain.id = request.captain_id
//INNER JOIN CaptainBankDetail as detail on detail.captain_id = captain.id




}

