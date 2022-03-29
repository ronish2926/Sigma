<?php


include("config.php");

calculateMonthlyEarningOfCaptains();
    
function calculateMonthlyEarningOfCaptains() {
  
 
 $query="SELECT ride_order.captain_id , GROUP_CONCAT(ride_order.price) as revenue , ride_order.company_percentage
 FROM RideOrder as ride_order
 WHERE DATE(ride_order.date_created) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND ride_order.status = '4'
 GROUP BY ride_order.captain_id";
 $result=queryRunner($query);
 while ($row = rowRetriever($result)) { 
      
      $captain_id = $row['captain_id'];
      $total_revenue = getTotalRevenue($row['revenue']);
      $total_trips = getTotalTrips($row['revenue']);
      $company_percentage = $row['company_percentage'];
      
      $company_earning = ($total_revenue * $company_percentage ) / 100;
      $captain_earning = $total_revenue - $company_earning;
      
      $currency_symbol = extractCharactersFromString($row['revenue']);
      $earning_with_symbol = $currency_symbol.' '.$captain_earning;
      
      $insert_query="INSERT INTO PaymentRequest(captain_id,total_rides,total_earning) VALUES('$captain_id','$total_trips','$earning_with_symbol')";
      $result_query=queryRunner($insert_query);
      
      
  }

  

}


    function getTotalRevenue($revenue){

        if (!isset($revenue)){
            return 0;
        }
        $arr = explode (",", $revenue);
        $totalRevenue=0;
        for ($i = 0 ; $i<count($arr) ; $i++){
            $totalRevenue+=extractNumericFromString($arr[$i]);
        }

        return $totalRevenue;

    }

    function getTotalTrips($revenue){

        if (!isset($revenue)){
            return 0;
        }
        $arr = explode (",", $revenue);
        return count($arr);
    }
    

    function extractNumericFromString($string)
    {
        preg_match_all('!\d+!', $string, $match);

        return $match[0][0];
    }

    function extractCharactersFromString($string)
    {
        preg_match_all('!\D+!', $string, $match);

        return $match[0][0];
    }



?>