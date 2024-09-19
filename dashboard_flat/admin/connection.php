<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "flats_db";  


$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


function sendGSMS($senderID, $recipient_no, $message,$api_key,$sms_type = 'text&contacts'){
  $senderID = " 8809601003682";	 
  $api_key = "39|QEHGxxmparbleyM2yb3M2QNGX3hpIPT25TodHf2c";
  $message = $message;
  $url = "https://login.esms.com.bd/api/v3/sms/send";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $headers = array(
     "Accept: application/json",
     "Authorization: Bearer  $api_key",
     "Content-Type: application/json",
  );
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  
  $data = [
    'recipient' => '88'.$recipient_no,
    'sender_id' => $senderID,
    'message' => urldecode($message),
  ];
  
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
  //print_r $curl;
  //for debug only!
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  
  $resp = curl_exec($curl);
  curl_close($curl);
  
  return $resp;
   
  }




  function get_acc($FltID,$month,$year,$cmd){
    global $conn;
    
    if($cmd == 'ALL'){
        $fetchQuery = "SELECT sum(f_total) as Total_am FROM flat_bill";
    $result = mysqli_query($conn, $fetchQuery);
    $row = mysqli_fetch_assoc($result);
    echo number_format($row['Total_am'],0,',');
    }

     if($cmd == 'MONTH'){
      $fetchQuery = "SELECT sum(f_total) as Total_am FROM flat_bill WHERE f_month = '{$month}' AND f_year = '{$year}'  ";
   $result = mysqli_query($conn, $fetchQuery);
   $row = mysqli_fetch_assoc($result);
    echo number_format($row['Total_am'],0,',');
    
    }
    }


   //expenses amount 
   function get_expense_sum($cmd) {
    global $conn;

    if ($cmd == 'ALL') {
        $fetchQuery = "SELECT SUM(ex_amount) AS Total_exp FROM expenses";
        $result = mysqli_query($conn, $fetchQuery);
        $row = mysqli_fetch_assoc($result);
        echo number_format($row['Total_exp'], 0, ',');
    } 
   }  

?>