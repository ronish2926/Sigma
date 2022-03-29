<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);


class BecomeCaptain extends Constant implements Queries
{
    private $dtObject;
    private $actionType = "";
    private $functionalityType = "";
    private $postData = [];
    public $fileData;

    function __construct(DataObject $dtObject)
    {

        parent::__construct();
        $this->dtObject = $dtObject;
        $this->actionType = $dtObject->getActionType();
        $this->functionalityType = $dtObject->getFunctionalityType();
        $this->postData = $dtObject->getPostData();
        $this->fileData = $dtObject->getFileData();
        $this->getRandom = $dtObject->getRandomId();


    }
    public function create()
    {
        $listOfData = [];
        $postdata = $this->postData;
        $file = $this->fileData;

    if ($this->functionalityType == "insert_picture") {
     
        $count=0;
        foreach ($_FILES['file']['name'] as $filename)
        {
            $temp="";
            $tmp=file_get_contents($_FILES['file']['tmp_name'][$count]);
            $data = base64_encode($tmp);
            $image = convert_save_image_from_base64($filename . ".webp", $data, $this->driver_detail_pic);
            $queryDecorator = new QueryDecorator("INSERT INTO DocumentPicture(term_id,picture_url)VALUES('$this->getRandom','$image')", new CustomQuery("0", ""));
            $result = queryRunner($queryDecorator->getQuery());

            array_push($listOfData, [
                'id' => findLastInsertId(),
                'name' => $filename

            ]);


            $count=$count + 1;
            $temp=$temp.basename($filename);
            $temp='';
            $tmp='';
            

        }



        return $this->getResponseObject($this->getSuccess_code(), "Data INSERT Successfully", findLastInsertId(), "0", $listOfData, '');


    }
    else if($this->functionalityType == "insert_captain"){
        Utility::DebugObject($postdata);
        Utility::LoggerArray($file);
        $random_no1 = $postdata['random-no1'];
        $random_no2 = $postdata['random-no2'];
        $fname = $postdata['fname'];
        $lname = $postdata['lname'];
        $phno = $postdata['phno'];
        $email = $postdata['email'];
        $pass = $postdata['pass'];
        $con_pass = $postdata['con_pass'];
        $per_address = $postdata['per_address'];
        $city = $postdata['city'];
        $country = $postdata['country'];

        $driving_reg = $postdata['reg'];
        $driving_issue = $postdata['date_issue'];
        $driving_expire = $postdata['date_expire'];
        $cnic_reg = $postdata['cnic_reg'];
        $cnic_date_issue = $postdata['cnic_date_issue'];
        $cnic_date_expire = $postdata['cnic_date_expire'];
        $holder_name = $postdata['holder_name'];
        $bank_name = $postdata['bank_name'];
        $account_no = $postdata['account_no'];
        $branch_code = $postdata['branch_code'];
        $iban_no = $postdata['iban_no'];
        $car_brand = $postdata['car_brand'];
        $car_name = $postdata['car_name'];
        $car_color = $postdata['car_color'];
        $car_no = $postdata['car_no'];
        $car_type = $postdata['car_type'];
        $car_category = $postdata['car_category'];

        $pro = file_get_contents($_FILES['profile_pic']['tmp_name']);
        $data = base64_encode($pro);
        $profile_pic = convert_save_image_from_base64($_FILES['profile_pic']['name'] . ".webp", $data, $this->captainpic);

        $li_frnt = file_get_contents($_FILES['licence_frontimage']['tmp_name']);
        $data = base64_encode($li_frnt);
        $licence_frontimage = convert_save_image_from_base64($_FILES['licence_frontimage']['name'] . ".webp", $data, $this->driver_detail_pic);

        $li_back = file_get_contents($_FILES['licence_backimage']['tmp_name']);
        $data = base64_encode($li_back);
        $licence_backimage = convert_save_image_from_base64($_FILES['licence_backimage']['name'] . ".webp", $data, $this->driver_detail_pic);


        $cnic_front = file_get_contents($_FILES['cnic_frontimage']['tmp_name']);
        $data = base64_encode($cnic_front);
        $cnic_frontimage = convert_save_image_from_base64($_FILES['cnic_frontimage']['name'] . ".webp", $data, $this->driver_detail_pic);

        $cnic_back = file_get_contents($_FILES['cnic_backimage']['tmp_name']);
        $data = base64_encode($cnic_back);
        $cnic_backimage = convert_save_image_from_base64($_FILES['cnic_backimage']['name'] . ".webp", $data, $this->driver_detail_pic);


        $bank_cheque = file_get_contents($_FILES['bank_chequeimage']['tmp_name']);
        $data = base64_encode($bank_cheque);
        $bank_chequeimage = convert_save_image_from_base64($_FILES['bank_chequeimage']['name'] . ".webp", $data, $this->driver_detail_pic);


        $queryDecorator = new QueryDecorator("INSERT INTO Captain(name,email,password,phone,picture,place_id,address,ride_type_id)
                                            VALUES('$fname $lname','$email','$pass','$phno','$profile_pic','$city','$per_address','$car_type')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());
        $last = findLastInsertId();
        $queryDecorator = new QueryDecorator("INSERT INTO CaptainDocuments(term_id,document_type)
                                            VALUES('$last','driving_license')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());
        $driving_id = findLastInsertId();
        $queryDecorator = new QueryDecorator("INSERT INTO CaptainDocuments(term_id,document_type)
                                            VALUES('$last','national_identity_card')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());
        $cnic_id = findLastInsertId();

        $queryDecorator = new QueryDecorator("INSERT INTO CaptainDocuments(term_id,document_type)
                                            VALUES('$last','car_pictures')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());
        $car_pic_id = findLastInsertId();

        $queryDecorator = new QueryDecorator("INSERT INTO CaptainDocuments(term_id,document_type)
                                            VALUES('$last','car_documents')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());
        $car_doc_id = findLastInsertId();

//        insert data in Document Detail page according to the driving_Licencen id ki base pr

        $queryDecorator = new QueryDecorator("INSERT INTO DocumentDetail(term_id,registration_no,date_of_issue,date_of_expiry)
                                            VALUES('$driving_id','$driving_reg','$driving_issue','$driving_expire')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());

        //        insert data in Document Detail page according to the national_identity_card id ki base pr

        $queryDecorator = new QueryDecorator("INSERT INTO DocumentDetail(term_id,registration_no,date_of_issue,date_of_expiry)
                                            VALUES('$cnic_id','$cnic_reg','$cnic_date_issue','$cnic_date_expire')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());

        //        insert data in documentpicture page according to the national_identity_card id ki base pr pictrue add krna front pic

        $queryDecorator = new QueryDecorator("INSERT INTO DocumentPicture(term_id,picture_url)
                                            VALUES('$cnic_id','$cnic_frontimage')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());

        //        insert data in documentpicture page according to the national_identity_card id ki base pr pictrue add krna back pic

        $queryDecorator = new QueryDecorator("INSERT INTO DocumentPicture(term_id,picture_url)
                                            VALUES('$cnic_id','$cnic_backimage')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());

        //        insert data in documentpicture page according to the driving_license id ki base pr pictrue add front pic

        $queryDecorator = new QueryDecorator("INSERT INTO DocumentPicture(term_id,picture_url)
                                            VALUES('$driving_id','$licence_frontimage')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());

        //        insert data in documentpicture page according to the driving_license id ki base pr pictrue add Back pic

        $queryDecorator = new QueryDecorator("INSERT INTO DocumentPicture(term_id,picture_url)
                                            VALUES('$driving_id','$licence_backimage')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());

        //        Update data in documentpicture page according to the car pictrue  id ki base pr pictrue add Back pic

        $queryDecorator = new QueryDecorator("UPDATE DocumentPicture SET term_id = '$car_pic_id' WHERE term_id = '$random_no1'", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());

        //        Update data in documentpicture page according to the car pictrue  id ki base pr pictrue add Back pic

        $queryDecorator = new QueryDecorator("UPDATE DocumentPicture SET term_id = '$car_doc_id' WHERE term_id = '$random_no2'", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());

        //        insert data in captain bank detail  page

        $queryDecorator = new QueryDecorator("INSERT INTO CaptainBankDetail(captain_id,bank_name,account_holder_name,account_no,bank_no,iban_no,cheque_picture)
                                            VALUES('$last','$bank_name','$holder_name','$account_no','$branch_code','$iban_no','$bank_chequeimage')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());

        //        insert data in captain bank detail  page

        $queryDecorator = new QueryDecorator("INSERT INTO CaptainMeta(term_id,brand_name,car_name,car_colour,car_number_plate)
                                            VALUES('$last','$car_brand','$car_name','$car_color','$car_no')", new CustomQuery("0", ""));
        $result = queryRunner($queryDecorator->getQuery());

//        if ($result != null) {
//
//            header("location:./../index.php");
//
//        }

        return $this->getResponseObject($this->getSuccess_code(), "Data INSERT Successfully", findLastInsertId(), "0", $listOfData, '');
    }



    }
    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "get_ride_type") {

            $categoy_id = $postdata['id'];


            $queryDecorator = new QueryDecorator("SELECT * FROM RideType WHERE ride_category = '$categoy_id'", new CustomQuery("0", " "));

            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['id'],
                    'name' => $row['name'],


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
        $listOfData = [];
        $postdata = $this->postData;

     if ($this->functionalityType == "delete_products_picture") {
        $id = $postdata['id'];
        $queryDecorator = new QueryDecorator("DELETE FROM  DocumentPicture", new CustomQuery("0", " WHERE id = '$id'"));

        $result = queryRunner($queryDecorator->getQuery());

        return $this->getResponseObject($this->getSuccess_code(), "Data Delete Successfully", "1", "0", $listOfData, '');

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