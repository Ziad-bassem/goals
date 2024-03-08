<?php
require_once 'connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($link, $sql)) {
        echo "Signup successful!";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($link);
    }

    mysqli_close($link);
}
?>
