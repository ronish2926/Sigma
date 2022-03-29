<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);


class Request extends Constant implements Queries
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

        if ($this->functionalityType == "retrieve_all_request") {

            $status = $postdata['status'];
            $search = $postdata['search'];



            $queryDecorator = new QueryDecorator("SELECT request.*,request.id as id ,request.total_rides as total_trip ,request.total_earning as earning, request.status as r_status,captain.name as cap_name 
                                                ,detail.bank_name as bank_name,detail.iban_no as iban
                                                FROM PaymentRequest  as request
                                                INNER join Captain as captain on captain.id = request.captain_id
                                                INNER JOIN CaptainBankDetail as detail on detail.captain_id = captain.id
                                                WHERE
            ",
                new CustomQuery("0", " "));
            if ($status == '1') {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  "   request.status = '$status'"));
            }else {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  "  request.status = '0'"));

            }

            if (!empty($search)) {


                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  " AND captain.name LIKE  '$search%'"));

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

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " LIMIT 10 "));
            /*Utility::Logger($queryDecorator->getQuery());*/
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['cap_name'],
                    'total_rides' => $row['total_trip'],
                    'total_earning' => $row['earning'],
                    'status' => $row['r_status'],

                    'bank_name' => $row['bank_name'],
                    'iban' => $row['iban'],

                ]);

            }



            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));


        }
        else if ($this->functionalityType == "pagination") {

//            $country_id = $postdata['country_id'];
//            $city_id = $postdata['city_id'];
            $status = $postdata['status'];
            $search = $postdata['search'];
            $offset = $postdata['offset'];

            $queryDecorator = new QueryDecorator("SELECT request.*,request.id as id ,request.total_rides as total_trip ,request.total_earning as earning, request.status as r_status,captain.name as cap_name 
                                                ,detail.bank_name as bank_name,detail.iban_no as iban
                                                FROM paymentrequest  as request
                                                INNER join Captain as captain on captain.id = request.captain_id
                                                INNER JOIN CaptainBankDetail as detail on detail.captain_id = captain.id
                                                WHERE
            ",
                new CustomQuery("0", " "));

            if ($status == '1') {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  "   request.status = '$status'"));
            }else {
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  "  request.status = '0'"));

            }

            if (!empty($search)) {


                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  " AND captain.name LIKE  '$search%'"));

            }



            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " LIMIT 10 OFFSET ".$offset));
//Utility::Logger($queryDecorator->getQuery());
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['cap_name'],
                    'total_rides' => $row['total_trip'],
                    'total_earning' => $row['earning'],
                    'status' => $row['r_status'],

                    'bank_name' => $row['bank_name'],
                    'iban' => $row['iban'],

                ]);

            }


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }


    }

    public function update()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType=="enable_request"){

            $status = $this->postData['status'];
            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator( "UPDATE PaymentRequest set status = '" . $status . "'   where id = '" . $id . "'", new CustomQuery("0", " "));
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