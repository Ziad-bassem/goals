<?php
session_start();
require_once 'connect.php'; 

$category = $_POST['cat'];
$text = $_POST['text'];
$date = $_POST['goaldate'];
$complete = isset($_POST['complete']) ? 1 : 0; 


$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO user_goals (user_id, goal_category, goal_text, goal_date, goal_complete) ";
$sql .= "VALUES ('$user_id', '$category', '$text', '$date', '$complete')";

if(mysqli_query($link, $sql)){
    echo "Stored";
} else {
    echo "Failed";
}

header("Location: goals.php"); 
exit();
?>
