<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);

class AllPaymentMethod extends Constant implements Queries
{
    private $dtObject;
    private $actionType = "";
    private $functionalityType = "";
    private $postData = [];
    private $fileData;

    function __construct(DataObject $dtObject)
    {

        parent::__construct();
        $this->dtObject = $dtObject;
        $this->actionType = $dtObject->getActionType();
        $this->functionalityType = $dtObject->getFunctionalityType();
        $this->postData = $dtObject->getPostData();
        $this->fileData = $dtObject->getFileData();


    }

    public function create()
    {  $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "insert_payment_method") {

            $payment_method_name = $this->postData['payment_method_name'];
            $payment_method_tag = $this->postData['payment_method_tag'];
            $payment_img = $this->postData['payment_img'];

//            $count = 0;
//            $image="";
//            foreach ($this->fileData['file']['name'] as $filename) {
//
//                $tmp = file_get_contents($this->fileData['file']['tmp_name'][$count]);
//                $data = base64_encode($tmp);
//                $image = convert_save_image_from_base64($filename . ".webp", $data, $this->products_images);
//                $count = $count + 1;
//
//            }

            $image = convert_save_image_from_base64("ic_payment" . rand() . ".webp", $payment_img, $this->paymentimages);


            $queryDecorator = new QueryDecorator("INSERT into PaymentMethod (name,tag,picture) VALUES ('" . $payment_method_name . "','" . $payment_method_tag . "','".$image."')", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

            return $this->getResponseObject($this->getSuccess_code(), "Data Insert Successfully", "0", "0", $listOfData,"");
        }

    }

    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "retrieve_all_payment_method") {

//            $category_id = $postdata['category_id'];
            $search = $postdata['search'];

            //order by country.id DESC

            $queryDecorator = new QueryDecorator("SELECT ride.*,ride.name as name,ride.picture as picture ,ride.tag as tag FROM PaymentMethod as ride ", new CustomQuery("0", " "));


            if (!empty($search)){

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "Where name LIKE '$search%'"));

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

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0", "order by id DESC LIMIT 10  "));
            $result = queryRunner($queryDecorator->getQuery());
//            Utility::Logger("parent ".$queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'tag' => $row['tag'],

                    'picture' => $this->paymentimages.$row['picture'],
                    'enable' => $row['enable']
                ]);

            }




            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));


        }
        else if ($this->functionalityType == "pagination") {


            $search = $postdata['search'];
            $offset = $postdata['offset'];



            $queryDecorator = new QueryDecorator("SELECT ride.*,ride.name as name,ride.picture as picture ,ride.tag as tag FROM PaymentMethod as ride ", new CustomQuery("0", " "));


            if (!empty($search)){

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", "Where name LIKE '$search%'"));

            }


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0", "order by id DESC  "));
            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0", " LIMIT 10 OFFSET ".$offset));
            $result = queryRunner($queryDecorator->getQuery());
//            Utility::Logger("parent ".$queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'tag' => $row['tag'],

                    'picture' => $this->paymentimages.$row['picture'],
                    'enable' => $row['enable']
                ]);

            }




            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, "");


        }
        if ($this->functionalityType == "retrieve_edit_payment_method") {

//            $category_id = $postdata['category_id'];
            $id = $postdata['id'];

            //order by country.id DESC

            $queryDecorator = new QueryDecorator("SELECT ride.*,ride.name as name,ride.picture as picture ,ride.tag as tag FROM PaymentMethod as ride WHERE ride.id='$id' ", new CustomQuery("0", " "));
            $result = queryRunner($queryDecorator->getQuery());
//            Utility::Logger("parent ".$queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'tag' => $row['tag'],

                    'picture' => $this->paymentimages.$row['picture'],
                    'enable' => $row['enable']
                ]);

            }




            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData,"");


        }


    }

    public function update()
    {
        $listOfData = [];
        $postdata = $this->postData;
        if ($this->functionalityType == "update_payment_method") {

            $payment_method_name = $this->postData['payment_method_name'];
            $payment_method_tag = $this->postData['payment_method_tag'];
            $payment_img = $this->postData['payment_img'];
            $id = $this->postData['id'];
//            Utility::DebugObject("THIS IS ".$this->postData['fd']);
//            $count = 0;
//            $image="";
//            foreach ($this->fileData['file']['name'] as $filename) {
//
//                $tmp = file_get_contents($this->fileData['file']['tmp_name'][$count]);
//                $data = base64_encode($tmp);
//                $image = convert_save_image_from_base64($filename . ".webp", $data, $this->products_images);
//                $count = $count + 1;
//
//            }


            $queryDecorator = new QueryDecorator("UPDATE PaymentMethod Set name = '".$payment_method_name."' , tag = '".$payment_method_tag."'", new CustomQuery("0", " "));

            if (!isPath($payment_img)) {
                $queryDecoratorpicture = new QueryDecorator("SELECT picture FROM PaymentMethod WHERE id='$id'", new CustomQuery("0", " "));
                $runpic = queryRunner($queryDecoratorpicture->getQuery());
                $picrow=rowRetriever($runpic);
                $existimg = $this->paymentimages.$picrow['picture'];
//                Utility::Logger($existimg);
                if(isPath($existimg)){
                    unlink($existimg);


                }

                $image = convert_save_image_from_base64("ic_payment" . rand() . ".webp", $payment_img, $this->paymentimages);
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " , picture ='$image'"));


            }

//            if(isset($image)){
//                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " , picture = '$image'  "));
//
//            }

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " WHERE id='$id'"));
            $run = queryRunner($queryDecorator->getQuery());

            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData,"");
        }
        else if ($this->functionalityType=="enable_payment"){

            $enable = $this->postData['enable'];
            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator( "UPDATE PaymentMethod set enable = '$enable' WHERE id = ' $id'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());
            return $this->getResponseObject($this->getSuccess_code(), "Data UPDATE Successfully", "0", "0", $listOfData, "");
        }


    }

    public function delete()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "delete_payment_method") {

            $id = $this->postData['id'];

            $queryDecoratorpicture = new QueryDecorator("SELECT picture FROM PaymentMethod WHERE id='$id'", new CustomQuery("0", " "));
            $runpic = queryRunner($queryDecoratorpicture->getQuery());
            $picrow=rowRetriever($runpic);
            $existimg = $this->paymentimages.$picrow['picture'];
//                Utility::Logger($existimg);
            if(isPath($existimg)){
                unlink($existimg);

            }

            $queryDecorator = new QueryDecorator("DELETE FROM PaymentMethod where id = '".$id."'", new CustomQuery("0", " "));
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