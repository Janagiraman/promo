<?php
// session_start();
if (!isset($_SESSION)) { session_start(); }
include('../connect.php');


$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM users where username = '".$username."' and password = '".$password."'";
$result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            
            $_SESSION['user'] = 'valid';
           
            header("Location: dashboard.php");
         } else{
            $_SESSION['user'] = 'invalid';
            header("Location: index.php");
         }
         mysqli_close($conn);
?>