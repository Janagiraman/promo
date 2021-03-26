<?php
include('../connect.php');

$sql = "SELECT * FROM offer_sms";
$result =mysqli_query($conn, $sql);
$offers=[];
if (mysqli_num_rows($result) > 0) {
    while($row = $result->fetch_object())
    {
    $offers[] = $row;
    }
  

}

?>