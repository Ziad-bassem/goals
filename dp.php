<?php

$connection = mysqli_connect("localhost", "username", "password", "database");

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
$result = mysqli_query($connection, $query);

if ($result) {
    $user_id = mysqli_insert_id($connection);

    $goal_category = $_POST['goal_category'];
    $goal_text = $_POST['goal_text'];
    $goal_date = $_POST['goal_date'];
    $goal_complete = $_POST['goal_complete'];

    $goal_query = "INSERT INTO user_goals (user_id, goal_category, goal_text, goal_date, goal_complete) VALUES ('$user_id', '$goal_category', '$goal_text', '$goal_date', '$goal_complete')";
    $goal_result = mysqli_query($connection, $goal_query);

    if ($goal_result) {
        echo "Signup successful!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
