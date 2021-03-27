<?php
if (!isset($_SESSION)) { session_start(); }
include('connect.php');

if(isset($_POST['g-recaptcha-response']) !=''){

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $privatekey = "6LfCdIwaAAAAAFddNQMt-1CYcW9TYkjJHXP3QKpE";
    $response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $data = json_decode($response);
    echo '<pre>';
    print_r($data);
    exit;

    if (isset($data->success) AND $data->success==true) {
                // everything is ok!
    } else {
                // spam
    }

}


// echo '<pre>';
// print_r($_POST);
// exit; 
  
  $captcha = VerifyRecaptcha($_POST['g-recaptcha-response']);
  echo '<pre>';
  print_r($captcha);
  exit;

    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
      //your site secret key
      $secret = '6LfCdIwaAAAAAG9XJrq4gQGTgeD2IT_b9zKSj-Eu';
      //get verify response data
      echo '<pre>';
      echo $_POST['g-recaptcha-response'];
      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
      $keyy = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret);
     print_r($keyy);
      print_R($verifyResponse);
        $responseData = json_decode($verifyResponse);
       
      print_r($responseData);
      if($responseData->success){
          echo 'succes';exit;
          //contact form submission code goes here
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
          //$message = "Dear $name, Please use this code $coupon before $expiry_date.";
          $message = "Dear $name, Please use this code $coupon before $expiry_date. Regards Pizzeria Locale";
         
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
         
  
        //  $succMsg = 'Your contact request have submitted successfully.';
      }else{
          echo "comes else ";exit;
          //$errMsg = 'Robot verification failed, please try again.';
          $_SESSION['captcha_error'] = 'captcha_validate';
          header("Location: index.php");
          die();
      }
    }

    function VerifyRecaptcha($g_recaptcha_response) {
        $ch = curl_init();
        $curlConfig = array(
            CURLOPT_URL            => "https://www.google.com/recaptcha/api/siteverify",
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS     => array(
                'secret' => '6LfCdIwaAAAAAG9XJrq4gQGTgeD2IT_b9zKSj-Eu',
                'response' => $g_recaptcha_response,
                'remoteip' => $_SERVER['REMOTE_ADDR']
            )
        );
        curl_setopt_array($ch, $curlConfig);
        if($result = curl_exec($ch)){
            echo "lll";
            echo '<pre>';
            curl_close($ch);
            $response = json_decode($result);
            print_r($response);
            exit;
            return $response->success;
        }else{
            echo "dddtdtd";exit;
            var_dump(curl_error($ch)); // this for debug remove after you test it
            return false;
        }
    }
   
  



