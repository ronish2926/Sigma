<?php


require_once('stripe-php/init.php');
$debugging = false;
$db_hostname="localhost";
$db_username="db_username";
$db_password="db_password";
$db_name="db_name";


//======Stripe Payment Credentials==================

$stripe_private_token = "stripe_private_token";
$stripe_public_token = "stripe_public_token";

//======OneSignal Credentials==================

$one_signal_app_id="one_signal_app_id";
$one_signal_server_id="one_signal_server_id";

//======Firebase Realtime Credentials==================

$firebase_realtime_database_url = "firebase_realtime_database_url"."/order/";

//======Mapbox Access Token==================

$mapbox_access_token = "mapbox_access_token";

//======For Php version 5.6==================

/*$con=mysql_connect($db_hostname,$db_username,$db_password) or die("Connection Problem");
$select_db=mysql_select_db($db_name,$con) or die("Could not Select Database");*/

//======For Php version 7.0==================

$con = mysqli_connect($db_hostname,$db_username,$db_password) or die("Connection Problem");
$select_db=mysqli_select_db($con,$db_name) or die("Could not Select Database");

//======Image Asset Folder Path (Currently not in use - don't remove it) ==================

$base_url_images = "../public/uploads/";

$category_images = $base_url_images."app_category/";
$brand_image_path = $base_url_images."brand_image/";
$shippingimages = $base_url_images."shipping_image/";
$featured_banner_images = $base_url_images."featured_banner_image/";


//======Special Response Codes==================

$success_code="202";
$unknown_code="204";
$error_code="206";


//Initialize Stripe 

//\Stripe\Stripe::setApiKey('$stripe_public_token');

//\Stripe\Stripe::setApiKey($stripe_private_token);  /// For Testing purpose , uncomment this line


/* 
     MY Sql Query Functionalties

MY SQL Function used to retrieve , counting & running query
All of query processing done by these functions , it 
follow central logic mechanism to enhance the Management
along with mysql upgradation problem 

*/


//======For Php version 5.6==================


  /*

	  function queryRunner($query){
	   $result=mysql_query($query) OR die(mysql_error());
	   return $result;
	  }

	  function countRow($result){
	    return mysql_num_rows($result);
	  }

	  function rowRetriever($result){
	    return mysql_fetch_assoc($result);
	  }

	  function rowRetrieverArray($result){
	    return mysql_fetch_array($result);
	  }

	  function rowRetrieverObject($result){
	    return mysql_fetch_object($result);
	  }

	  function findLastInsertId(){
	    return mysql_insert_id();
	  }
	  
	  function simplifySpecialCharacter($data){
	      return mysql_real_escape_string($data);
	    }
	    
	  function escapeStringForDb($data){
	    return mysql_real_escape_string($data);
	  }

  */




//======For Php version 7.0==================

function queryRunner($query){
  $con = $GLOBALS['con'];
 $result=mysqli_query($con,$query) OR die(mysqli_error($con));
 return $result;
}


function dbErrorMessage(){
  $con = $GLOBALS['con'];
  return mysqli_error($con);
}

function countRow($result){
  return mysqli_num_rows($result);
}

function rowRetriever($result){
  return mysqli_fetch_assoc($result);
}

function rowRetrieverObject($result){
  return mysqli_fetch_object($result);
}

function findLastInsertId(){
  $con = $GLOBALS['con'];
  return mysqli_insert_id($con);
}


function escapeStringForDb($data){
  $con = $GLOBALS['con'];
  return mysqli_real_escape_string($con,$data);
}


function simplifySpecialCharacter($data){
  $con = $GLOBALS['con'];
      return mysqli_real_escape_string($con,$data);
}


function rowRetrieverArray($result){
      return mysqli_fetch_array($result);
}  




/* 
     Functionalities for getting Header keys verification
     along with validating of data

*/


function validate($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars(strip_tags($data, ENT_QUOTES));
  $data = simplifySpecialCharacter($data);
  return $data;
}

function extract_numbers($string) {
   preg_match_all('/([\d]+)/', $string, $match);

   return $match[0];
}


/**
 * Simple helper to debug to the console
 *
 * @param $data object, array, string $data
 * @param $context string  Optional a description.
 *
 * @return string
 */
function debug_to_console($data, $context = 'Debug in Console') {

    // Buffering to solve problems frameworks, like header() in this and not a solid return.
    ob_start();

    $output  = 'console.info(\'' . $context . ':\');';
    $output .= 'console.log(' . json_encode($data) . ');';
    $output  = sprintf('<script>%s</script>', $output);

    echo $output;
}


function convert_save_image_from_base64($picture_name,$picture_into_base64,$folder_path){
    // echo $picture_into_base64;
    $pictureData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $picture_into_base64));
    $pictureName=$picture_name;
    file_put_contents($folder_path.$pictureName, $pictureData);



    return $picture_name;
}



function isBase64Image($data){

   if ( base64_encode(base64_decode($data)) === $data){
       return 1;
    } else {
       return 0;
    }
}

function image_resize($file_name, $width, $height, $crop=FALSE) {
  list($wid, $ht) = getimagesize($file_name);
  $r = $wid / $ht;
  if ($crop) {
     if ($wid > $ht) {
        $wid = ceil($wid-($width*abs($r-$width/$height)));
     } else {
        $ht = ceil($ht-($ht*abs($r-$w/$h)));
     }
     $new_width = $width;
     $new_height = $height;
  } else {
     if ($width/$height > $r) {
        $new_width = $height*$r;
        $new_height = $height;
     } else {
        $new_height = $width/$r;
        $new_width = $width;
     }
  }
  $source = imagecreatefromjpeg($file_name);
  $dst = imagecreatetruecolor($new_width, $new_height);
  image_copy_resampled($dst, $source, 0, 0, 0, 0, $new_width, $new_height, $wid, $ht);
  return $dst;
}

function isEmpty($data){
  if(isset($data)){
    return simplifySpecialCharacter($data);
  }else {
    return null;
  }
}


function isPath($path){
   return pathinfo($path, PATHINFO_EXTENSION);
}


function checkApiKeyVerification($apiKey){

  $isVerified;
  $table=$GLOBALS['table_name_verification'];
  $query="SELECT * FROM $table WHERE api='$apiKey' AND type ='rest_api_authorization' ";
  ///$result=mysql_query($query) OR die(mysql_error());
  $count=countRow($result); 


  if ($count>0) {
   $isVerified=true;
  }else{
  	$isVerified=false;
  }

 return $isVerified;

}

function escape_string($data) {
  $data = mysql_real_escape_string($data);
  return $data;
}

function generateRandomNumber($length = 10) {
    $number = '1234567890';
    $numberLength = strlen($number);
    $randomNumber = '';
    for ($i = 0; $i < $length; $i++) {
        $randomNumber .= $number[rand(0, $numberLength - 1)];
    }
    return $randomNumber;
}



/*function create_customer_in_stripe($user_name, $stripe_token ){
    
 $customer = \Stripe\Customer::create(array(
      "source" => $stripe_token,
      "description" => $user_name)
      );

  $customer_id = $customer->id;
  return $customer_id;
    
}

function create_refund_request_in_stripe($token, $amount ){
    
 $stripe->refunds->create([
  'charge' => $token,
  'amount' => $amount
 ]);


    
}*/



?>