<?php
$user = 'root'; 
$password = ''; 
$db = 'dp'; 
$host = 'localhost';
$port = 3306; 

$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);

if (!$success) {
    die('Error: Unable to connect to database');
}
?>

