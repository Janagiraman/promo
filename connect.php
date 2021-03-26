<?php

//$dbhost = 'localhost:3306';
$dbhost = 'hthc-db-do-user-2063523-0.a.db.ondigitalocean.com';
$dbuser = 'doadmin';
$dbpass = 'pcml4lebf3lc7n6w';
$dbname = 'pizzeria_promo';
$db_port        = '25060';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname, $db_port);
   
if(! $conn ) {
die('Could not connect: ' . mysqli_error());
}

?>