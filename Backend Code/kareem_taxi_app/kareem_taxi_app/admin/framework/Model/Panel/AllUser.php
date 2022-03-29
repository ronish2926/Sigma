<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);

class AllUser extends Constant implements Queries
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
        if ($this->functionalityType == "add_user") {


            $firstName = $postdata['first_name'];
            $lastName = $postdata['last_name'];
            $password = $postdata['password'];
            $email = $postdata['email'];
            $phoneNo = $postdata['phone_no'];
            $image = $postdata['image'];
            $userImage = convert_save_image_from_base64("ic_user" . rand() . ".webp", $image, $this->user_pic);


            $queryDecorator = new QueryDecorator("INSERT INTO User(first_name,last_name,phone,email,password,profile_picture) 
                    VALUES (
                    '$firstName',
                    '$lastName',
                    '$phoneNo',
                    '$email',
                    '$password',
                    '$userImage'
                     
                    )", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

            return $this->getResponseObject($this->getSuccess_code(), "Data Insert Successfully", "0", "0", $listOfData,"");

        }


    }

    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "retrieve_all_users") {

            $search = $postdata['search'];

            $queryDecorator = new QueryDecorator("SELECT user.* FROM User as user",
                new CustomQuery("0", " "));

            if (!empty($search)){

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "WHERE user.first_name LIKE '$search%'"));

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
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['id'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'image' => $this->user_pic.$row['profile_picture'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'password' => $row['password'],
                    'enable' => $row['enable']
                ]);

            }



            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));


        }

        else if ($this->functionalityType == "pagination") {


            $search = $postdata['search'];
            $offset = $postdata['offset'];


            $queryDecorator = new QueryDecorator("SELECT user.* FROM User as user",
                new CustomQuery("0", " "));

            if (!empty($search)){

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "WHERE user.first_name LIKE '$search%'"));

            }

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " LIMIT 10 OFFSET ".$offset));
//Utility::Logger($queryDecorator->getQuery());
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['id'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'image' => $this->user_pic.$row['profile_picture'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'password' => $row['password'],
                    'enable' => $row['enable']
                ]);

            }

            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }

        else if ($this->functionalityType == "retrieve_edit_single_user") {


            $id = $postdata['id'];

            //order by id DESC

            $queryDecorator = new QueryDecorator("SELECT user.* FROM User as user WHERE user.id = '$id'",
                new CustomQuery("0", " "));


            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'image' => $this->user_pic.$row['profile_picture'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'password' => $row['password'],
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

        if ($this->functionalityType=="enable_user"){

            $enable = $postdata['enable'];
            $id = $postdata['id'];

            $queryDecorator = new QueryDecorator( "UPDATE User set enable = '" . $enable . "'   where id = '" . $id . "'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

        }

        else if ($this->functionalityType == "update_user_detail") {

            $userId = $postdata['id'];
            $firstName = $postdata['first_name'];
            $lastName = $postdata['last_name'];
            $password = $postdata['password'];
            $email = $postdata['email'];
            $phoneNo = $postdata['phone_no'];
            $image = $postdata['image'];
            $queryDecorator = new QueryDecorator("UPDATE User Set first_name = '$firstName' , last_name = '$lastName',
            email = '$email',phone='$phoneNo',password='$password'", new CustomQuery("0", " "));
            if (!isPath($image)) {
                $queryDecoratorpicture = new QueryDecorator("SELECT profile_picture FROM User WHERE id='$userId'", new CustomQuery("0", " "));
                $runpic = queryRunner($queryDecoratorpicture->getQuery());
                $picrow=rowRetriever($runpic);
                $existimg = $this->user_pic.$picrow['profile_picture'];
                if(isPath($existimg)){
                    unlink($existimg);


                }

                $userimage = convert_save_image_from_base64("ic_user" . rand() . ".webp", $image, $this->user_pic);
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " , profile_picture ='$userimage'"));


            }


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " WHERE id='$userId'"));
            $run = queryRunner($queryDecorator->getQuery());

            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData,"");




        }


    }

    public function delete()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "delete_user") {

            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator(  "DELETE FROM User", new CustomQuery("0", "  WHERE id = '$id'"));
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