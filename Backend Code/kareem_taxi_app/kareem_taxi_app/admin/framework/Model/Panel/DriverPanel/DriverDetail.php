<?php

require_once(MODEL.'/Queries.php');
require_once(UTILITY.'/Utility.php');
require_once(OBJECT.'/DataObject.php');
require_once(OBJECT.'/ResponseObject.php');
require_once(QUERY_BUILDER.'/QueryDecorator.php');
require_once(QUERY_BUILDER.'/CustomQuery.php');
require_once(MODEL.'/Constant.php');
require_once(CONFIG);



class DriverDetail extends Constant implements Queries
{
    private $dtObject;
    private $actionType = "";
    private $functionalityType = "";
    private $postData = [];
    private $randomId = "";

    function __construct(DataObject $dtObject)
    {

        parent::__construct();
        $this->dtObject = $dtObject;
        $this->actionType = $dtObject->getActionType();
        $this->functionalityType = $dtObject->getFunctionalityType();
        $this->postData = $dtObject->getPostData();
        $this->randomId = $dtObject->getRandomId();


    }

    public function create()
    {
        $listOfData = [];
        $postdata = $this->postData;

         if ($this->functionalityType == "insert_picture") {
  

            $count=0;
            foreach ($_FILES['file']['name'] as $filename)
            {
                $temp="";
                $tmp=file_get_contents($_FILES['file']['tmp_name'][$count]);
                $data = base64_encode($tmp);
                $image = convert_save_image_from_base64($filename . ".webp", $data, $this->driver_detail_pic);
                $queryDecorator = new QueryDecorator("INSERT INTO DocumentPicture (term_id,picture_url)VALUES('$this->randomId','$image')", new CustomQuery("0", ""));
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
        else if ($this->functionalityType == "insert_car_picture") {
            $term_id = $this->postData['term_id'];
            $car_img = $this->postData['car_img'];

            $image = convert_save_image_from_base64("ic_carpic" . rand() . ".webp", $car_img, $this->driver_detail_pic);
                $queryDecorator = new QueryDecorator("INSERT INTO DocumentPicture (term_id,picture_url)VALUES('$term_id','$image')", new CustomQuery("0", ""));

                $result = queryRunner($queryDecorator->getQuery());

                array_push($listOfData, [
                    'id' => findLastInsertId(),
                    'images' => $image

                ]);






            return $this->getResponseObject($this->getSuccess_code(), "Data INSERT Successfully", findLastInsertId(), "0", $listOfData, '');


        }


    }

    public function retrieve()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "retrieve_specific_captain") {

            $captain_id = $postdata['captain_id'];
            $queryDecorator = new QueryDecorator("SELECT captain.* ,location.name as address , captain.id as cap_id,captain.picture as cap_pic,
ride_type.name as ride_type_name , ride_category.name as ride_category , 
bank_detail.bank_name , bank_detail.bank_no as branch_code, bank_detail.id as bank_id, bank_detail.account_holder_name , bank_detail.account_no , bank_detail.iban_no  , bank_detail.cheque_picture ,
car_detail.brand_name as car_brand_name , car_detail.car_name , car_detail.car_colour , car_detail.car_number_plate  ,
driving_license.document_type as driving_license_name,driving_license.driving_id as driv_id , driving_license.doc_pictures as driving_license_picture , driving_license.status as driving_license_status, driving_license.registration_no as driving_license_registration_no , driving_license.date_of_issue as driving_license_date_of_issue , driving_license.date_of_expiry as driving_license_date_of_expiry ,
national_identity_card.document_type as national_identity_card_name , national_identity_card.doc_pictures as national_identity_card_picture , national_identity_card.status as national_identity_card_status , national_identity_card.registration_no as national_identity_card_registration_no  ,national_identity_card.cnic_id as cnic_ids, national_identity_card.date_of_issue as national_identity_card_date_of_issue , national_identity_card.date_of_expiry as national_identity_card_date_of_expiry ,
car_pictures.document_type as car_pictures_name ,car_pictures.doc_id as car_pic_id, car_pictures.doc_pictures as car_picture , car_pictures.status as car_pictures_status,
car_documents.document_type as car_documents_name ,car_documents.cardoc_id as car_docsments_id, car_documents.doc_pictures as car_documents_picture , car_documents.status as car_documents_status,
orders.total_revenue , rating.avg_rating
            FROM Captain as captain 
            INNER JOIN Location as location  ON location.id = captain.place_id
            INNER JOIN CaptainMeta as car_detail ON car_detail.term_id = captain.id
            INNER JOIN RideType as ride_type ON ride_type.id = captain.ride_type_id
            INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category
            LEFT JOIN CaptainBankDetail as bank_detail ON bank_detail.captain_id = captain.id
            LEFT JOIN (
            
             SELECT captain_id ,  GROUP_CONCAT(price) as total_revenue FROM RideOrder GROUP BY captain_id 
                        
            ) orders ON orders.captain_id = captain.id
            LEFT JOIN (
            
             SELECT captain_id ,  AVG(rating) as avg_rating FROM Rating 
                        
            ) rating ON rating.captain_id = captain.id
            LEFT JOIN (
            
            SELECT documents.term_id as captain_id  , documents.document_type, documents.id as driving_id , document_picture.pictures as doc_pictures , documents.status , 
            detail.registration_no as registration_no , detail.date_of_issue as date_of_issue , detail.date_of_expiry as date_of_expiry
            FROM CaptainDocuments as documents
            LEFT  JOIN DocumentDetail as detail ON detail.term_id = documents.id 
            INNER JOIN (
            
             SELECT term_id , GROUP_CONCAT(CONCAT(id,':',picture_url)) as pictures FROM DocumentPicture GROUP BY term_id
            
            )  document_picture ON document_picture.term_id = documents.id
            WHERE documents.document_type = 'driving_license'
            
            
            ) driving_license ON driving_license.captain_id = captain.id
            
            LEFT JOIN (
            
            SELECT documents.term_id as captain_id , documents.document_type ,documents.id as cnic_id, document_picture.pictures as doc_pictures , documents.status
            , detail.registration_no as registration_no , detail.date_of_issue as date_of_issue , detail.date_of_expiry as date_of_expiry
            FROM CaptainDocuments as documents
            LEFT  JOIN DocumentDetail as detail ON detail.term_id = documents.id 
            INNER JOIN (
            
             SELECT term_id , GROUP_CONCAT(CONCAT(id,':',picture_url)) as pictures FROM DocumentPicture GROUP BY term_id
            
            )  document_picture ON document_picture.term_id = documents.id
            WHERE documents.document_type = 'national_identity_card'
            
            
            ) national_identity_card ON national_identity_card.captain_id = captain.id
            
            LEFT JOIN (
            
            SELECT documents.term_id as captain_id,documents.id as doc_id , documents.document_type , document_picture.pictures as doc_pictures , documents.status
            FROM CaptainDocuments as documents
            INNER JOIN (
            
             SELECT term_id , GROUP_CONCAT(CONCAT(id,':',picture_url)) as pictures FROM DocumentPicture GROUP BY term_id
            
            )  document_picture ON document_picture.term_id = documents.id
            WHERE documents.document_type = 'car_pictures'
            
            
            ) car_pictures ON car_pictures.captain_id = captain.id
            
            
            LEFT JOIN (
            
            SELECT documents.term_id as captain_id,documents.id as cardoc_id  , documents.document_type , document_picture.pictures as doc_pictures , documents.status
            FROM CaptainDocuments as documents
            INNER JOIN (
            
             SELECT term_id , GROUP_CONCAT(CONCAT(id,':',picture_url)) as pictures FROM DocumentPicture GROUP BY term_id
            
            )  document_picture ON document_picture.term_id = documents.id
            WHERE documents.document_type = 'car_documents'
            
            
            ) car_documents ON car_documents.captain_id = captain.id
            
       
            
            
            ",new CustomQuery("0", " "));


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " WHERE captain.id = '$captain_id' "));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {
                array_push($listOfData, [
                    'id' => $row['cap_id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'address' => $row['address'],
                    'car_number_plate' => $row['car_number_plate'],
                    'cap_pic' => $this->captainpic.$row['cap_pic'],
                    'car_pic_id' => $row['car_pic_id'],
                    'car_docsments_id' => $row['car_docsments_id'],
                    'driving_id' => $row['driv_id'],
                    'cnic_id' => $row['cnic_ids'],


                    'ride_category' => $row['ride_category'],
                    'car_brand_name' => $row['car_brand_name'],
                    'car_name' => $row['car_name'],
                    'car_colour' => $row['car_colour'],
                    'bank_id' => $row['bank_id'],


                    'ride_type_name' => $row['ride_type_name'],
                    'total_revenue' => $this->getTotalRevenue($row['total_revenue']),
                    'total_trips' => $this->getTotalTrips($row['total_revenue']),
                    'avg_rating' => ceil($row['avg_rating']),
                    'status' => $row['status'],

                    'driving_license' => $row['driving_license_name'],
                    'driving_license_picture' => $this->getDocuments(array_filter(explode ("," , $row['driving_license_picture']))),
                    'driving_license_status' => $row['driving_license_status'],
                    'driving_license_registration_no' => $row['driving_license_registration_no'],
                    'driving_license_date_of_issue' => $row['driving_license_date_of_issue'],
                    'driving_license_date_of_expiry' => $row['driving_license_date_of_expiry'],

                    'national_identity_card' => $row['national_identity_card_name'],
                    'national_identity_card_picture' => $this->getDocuments(array_filter(explode ("," , $row['national_identity_card_picture']))),
                    'national_identity_card_status' => $row['national_identity_card_status'],
                    'national_identity_card_registration_no' => $row['national_identity_card_registration_no'],
                    'national_identity_card_date_of_issue' => $row['national_identity_card_date_of_issue'],
                    'national_identity_card_date_of_expiry' => $row['national_identity_card_date_of_expiry'],

                    'car_pictures_name' => $row['car_pictures_name'],
                    'car_pictures' => $this->getDocuments(array_filter(explode ("," , $row['car_picture']))),
                    'car_pictures_status' => $row['car_pictures_status'],

                    'car_documents' => $row['car_documents_name'],
                    'car_documents_pictures' => $this->getDocuments(array_filter(explode ("," , $row['car_documents_picture']))),
                    'car_documents_status' => $row['car_documents_status'],

                    'bank_name' => $row['bank_name'],
                    'branch_code' => $row['branch_code'],
                    'account_holder_name' => $row['account_holder_name'],
                    'account_no' => $row['account_no'],
                    'iban_no' => $row['iban_no'],
                    'cheque_picture' => $row['cheque_picture'],

                    'date_created' => $row['date_created'],
                    'enable' => $row['enable']
                ]);


            }

            /*$rowCount = countRow($result);
            if ($rowCount > 10) {
                $rowCount = $rowCount / 10;
            }

            Utility::getPaginationCssCode($rowCount)

            */

            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, null);

        }
        else if ($this->functionalityType == "retrieve_specific_captain_rides") {

            $search = $postdata['search'];
            $captain_id = $postdata['captain_id'];

            $queryDecorator = new QueryDecorator("SELECT ride_order.id as id, location.name as city_name , country.name as country_name ,
 waiting_charges.price as waiting_charges , waiting_charges.time_condition as waiting_time ,
captain.name as captain_name , captain.phone as captain_phone , captain.email as captain_email ,captain.picture as cap_pic,
concat(user.first_name,'',user.last_name) as customer_name , user.phone as customer_phone , user.email as customer_email ,
ride_order.from_address as from_address , ride_order.to_address as to_address , ride_order.distance as distance , ride_order.trip_time as trip_time , ride_order.price as fare ,
ride_order.date_created as date_time , ride_type.name as ride_type_name , ride_category.name as ride_category_name ,
payment_method.name as payment_method_name  ,
ride_order.status , ride_order.enable , rating.rating as ride_rating

            FROM RideOrder as ride_order 
            INNER JOIN Captain as captain ON captain.id = ride_order.captain_id
            INNER JOIN Location as location ON location.id = captain.place_id 
            INNER JOIN Country as country ON country.id = location.country_id
            INNER JOIN User as user ON user.id = ride_order.user_id
            INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id
            INNER JOIN RideTypeWaitingCharges as waiting_charges ON waiting_charges.term_id = ride_type.id 
            INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category
            INNER JOIN PaymentMethod as payment_method ON payment_method.id = ride_order.payment
            LEFT JOIN Rating as rating ON rating.order_id = ride_order.id
            ",new CustomQuery("0", " "));

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                new CustomQuery("0",  " WHERE   "));

            if (!empty($search)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  "  captain.name LIKE  '$search%' OR ride_category.name LIKE '$search%'  AND "));

            }


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0",  "  captain.id='$captain_id'"));

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

