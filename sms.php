<?php
if (!isset($_SESSION)) { session_start(); }
include('connect.php');

 $name = $_POST['name'];
 $mobile = $_POST['phone'];

 $sql = "SELECT * FROM offer_sms where mobile = '".$mobile."'";
 $result = mysqli_query($conn, $sql);
 
 if (mysqli_num_rows($result) > 0) {
      $_SESSION['user'] = 'exist';
      header("Location: index.php");
      die();
 }

 
 $coupon = mt_rand(100000, 999999);
 $expiry_date = date('d-m-Y',strtotime("+7 day"));

 $username =  'manoj.p@netiapps.com';
 $hash =  'c036e85abe2efe9d3ccce6f9495dc320778f5d56370424f1bf602135d9efd4f8';
 $test = "0";
 $sender = "sahasr"; // This is who the message appears to be from.
//  $message = "Test";
 $message = "Dear $name, Please use this code $coupon before $expiry_date.";
 $message = urlencode($message);
 $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$mobile."&test=".$test;
 $ch = curl_init('http://api.textlocal.in/send/?');
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $result = curl_exec($ch); // This is the result from the API
 curl_close($ch);

$sql = "INSERT INTO offer_sms (name, mobile, coupon) VALUES ('".$name."', $mobile, $coupon)";
if(mysqli_query($conn, $sql)){
      $_SESSION['insert'] = 'success';
      $_SESSION['coupon'] = $coupon;
      $_SESSION['expiry_date'] = $expiry_date;
      header("Location: index.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


