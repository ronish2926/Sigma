<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);

class AllCoupon extends Constant implements Queries
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


        if ($this->functionalityType == "insert_coupon") {

            $city_id = $this->postData['city_id'];
            $coupon_code = $this->postData['coupon_code'];
            $coupon_reward = $this->postData['coupon_reward'];
            $coupon_limit = $this->postData['coupon_limit'];
            $start_date = $this->postData['start_date'];
            $end_date = $this->postData['end_date'];
//            UTILITY::LoggerArray($payMethod);

            $queryDecorator = new QueryDecorator("INSERT into Coupon (place_id,coupon_code,coupon_reward,coupon_limit,coupon_from_date,coupon_to_date) 
            VALUES ('$city_id','$coupon_code','$coupon_reward','$coupon_limit','$start_date','$end_date')", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());



            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");

        }


    }

    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "retrieve_all_coupon") {

//            $category_id = $postdata['category_id'];
            $search = $postdata['search'];

            //order by country.id DESC

            $queryDecorator = new QueryDecorator("SELECT coupon.*,location.name as city_name,coupon.id as cou_id,coupon.enable as cou_enable
              FROM Coupon as coupon 
              INNER JOIN Location as location ON location.id = coupon.place_id
              ", new CustomQuery("0", " "));


            if (!empty($search)){

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " AND coupon.coupon_code LIKE '$search%'"));

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
                    'id' => $row['cou_id'],
                    'city_name' => $row['city_name'],
                    'coupon_code' => $row['coupon_code'],
                    'coupon_reward' => $row['coupon_reward'],
                    'coupon_limit' => $row['coupon_limit'],
                    'coupon_from_date' => date("j M, Y", strtotime($row["coupon_from_date"])),
                    'coupon_to_date' => date("j M, Y", strtotime($row['coupon_to_date'])),
                    'enable' => $row['cou_enable']
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

            $queryDecorator = new QueryDecorator("SELECT coupon.*,location.name as city_name,coupon.id as cou_id,coupon.enable as cou_enable
              FROM Coupon as coupon 
              INNER JOIN Location as location ON location.id = coupon.place_id
              ", new CustomQuery("0", " "));

            if (!empty($search)){

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " AND coupon.coupon_code LIKE '$search%'"));

            }


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0", " LIMIT 10 OFFSET  ".$offset));
            $result = queryRunner($queryDecorator->getQuery());

            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['cou_id'],
                    'city_name' => $row['city_name'],
                    'coupon_code' => $row['coupon_code'],
                    'coupon_reward' => $row['coupon_reward'],
                    'coupon_limit' => $row['coupon_limit'],
                    'coupon_from_date' => date("j M, Y", strtotime($row["coupon_from_date"])),
                    'coupon_to_date' => date("j M, Y", strtotime($row['coupon_to_date'])),
                    'enable' => $row['cou_enable']
                ]);

            }


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }
        else if ($this->functionalityType == "retrieve_edit_coupon") {

//            $category_id = $postdata['category_id'];
            $id = $postdata['id'];

            //order by country.id DESC

            $queryDecorator = new QueryDecorator("SELECT coupon.*,location.name as city_name,coupon.id as cou_id,coupon.enable as cou_enable ,country.id as country_id
              FROM Coupon as coupon 
              INNER JOIN Location as location ON location.id = coupon.place_id
                INNER JOIN Country as country ON country.id = location.country_id
              WHERE coupon.id = '$id'
              ", new CustomQuery("0", " "));








            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0", ""));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['cou_id'],
                    'city_name' => $row['city_name'],
                    'country_id' => $row['country_id'],

                    'city_id' => $row['place_id'],
                    'coupon_code' => $row['coupon_code'],
                    'coupon_reward' => $row['coupon_reward'],
                    'coupon_limit' => $row['coupon_limit'],
                    'coupon_from_date' => date("Y-m-d", strtotime($row["coupon_from_date"])),
                    'coupon_to_date' => date("Y-m-d", strtotime($row['coupon_to_date'])),
                    'enable' => $row['cou_enable']
                ]);

            }


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }


    }

    public function update()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "update_coupon") {

            $coupon_code = $this->postData['coupon_code'];
            $coupon_reward = $this->postData['coupon_reward'];
            $coupon_limit = $this->postData['coupon_limit'];
            $coupon_from_date = $this->postData['coupon_from_date'];
            $id = $this->postData['id'];
            $coupon_to_date = $this->postData['coupon_to_date'];
            $city_id = $this->postData['city_id'];
//            Utility::LoggerArray($paymentMethod);



            $queryDecorator = new QueryDecorator( "UPDATE Coupon set place_id = '$city_id' , coupon_code = '$coupon_code',coupon_reward = '$coupon_reward'
            ,coupon_limit = '$coupon_limit',coupon_from_date = '$coupon_from_date',coupon_to_date = '$coupon_to_date'
            where id = '$id'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");
        }
        else if ($this->functionalityType=="enable_coupon"){

            $enable = $this->postData['enable'];
            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator( "UPDATE Coupon set enable = '" . $enable . "'   where id = '" . $id . "'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

        }


    }

    public function delete()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "delete_coupon") {

            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator(  "DELETE FROM Coupon where id = '".$id."'", new CustomQuery("0", " "));
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