//                $total_count = $row['total_count'];
                array_push($listOfData, [
                    'id' => $row['id'],

                    'captain_name' => $row['captain_name'],
                    'captain_phone' => $row['captain_phone'],
                    'captain_email' => $row['captain_email'],
                    'cap_pic' => $this->captainpic.$row['cap_pic'],

                    'city_name' => $row['city_name'],
                    'country_name' => $row['country_name'],
                    'waiting_charges' => $row['waiting_charges'],
                    'waiting_time' => $row['waiting_time'],


                    'customer_name' => $row['customer_name'],
                    'customer_phone' => $row['customer_phone'],
                    'customer_email' => $row['customer_email'],

                    'from_address' => $row['from_address'],
                    'to_address' => $row['to_address'],
                    'distance' => ceil($row['distance']),
                    'trip_time' => $row['trip_time'],
                    'fare' => $row['fare'],

                    'date_time' => $row['date_time'],
                    'ride_type_name' => $row['ride_type_name'],
                    'ride_category_name' => $row['ride_category_name'],

                    'payment_method_name' => $row['payment_method_name'],
                    'ride_rating' => $row['ride_rating'],
                    'status' => $row['status'],
                    'enable' => $row['enable']

                ]);

            }


            return $this->getResponseObject($this->getSuccess_code(), "Data Retrieve Successfully", "0", "0", $listOfData, Utility::getPaginationCssCode($rowCount));

        }
        else if ($this->functionalityType == "pagination") {

            $search = $postdata['search'];
            $captain_id = $postdata['captain_id'];
            $offset = $postdata['offset'];

            $queryDecorator = new QueryDecorator("SELECT ride_order.id as id, location.name as city_name , country.name as country_name ,
 waiting_charges.price as waiting_charges , waiting_charges.time_condition as waiting_time ,
captain.name as captain_name , captain.phone as captain_phone , captain.email as captain_email ,captain.picture as cap_pic,
concat(user.first_name,'',user.last_name) as customer_name , user.phone as customer_phone , user.email as customer_email ,
ride_order.from_address as from_address , ride_order.to_address as to_address , ride_order.distance as distance , ride_order.trip_time as trip_time , ride_order.price as fare ,
ride_order.date_created as date_time , ride_type.name as ride_type_name , ride_category.name as ride_category_name ,
payment_method.name as payment_method_name  ,
ride_order.status , ride_order.enable , rating.rating as ride_rating

            FROM RideOrder as ride_order 
            INNER JOIN Captain as captain ON captain.id = ride_order.captain_id
            INNER JOIN Location as location ON location.id = captain.place_id 
            INNER JOIN Country as country ON country.id = location.country_id
            INNER JOIN User as user ON user.id = ride_order.user_id
            INNER JOIN RideType as ride_type ON ride_type.id = ride_order.ride_type_id
            INNER JOIN RideTypeWaitingCharges as waiting_charges ON waiting_charges.term_id = ride_type.id 
            INNER JOIN RideCategory as ride_category ON ride_category.id = ride_type.ride_category
            INNER JOIN PaymentMethod as payment_method ON payment_method.id = ride_order.payment
            LEFT JOIN Rating as rating ON rating.order_id = ride_order.id
            ",new CustomQuery("0", " "));

            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                new CustomQuery("0",  " WHERE   "));

            if (!empty($search)) {

                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),
                    new CustomQuery("0",  "  captain.name LIKE  '$search%' OR ride_category.name LIKE '$search%'  AND "));

            }


            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0",  "  captain.id='$captain_id'"));



            //</editor-fold>
            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(),new CustomQuery("0", " LIMIT 10 OFFSET ".$offset));
            $result = queryRunner($queryDecorator->getQuery());
            while ($row = rowRetriever($result)) {

//                $total_count = $row['total_count'];
                array_push($listOfData, [
                    'id' => $row['id'],

                    'captain_name' => $row['captain_name'],
                    'captain_phone' => $row['captain_phone'],
                    'captain_email' => $row['captain_email'],
                    'cap_pic' => $this->captainpic.$row['cap_pic'],

                    'city_name' => $row['city_name'],
                    'country_name' => $row['country_name'],
                    'waiting_charges' => $row['waiting_charges'],
                    'waiting_time' => $row['waiting_time'],


                    'customer_name' => $row['customer_name'],
                    'customer_phone' => $row['customer_phone'],
                    'customer_email' => $row['customer_email'],

                    'from_address' => $row['from_address'],
                    'to_address' => $row['to_address'],
                    'distance' => ceil($row['distance']),
                    'trip_time' => $row['trip_time'],
                    'fare' => $row['fare'],

                    'date_time' => $row['date_time'],
                    'ride_type_name' => $row['ride_type_name'],
                    'ride_category_name' => $row['ride_category_name'],

                    'payment_method_name' => $row['payment_method_name'],
                    'ride_rating' => $row['ride_rating'],
                    'status' => $row['status'],
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
        else if ($this->functionalityType=="change_captain_status"){

            $enable = $this->postData['status'];
            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator( "UPDATE Captain set status = '" . $enable . "'   where id = '" . $id . "'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData, "");

        }
        else if ($this->functionalityType=="change_captain_documents"){

            $reg = $this->postData['reg'];
            $issue = $this->postData['issue'];
            $expire = $this->postData['expire'];
            $front_img =$this->postData['front_img'];
            $back_img = $this->postData['back_img'];
            $id = $this->postData['id'];
            $f_find ="";
            $b_find ="";
            $f_image ="";
            $b_image ="";
//            if(isPath($front_img)){
//                unlink($front_img);
//
//            }
//            if(isPath($back_img)){
//                unlink($back_img);
//
//            }

            $queryDecorator = new QueryDecorator( "UPDATE DocumentDetail set registration_no = '$reg', date_of_issue = '$issue',date_of_expiry = '$expire'   where term_id = '" . $id . "'", new CustomQuery("0", " "));
            $run = queryRunner($queryDecorator->getQuery());

//
            if (!isPath($front_img)) {

                $f_image = convert_save_image_from_base64("ic_detail" . rand() . ".webp", $front_img, $this->driver_detail_pic);
                $queryDecorator = new QueryDecorator("INSERT INTO DocumentPicture (term_id,picture_url) VALUES ('$id','$f_image')", new CustomQuery("0", ""));
                $run = queryRunner($queryDecorator->getQuery());
                $f_find= findLastInsertId();



            }
            if (!isPath($back_img)) {

                $b_image = convert_save_image_from_base64("ic_detail" . rand() . ".webp", $back_img, $this->driver_detail_pic);
                $queryDecorator = new QueryDecorator("INSERT INTO DocumentPicture (term_id,picture_url) VALUES ('$id','$b_image')", new CustomQuery("0", ""));
                $run = queryRunner($queryDecorator->getQuery());
                $b_find=findLastInsertId();


            }

            array_push($listOfData, [
                'id_1' => $f_find,
                'id_2' => $b_find,
                'img1' => $f_image,
                'img2' => $b_image,

            ]);


            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData, "");

        }
        else if ($this->functionalityType=="change_captain_bank_detail"){

            $holder = $this->postData['holder'];
            $bank_name = $this->postData['bank_name'];
            $bank_account_no = $this->postData['bank_account_no'];
            $bank_branch_code = $this->postData['bank_branch_code'];
            $bank_iban_no =$this->postData['bank_iban_no'];
            $img = $this->postData['img'];
            $captain_id = $this->postData['captains_id'];
            $image ="";



            $queryDecorator = new QueryDecorator( "UPDATE CaptainBankDetail SET bank_name = '$bank_name',
            account_holder_name = '$holder',account_no = '$bank_account_no', bank_no ='$bank_branch_code', iban_no='$bank_iban_no'", new CustomQuery("0", ""));
//            $run = queryRunner($queryDecorator->getQuery());

//
            if (!isPath($img)) {


                $image = convert_save_image_from_base64("ic_bank" . rand() . ".webp", $img, $this->driver_detail_pic);
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " , cheque_picture ='$image'"));


            }
            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " WHERE captain_id='$captain_id'"));
            $run = queryRunner($queryDecorator->getQuery());

            array_push($listOfData, [
                'image' => $image,

            ]);


            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData, "");

        }
        else if ($this->functionalityType=="change_captain_car_detail"){

            $car_name = $this->postData['car_name'];
            $cap_car_brand = $this->postData['cap_car_brand'];
            $cap_car_color = $this->postData['cap_car_color'];
            $cap_car_number_plate = $this->postData['cap_car_number_plate'];

            $captain_id = $this->postData['captains_id'];



            $queryDecorator = new QueryDecorator( "UPDATE CaptainMeta SET brand_name = '$cap_car_brand',
            car_name = '$car_name',car_colour = '$cap_car_color', car_number_plate ='$cap_car_number_plate'", new CustomQuery("0", " WHERE term_id='$captain_id'"));
            $run = queryRunner($queryDecorator->getQuery());



            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData, "");

        }
        else if ($this->functionalityType=="driver_detail_update"){

            $id = $this->postData['id'];
            $name = $this->postData['name'];
            $email = $this->postData['email'];
            $cap_img =$this->postData['cap_img'];


            $image ="";


            $queryDecorator = new QueryDecorator( "UPDATE Captain set name = '$name', email = '$email'", new CustomQuery("0", " "));


//
            if (!isPath($cap_img)) {
                $queryDecoratorpicture = new QueryDecorator("SELECT picture FROM Captain WHERE id='$id'", new CustomQuery("0", " "));
                $runpic = queryRunner($queryDecoratorpicture->getQuery());
                $picrow=rowRetriever($runpic);
                $existimg = $this->captainpic.$picrow['picture'];
                if(isPath($existimg)){
                    unlink($existimg);


                }

                $image = convert_save_image_from_base64("ic_captain" . rand() . ".webp", $cap_img, $this->captainpic);
                $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " , picture ='$image'"));


            }
            $queryDecorator = new QueryDecorator($queryDecorator->getQuery(), new CustomQuery("0", " WHERE id ='$id'"));
            $run = queryRunner($queryDecorator->getQuery());

            array_push($listOfData, [
                'image' => $image,


            ]);


            return $this->getResponseObject($this->getSuccess_code(), "Data Update Successfully", "0", "0", $listOfData, "");

        }


    }

    public function delete()
    {
        $listOfData = [];
        $postdata = $this->postData;

        if ($this->functionalityType == "delete_captain") {

            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator(  "DELETE FROM Captain where id = '".$id."'", new CustomQuery("0", " "));
            $res = queryRunner($queryDecorator->getQuery());

        }
        else if ($this->functionalityType == "delete_docments_pic") {

            $id = $this->postData['id'];
            $img = $this->postData['path'];

            if(isPath($img)){
                unlink($img);


            }

            $queryDecorator = new QueryDecorator(  "DELETE FROM DocumentPicture where id = '".$id."'", new CustomQuery("0", " "));
            $res = queryRunner($queryDecorator->getQuery());

            return $this->getResponseObject($this->getSuccess_code(), "Data Delete Successfully", "0", "0", $listOfData, null);

        }
        else if ($this->functionalityType == "delete_car_pic") {

            $id = $this->postData['id'];

            $queryDecorator = new QueryDecorator(  "DELETE FROM DocumentPicture where id = '".$id."'", new CustomQuery("0", " "));
            $res = queryRunner($queryDecorator->getQuery());
            return $this->getResponseObject($this->getSuccess_code(), "Data Delete Successfully", $id, "0", $listOfData, null);

        }

        else if ($this->functionalityType == "delete_bank_pic") {

            $id = $this->postData['id'];
            $img = $this->postData['path'];



            $queryDecorator = new QueryDecorator(  "UPDATE CaptainBankDetail SET cheque_picture = null WHERE id = '".$id."'", new CustomQuery("0", " "));
            $res = queryRunner($queryDecorator->getQuery());
            if(isPath($img)){
                unlink($img);


            }
            return $this->getResponseObject($this->getSuccess_code(), "Data Delete Successfully", $id, "0", $listOfData, null);

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

        if (!isset($revenue)){
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

    public function getDocuments($doc){

        $listOfData = [];
        for ($i = 0 ; $i<count($doc) ; $i++){

            $arr = explode (":", $doc[$i]);
            array_push($listOfData, [
                'id' => $arr[0],
                'picture' => $arr[1]
            ]);


        }
        return $listOfData;

    }


}


?>