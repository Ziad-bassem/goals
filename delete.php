<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $goal_id = $_GET['id'];
    
    $sql = "DELETE FROM user_goals WHERE id = $goal_id";
    if(mysqli_query($link, $sql)){
        header("Location: goals.php");
        exit();
    } else {
        echo "Error deleting goal: " . mysqli_error($link);
    }
} else {
    echo "Goal ID not provided.";
}

mysqli_close($link);
?>
